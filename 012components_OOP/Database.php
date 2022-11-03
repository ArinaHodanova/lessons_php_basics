<?
//Работа с БД
class Database {
  private static $const = null;
  private $pdo, $query, $error = false, $lists, $count;

  private function __construct() {
    try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=users_db', 'root', 'root');
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }
  }

  public static function getСonst() {
    if(!isset(self::$const)) {
      self::$const = new Database();
    }
    return self::$const;
  }

  public function query($sql) {
    //обнуляем ошибки, что бы ошибки предыдушего запроса не записывалась в текущий (в случае, если ошибки есть)
    $this->error = false;
    $this->query = $this->pdo->prepare($sql);
    if(!$this->query->execute()) {
      $this->error = true;
    } else {
      //записываем в массив записи из таблицы
      $this->lists = $this->query->fetchAll(PDO::FETCH_OBJ);

      //записываем кол-ва записей
      $this->count = $this->query->rowCount();
    }
    return $this;
  }

  public function error() {
    return $this->error;
  }

  //получаем список записей из БД в массив
  public function lists() {
    return $this->lists;
  }

  //получаем кол-во записей
  public function count() {
    return $this->count;
  }
}
?>
