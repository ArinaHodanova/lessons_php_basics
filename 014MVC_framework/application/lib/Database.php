<?
namespace application\lib;

use PDO; 

class Database 
{
  protected $pdo, $query, $result, $sth;

  public function __construct()
  {
    $config = require 'application/config/db.php';
    try {
      $this->pdo = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'',$config['user'], $config['password']);
    } catch (PDOException $exception) {
      die($exception->getMessage());
    } 
  }

  public function query($sql, $params = [])
  {

    $this->sth = $this->pdo->prepare($sql);

    if(!empty($params)) {
      foreach($params as $key => $val)
      {
        $this->sth->bindValue(':'.$key, $val, PDO::PARAM_INT);
      }
    }
    $this->sth->execute();
    return $this;
  }

  public function row()
  {
    $this->result = $this->sth->fetchAll(PDO::FETCH_ASSOC);
    return $this->result;
  }

  public function column()
  {
    $this->result =  $this->sth->fetchColumn();
    return $this->result; 
  }

}
?>
