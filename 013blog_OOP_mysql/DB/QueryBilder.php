<?
class QueryBilder {
  protected $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
    return $pdo;
  }

  /**
   * string $table - название таблицы
   * return array
  */
  public function getAll($table) {
    $stat = $this->pdo->prepare("SELECT * FROM {$table}");
    $stat->execute();
    return $stat->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * string $table - название таблицы
   * array $data - массив данных
   * return array
  */
  public function create($table, $data) {
    $keys = implode(', ', array_keys($data));
    $tags = ":" . implode(', :', array_keys($data));

    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
    $stat = $this->pdo->prepare($sql);
    $stat->execute($data);
    dd($stat);
  }

  /**
   * string $table - название таблицы
   * string $id - id пользователя
   * return array
  */  
  public function getOne($table, $id) {
    $sql = "SELECT * FROM {$table} WHERE id=:id";
    $stat = $this->pdo->prepare($sql);
    $stat->bindValue(':id', $id);
    $stat->execute();
    return $stat->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * string $table - название таблицы
   * string $id - id пользователя
   * array $data - массив данных
   * return array
  */ 
  public function update($table, $data, $id) {
    dd($data);
    $keys = array_keys($data);

    foreach ($keys  as $key => $value) {
      $str .= $value . ' = :' . $value . ',';
    }
    $keys = rtrim($str, ',');
    $data['id'] = $id;
    
    $sql = "UPDATE `{$table}` SET {$keys} WHERE id=:id";
    $stat = $this->pdo->prepare($sql);
    $stat->execute($data);
    dd($stat);
  }

  /**
   * string $table - название таблицы
   * string $id - id пользователя
   * return array
  */ 
  public function delete($table, $id) { 
    $sql = "DELETE FROM {$table} WHERE id=:id";
    $stat = $this->pdo->prepare($sql);
    $stat->execute([
      'id' => $id
    ]);  
    
    dd($stat);
  }

}
?>
