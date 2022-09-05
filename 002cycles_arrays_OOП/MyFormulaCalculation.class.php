<?php
class MyFormulaCalculation {
     public static $arr_formulas = [];//для объектов этого класса по имени

     //принимает формулы
     public function fnCreate($fn) {
//	     echo $fn.PHP_EOL;
          return is_numeric(trim($fn));  
     } 

     public function fnResult() {
          return 1; 
     }
}
?>
