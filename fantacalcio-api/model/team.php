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

    function updateScore($id , $score){
        $query = " UPDATE team t set t.score = t.score + $score
          where t.id = $id";

$result = $this->conn->query($query);
        return $result;
    }
    function getPlayerScorebyLegue($id){
        $query ="SELECT distinct u.nickname,t.name, t.score from
        team t
        inner join legue l on t.id_legue = l.id 
        inner join `user` u on t.id_user = u.id 
        where l.id  = $id
        ORDER BY t.score desc limit 4";

        $stmt = $this->conn->query($query);
        return $stmt;
       
    }
    }
?>