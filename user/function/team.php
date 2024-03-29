<?php

function addTeam($data)
{
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/team/addTeam.php';

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
function getIdTeamUser(){
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/team/getUserIdTeam.php';
    $json_data = file_get_contents($url);

    $decode_data = json_decode($json_data, $assoc = true);
    $off_data = $decode_data;
    if (!empty($off_data)) {
        $off_arr = array();
        foreach ($off_data as $off) {
            $off_record = array(
                'id_user' => $off['id_user'],
            );
            array_push($off_arr, $off_record);
        }
        return $off_arr;
    }
    else{
        return -1; 
    }
}
function getIdTeamLegue(){
    $url = 'http://localhost/fantacalcio/fantacalcio-api/api/team/getUserIdTeam.php';
    $json_data = file_get_contents($url);
    $decode_data = json_decode($json_data, $assoc = true);
    $off_data = $decode_data;
    if (!empty($off_data)) {
        $off_arr = array();
        foreach ($off_data as $off) {
            $off_record = array(
                'id_legue' => $off['id_legue'],
            );
            array_push($off_arr, $off_record);
        }
        return $off_arr;
    }
    else{
        return -1; 
    }
}
function checkIdTeam($id){
        $url = "http://localhost/fantacalcio/fantacalcio-api/api/team/getUserFromLegue.php?id_legue=" . $id;
        $json_data = file_get_contents($url);

        $decode_data = json_decode($json_data, $assoc = true);
        $team_data = $decode_data;
        if (!empty($team_data)) {
            $team_arr = array();
    
            foreach ($team_data as $team) {
                $team_record = array(
                    'id_user' => $team['id_user'],
                );
                array_push($team_arr, $team_record);
            }
    
            return $team_arr;
        }
        else{
            return -1; 
        }
    }
    function getidTeambyLegue($id){
        $url = "http://localhost/fantacalcio/fantacalcio-api/api/team/getArchiveTeamByLegue.php?id=" . $id;
        $json_data = file_get_contents($url);

        $decode_data = json_decode($json_data, $assoc = true);
        $team_data = $decode_data;
        if (!empty($team_data)) {
            $team_arr = array();
    
            foreach ($team_data as $team) {
                $team_record = array(
                    'id' => $team['id'],
                );
                array_push($team_arr, $team_record);
            }
    
            return $team_arr;
        }
        else{
            return -1; 
        }
    }
    function scoreUpdate($data){
        $url = 'http://localhost/fantacalcio/fantacalcio-api/api/team/updateScore.php';
    
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
    function getScoreFinal($id){
        $url = "http://localhost/fantacalcio/fantacalcio-api/api/team/getPlayerScorebyLegue.php?id=" . $id;

        $json_data = file_get_contents($url);
        if ($json_data != false) {
            $decode_data = json_decode($json_data, $assoc = true);
            $legue_data = $decode_data;
            $legue_arr = array();
            if (!empty($legue_data)) {
                foreach ($legue_data as $legue) {
                    $legue_record = array(
                        'nickname' => $legue['nickname'],
                        'name' => $legue['name'],
                        'score' => $legue['score'],
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
?>