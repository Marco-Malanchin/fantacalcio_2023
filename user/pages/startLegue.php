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
        <button type="submit" class="btn btn-success" name="legha">AVVIA</button>
</div>
            <?php

include_once dirname(__FILE__) . '\..\function\legue.php';
include_once dirname(__FILE__) . '\..\function\team.php';
include_once dirname(__FILE__) . '\..\function\footballer.php';
$err = "";
$id_user = $_SESSION['user_id'];
$id_lega = $_GET['id'];
//$id_team = $_GET['id_team'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $squadre = getidTeambyLegue($id_lega);
    $numero1 = rand(1,3);
        switch ($numero1) {
            case 1:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadre[1],
                    "id_team2"=> $squadre[2],
                    "score_1"=> 3,
                    "score_2"=> 0,
                    );
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadre[3],
                        "id_team2"=> $squadre[4],
                        "score_1"=> 3,
                        "score_2"=> 0,
                        );
                break;
            case 2:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadre[1],
                    "id_team2"=> $squadre[2],
                    "score_1"=> 1,
                    "score_2"=> 1,
                    );
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadre[3],
                        "id_team2"=> $squadre[4],
                        "score_1"=> 1,
                        "score_2"=> 1,
                        );
                break;
            case 3:
                $data1 = array(
                    "match_number"  => 1,
                    "id_legue" =>$id_lega,
                    "id_team1" =>$squadre[1],
                    "id_team2"=> $squadre[2],
                    "score_1"=> 0,
                    "score_2"=> 3,
                    );
                    $data2 = array(
                        "match_number"  => 1,
                        "id_legue" =>$id_lega,
                        "id_team1" =>$squadre[3],
                        "id_team2"=> $squadre[4],
                        "score_1"=> 0,
                        "score_2"=> 3,
                        );
                break;
                                    }
                $numero2 = rand(1,3);
                switch ($numero2) {
                    case 1:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadre[1],
                                    "id_team2"=> $squadre[3],
                                    "score_1"=> 3,
                                    "score_2"=> 0,
                                    );
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadre[2],
                                        "id_team2"=> $squadre[4],
                                        "score_1"=> 3,
                                        "score_2"=> 0,
                                        );
                        break;
                    case 2:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadre[1],
                                    "id_team2"=> $squadre[3],
                                    "score_1"=> 1,
                                    "score_2"=> 1,
                                    );
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadre[2],
                                        "id_team2"=> $squadre[4],
                                        "score_1"=> 1,
                                        "score_2"=> 1,
                                        );
                        break;
                    case 3:
                                $data3 = array(
                                    "match_number"  => 2,
                                    "id_legue" =>$id_lega,
                                    "id_team1" =>$squadre[1],
                                    "id_team2"=> $squadre[3],
                                    "score_1"=> 0,
                                    "score_2"=> 3,
                                    );
                                    $data4 = array(
                                        "match_number"  => 2,
                                        "id_legue" =>$id_lega,
                                        "id_team1" =>$squadre[2],
                                        "id_team2"=> $squadre[4],
                                        "score_1"=> 0,
                                        "score_2"=> 3,
                                        );
                        break;
                                            }
                                            $numero3 = rand(1,3);
                switch ($numero3) {
                    case 1:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadre[1],
                                            "id_team2"=> $squadre[4],
                                            "score_1"=> 3,
                                            "score_2"=> 0,
                                            );
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadre[2],
                                                "id_team2"=> $squadre[3],
                                                "score_1"=> 3,
                                                "score_2"=> 0,
                                                );
                        break;
                    case 2:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadre[1],
                                            "id_team2"=> $squadre[4],
                                            "score_1"=> 1,
                                            "score_2"=> 1,
                                            );
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadre[2],
                                                "id_team2"=> $squadre[3],
                                                "score_1"=> 1,
                                                "score_2"=> 1,
                                                );
                        break;
                    case 3:
                                        $data5 = array(
                                            "match_number"  => 3,
                                            "id_legue" =>$id_lega,
                                            "id_team1" =>$squadre[1],
                                            "id_team2"=> $squadre[4],
                                            "score_1"=> 0,
                                            "score_2"=> 3,
                                            );
                                            $data6 = array(
                                                "match_number"  => 3,
                                                "id_legue" =>$id_lega,
                                                "id_team1" =>$squadre[2],
                                                "id_team2"=> $squadre[3],
                                                "score_1"=> 0,
                                                "score_2"=> 3,
                                                );
                        break;
                                            }
          //$response =(array) addFootballer($data);
          if (!empty($response)){
               echo ('<p class="text-success fw-bold mt-3 ms-3">' . $response['Message'] . '</p>'); 
           }
        }
?>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>