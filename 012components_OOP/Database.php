<?
class Database {
  private static $make = null;
  private $pdo, $query, $erorr = false, $result, $count;

  private function __construct() {
    try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=users_db', 'root', 'root');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
  }

  public static function getMake() {
    if(!isset(self::$make)) {
      self::$make = new Database();
    }
    return self::$make;
  }

  /**
   * string $table - название таблицы
   * $params - передаваемые параметры
  */
  public function request($sql, $params = []) {
    
    $this->erorr = false;
    $this->query = $this->pdo->prepare($sql);

    if(count($params)) {
      $i = 1;
      foreach ($params as $param) {
        $this->query->bindValue($i, $param);
        $i++;
      } 
    } 
    
    if(!$this->query->execute()) {
      $this->erorr = true;
    }
    $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
    $this->count =  $this->query->rowCount();
    //что бы обратиться к объекту данного класса нужно вернуть текущий экземпляр
    return $this;
  }

   public function get($table, $where = []) {
    return $this->action('SELECT *', $table, $where);
  }

  public function delete($table, $where = []) { 
    return $this->action('DELETE', $table, $where);
  }

  public function action($action, $table, $where = []) {
    if(count($where) === 3) {
      $operators = ['>', '<', '=', '>=', '<=', '!='];//допустимые операторы
      $fild = trim($where[0], ' ');//название поля
      $operator = trim($where[1], ' ');//оператор
      $value = trim($where[2], ' ');//значение
      if(in_array($operator, $operators)) {
        $sql = "{$action} FROM {$table} WHERE {$fild} {$operator} ?";
        if(!$this->request($sql, [$value])->error()) {
          return $this;
        } 
      } 
    } 
    return false;
  }

  public function query() {
    return $this->query;
  }

  public function error() {
    return $this->erorr;
  }

  public function result() {
    return $this->result;
  }

  public function count() {
    return $this->count;
  }
  
}
?>
