<?php
class Player
{
    protected $conn;
    protected $table_name = "player";

    protected $name;
    protected $surname;
    protected $role;
    protected $id_team;

    public function __construct($db)
    {
        $this->conn = $db; 
   }
   function createPlayer($name, $surname,$role, $id_team){
    $query = "INSERT INTO $this->table_name  (name, surname, role, id_team) VALUES (?,?,?,?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('sssi', $name, $surname,$role, $id_team);
        $stmt->execute();
        
        return $this->conn->affected_rows;
}

function getPlayerbyUser($id){
    $query ="SELECT  p.name, p.surname, p.role,  t.name as nome_team from
    player p
    inner join team t on p.id_team = t.id 
    inner join `user` u on t.id_user = u.id 
    where u.id  = $id";

    $stmt = $this->conn->query($query);
    return $stmt;
   
}
}
?>