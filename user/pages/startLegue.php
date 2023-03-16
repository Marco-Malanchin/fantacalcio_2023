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
//$id_team = $_GET['id_team'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = array(
        "name"  => $_POST ['name'],
        "surname" =>$_POST ['surname'],
        "role" =>$_POST ['role'],
        "id_team"=> $id_team,
        );
          $response =(array) addFootballer($data);
          if (!empty($response)){
               echo ('<p class="text-success fw-bold mt-3 ms-3">' . $response['Message'] . '</p>'); 
           }
        }
?>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>