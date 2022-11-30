<?
class Validator {
    private $name;
    private $mess;
    protected $is_empty_email = false;

    //ошибка у поля email
    public function check() {

      if(empty($_POST['email'])) {
        echo 'Да';
        $this->error = true;
      } else {
        echo 'Нет';
      }

    }

    public function getIsEmptyEmail() {
        return $this->is_empty_email;
    } 
}
?>
