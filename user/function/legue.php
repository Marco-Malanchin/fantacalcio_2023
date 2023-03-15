<?php

function addLegue($data)
{
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/legue/addLegue.php';

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
function getArchiveLegue(){
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/legue/getArchiveLegue.php';

    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $off_data = $decode_data;
    if (!empty($off_data)) {
        $off_arr = array();

        foreach ($off_data as $off) {
            $off_record = array(
                'id' => $off['id'],
                'name' => $off['name'],
                'id_creator' => $off['id_creator'],
            );
            array_push($off_arr, $off_record);
        }

        return $off_arr;
    }
    else{
        return -1; 
    }
}
function getIdCreator(){
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/legue/getArchiveLegue.php';

    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $off_data = $decode_data;
    if (!empty($off_data)) {
        $off_arr = array();

        foreach ($off_data as $off) {
            $off_record = array(
                'id_creator' => $off['id_creator'],
            );
            array_push($off_arr, $off_record);
        }

        return $off_arr;
    }
    else{
        return -1; 
    }

}
function adduserLegue($data)
{
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/legue/addUserLegue.php';
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
function getLegueByCreator($id_creator){

    $url = "http://localhost/fantacalcio/fantacalcio-api/api/legue/getLegueById.php?id_creator=" . $id_creator; 
    $json_data = file_get_contents($url);
    if($json_data!=false){
        $decode_data = json_decode($json_data, $assoc = true);
        $legue_data = $decode_data;
        $legue_arr = array();
        if(empty($legue_data->message)){
        return $legue_data[0]['id']; //returno solo id
        }
        else{
            $res = "Errore"; 
            return $res; 
        }
    }
    else{
        $res =-1; 
        return $res; 
    }
}
    function getLegueByUser($id_user){
        {
            $url = "http://localhost/fantacalcio/fantacalcio-api/api/legue/getArchiveLeguebyId.php?id_user=" . $id_user;
        
            $json_data = file_get_contents($url);
            if ($json_data != false) {
                $decode_data = json_decode($json_data, $assoc = true);
                $legue_data = $decode_data;
                $legue_arr = array();
                if (!empty($legue_data)) {
                    foreach ($legue_data as $legue) {
                        $legue_record = array(
                            'id' => $legue['id'],
                            'name' => $legue['name'],
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

    function getLegueNotPartecipated($id_user){
        {
            $url = "http://localhost/fantacalcio/fantacalcio-api/api/legue/getLegueNotPartecipate.php?id_user=" . $id_user;
        
            $json_data = file_get_contents($url);
            if ($json_data != false) {
                $decode_data = json_decode($json_data, $assoc = true);
                $legue_data = $decode_data;
                $legue_arr = array();
                if (!empty($legue_data)) {
                    foreach ($legue_data as $legue) {
                        $legue_record = array(
                            'id_leg' => $legue['id_leg'],
                            'name' => $legue['name'],
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

    function getLegueName($id){
        $url = "http://localhost/fantacalcio/fantacalcio-api/api/legue/getNameLegue.php?id=" . $id; 
    $json_data = file_get_contents($url);
    if($json_data!=false){
        $decode_data = json_decode($json_data, $assoc = true);
        $legue_data = $decode_data;
        $legue_arr = array();
        if(empty($legue_data->message)){
        return $legue_data[0]['name']; //returno solo id
        }
        else{
            $res = "Errore"; 
            return $res; 
        }
    }
    else{
        $res =-1; 
        return $res; 
    }
    }
    function getPlayerNameByID($id){
        {
            $url = "http://localhost/fantacalcio/fantacalcio-api/api/legue/getPlayerNamebyId.php?id=" . $id;
        
            $json_data = file_get_contents($url);
            if ($json_data != false) {
                $decode_data = json_decode($json_data, $assoc = true);
                $legue_data = $decode_data;
                $legue_arr = array();
                if (!empty($legue_data)) {
                    foreach ($legue_data as $legue) {
                        $legue_record = array(
                            'nickname' => $legue['nickname'],
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