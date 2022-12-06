<?
class User {
  private $db, $data, $session_name, $isLoggedIn;

  public function __construct($user = null) {
    $this->db = Database::getMake();
    $this->session_name = Config::get('session.user_session');

    if(!$user) {
      //если сессия существует, то вытаскиваем пользователя по id
      if(Session::exists($this->session_name)) {
        $user = Session::get($this->session_name);//id текущего пользователя
          if($this->find($user)) {
            $this->isLoggedIn = true;
          } else {
            //
          }
      }
    } else {
      $this->find($user);
    }
  }

  public function create($fields = []) {
    $this->db->insert('users_reg', $fields);
  }

  public function login($email = null, $password = null, $remember = false) {
    if(!$email && !$password && $this->exists()) { 
      Session::put($this->session_name, $this->data()->id);
    } else {
      $user = $this->find($email);
      if($user) {
        //сравнение пароль пользователя и паролей в таблице 
        if(password_verify($password, $this->data()->password)) {
          Session::put($this->session_name, $this->data()->id);
          
          //работа с кнопкой запомнить меня
          if($remember) {
            $hash = hash('sha256', uniqid());//создаем хеш пользователя
            $hashCheck = $this->db->get('user_session', ['userid', '=', $this->data()->id]);//добавляем хеш в Бд для 1 пользователя

            if(!$hashCheck->count()) {
              $this->db->insert( 'user_session', [
                'userid' => $this->data()->id, 
                'hash' => $hash
              ]);
            } else {
                $hash = $hashCheck->first()->hash;
            }
            Cookie::put(Config::get('cookie.cookie_name'), $hash, Config::get('cookie.cookie_expiry'));
          }

          return true;

        }
      }
    }
    return false;
  }

  //метод для нахождения пользователя
  public function find($value = null) {
    if(is_numeric($value)) {
        $this->data = $this->db->get('users_reg', ['id', '=', $value])->first();
    } else {
        $this->data = $this->db->get('users_reg', ['email', '=', $value])->first();
    }
    
    if($this->data) {
      return true;
    }
    return false;
  }

  //геттер для получения данных, которые мы записали
  public function data() {
    return $this->data;
  }

  public function isLoggedIn() {
    return $this->isLoggedIn;
  }

  public function logout() {
    $this->db->delete('user_session', ['userid', '=', $this->data()->id]);
    Cookie::delete(Config::get('cookie.cookie_name'));
    Session::delete($this->session_name);
  }

  public function exists() {
    return (!empty($this->data())) ? true : false;
  }

  public function update($fields = [], $id = null) {
    //меняем инормацию по id у текущего пользователя
    if(!$id && $this->isLoggedIn()) {
      $id = $this->data()->id;
    }

    //меняем ин-ию у пользователя по id. Например админ может заменить ин-и у пользователя по id
    $this->db->update('users_reg', $id, $fields);
  }

  //проверяем роль пользователя
  public function hasPermissions($key = null) {
    $group = $this->db->get('roles', ['id', '=', $this->data()->groupid]);
    if($group->count()) {
        $permissions = $group->first()->permissions;
        $permissions = json_decode($permissions, true);

        if($permissions[$key]) {
          return true;
        }
    }
    return false;
  }
}
?>
