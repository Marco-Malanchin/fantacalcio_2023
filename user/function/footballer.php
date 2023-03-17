<?php
function addFootballer($data)
{
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/footballer/addFootballer.php';

    $curl = curl_init($url); //inizializza una nuova sessione di cUrl
    //Curl contiene il return del curl_init 

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // ritorna il risultato come stringa

    $headers = array(
        "Content-Type: application/json",
        "Content-Lenght: 0",
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // setta gli headers della request

    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $responseJson = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($responseJson);

    return $response;
}
function getPlayerUser($id){
    {
        $url = 'http://localhost/fantacalcio/fantacalcio-api/api/footballer/getPlayerbyUser.php?id='.$id;
    
        $json_data = file_get_contents($url);
        if ($json_data != false) {
            $decode_data = json_decode($json_data, $assoc = true);
            $legue_data = $decode_data;
            $legue_arr = array();
            if (!empty($legue_data)) {
                foreach ($legue_data as $legue) {
                    $legue_record = array(
                        'name' => $legue['name'],
                        'surname' => $legue['surname'],
                        'role' => $legue['role'],
                        'nome_team' => $legue['nome_team'],
                    );
                    array_push($legue_arr, $legue_record);
                }
                return $legue_arr;
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }
}
?>