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
   
    if (!strpos($_SERVER["REQUEST_URI"], "?id_user=")) // Controlla se l'URI contiene ? id_creator
{
    http_response_code(400);
    echo json_encode(["messsage" => "Bad request"]);
    die();
}

$id_user = $_GET['id_user']; 
var_dump($id_user);
$result =$legue->getLegueUser($id_user);

if (mysqli_num_rows($result) > 0) {
    $arr_legues = array();
    while ($row = $result->fetch_assoc()) {
        extract($row);
        $arr_legue = array(
            'id' => $id,
            'name' => $name
        );
        array_push($arr_legues, $arr_legue);
    }
    http_response_code(200);
    echo (json_encode($arr_legues, JSON_PRETTY_PRINT));
} else {
    http_response_code(400);
    echo json_encode(["message" => "No record found"]);
}
?>