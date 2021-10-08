<?php
    require_once 'inc/functions.php';
    $pageencours = "profile";    
    require 'inc/header.php';

    estConnecte();

    if(isset($_SESSION['auth']))
    {
        //var_dump($_SESSION['auth']->email);  et pas $_SESSION['auth']['email']
        require_once 'inc/db.php';
        $req = $pdo->prepare('SELECT * FROM formateur WHERE email = ?');        
        $req->execute([ $_SESSION['auth']->email ]);
        $formateur = $req->fetchAll();
        //var_dump($formateur);
    }         
?> 

<!-- MAIN -->
<main>  
    
<!-- SECTION PROFILE -->
<section id="profile" class="container w-50 mx-auto my-0">
    
    <!-- voir ses informations -->
    <h1 class="text-center">Votre profile</h1>    
    
    <div class="container w-75 mx-auto my-5">
        
        <?php foreach($formateur as $forma): ?>
            <div class="card mb-3">
                    <div class="card-body mx-5 p-5">
                        <h5 class="card-title text-center pb-5">Informations de compte</h5>
                        <p class="card-text"><span style="color:#0B85FC">NOM: </span> <?= $forma->nom ?></p>
                        <p class="card-text"><span style="color:#0B85FC">PRÉNOM: </span> <?= $forma->prenom ?></p>
                        <p class="card-text"><span style="color:#0B85FC">FORMATION: </span> <?= $forma->domaine ?></p>
                        <p class="card-text"><span style="color:#0B85FC">SPECIALITÉ HANDICAPÉS: </span> <?= $forma->specialite ?></p>
                        <p class="card-text"><span style="color:#0B85FC">TÉLÉPHONE: </span> <?= $forma->telephone ?></p>
                        <p class="card-text"><span style="color:#0B85FC">ADRESSE: </span> <?= $forma->adresse ?></p>
                        <p class="card-text"><span style="color:#0B85FC">CODE POSTAL: </span> <?= $forma->code_postal ?></p>
                        <p class="card-text"><span style="color:#0B85FC">VILLE: </span> <?= $forma->ville ?></p>
                        <p class="card-text"><span style="color:#0B85FC">CRÉE LE: </span> <?= $forma->date_de_creation_de_compte ?></p>
                        <p class="card-text"><small class="text-muted">Mis à jour le <?= substr($forma->date_de_derniere_connexion, 0, 10); ?></small></p>
                    </div>
                </div>           
            </div>
        <?php endforeach; ?>

    </div>
  
</section>
<!-- SECTION PROFILE -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>