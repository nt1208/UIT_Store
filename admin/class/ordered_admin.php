<?php
    include "database.php";
?>
<?php
class order {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
   
    public function show_order(){
        $query = "SELECT * FROM tbl_order ORDER BY madh DESC";
        $result = $this ->db->select($query) ;
        return $result ;    
    }
    public function get_madh($madh){
        $query = "SELECT * FROM tbl_order WHERE madh = '$madh'";
        $result = $this ->db->select($query) ;
        return $result ;    
    }
    public function update_order($tinhtrang) {
        $query = "UPDATE tbl_order SET tinhtrang = 1 WHERE  tinhtrang = 0 "; 
        $result = $this->db->update($query);
        header('Location:ordered_admin.php');
        return $result;
    }
   
}
?>