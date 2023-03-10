<?php
class Legue
{
    protected $conn;
    protected $table_name = "legue";

    protected $name;
    protected $id_creator;


    public function __construct($db)
    {
        $this->conn = $db; 
   }
    function createLegue($name, $id_creator){
        $query = "INSERT INTO $this->table_name  (name, id_creator) VALUES (?,?)";

            $stmt = $this->conn->prepare($query);

            $stmt->bind_param('ss', $name, $id_creator);
            $stmt->execute();
            
            return $this->conn->affected_rows;
    }
}
?>