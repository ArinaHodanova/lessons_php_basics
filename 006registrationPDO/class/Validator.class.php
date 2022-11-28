<?
class Validator {
    private $error = false, $result = null;

    //ошибка у поля email
    public function check() {

      if(empty($_POST['email'])) {
        echo 'Да';
        $this->error = true;
      }
    }

    public function getEmptyEmai() {
      return $this->error;
    }
}
?>
