<?php
    require_once 'inc/functions.php';
    $pageencours = "accueil";
    require 'inc/header.php';

    reconnexion();
?>

<!-- MAIN -->
<main>
        
    <div class="container-fluid text-center pb-5">
        <h2>
            Vous êtes formateur certifié spécialiste d'un type d'handicap?
        </h2>
    </div>
    <div class="container text-center py-3 bg-tarifs">
        <h1>
            Inscrivez-vous en toute facilité et postez votre annonce.
        </h1>
        <h2>
            La personne handicapée interessée n'a plus qu'à cliquer pour vous contacter.
        </h2>
    </div> 
    
<div class="container mt-5 py-5 accordion w-50 mx-auto" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accessibilité
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Nous souhaitons faciliter l'accès à la formation professionnelle aux personnes handicapées.</strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Application mobile iOS et Android
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Nous disposons dors-et-déjà d'une application mobile iOS et Android à découvrir sur la page d'accueil du site RMF.</strong> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Lié prochainement à une API
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>RMF est en train de développer sa propre API, relié aux annonces du site.</strong>
      </div>
    </div>
  </div>
</div>

</main>
<!-- MAIN -->  
 
<?php    
    require 'inc/footer.php';
?>