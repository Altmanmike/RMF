<?php
    require_once 'inc/functions.php';
    $pageencours = "informations";
    require 'inc/header.php';

    reconnexion();
?>

<!-- MAIN -->
<main>
    
    <div class="container-fluid text-center">
        <h1>
            Quelques précisions
        </h1>
    </div>
    <div class="container-fluid mx-auto text-center">
        <div class="row col justify-content-center">
            <h2 class="text-center p-3">Des formateurs qualifiés!</h2>
            <img class="text-center p-3" src="./img/png-clipart-professional-certification-computer-icons-quality-service-quality-icon-service-logo.png" alt="image formateur" style="width:250px;height:250px"/>
        </div>
        <div class="row col justify-content-center">
            <h2 class="text-center p-3">Formations professionnelles adaptées à tous types d'handicaps!</h2>
            <img class="text-center p-3" src="./img/panneau-signaletique-personne-a-mobilite-reduite.jpg" alt="image handicap moteur" style="width:250px;height:250px"/>
            <img class="text-center p-3" src="./img/pictogramme-pi-pf-048-accessibilite-malentendant-en-vinyle-souple-autocollant-iso-7001.jpg" alt="image malentendant" style="width:250px;height:250px"/>
            <img class="text-center p-3" src="./img/pictogramme-pi-pf-049-accessibilite-malvoyant-en-vinyle-souple-autocollant-iso-7001.jpg" alt="image malvoyant" style="width:250px;height:250px"/>
        </div>
    </div>

</main>
<!-- MAIN -->  
 
<?php    
    require 'inc/footer.php';
?>