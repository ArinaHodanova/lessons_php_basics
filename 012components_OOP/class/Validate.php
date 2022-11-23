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

        //проверяем поля на пустоту
        if($rule == 'required' && empty($value)) {
          $this->addError("{$data} is required");
        } else if(!empty($value)) { //валидация полей 
            switch($rule) {
                //мин. кол-во симолов
                case 'min':
                  if(strlen($value) < $rule_value) {
                    $this->addError("{$data} must be a min of {$rule_value} characters");
                  }
                break;

                //макс. кол-во симолов
                case 'max':
                  if(strlen($value) > $rule_value) {
                    $this->addError("{$data} must be a max of {$rule_value} characters");
                  }
                break;

                //валидация почты
                case 'validate_email':
                  if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError("enter a corrective email address");
                  } 
                break;

                //совпадение паролей
                case 'matches':
                  if($source[$rule_value] != $value) {
                    $this->addError("{$rule_value} must match {$data}");
                  }
                break;

                //проверка уникальности почты
                case 'unique': {
                  $check = $this->db->get($rule_value , [$data, '=' , $value]);
                  if($check->count()) {
                    $this->addError("{$data} already exists");
                  }
                }
                break;
            }
        }
      } 
    }

    if(empty($this->errors)) {
        $this->passed = true;
    }

  }

  //запись ошибок
  public function addError($error) {
    $this->errors[] = $error;    
  }

  public function errors() {
    return $this->errors;
  }

  //успешное прохождении валидации
  public function passed() {
    return $this->passed;
  }
}
?>
