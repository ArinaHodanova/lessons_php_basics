<?
class LinkCalculation extends MyFormulaCalculation {
  protected $l_var = null;

  public function fnCreate($expr) {
    if (parent::fnCreate($expr)) return true;
    if(!$this->fnGetLeftAction($expr)) {
      $this->l_var = $fn;
      return true; 
    }
  } 

  public function fnResult() {
    $out = parent::fnResult(); 
    return $out;
  }

  //Находим самый левый ключ операции
  function fnGetLeftAction(string $exp) {
    $arr = str_split($exp);
    $actions = [ '*' => 1, '/' => 1, '+' => 1, '-' => 1 ];
    foreach($arr as $value) {
        if (array_key_exists($value, $actions)) {
            return trim($value);
        } 
    }
  }

}
?>
