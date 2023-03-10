<?php
class Legue
{
    protected $conn;
    protected $table_name = "legue";

    protected $name;


    public function __construct($db)
    {
        $this->conn = $db; 
   }
    function createLegue($name){
        $query = "INSERT INTO $this->table_name (name) VALUES (?)";

            $stmt = $this->conn->prepare($query);

            $stmt->bind_param('s', $name);
            $stmt->execute();
            
            return $this->conn->affected_rows;
    }
}
?>