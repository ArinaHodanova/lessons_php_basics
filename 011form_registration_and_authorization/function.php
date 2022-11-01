<?
error_reporting(-1);
session_start();

/*
  Parameters:
    string - $email
    string - $password
    string - $verific_password
    string - $redirect_list
  Desctiptiop: проверка полей на пустоту 
  Return value: null
*/
function checkfFieldEmptiness($email, $password, $verific_password, $redirect_list) {
  if(empty($email)) {
    setFlashMassege('error', 'Введите почту');
    redirect_to($redirect_list);
  }
  if(empty($password)) {
    setFlashMassege('error', 'Введите пароль');
    redirect_to($redirect_list);
  }
  if(isset($verific_password)) {
    if(empty($verific_password)) {
      setFlashMassege('error', 'Подтвердите пароль');
      redirect_to($redirect_list);
    }
  }

}

/*
  Parameters:
    string - $name
    string - $massege
  Desctiptiop: формируем флеш сессии 
  Return value: null
*/
function setFlashMassege($name, $massege) {
  $_SESSION[$name] = $massege;
}

/*
  Parameters:
    string - $name
  Desctiptiop: показ сообщения
  Return value: null
*/
function displayFlashMassege($name) {
  if(isset($_SESSION[$name])) {
    echo $_SESSION[$name];
    unset($_SESSION[$name]);
  }
}

/*
  Parameters:
    string - $path
  Desctiptiop: перенаправление на нужную страничку
*/
function redirect_to($path) {
  header("Location: $path");
  exit;
}

/*
  Parameters:
    string - $password
    string - $redirect_list
  Desctiptiop: проверяем пароль на колличество символов
  Return value: null
*/
function checkfPassword($password, $redirect_list) { 
  if(mb_strlen($password) <= 5) {
    setFlashMassege('error', 'Пароль должен быть больше 5 символов');
    redirect_to($redirect_list);
  }
}

/*
  Parameters:
    string - $password
    string - $verific_password
    string - $redirect_list
  Desctiptiop: проверяем подтверждение пароля
  Return value: bool
*/
function checkfPasswordVerific($password, $verific_password, $redirect_list) { 
  if($verific_password != $password) {
    setFlashMassege('error', 'Пароли не совпадают');
    redirect_to($redirect_list);
  }
  return true;
}

/*
  Parameters:
    string - $email
    object - $db
  Desctiptiop: поиск повторяющегося емайл
  Return value: bool
*/
function getUzerByEmail($email, $db, $table) {  
  $sql = "SELECT * FROM `$table` WHERE email=:email";
  $stat = $db->prepare($sql);
  $stat->execute(['email' => $email]);
  $result = $stat->fetch(PDO::FETCH_ASSOC);
  if(!empty($result)) {
    return true;
  }
  return false;
}

/*
  Parameters:
    object - $db
    string - $status_table
  Desctiptiop: получаем массив с статусов
  Return value: arr
*/
function getArrStatus($db, $table) {  
  $sql = "SELECT * FROM `$table`";
  $stat = $db->prepare($sql);
  $stat->execute();
  return $stat->fetchAll(PDO::FETCH_ASSOC);
}

/*
  Parameters:
    object - $db
    string - $id
    string - $table
  Desctiptiop: получаем статус текущего пользовавателя
  Return value: arr
*/
function getUserStatus($db, $id, $table) {  
  $sql = "SELECT status FROM `$table` WHERE id=:id";
  $stat = $db->prepare($sql);
  $stat->bindValue(":id", $id);
  $stat->execute();
  $result = $stat->fetch(PDO::FETCH_ASSOC);
  foreach($result as $elem) {
    return $elem;
  }
}


/*
  Parameters:
    string - $password
    string - $email
    object - $db
    string - $table
  Desctiptiop: добавляем нового пользователя в БД
  Return value: int (user id)
*/
function addUzer($email, $password, $db, $table) {
  if(isset($password)) {
    $sql = "INSERT INTO `$table` (`email`, `password`) VALUES (:email, :password)";
    $stat = $db->prepare($sql);
    $stat->execute([
      'email' => $email, 
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    return $db->lastInsertId();
  }

  if(!isset($password)) {
    $sql = "INSERT INTO `$table` (`email`) VALUES (:email)";
    $stat = $db->prepare($sql);
    $stat->execute([
      'email' => $email, 
    ]);
    return $db->lastInsertId();
  }
}

/*
  Parameters:
    array - $users
  Desctiptiop: получаем id пользователя
  Return value: int (user id)
*/
function getUserById($users) {
  foreach($users as $elem ) {
    if($_GET['id'] === $elem['id']) {
      return $elem['id'];
    }
  }
}

/*
  Parameters:
    array - $users
    array - id
  Desctiptiop: получили емайл пользователя
  Return value: string
*/
function getUserByEmail($users, $id) {
  foreach($users as $user) {
    if($id == $user['id']) {
      return $user['email'];
    }
  }
}

/*
  Parameters:
    array - $users
    string - $email
  Desctiptiop: получили id пользователя по почте
  Return value: string
*/
function getUserOwnerById($users, $email) {
  foreach($users as $user) { 
    if($user['email'] == $email) {
      return $user['id'];
    }
  }
}

/*
  Parameters:
    string - $name
    string - $work
    string - $tel
    string - $adress
    string - $id
    object - $db
    string - $table
  Desctiptiop: добавляем информацию о пользователе
  Return value: bool
*/
function editInformation($name, $work, $tel, $adress, $id, $db, $table) { 
  $sql = "UPDATE `$table` SET username = :name, job_title = :job, phone = :phone, address = :address WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":name", $name);
  $stmt->bindValue(":job", $work);
  $stmt->bindValue(":phone", $tel);
  $stmt->bindValue(":address", $adress);
  $stmt->execute();
  return true;
}


/*
  Parameters:
    string - $email
    string - $password
    object - $db
    string - $id_users
    string - $table
  Desctiptiop: изменяем пароль и логин пользователя
  Return value: bool
*/
function editCreadentials($email, $password, $db, $id_users, $table) {
  if(isset($password)) {
    $sql = "UPDATE `$table` SET email = :email, password = :password WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $id_users);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));
  }
  if(!isset($password)) {
    $sql = "UPDATE `$table` SET email = :email WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $id_users);
    $stmt->bindValue(":email", $email);
  }

  $stmt->execute();
  return true;
}

/*
  Parameters:
    string - $status
    object - $db
    string - $id_users
    string - $table
  Desctiptiop: изменяем статус
  Return value: bool
*/
function editStatus($status, $db, $id, $table) { 
  $sql = "UPDATE `$table` SET status = :status  WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":status", $status);
  $stmt->execute();
  return true;
}


/*
  Parameters:
    string - $avatar
    int - $id
    object - $db
    string - $table
  Desctiptiop: сохраняем аватар в БД и на сервер
  Return value: bool
*/
function uploadAvatar($avatar_tmp, $avatar, $id, $db, $table) { 
  $avatar_type = pathinfo($avatar);

  //проверяем допустимый формат изображения
  if(!checkAvatarFormat($avatar_type['extension'])){
    setFlashMassege('error', 'Такой формат изображения - ' . $avatar_type['extension'] . ' не допустим');
    return false;
  }

  $avatar_name = uniqid($avatar_type['filename']) . '.' . $avatar_type['extension'];//формируем уникальное название
  $path = 'uploads/' . $avatar_name;//путь к файлу
  
  $sql = "UPDATE `$table` SET image = :name WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":name", $path);
  $stmt->execute();

  move_uploaded_file($avatar_tmp, $path);//сохраняем файл на сервер
  return true;
}

function addSocialLinks($wk, $telegramm, $inst, $id, $db, $table) {
  $sql = "UPDATE `$table` SET vk = :wk, telegram = :telegramm, instagram = :inst  WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":wk", $wk);
  $stmt->bindValue(":telegramm", $telegramm);
  $stmt->bindValue(":inst", $inst);
  $stmt->execute();
  return true;
}

/*
  Parameters:
    string - $type
  Desctiptiop: проверяем формат изображения
  Return value: bool
*/
function checkAvatarFormat($type) {
  $arr = ['SVG', 'jpg', 'jpeg', 'gif', 'png', 'svg'];
  if (!in_array($type, $arr)) {
    return false;
  }
  return true;
}

/*
  Parameters:
    string - $name
    string - $password
    object - $db
  Desctiptiop: авторизация пользователя и добавление в сессию
  Return value: bool
*/
function authorizationUser($email, $password, $db, $table) {
  $sql = "SELECT * FROM `$table` WHERE email=:email";
  $stat = $db->prepare($sql);
  $stat->execute(['email' => $email]);
  $result = $stat->fetch(PDO::FETCH_ASSOC);
  if(empty($result)) {
    setFlashMassege('error', 'Такой электронный адрес не найден');
    redirect_to('login.php');
    return false;
  } 
  //проверяем совпадения пароля
  if(!password_verify($password, $result['password'])) {
    setFlashMassege('error', 'Неверный логин или пароль');
    redirect_to('login.php');
    return false;
  }
  setFlashMassege('user', ['id' => $result['id'], 'email' => $email, 'role' =>  $result['role']]);
  return true;
}

/*
  Parameters:
  Desctiptiop: проверяем авторизован ли пользователь
  Return value: bool
*/
function isLoggedIn() {
  if(isset($_SESSION['user'])) {
    return true;
  }  
  return false;
}

/*
  Parameters:
  Desctiptiop: если пользовател не авторизован
  Return value: bool
*/
function isNotLoggedIn() {
  return !isLoggedIn();
}

/*
  Parameters:
  Desctiptiop: вычисляем роль пользователя
  Return value: string 
*/
function getAuthenticatedUser() {
  if(isLoggedIn()) {
    return $_SESSION['user'];
  }
  return false;
}

/*
  Parameters:
    string - getAuthenticatidUser() - роль пользователя
  Desctiptiop: проверяем админ ли пользователь
  Return value: bool
*/
function isAdmin($role) {
  if($role['role'] == 'admin') {
    return true;
  } 
    return false;
}

/*
  Parameters:
  Desctiptiop: вывод пользователей
  Return value: array
*/
function getUsers($db, $table) {
  $sql = "SELECT * FROM `$table`";
  $stat = $db->prepare($sql);
  $stat->execute();
  $result = $stat->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

/*
  Parameters:
    array - $user
    array - $authenticatedUser
  Desctiptiop: открываем возможности редактировать свой профиль пользователю
  Return value: bool
*/
function isIdentical($user, $authenticatedUser) {
  if($user['email'] == $authenticatedUser['email']) {
    return true;
  }
  return false;
}

/*
  Parameters:
    array - $users
    num - $id
  Desctiptiop: проверяем является ли пользователь владельцем своего профиля 
  Return value: bool
*/
function isAvtor($users, $id) {
  foreach($users as $elem) { 
    if(isIdentical($elem, getAuthenticatedUser()) && $id == $elem['id']) {
      return true;
    }
  }
  return false;
}

/*
  Parameters:
    array - $users
    num - $id
    string - $email
  Desctiptiop: получаем владельца страницы
  Return value: bool
*/

function isOwnerProfile($users, $id_page, $email) {
  foreach($users as $user) {
    if($id_page == $user['id'] && $user['email'] == $email) {
      return true;
    }
  }
}

/*
  Parameters:
    array - $users
    num - $id
  Desctiptiop: выбирае профиль
  Return value: bool
*/
function getUserProfil($users, $id) { 
  foreach($users as $user) {
    if($id === $user['id']) {
      return $user;
    }
  }
  return null;
}

/*
  Parameters:
    object - $db
    num - $id
    string - $table
  Desctiptiop: удалить пользователя из БД
  Return value: bool
*/
function delet($db, $id, $table) {
  $sql = "DELETE FROM `$table` WHERE id=:id_user";
  $stat = $db->prepare($sql);
  $stat->bindValue(":id_user", $id);
  $stat->execute();
  return true;
}
?>
