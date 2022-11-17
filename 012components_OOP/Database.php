<?
//Работа с БД
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
  public function select($sql, $params = []) {
    
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

  public function error() {
    return $this->error;
  }

  public function result() {
    return $this->result;
  }

  public function count() {
    return $this->count;
  }
}
?>
