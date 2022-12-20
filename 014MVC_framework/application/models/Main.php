<?
namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getNews()
    {
        $rezult = $this->db->query('SELECT * FROM news')->row();
        return $rezult;
    }
}
?>
