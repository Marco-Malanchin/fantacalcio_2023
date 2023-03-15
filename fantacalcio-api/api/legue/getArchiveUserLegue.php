<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once dirname(__FILE__) . '/../../common/connect.php';
    include_once dirname(__FILE__) . '/../../model/legue.php';

    $database = new Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"));
    $legue = new legue($db);

$stmt = $legue->getUSERLegue();

if ($stmt->num_rows > 0)
{
    $legue_arr = array();

    while($record = $stmt->fetch_assoc())
    {
       $legue_arr[] = $record;
    }
    http_response_code(200);
    $json = json_encode($legue_arr);
    echo $json;

    //return $json;
}
else {
    http_response_code(400);
    echo json_encode(["message" => "No record"]);
}
die();
?>