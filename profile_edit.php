<?php
    require_once 'inc/functions.php';
    $pageencours = "profile_edit";
    require 'inc/header.php';      

    estConnecte();

    if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
    {
        header('refresh:0, url=connexion.php');
    }

    if(isset($_SESSION['auth']))
    {        
        require_once 'inc/db.php';
        $req = $pdo->prepare('SELECT * FROM formateur WHERE email = ?');        
        $req->execute([ $_SESSION['auth']->email ]);
        $formateur = $req->fetchAll();
        //var_dump($formateur);
    } 

    if(!empty($_POST))
    {    
        $errors = array();
    
        if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            $errors['mail'] = "Votre mail n'est pas valide";
        } 

        if(empty($_POST['codepostal']) || !(preg_match('/^[0-9]+$/', $_POST['codepostal'])) || (strlen($_POST['codepostal']) != 5))
        {
            $errors['codepostal'] = "Vous devez entrer un code postal valide";
        }

        if(empty($_POST['telephone']) || !(preg_match('/^[0-9]+$/', $_POST['telephone'])) || (strlen($_POST['telephone']) != 10))
        {
            $errors['telephone'] = "Vous devez entrer un numéro au format indiqué";
        }
    
        if(empty($errors))
        {   
            require_once 'inc/db.php'; 

            $req = $pdo->prepare("UPDATE formateur SET domaine = ?, specialite = ?, adresse = ?, code_postal = ?, ville = ?, telephone = ?, email = ? WHERE id = ?");            
            $req->execute([ $_POST['domaine'], $_POST['specialite'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['telephone'], $_POST['mail'], $_SESSION['auth']->id ]);
            //$formateur_id = $pdo->lastInsertId();
            
            header('refresh:0, url=profile.php');
        }    
    }
?>

<!-- MAIN -->
<main> 

<!-- SECTION PROFILE -->
<section id="inscription" class="container w-50 mx-auto my-0">
    
    <!-- profile formulaire -->
    <h1 class="text-center my-0 pb-5">Profile formateur</h1> 

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

        <h1 class="text-center inscription-left-title" style="color:white!important;">Mettre à jour votre compte</h1>

        <p class="text-center inscription-description">Éditer vos informations<br><br>

            <form class="mx-auto" action="" method="POST" enctype="multipart/form-data">

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
                    <input type="text" id="adresse" name="adresse" class="form-control adresse" placeholder="Adresse"/>                    
                </div>  
                <div class="row col"> 
                    <input type="text" id="codepostal" name="codepostal" class="form-control codepostal" placeholder="Code Postal"/>                    
                </div> 
                <div class="row col"> 
                    <input type="text" id="ville" name="ville" class="form-control ville" placeholder="Ville"/>                    
                </div> 
                <div class="row col">                     
                    <input type="tel" id="telephone" name="telephone" class="form-control telephone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" placeholder="Téléphone" required> <small class="row mx-1">Format: 0612345678</small>
                </div>              
                <div class="row col">
                    <button type="submit" class="btn btn-primary btn-inscription">Mettre à jour</button>
                </div>
                
            </form> 
        
    </div>
    <!-- edition de profile formulaire -->
  
</section>
<!-- SECTION PROFILE -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>