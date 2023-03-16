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
}
?>