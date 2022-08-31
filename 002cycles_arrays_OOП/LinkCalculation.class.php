<?
class LinkCalculation extends MyFormulaCalculation {
  protected $l_var = null;

  public function fnCreate($fn) {
    $out = parent::fnCreate($fn); 
    return $out;
  } 

  public function fnResult() {
    $out = parent::fnResult(); 
    return 77;
  }

  protected function fnGetLeftAction() {
  }
  
}
?>
