<?
class Validate {
  private $passed = false, $errors = [], $db = null;

  public function __construct() {
    //экземпляр подключения к БД
    $this->db = Database::getMake();
  }

  public function check($source, $datas) {
 
    foreach($datas as $data => $rules) {
      foreach($rules as $rule => $rule_value) {
        $value = $source[$data];//получаем значение формы
        
        //если поля обязательно проверяем на пустоту 
        if($rule == 'required' && empty($value)) {
          $this->addError("{$data} is required");
        }
      } 
     
    }

  }

  //запись ошибок
  public function addError($error) {
    $this->errors[] = $error;    
  }

  public function errors() {
    return $this->errors;
  }

  //прошла и валидация
  public function passed() {
    return $this->passed;
  }
}
?>
