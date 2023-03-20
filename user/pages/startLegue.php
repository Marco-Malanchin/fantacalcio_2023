<?php

session_start(); 
if(empty($_SESSION['user_id'])){
    header('location: ../login.php'); 
}

?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fantacalcio | IniziaLega</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    </head>

    <body>
  <?php require_once(__DIR__.'\navbar.php'); ?>

  <div class="container">
    <div class="row mt-5">
    <?php
     include_once dirname(__FILE__) . '/../function/legue.php';
     $id = $_GET['id']  ;
     $nome = getLegueName($id);
      echo('<h2>'.$nome.':</h2>');
      ?>
    </div>
    <div class="row mt-5">
        <h4>Premi il bottone per avviare la lega e calcolare le giornate</h4>
        <br>
        <br>
        <div class = col-md-4>    
        <form method="post">
        <button type="submit" class="btn btn-success" name="legha"<?php echo isset($_POST["legha"]) ? "disabled" : "";?>>AVVIA</button>
</div>
            <?php

include_once dirname(__FILE__) . '\..\function\legue.php';
include_once dirname(__FILE__) . '\..\function\team.php';
include_once dirname(__FILE__) . '\..\function\footballer.php';
include_once dirname(__FILE__) . '\..\function\matches.php';
$err = "";
$id_user = $_SESSION['user_id'];
$id_lega = $_GET['id'];
$id_creator=$_GET['id_creator'];
$squadre = getidTeambyLegue($id_lega);
$squadra1 = $squadre[1];
$squadra2 = $squadre[2];
$squadra3 = $squadre[3];
$squadra4 = $squadre[4];
//$id_team = $_GET['id_team'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero1 = rand(1,3);
        switch ($numero1) {
            case 1:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadra1['id'],
                    "id_team2"=> $squadra2['id'],
                    "score_1"=> 3,
                    "score_2"=> 0,
                    );
                    addMatches($data1);
                    $data7 = array(
                        "id" =>$squadra1['id'],
                        "score"=> 3,
                        );
                        scoreUpdate($data7);
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadra3['id'],
                        "id_team2"=> $squadra4['id'],
                        "score_1"=> 3,
                        "score_2"=> 0,
                        );
                        addMatches($data2);
                        $data8 = array(
                            "id" =>$squadra3['id'],
                            "score"=> 3,
                            );
                            scoreUpdate($data8);
                break;
            case 2:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadra1['id'],
                    "id_team2"=> $squadra2['id'],
                    "score_1"=> 1,
                    "score_2"=> 1,
                    );
                    addMatches($data1);
                    $data7 = array(
                        "id" =>$squadra1['id'],
                        "score"=> 1,
                        );
                        scoreUpdate($data7);
                        $data8 = array(
                            "id" =>$squadra2['id'],
                            "score"=> 1,
                            );
                            scoreUpdate($data8);
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadra3['id'],
                        "id_team2"=> $squadra4['id'],
                        "score_1"=> 1,
                        "score_2"=> 1,
                        );
                        addMatches($data2);
                        $data9 = array(
                            "id" =>$squadra3['id'],
                            "score"=> 1,
                            );
                            scoreUpdate($data9);
                            $data10 = array(
                                "id" =>$squadra4['id'],
                                "score"=> 1,
                                );
                                scoreUpdate($data10);
                break;
            case 3:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadra1['id'],
                    "id_team2"=> $squadra2['id'],
                    "score_1"=> 0,
                    "score_2"=> 3,
                    );
                    addMatches($data1);
                    $data7 = array(
                        "id" =>$squadra2['id'],
                        "score"=> 3,
                        );
                        scoreUpdate($data7);
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadra3['id'],
                        "id_team2"=> $squadra4['id'],
                        "score_1"=> 0,
                        "score_2"=> 3,
                        );
                        addMatches($data2);
                        $data8 = array(
                            "id" =>$squadra4['id'],
                            "score"=> 3,
                            );
                            scoreUpdate($data8);
                break;
                                    }
                $numero2 = rand(1,3);
                sleep(1);
                switch ($numero2) {
                    case 1:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadra1['id'],
                                    "id_team2"=> $squadra3['id'],
                                    "score_1"=> 3,
                                    "score_2"=> 0,
                                    );
                                    addMatches($data3);
                                    $data11 = array(
                                        "id" =>$squadra1['id'],
                                        "score"=> 3,
                                        );
                                        scoreUpdate($data11);
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadra2['id'],
                                        "id_team2"=> $squadra4['id'],
                                        "score_1"=> 3,
                                        "score_2"=> 0,
                                        );
                                        addMatches($data4);
                                        $data12 = array(
                                            "id" =>$squadra2['id'],
                                            "score"=> 3,
                                            );
                                            scoreUpdate($data12);
                        break;
                    case 2:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadra1['id'],
                                    "id_team2"=> $squadra3['id'],
                                    "score_1"=> 1,
                                    "score_2"=> 1,
                                    );
                                    addMatches($data3);
                                    $data11 = array(
                                        "id" =>$squadra1['id'],
                                        "score"=> 1,
                                        );
                                        scoreUpdate($data11);
                                        $data12 = array(
                                            "id" =>$squadra3['id'],
                                            "score"=> 1,
                                            );
                                            scoreUpdate($data12);
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadra2['id'],
                                        "id_team2"=> $squadra4['id'],
                                        "score_1"=> 1,
                                        "score_2"=> 1,
                                        );
                                        addMatches($data4);
                                        $data13 = array(
                                            "id" =>$squadra2['id'],
                                            "score"=> 1,
                                            );
                                            scoreUpdate($data13);
                                            $data14 = array(
                                                "id" =>$squadra4['id'],
                                                "score"=> 1,
                                                );
                                                scoreUpdate($data14);
                        break;
                    case 3:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadra1['id'],
                                    "id_team2"=> $squadra3['id'],
                                    "score_1"=> 0,
                                    "score_2"=> 3,
                                    );
                                    addMatches($data3);
                                    $data11 = array(
                                        "id" =>$squadra3['id'],
                                        "score"=> 3,
                                        );
                                        scoreUpdate($data11);
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadra2['id'],
                                        "id_team2"=> $squadra4['id'],
                                        "score_1"=> 0,
                                        "score_2"=> 3,
                                        );
                                        addMatches($data4);
                                        $data12 = array(
                                            "id" =>$squadra4['id'],
                                            "score"=> 3,
                                            );
                                            scoreUpdate($data12);
                        break;
                                            }
                                            $numero3 = rand(1,3);
                                            sleep(1);
                switch ($numero3) {
                    case 1:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadra1['id'],
                                            "id_team2"=> $squadra4['id'],
                                            "score_1"=> 3,
                                            "score_2"=> 0,
                                            );
                                            addMatches($data5);
                                            $data15 = array(
                                                "id" =>$squadra1['id'],
                                                "score"=> 3,
                                                );
                                                scoreUpdate($data15);
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadra2['id'],
                                                "id_team2"=> $squadra3['id'],
                                                "score_1"=> 3,
                                                "score_2"=> 0,
                                                );
                                                addMatches($data6);
                                                $data16 = array(
                                                    "id" =>$squadra3['id'],
                                                    "score"=> 3,
                                                    );
                                                    scoreUpdate($data16);
                        break;
                    case 2:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadra1['id'],
                                            "id_team2"=> $squadra4['id'],
                                            "score_1"=> 1,
                                            "score_2"=> 1,
                                            );
                                            addMatches($data5);
                                            $data15 = array(
                                                "id" =>$squadra1['id'],
                                                "score"=> 1,
                                                );
                                                scoreUpdate($data15);
                                                $data16 = array(
                                                    "id" =>$squadra4['id'],
                                                    "score"=> 1,
                                                    );
                                                    scoreUpdate($data16);
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadra2['id'],
                                                "id_team2"=> $squadra3['id'],
                                                "score_1"=> 1,
                                                "score_2"=> 1,
                                                );
                                                addMatches($data6);
                                                $data17 = array(
                                                    "id" =>$squadra2['id'],
                                                    "score"=> 1,
                                                    );
                                                    scoreUpdate($data17);
                                                    $data18 = array(
                                                        "id" =>$squadra3['id'],
                                                        "score"=> 1,
                                                        );
                                                        scoreUpdate($data18);
                        break;
                    case 3:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadra1['id'],
                                            "id_team2"=> $squadra4['id'],
                                            "score_1"=> 0,
                                            "score_2"=> 3,
                                            );
                                            addMatches($data5);
                                            $data15 = array(
                                                "id" =>$squadra4['id'],
                                                "score"=> 3,
                                                );
                                                scoreUpdate($data15);
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadra2['id'],
                                                "id_team2"=> $squadra3['id'],
                                                "score_1"=> 0,
                                                "score_2"=> 3,
                                                );
                                                addMatches($data6);
                                                $data16 = array(
                                                    "id" =>$squadra3['id'],
                                                    "score"=> 3,
                                                    );
                                                    scoreUpdate($data16);
                        break;
                                            }
                                            $numero4 = rand(1,3);
                                            switch ($numero4) {
                                                case 1:
                                                    $data1 = array(
                                                        "match_number"  => 4,
                                                        "id_legue" =>$id_lega,
                                                        "id_team1" =>$squadra1['id'],
                                                        "id_team2"=> $squadra2['id'],
                                                        "score_1"=> 3,
                                                        "score_2"=> 0,
                                                        );
                                                        addMatches($data1);
                                                        $data7 = array(
                                                            "id" =>$squadra1['id'],
                                                            "score"=> 3,
                                                            );
                                                            scoreUpdate($data7);
                                                        $data2 = array(
                                                            "match_number"  => 4,
                                                            "id_legue" =>$id_lega,
                                                            "id_team1" =>$squadra3['id'],
                                                            "id_team2"=> $squadra4['id'],
                                                            "score_1"=> 3,
                                                            "score_2"=> 0,
                                                            );
                                                            addMatches($data2);
                                                            $data8 = array(
                                                                "id" =>$squadra3['id'],
                                                                "score"=> 3,
                                                                );
                                                                scoreUpdate($data8);
                                                    break;
                                                case 2:
                                                    $data1 = array(
                                                        "match_number"  => 4,
                                                        "id_legue" =>$id_lega,
                                                        "id_team1" =>$squadra1['id'],
                                                        "id_team2"=> $squadra2['id'],
                                                        "score_1"=> 1,
                                                        "score_2"=> 1,
                                                        );
                                                        addMatches($data1);
                                                        $data7 = array(
                                                            "id" =>$squadra1['id'],
                                                            "score"=> 1,
                                                            );
                                                            scoreUpdate($data7);
                                                            $data8 = array(
                                                                "id" =>$squadra2['id'],
                                                                "score"=> 1,
                                                                );
                                                                scoreUpdate($data8);
                                                        $data2 = array(
                                                            "match_number"  => 4,
                                                            "id_legue" =>$id_lega,
                                                            "id_team1" =>$squadra3['id'],
                                                            "id_team2"=> $squadra4['id'],
                                                            "score_1"=> 1,
                                                            "score_2"=> 1,
                                                            );
                                                            addMatches($data2);
                                                            $data9 = array(
                                                                "id" =>$squadra3['id'],
                                                                "score"=> 1,
                                                                );
                                                                scoreUpdate($data9);
                                                                $data10 = array(
                                                                    "id" =>$squadra4['id'],
                                                                    "score"=> 1,
                                                                    );
                                                                    scoreUpdate($data10);
                                                    break;
                                                case 3:
                                                    $data1 = array(
                                                        "match_number"  => 4,
                                                        "id_legue" =>$id_lega,
                                                        "id_team1" =>$squadra1['id'],
                                                        "id_team2"=> $squadra2['id'],
                                                        "score_1"=> 0,
                                                        "score_2"=> 3,
                                                        );
                                                        addMatches($data1);
                                                        $data7 = array(
                                                            "id" =>$squadra2['id'],
                                                            "score"=> 3,
                                                            );
                                                            scoreUpdate($data7);
                                                        $data2 = array(
                                                            "match_number"  => 4,
                                                            "id_legue" =>$id_lega,
                                                            "id_team1" =>$squadra3['id'],
                                                            "id_team2"=> $squadra4['id'],
                                                            "score_1"=> 0,
                                                            "score_2"=> 3,
                                                            );
                                                            addMatches($data2);
                                                            $data8 = array(
                                                                "id" =>$squadra4['id'],
                                                                "score"=> 3,
                                                                );
                                                                scoreUpdate($data8);
                                                    break;
                                                                        }
                                                    $numero5 = rand(1,3);
                                                    sleep(1);
                                                    switch ($numero5) {
                                                        case 1:
                                                                    $data3 = array(
                                                                        "match_number"  => 5,
                                                                        "id_legue" =>$id_lega,
                                                                        "id_team1" =>$squadra1['id'],
                                                                        "id_team2"=> $squadra3['id'],
                                                                        "score_1"=> 3,
                                                                        "score_2"=> 0,
                                                                        );
                                                                        addMatches($data3);
                                                                        $data11 = array(
                                                                            "id" =>$squadra1['id'],
                                                                            "score"=> 3,
                                                                            );
                                                                            scoreUpdate($data11);
                                                                        $data4 = array(
                                                                            "match_number"  => 5,
                                                                            "id_legue" =>$id_lega,
                                                                            "id_team1" =>$squadra2['id'],
                                                                            "id_team2"=> $squadra4['id'],
                                                                            "score_1"=> 3,
                                                                            "score_2"=> 0,
                                                                            );
                                                                            addMatches($data4);
                                                                            $data12 = array(
                                                                                "id" =>$squadra2['id'],
                                                                                "score"=> 3,
                                                                                );
                                                                                scoreUpdate($data12);
                                                            break;
                                                        case 2:
                                                                    $data3 = array(
                                                                        "match_number"  => 5,
                                                                        "id_legue" =>$id_lega,
                                                                        "id_team1" =>$squadra1['id'],
                                                                        "id_team2"=> $squadra3['id'],
                                                                        "score_1"=> 1,
                                                                        "score_2"=> 1,
                                                                        );
                                                                        addMatches($data3);
                                                                        $data11 = array(
                                                                            "id" =>$squadra1['id'],
                                                                            "score"=> 1,
                                                                            );
                                                                            scoreUpdate($data11);
                                                                            $data12 = array(
                                                                                "id" =>$squadra3['id'],
                                                                                "score"=> 1,
                                                                                );
                                                                                scoreUpdate($data12);
                                                                        $data4 = array(
                                                                            "match_number"  => 5,
                                                                            "id_legue" =>$id_lega,
                                                                            "id_team1" =>$squadra2['id'],
                                                                            "id_team2"=> $squadra4['id'],
                                                                            "score_1"=> 1,
                                                                            "score_2"=> 1,
                                                                            );
                                                                            addMatches($data4);
                                                                            $data13 = array(
                                                                                "id" =>$squadra2['id'],
                                                                                "score"=> 1,
                                                                                );
                                                                                scoreUpdate($data13);
                                                                                $data14 = array(
                                                                                    "id" =>$squadra4['id'],
                                                                                    "score"=> 1,
                                                                                    );
                                                                                    scoreUpdate($data14);
                                                            break;
                                                        case 3:
                                                                    $data3 = array(
                                                                        "match_number"  => 5,
                                                                        "id_legue" =>$id_lega,
                                                                        "id_team1" =>$squadra1['id'],
                                                                        "id_team2"=> $squadra3['id'],
                                                                        "score_1"=> 0,
                                                                        "score_2"=> 3,
                                                                        );
                                                                        addMatches($data3);
                                                                        $data11 = array(
                                                                            "id" =>$squadra3['id'],
                                                                            "score"=> 3,
                                                                            );
                                                                            scoreUpdate($data11);
                                                                        $data4 = array(
                                                                            "match_number"  => 5,
                                                                            "id_legue" =>$id_lega,
                                                                            "id_team1" =>$squadra2['id'],
                                                                            "id_team2"=> $squadra4['id'],
                                                                            "score_1"=> 0,
                                                                            "score_2"=> 3,
                                                                            );
                                                                            addMatches($data4);
                                                                            $data12 = array(
                                                                                "id" =>$squadra4['id'],
                                                                                "score"=> 3,
                                                                                );
                                                                                scoreUpdate($data12);
                                                            break;
                                                                                }
                                                                                $numero6 = rand(1,3);
                                                                                sleep(1);
                                                    switch ($numero6) {
                                                        case 1:
                                                                            $data5 = array(
                                                                                "match_number"  => 6,
                                                                                "id_legue" =>$id_lega,
                                                                                "id_team1" =>$squadra1['id'],
                                                                                "id_team2"=> $squadra4['id'],
                                                                                "score_1"=> 3,
                                                                                "score_2"=> 0,
                                                                                );
                                                                                addMatches($data5);
                                                                                $data15 = array(
                                                                                    "id" =>$squadra1['id'],
                                                                                    "score"=> 3,
                                                                                    );
                                                                                    scoreUpdate($data15);
                                                                                $data6 = array(
                                                                                    "match_number"  => 6,
                                                                                    "id_legue" =>$id_lega,
                                                                                    "id_team1" =>$squadra2['id'],
                                                                                    "id_team2"=> $squadra3['id'],
                                                                                    "score_1"=> 3,
                                                                                    "score_2"=> 0,
                                                                                    );
                                                                                    addMatches($data6);
                                                                                    $data16 = array(
                                                                                        "id" =>$squadra3['id'],
                                                                                        "score"=> 3,
                                                                                        );
                                                                                        scoreUpdate($data16);
                                                            break;
                                                        case 2:
                                                                            $data5 = array(
                                                                                "match_number"  => 6,
                                                                                "id_legue" =>$id_lega,
                                                                                "id_team1" =>$squadra1['id'],
                                                                                "id_team2"=> $squadra4['id'],
                                                                                "score_1"=> 1,
                                                                                "score_2"=> 1,
                                                                                );
                                                                                addMatches($data5);
                                                                                $data15 = array(
                                                                                    "id" =>$squadra1['id'],
                                                                                    "score"=> 1,
                                                                                    );
                                                                                    scoreUpdate($data15);
                                                                                    $data16 = array(
                                                                                        "id" =>$squadra4['id'],
                                                                                        "score"=> 1,
                                                                                        );
                                                                                        scoreUpdate($data16);
                                                                                $data6 = array(
                                                                                    "match_number"  => 6,
                                                                                    "id_legue" =>$id_lega,
                                                                                    "id_team1" =>$squadra2['id'],
                                                                                    "id_team2"=> $squadra3['id'],
                                                                                    "score_1"=> 1,
                                                                                    "score_2"=> 1,
                                                                                    );
                                                                                    addMatches($data6);
                                                                                    $data17 = array(
                                                                                        "id" =>$squadra2['id'],
                                                                                        "score"=> 1,
                                                                                        );
                                                                                        scoreUpdate($data17);
                                                                                        $data18 = array(
                                                                                            "id" =>$squadra3['id'],
                                                                                            "score"=> 1,
                                                                                            );
                                                                                            scoreUpdate($data18);
                                                            break;
                                                        case 3:
                                                                            $data5 = array(
                                                                                "match_number"  => 6,
                                                                                "id_legue" =>$id_lega,
                                                                                "id_team1" =>$squadra1['id'],
                                                                                "id_team2"=> $squadra4['id'],
                                                                                "score_1"=> 0,
                                                                                "score_2"=> 3,
                                                                                );
                                                                                addMatches($data5);
                                                                                $data15 = array(
                                                                                    "id" =>$squadra4['id'],
                                                                                    "score"=> 3,
                                                                                    );
                                                                                    scoreUpdate($data15);
                                                                                $data6 = array(
                                                                                    "match_number"  => 6,
                                                                                    "id_legue" =>$id_lega,
                                                                                    "id_team1" =>$squadra2['id'],
                                                                                    "id_team2"=> $squadra3['id'],
                                                                                    "score_1"=> 0,
                                                                                    "score_2"=> 3,
                                                                                    );
                                                                                    addMatches($data6);
                                                                                    $data16 = array(
                                                                                        "id" =>$squadra3['id'],
                                                                                        "score"=> 3,
                                                                                        );
                                                                                        scoreUpdate($data16);
                                                            break;
                                                                                    }
          //$response =(array) addFootballer($data);
          if (!empty($response)){
               echo ('<p class="text-success fw-bold mt-3 ms-3">' . $response['Message'] . '</p>'); 
           }
           echo('<p class="text-success fw-bold mt-3 ms-3"> Giornate calcolate, Classifica aggiornata:</p>');
           $classifica = getScoreFinal($id_lega);
           echo(' <br><br>
           <table class="table table-dark table-striped">
                           <thead>
                               <tr>
                                   <th scope="col">Nome Player</th>
                                   <th scope="col">Nome Team</th>
                                   <th scope="col">Punteggio</th>
                               </tr>
                           </thead>
                           <tbody>');
                           if (!empty($classifica) && $classifica != -1) {
                            foreach ($classifica as $row) {
                                echo ('<tr>');
                                foreach ($row as $cell) {
                                      //ogni elemento della riga è finalmente una cella
                                    echo ('<td>' . $cell . '</td>');
                            }
                            }
                            echo('</tbody>'); 
                            echo ('</table>');
                        }
                        echo('<a href = "singleLegue.php?id=' .$id_lega.'&id_creator=' .$id_creator.'"  class="btn btn-primary" >Torna a pagina lega</a>');
        }
?>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>