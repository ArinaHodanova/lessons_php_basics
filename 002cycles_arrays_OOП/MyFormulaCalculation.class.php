<?php
class MyFormulaCalculation {
     public static $arr_formulas = [];//для объектов этого класса по имени

     //принимает формулы
     public function fnCreate($fn) {
          if(is_numeric(trim($fn))) {
               $this->l_value = $fn;
               return true;
          } else {
               return false;
          }
     } 

     public function fnResult() {
          if(!is_null($this->l_value)) {
               return $this->l_value;
          } else {
               return 777;
          }
     }
}
?>
