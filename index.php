<?php
    require_once 'inc/functions.php';
    $pageencours = "accueil";
    require 'inc/header.php';

    reconnexion();
?>

<!-- MAIN -->
<main>
    <div class="container-fluid text-center">
        <h1>
            Bienvenue sur le site de l'application rmf.
        </h1>
    </div>
    <div class="container-fluid text-center pb-3">
        <h2>
            Promouvoir la formation professionnelle aux personnes handicapées.
        </h2>
    </div>
    <div class="container-fluid text-center pb-5">
        <h2>
            PRESENTATION DE L'APPLICATION RMF
        </h2>
    </div>


    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="./img/1.png" class="d-block w-25"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/2.png" class="d-block w-25" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/3.png" class="d-block w-25" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/4.png" class="d-block w-25" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/5.png" class="d-block w-25" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</main>
<!-- MAIN -->  
 
<?php    
    require 'inc/footer.php';
?>

