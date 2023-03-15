<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once dirname(__FILE__) . '/../../common/connect.php';
    include_once dirname(__FILE__) . '/../../model/team.php';

    $database = new Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"));
    $team = new Team($db);

$stmt = $team->getArchiveTeam();

if ($stmt->num_rows > 0)
{
    $team_arr = array();

    while($record = $stmt->fetch_assoc())
    {
       $team_arr[] = $record;
    }
    http_response_code(200);
    $json = json_encode($team_arr);
    echo $json;

    //return $json;
}
else {
    http_response_code(400);
    echo json_encode(["message" => "No record"]);
}
die();
?>