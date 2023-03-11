<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../common/connect.php';
include_once dirname(__FILE__) . '/../../model/legue.php';

$database = new Database();
$db = $database->connect();

if (!strpos($_SERVER["REQUEST_URI"], "?id_creator=")) // Controlla se l'URI contiene ? id_creator
{
    http_response_code(400);
    echo json_encode(["messsage" => "Bad request"]);
    die();
}

$id_creator = explode("?id_creator=", $_SERVER['REQUEST_URI'])[1]; 

if(empty($id_creator)){
    http_response_code(400);
    echo json_encode(["messsage" => "No id written"]);
    die(); 
}

$legue = new Legue($db);

$stmt = $legue->getLegue($id_creator);

if ($stmt->num_rows > 0) // Se la funzione getArchiveTag ha ritornato dei record
{
    $legue_arr = array();

    while($record = $stmt->fetch_assoc()) // trasforma una riga in un array e lo fa per tutte le righe di un record
    {
        $legue_arr[] = $record;
    }
    http_response_code(200);
    $json = json_encode($legue_arr);
    echo $json;
    
    //return $json;
}
else {
    echo json_encode(["message" => "No record"]);
}

?>