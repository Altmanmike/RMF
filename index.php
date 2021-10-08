<?php
    require_once 'inc/functions.php';
    $pageencours = "accueil";
    require 'inc/header.php';

    reconnexion();
?>

<!-- MAIN -->
<main>
    <div class="container-fluid text-center">
        <img src="./img/RMF logo.png" alt="logo rmf" style="height:250px"/>
    </div>
    <div class="container-fluid text-center">
        <h1>
            Bienvenue sur le site de l'application rmf.
        </h1>
    </div>
    <div class="container-fluid text-center">
        <img src="./img/Classroom-rafiki.svg" alt="image formateur" style="height:500px"/>
    </div>
    <div class="container-fluid text-center">
        <h2>
            Promouvoir la formation professionnelle aux personnes handicapées.
        </h2>
    </div>

</main>
<!-- MAIN -->  
 
<?php    
    require 'inc/footer.php';
?>

