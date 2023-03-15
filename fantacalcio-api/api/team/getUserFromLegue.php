<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../common/connect.php';
include_once dirname(__FILE__) . '/../../model/team.php';

$database = new Database();
$db = $database->connect();

if (!strpos($_SERVER["REQUEST_URI"], "?id_legue=")) // Controlla se l'URI contiene ? id_creator
{
    http_response_code(400);
    echo json_encode(["messsage" => "Bad request"]);
    die();
}

$id_team = explode("?id_legue=", $_SERVER['REQUEST_URI'])[1]; 

if(empty($id_team)){
    http_response_code(400);
    echo json_encode(["messsage" => "No id written"]);
    die(); 
}

$team = new Team($db);

$stmt = $team->getUserFromLegue($id_team);

if ($stmt->num_rows > 0) // Se la funzione getArchiveTag ha ritornato dei record
{
    $team_arr = array();

    while($record = $stmt->fetch_assoc()) // trasforma una riga in un array e lo fa per tutte le righe di un record
    {
        $team_arr[] = $record;
    }
    http_response_code(200);
    $json = json_encode($team_arr);
    echo $json;
    
    //return $json;
}
else {
    echo json_encode(["message" => "No record"]);
}

?>