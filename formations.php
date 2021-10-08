<?php
    require_once 'inc/functions.php';
    $pageencours = "annonces";    
    require 'inc/header.php';
    reconnexion();

    require_once 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM formateur INNER JOIN annonce ON formateur.id = annonce.formateur_id ');
    $req->execute();
    $formations = $req->fetchAll(); 
    
    if(!$formations)
    {
        $errors['formations'] = "Il n'y a aucunes annonces de formations professionnelles pour handicapés pour le moment..";
    }
?> 

<!-- MAIN -->
<main>    

<!-- SECTION FORMATIONS -->
<section id="formations" class="container w-75 mx-auto my-0">
    
    <!-- voir toutes les formation proposées -->
    <h1 class="text-center mt-0 pt-0 pb-2">Nos formations et formateurs</h1>

    <?php if(!empty($errors)): ?>
        <div class="text-center alert alert-danger">            
            <ul class="text-center list-unstyled">
                <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <p class="text-center pt-3">Les formateurs de votre zone sont certifiés<br><br>
    
    <div class="container mx-auto pt-2">        
        
        <table class="table">
            <thead>
                <tr> 
                <th scope="col">FORMATEUR</th>               
                <th scope="col">FORMATION PROPOSÉE</th>
                <th scope="col">TYPE D'HANDICAP</th>
                <th scope="col">VILLE</th>               
                <th scope="col">APPELER</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($formations as $formation): ?>
                <tr> 
                <td style="padding-left: 10px;"><?= $formation->nom ?> <?= $formation->prenom ?></td>               
                <td style="padding-left: 10px;"><?= $formation->domaine ?></td>                
                <td style="padding-left: 10px;"><?= $formation->specialite ?></td> 
                <td style="padding-left: 10px;"><?= $formation->ville ?></td>
                <td style="padding-left: 30px;"><a href="tel:<?= $formation->telephone ?>"><i class="fas fa-phone" style="color:black;"></i></a></td>                
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  

    </div>
  
</section>
<!-- SECTION FORMATIONS -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>