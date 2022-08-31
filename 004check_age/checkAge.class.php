<?
class checkAge {
      protected $name;
      private $age = null;

      private $lacks_age = null;//сколько лет не хватает до 18
      private $older_age = null;//на сколько человек старше

  public function __construct($age_user, $name_user) {
    $this->name = $name_user;
    if($this->isAgeCorrect($age_user)) {
      $this->age = $age_user;
    }  
  }

  //проверяем возраст на корректность
  public function isAgeCorrect($age) {
    if($age >= 18 and $age <= 60) {
      return true;
    }  else {
      $this->checkDifferenceAge($age);
      return false;
    }
  }

  public function checkDifferenceAge($age) {
    if($age < 18 ) {
      //проверяем на сколько человек младше мин. возраста
      $rezult = 18 - $age;
      $this->lacks_age = $rezult;
    } elseif($age > 60 ) {
      //проверяем на сколько человек старше макс. возраста
      $rezult = $age - 60;
      $this->older_age = $rezult;
    } 
  }

  //получает доступ
  public function getName() {
    return $this->name;
  }

  //получает доступ
  public function getAge() {
    return $this->age;
  }

  //выводим информацию о пользователе
  public function getInfo() {
    $str = "Имя: {$this->getName()} <br>";
    if(isset($this->age)) {
      $str .= "Возраст: {$this->getAge()} <br>";
    }
    if(isset($this->lacks_age)) {
      $str .= "Вам не хватает {$this->lacks_age} лет <br>";
    }
    if(isset($this->older_age)) {
      $str .= "Вы старше на {$this->older_age} лет <br>";
    }
    return $str;
  }
}
?>
