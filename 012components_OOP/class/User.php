<?
class User {
  private $db, $data, $session_name;

  public function __construct() {
    $this->db = Database::getMake();
    $this->session_name = Config::get('session.user_session');
  }

  public function create($fields = []) {
    $this->db->insert('users_reg', $fields);
  }

  public function login($email = null, $password = null) {
    if($email) {

      $user = $this->find($email);

      if($user) {
        if(password_verify($password, $this->data()->password)) {
          Session::put($this->session_name , 
            [
              'id' => $this->data()->id,
              'username' => $this->data()->username
            ]);
          return true;
        }
      }
    }
    return false;
  }

  //метод для нахождения пользователя
  public function find($email = null) {
    $this->data = $this->db->get('users_reg', ['email', '=', $email])->first();
    if($this->data) {
      return true;
    }
    return false;
  }

  //геттер для получения данных, которые мы записали
  public function data() {
    return $this->data;
  }
}
?>
