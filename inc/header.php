<?php
    require_once 'inc/functions.php';    
    reconnexion();
    ob_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPSI Workshop - RMF</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   
    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0.min.css /"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/d40df77f00.js" crossorigin="anonymous"></script> 
    
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
    
    <!-- CSS -->    
    <link rel="stylesheet" type="text/css" href="css/normalize-3.0.3.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto" />

    <!-- JAVASCRIPT -->    
    <script type="text/javascript" src="js/to-top.js"></script>    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar" > 
    <div class="container-fluid">
        <a class="navbar-brand px-3" href="index.php"><img src="./img/RMF logo - png.png" alt="rmflogo" style="width:100px;"/></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center navbar-text" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item mx-1">
                    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">                
                    <a class="nav-link" href="annonces.php"><i class="fas fa-newspaper"></i> Annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formations.php"><i class="fas fa-chart-line"></i> Les formations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="informations.php"><i class="fas fa-info"></i> Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mais_encore.php"><i class="fas fa-calendar-plus"></i> Mais encore</a>
                </li>  
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end navbar-text coll-nav-auth" id="navbarNav">
            <ul class="navbar-nav text-center">
            <?php if(isset($_SESSION['auth'])): ?>                
                <div class="dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i> Connecté
                  </a>
                  <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['auth']->id ?>"><i class="fas fa-address-card"></i> Mon profil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile_edit.php?id=<?php echo $_SESSION['auth']->id ?>"><i class="fas fa-user-edit"></i> Éditer profil</a>
                    </li>                     
                    <li>
                        <a class="dropdown-item" href="deconnexion.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    </li>                                        
                  </ul>
                </div> 
            <?php else: ?> 
                <li class="nav-item mx-1">
                    <a class="nav-link btn btn-outline-light"  href="connexion.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link btn btn-outline-light"  href="inscription.php"><i class="fab fa-accessible-icon"></i> S'inscrire</a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
        
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0974F1" fill-opacity="1" d="M0,256L1440,160L1440,0L0,0Z"></path></svg> 

<div class="container">

    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="w-50 mx-auto text-center alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    
</div>

<!-- GO TOP BUTTON -->
<div id="scrollUp" >
    <a href="#top"><img src="./img/to top.png" alt="GO TOP"></a>
</div>


