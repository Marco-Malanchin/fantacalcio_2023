<?php
class Matches
{
    protected $conn;
    protected $table_name = "matches";

    protected $match_number;
    protected $id_legue;
    protected $id_team1;
    protected $id_team2;
    protected $score_1;

    protected $score_2;

    public function __construct($db)
    {
        $this->conn = $db; 
   }
   function createMatches($match_number, $id_legue, $id_team1, $id_team2, $score_1, $score_2){
    $query = "INSERT INTO $this->table_name  (match_number, id_legue, id_team1, id_team2, score_1, score_2) VALUES (?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('iiiiii', $match_number, $id_legue, $id_team1, $id_team2, $score_1, $score_2);
        $stmt->execute();
        
        return $this->conn->affected_rows;
}
}
?>