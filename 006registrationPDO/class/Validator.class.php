<?
class Validator {
    private $getIsEmptyEmail, $error = null, $result = null;


    public function check($dates = []) {
      $this->error = false;
      foreach($dates as $date => $value) {
        if(empty($value)) {
          $this->error = "Поле - {$date} не может быть пустым";
        } 
      }

      return $this;
    }

    public function error() {
       return $this->error;
    }

    public function result() {
      return $this->result;
   }

}
?>

