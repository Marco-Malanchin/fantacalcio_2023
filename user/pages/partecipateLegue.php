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
        <title>Fantacalcio | PartecipaLeghe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    </head>

    <body>
  <?php require_once(__DIR__.'\navbar.php'); ?>

  <div class="container">
    <div class="row mt-5">
      <h2>Leghe alle quali puoi partecipare:</h2>
    </div>
    <div class = "container mt-5">
    <div class = "row  row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php
     include_once dirname(__FILE__) . '/../function/legue.php';
     $id = $_SESSION['user_id'];
     $league_arr = getLegueNotPartecipated($id);
     $i = 0;
    if (!empty($league_arr) && $league_arr != -1) {
        foreach ($league_arr as $row) {
          if( $i++ < 1){
            continue; //skippo gli elementi che non servono
        }
        else{
          echo ('
          <div class="card mx-auto" style="width: 18rem;">
          <img src="../assets/img/logo.png" class="card-img-top" alt="..."> 
          <div class="card-body">
          <h5 class="card-title">' . $row['name'] . ' </h5>
          <form method="post">
          <td>
          <a href="singleLeguePartecipation.php?id=' .$row['id_leg'].'" class="btn btn-primary">partecipa</a>
            </td>
          </div>
          </div>
          ');
        }
        }
    }
    else{
        echo ('<p class="text-danger fw-bold mt-3 ms-3">Errore, non ci sono leghe alle quali puoi partecipare.</p>');
    }
   
?>
</div>
</div>
</div>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>