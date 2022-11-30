<?
class Validator {
    private $name;
    private $mess;
    protected $is_empty_email = false;
    protected $is_empty_password =  false;

    //ошибка у поля email
    public function check() {

      if(empty($_POST['email'])) {
        $this->is_empty_email = true;
      }

      if(empty($_POST['password'])) {
        $this->is_empty_password = true;
      }

    }

    public function getIsEmptyEmail() {
        return $this->is_empty_email;
    } 

    public function getIsEmptyPassword() {
      return $this->is_empty_password;
    } 
}
?>
