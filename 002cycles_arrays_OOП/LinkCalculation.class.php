<?
class LinkCalculation extends MyFormulaCalculation {
  protected $l_var = null;

  public function fnCreate($expr) {
    if (parent::fnCreate($expr)) return true;
    if(!$this->fnGetLeftAction(trim($expr))) {
      $this->l_var = $expr;
      return true; 
    }
  } 

  public function fnResult() {
    if(!is_null($this->l_var) && array_key_exists($this->l_var, self::$arr_formulas))  {
      self::$arr_formulas[$this->l_var];
      //return $this->fnResult();
    } else {
      return parent::fnResult();
    }
  }

  //Находим самый левый ключ операции
  function fnGetLeftAction(string $exp) {
    $arr = str_split($exp);
    global $actions;//знаки арифмет. действий
    foreach($arr as $value) {
        if (array_key_exists($value, $actions)) {
            return $value;
        } 
    }
  }

}
?>
