<?php
    require_once 'inc/functions.php';
    $pageencours = "inscription";
    require 'inc/header.php';      

    //session_start();
    
    if(!empty($_POST))
    {    
        $errors = array();
        require_once 'inc/db.php';
    
        if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom']))
        {
            $errors['nom'] = "Votre nom n'est pas valide (alphanumérique)";
        } 
        else 
        {
            $req = $pdo->prepare('SELECT id FROM formateur WHERE nom = ?');
            $req->execute([ $_POST['nom'] ]);        
            $formateur = $req->fetch();
            
            if($formateur)
            {
                $errors['nom'] = 'Ce nom est déjà dans la base de donnée';
            }
        }
    
        if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            $errors['mail'] = "Votre mail n'est pas valide";
        } 
        else 
        {
            $req = $pdo->prepare('SELECT id FROM formateur WHERE email = ?');
            $req->execute([ $_POST['mail'] ]);
            $formateur = $req->fetch();
            
            if($formateur)
            {
                $errors['mail'] = 'Ce mail est déjà utilisé pour un autre compte';
            }
        }
    
        if(empty($_POST['telephone']) || !preg_match('/^[0-9]+$/', $_POST['telephone']) || (strlen($_POST['telephone']) != 10))
        {
            $errors['telephone'] = "Vous devez entrer un numéro au format indiqué";
        }

        if(empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password'])
        {
            $errors['password'] = "Vous devez rentrer un mot de passe valide";
        }
    
        if(empty($errors) && $_POST['check1'])
        {    
            $req = $pdo->prepare("INSERT INTO formateur SET nom = ?, prenom = ?, domaine = ?, specialite = ?, telephone = ?, motdepasse = ?, email = ?, serappeler_jeton = ?");
            $mdp = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $jeton = str_random(60);
            $req->execute([ $_POST['nom'], $_POST['prenom'], $_POST['domaine'], $_POST['specialite'], $_POST['telephone'], $mdp, $_POST['mail'], $jeton ]);
            $formateur_id = $pdo->lastInsertId();
            
            $_SESSION['flash']['success'] = 'Félicitation! Vous venez de créer votre compte';
            
            header('refresh:2; url=connexion.php');
        }    
    }
?>

<!-- MAIN -->
<main> 

<!-- SECTION INSCRIPTION -->
<section id="inscription" class="container w-50 pb-4 mx-auto my-0">
    
    <!-- inscription formulaire -->
    <h1 class="text-center pb-5">Compte formateur</h1> 

    <?php if(!empty($errors)): ?>
        <div class="text-center alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
            <ul class="list-unstyled">
                <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row mt-2 mb-5">

        <h1 class="text-center inscription-left-title" style="color:white!important;">Inscription</h1>

        <p class="text-center inscription-description">Créez un compte<br><br>

            <form class="mx-auto" action="" method="POST" enctype="multipart/form-data"> 

                <div class="row col"> 
                    <input type="text" id="nom" name="nom" class="form-control nom" placeholder="Nom"/>                    
                </div> 
                <div class="row col">
                    <input type="text" id="prenom" name="prenom" class="form-control prenom" placeholder="Prénom"/>
                </div> 
                <div class="row col"> 
                    <input type="mail" id="mail" name="mail" class="form-control mail" placeholder="E-mail"/>
                </div>  
                <div class="row col"> 
                    <input type="text" id="domaine" name="domaine" class="form-control domaine" placeholder="Domaine de formation"/>                    
                </div> 
                <div class="row col"> 
                    <input type="text" id="specialite" name="specialite" class="form-control specialite" placeholder="Type d'handicap"/>                    
                </div> 
                <div class="row col">                     
                    <input type="tel" id="telephone" name="telephone" class="form-control telephone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" placeholder="Téléphone" required> <small class="row mx-1">Format: 0612345678</small>
                </div>               
                <div class="row col">
                    <input type="password" id="password" name="password" class="form-control password" placeholder="Mot de passe"/>                                      
                </div>
                <div class="row col">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control password" placeholder="Confirmer Mot de passe"/>                                                        
                </div>
                <div class="row col">
                    <button type="submit" class="btn btn-primary btn-inscription">Créer un compte</button>
                </div>
                <div class="row col custom-checkbox">
                    <input style="height:20px;width:20px" type="checkbox" name="check1" id="customCheck1" class="custom-control-input"/>
                    <label class="custom-control-label" for="customCheck1">J'ai pris connaissance et accepte les<a href="termes-et-conditions.php" class="btn btn-termes-et-conditions">termes et conditions</a>de mon inscription
                    </label>
                </div>
                <div class="row col">
                     <a href="connexion.php" class="btn btn-primary btn-inscription">Se connecter</a>
                </div>  
                
            </form> 
        
    </div>
    <!-- inscription formulaire -->
  
</section>
<!-- SECTION INSCRIPTION -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>