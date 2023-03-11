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
    function getArchiveLegue(){
        $query = "SELECT * FROM  $this->table_name";
    
                $stmt = $this->conn->query($query);
    
                return $stmt;
    }
    function getIdCreator(){
        $query = "SELECT id_creator FROM  $this->table_name";
    
                $stmt = $this->conn->query($query);
    
                return $stmt;
    }
    function getLegue($id_creator)
        {
            $query = "SELECT id  FROM $this->table_name WHERE id_creator = $id_creator";

            $stmt = $this->conn->query($query);

            return $stmt;
        }
}



function addUserLegue($id_user, $id_legue){
    $query = "INSERT INTO $this->table_name  (id_user, id_legue) VALUES (?,?)";

    $stmt = $this->conn->prepare($query);

    $stmt->bind_param('ss', $id_user, $id_legue);
    $stmt->execute();
    
    return $this->conn->affected_rows;
}



?>