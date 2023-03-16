<?php
class Team
{
    protected $conn;
    protected $table_name = "team";

    protected $name;
    protected $id_creator;
    protected $id_user;
    protected $id_legue;
    protected $score;

    public function __construct($db)
    {
        $this->conn = $db; 
   }
    function createTeam($id_user, $id_legue, $name){
        $query = "INSERT INTO $this->table_name  (id_user, id_legue, name, score) VALUES (?,?,?,0)";

            $stmt = $this->conn->prepare($query);

            $stmt->bind_param('iis', $id_user, $id_legue, $name);
            $stmt->execute();
            
            return $this->conn->affected_rows;
    }
    function getIdUser(){
        $query = "SELECT id_user FROM  $this->table_name";
    
                $stmt = $this->conn->query($query);
    
                return $stmt;
    }
    function getArchiveTeam(){
        $query = "SELECT * FROM  $this->table_name";
    
                $stmt = $this->conn->query($query);
    
                return $stmt;
    }

    function getUserFromLegue($id){
        $query = "SELECT id_user FROM  $this->table_name
        where id_legue = $id";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    function getArchiveTeamByLegue($id){
        $query = "SELECT t.id FROM team t
        where t.id_legue = $id
        order by t.id asc ";
    
                $stmt = $this->conn->query($query);
    
                return $stmt;
    }
    
}
?>