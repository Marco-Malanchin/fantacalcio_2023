<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once dirname(__FILE__) . '/../../common/connect.php';
    include_once dirname(__FILE__) . '/../../model/footballer.php';

    $database = new Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"));

    if(empty($data) || empty($data->name) || empty($data->surname)|| empty($data->role) || empty($data->id_team)){
        http_response_code(400);
        die(json_encode(array("Message" => "Bad request")));
    }

    $footballer = new Player($db);
    
    if($footballer->createPlayer($data->name, $data->surname, $data->role, $data->id_team) > 0)
    {
        http_response_code(201);
        echo json_encode(array("Message"=> "Created"));
    }
    else
    {
        http_response_code(503);
        echo json_encode(array("Message"=>'Error'));
    }

?>