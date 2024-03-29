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
        <title>Fantacalcio |vediLeghe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    </head>

    <body>
  <?php require_once(__DIR__.'\navbar.php'); ?>

  <div class="container">
    <div class="row mt-5">
      <h2>Leghe alle quali partecipi:</h2>
    </div>
    <div class = "container mt-5">
    <div class = "row  row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php
     include_once dirname(__FILE__) . '/../function/legue.php';
     $id = $_SESSION['user_id'];
     $league_arr = getLegueByUser($id);
    if (!empty($league_arr) && $league_arr != -1) {
        foreach ($league_arr as $row) {
            echo ('
                <div class="card mx-auto" style="width: 18rem;">
                <img src="../assets/img/logo.png" class="card-img-top" alt="..."> 
                <div class="card-body">
                <h5 class="card-title">' . $row['name'] . ' </h5>
                <a href="singleLegue.php?id=' .$row['id'].'&id_creator=' .$row['id_creator'].'" class="btn btn-primary">visualizza legha</a>
                </div>
                </div>
                ');
        }
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