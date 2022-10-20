<?
error_reporting(-1);
session_start();
require_once __DIR__ . '/db.php';
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
    setFlashMassege('error', 'Поле пароль не должно быть пустое');
    redirect_to($redirect_list);
  }
  if(isset($verific_password)) {
    if(empty($verific_password)) {
      setFlashMassege('error', 'Заполните поле подтверждение пароля');
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
  Desctiptiop: поиск пользователя по емайл
  Return value: arry
*/
function getUzerByEmail($email, $db) {  
  $sql = "SELECT * FROM `users_reg`WHERE email=:email";
  $stat = $db->prepare($sql);
  $stat->execute(['email' => $email]);
  $result = $stat->fetch(PDO::FETCH_ASSOC);
  return $result;
}

/*
  Parameters:
    string - $password
    string - $email
    object - $db
  Desctiptiop: добавляем нового пользователя в БД
  Return value: int
*/
function addUzer($email, $password, $db) {
  $sql = "INSERT INTO `users_reg` (`email`, `password`) VALUES (:email, :password)";
  $stat = $db->prepare($sql);
  $stat->execute([
    'email' => $email, 
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ]);
  return $db->lastInsertId();
}

/*
  Parameters:
    string - $name
    string - $password
    object - $db
  Desctiptiop: авторизация пользователя
  Return value: bool
*/
function authorizationUser($email, $password, $db) {
  $sql = "SELECT * FROM `users_reg`WHERE email=:email";
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
    string - $name
  Desctiptiop: проверяем залогинен ли пользователь
  Return value: bool
*/
function isNotLoggedIn() {
  if(empty($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

/*
  Parameters:
    string - $name
  Desctiptiop: проверяем залогинен ли пользователь
  Return value: bool
*/
function isNotLoggedIn() {
  if(empty($_SESSION['user'])) {
    return true;
  } 
    return false;
}

/*
  Parameters:
    string - $name
  Desctiptiop: вычисляем роль пользователя
  Return value: string 
*/
function getCurrentUser() {
  return $_SESSION['user']['role'];
}

/*
  Parameters:
    string - getCurrentUser() - роль пользователя
  Desctiptiop: проверяем админ ли пользователь
  Return value: bool
*/
function isAdmin($role) {
  if($role == 'admin') {
    return true;
  } else {
    return false;
  }
}

/*
  Parameters:
  Desctiptiop: вывод пользователей
  Return value: array
*/
function getUsers($db) {
  $sql = "SELECT * FROM `users_list`";
  $stat = $db->prepare($sql);
  $stat->execute();
  $result = $stat->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

/*
  Parameters:
    array - $name
  Desctiptiop: открываем возможности редактировать свой профиль пользователю
  Return value: bool
*/
function isOwner($user) {
  if($_SESSION['user']['email'] == $user['email']) {
    return true;
  }
  return false;
}
?>
