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
        <title>Fantacalcio | vediLegha</title>
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

    <div class = "container mt-5">
    <div class="row mt-5">
    <h5>player partecipanti:</h5>
    <br><br>
    <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome Player</th>
                            <th scope="col">Nome Team</th>
                            <th scope="col">Punteggio</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
     include_once dirname(__FILE__) . '/../function/legue.php';
     $id = $_GET['id'];
     $league_arr = getPlayerNameByID($id);
     $i = 0; //skippo gli elementi che non servono
     if (!empty($league_arr) && $league_arr != -1) {
        foreach ($league_arr as $row) {
            echo ('<tr>');
            if( $i++ < 1){
                continue; //skippo gli elementi che non servono
            }
            else{
            foreach ($row as $cell) {
                //ogni elemento della riga è finalmente una cella
                echo ('<td>' . $cell . '</td>');
            }
            echo ("</tr>\n");
            }  
        }
        }
        echo('</tbody>'); 
        echo ('</table>');
?>
</ul>
</div>
<br>
<?php
  $id = $_GET['id'];
  $user =$_GET['id_creator'];
    if($user == $_SESSION['user_id']){
        echo('<a href="createTeam.php?id='.$id.' " class="btn btn-primary ms-auto p-2">assegna giocatori</a>');
        echo('<br><br>');
        echo('<a href="createTeam.php?id='.$id.' " class="btn btn-primary ms-auto p-2">crea squadra</a>');
    }
    else{
        echo('<a href="createTeam.php?id='.$id.' " class="btn btn-primary ms-auto p-2">crea squadra</a>');
    }
?>
    </div>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>