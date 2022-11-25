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

  public function login($email = null, $password = null) {
    if($email) {

      $user = $this->find($email);

      if($user) {
        if(password_verify($password, $this->data()->password)) {
          Session::put($this->session_name, $this->data()->id);
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
}
?>
