<?
class Database {
  private static $make = null;
  private $pdo, $query, $error = false, $result, $count;

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
    
    $this->error = false;
    $this->query = $this->pdo->prepare($sql);

    if(count($params)) {
      $i = 1;
      foreach ($params as $param) {
        $this->query->bindValue($i, $param);
        $i++;
      } 
    } 
    
    if(!$this->query->execute()) {
      $this->error = true;
    }
    $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
    $this->count =  $this->query->rowCount();
    //что бы обратиться к объекту данного класса нужно вернуть текущий экземпляр
    return $this;
  }

  /**
   * Получить данных из табл
   * $table - название таблицы
   * $where - массив с данными, который нужно получить
  */
  public function get($table, $where = []) {
    return $this->action('SELECT *', $table, $where);
  }

  /**
   * Удаление данных из табл
   * $table - название таблицы
   * $where - массив с данными, который нужно удалить 
  */
  public function delete($table, $where = []) { 
    return $this->action('DELETE', $table, $where);
  }

  /**
   * Работа с даннми из табл
   * $action - действие ,которое нужно сделать DELETE, SELECT
   * $table - название таблицы
   * $where - массив с данными над, которыми производится действие
  */
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

  /**
   * Добавить данные в таблицу
   * $table - название таблицы
   * $$datas - массив с данными
  */
  public function insert($table, $datas = []) {
    $values = '';
    foreach($datas as $data) {
      $values .= "?,";
    }
    $values = rtrim($values, ',');
    $sql = "INSERT INTO {$table} (" . '`' . implode('`, `',array_keys($datas)) . '`' . ") VALUES ({$values}) ";
    if(!$this->request($sql, $datas)->error()) {
        return true;
    }
    return false;
  }

  public function query() {
    return $this->query;
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
