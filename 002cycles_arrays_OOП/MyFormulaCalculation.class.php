<?
class MyFormulaCalculation {
     public static $arr_formulas = [];//для объектов этого класса по имени

     //принимает формулы
     public function fnCreate($fn) {
          return is_numeric($fn);  
     } 

     public function fnResult() {
          return 1; 
     }
}
?>
