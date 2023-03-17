<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sandwech | Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    </head>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">
            <img src="../assets/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
            Fantacalcio 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Leghe
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="createLegue.php">Crea Lega</a></li>
                        <li><a class="dropdown-item" href="viewLegueByUser.php">Vedi Leghe</a></li>
                        <li><a class="dropdown-item" href="partecipateLegue.php">Partecipa Leghe</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Squadre
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="getPlayer.php">Visualizza Squadre</a></li>
                    </ul>
                </li>
            </ul>
            <a href="../function/logout.php">
            <button class="btn btn-outline-danger">Esci</button>
            </a>
        </div>
    </div>
</nav>