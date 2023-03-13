<?php
class Legue
{
    protected $conn;
    protected $table_name = "legue";

    protected $name;
    protected $id_creator;
    protected $id_user;
    protected $id_legue;

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
        function addUserLegue($id_user, $id_legue){
            $query = "INSERT INTO user_legue  (id_user, id_legue) VALUES (?,?)";
        
            $stmt = $this->conn->prepare($query);
        
            $stmt->bind_param('ii', $id_user, $id_legue);
            $stmt->execute();
            
            return $this->conn->affected_rows;
        }
        function getLegueUser($id_user)
        {
            $query = "SELECT name , l.id FROM legue l
            inner join user_legue ul on ul.id_legue = l.id
            inner join `user` u on u.id = ul.id_user
             WHERE u.id  = $id_user";
            
            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getLegueNotPartecipated($id_user){
            select id_leg, name from (
                SELECT l.name, l.id  as id_leg FROM legue l
                inner join user_legue ul on ul.id_legue = l.id
                inner join `user` u on u.id = ul.id_user) il
               where id_leg not in (SELECT l.id as id_leg FROM legue l
                inner join user_legue ul on ul.id_legue = l.id
                inner join `user` u on u.id = ul.id_user
               where u.id =1);
        }
}
?>