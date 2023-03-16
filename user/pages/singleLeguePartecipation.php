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
        <title>Fantacalcio | partecipaSingolaLegha</title>
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
    <?php
     include_once dirname(__FILE__) . '/../function/legue.php';
     $id = $_GET['id'];
     $league_arr = getPlayerNameByID($id);
     echo('<ul class="list-group">');
     if (!empty($league_arr) && $league_arr != -1) {
        foreach ($league_arr as $row) {
            echo ('
  <li class="list-group-item">'.$row['nickname'].'</li>
                ');
        }
    }
?>
</ul>
</div>
<br>
<form method="post">
    <td>
    <button type="submit" class="btn btn-primary" name="partecipa"<?php echo isset($_POST["partecipa"]) ? "disabled" : "";?>>Partecipa</button>
    </td>'
<?php
  $id = $_GET['id'];
  $user = $_SESSION['user_id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = array(
          "id_user"  => $_SESSION['user_id'],
          "id_legue" =>  $id,
           );
           $legue =  checkIdLegue($id);
        if (array_search($user, array_column($legue, 'id_user')) == TRUE) {   
            echo ('<p class="text-danger fw-bold mt-3 ms-3">Errore, partecipi già a questa lega.</p>');
        }
        else{
          $response =(array)partecipateLegue($data);
          if (!empty($response)){
               echo ('<p class="text-success fw-bold mt-3 ms-3">' . $response['Message'] . '</p>');
         }
        }
        
       echo('<a href = "index.php"  class="btn btn-primary" >Torna a pagina home</a>');
    }
?>
    </div>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>