<?php
    require_once 'inc/functions.php';
    $pageencours = "connexion";    
    require 'inc/header.php';

    reconnexion();

    if(isset($_SESSION['auth']))
    {
        header('refresh:0; url=profile.php');
    }

    if(!empty($_POST) && !empty($_POST['mail']) && !empty($_POST['password']))
    {
        require_once 'inc/db.php';
        $req = $pdo->prepare('SELECT * FROM formateur WHERE email = :mail'); 
        $req->execute(['mail' => $_POST['mail']]);
        $formateur = $req->fetch();

        $formateurPass = $formateur->motdepasse;
        $password = htmlspecialchars(trim($_POST['password']));

        //var_dump(password_verify($password, $formateurPass));

        if(password_verify($password, $formateur->motdepasse))
        {            
            $_SESSION['auth'] = $formateur;
            //var_dump($_SESSION['auth']);
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';            

            if($_POST['serappeler'])
            {
                $serappeler_jeton = str_random(250);
                $pdo->prepare('UPDATE formateur SET serappeler_jeton = ? WHERE id = ?')->execute([ $serappeler_jeton, $formateur->id ]);
                setcookie('serappeler', $formateur->id . '==' . $serappeler_jeton . sha1($formateur->id . 'epsi'), time() + 60 * 60 * 24 * 7);
            }
            
            header('refresh:0; url=profile.php');                            
        }
        else
        {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect(s)';
        }
       
    }         
?> 

<!-- MAIN -->
<main>    

<!-- SECTION CONNEXION -->
<section id="connexion" class="container w-50 mx-auto my-0">
    
    <!-- connexion formulaire -->
    <h1 class="text-center pb-5">Connexion</h1> 

    <?php if(!empty($errors)): ?>
        <div class="text-center alert alert-danger">
            <p>Vous n'avez pas rempli les champs correctement</p>
            <ul class="list-unstyled">
                <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row mt-2 mb-5"> 

        <h1 class="text-center" style="color:white!important;">Se connecter</h1>

        <p class="text-center connexion-description">Connectez-vous à votre compte</p>

        <form class="mx-auto" action="" method="POST" enctype="multipart/form-data"> 

            <div class="row col"> 
                <input type="mail" id="mail" name="mail" class="form-control mail" placeholder="E-mail"/>
            </div> 
            <div class="row col">
                <input type="password" id="password" name="password" class="form-control password" placeholder="Mot de passe"/>                                      
            </div>
            <div class="row col custom-checkbox text-center">
                <input style="height:20px;width:20px" type="checkbox" name="serappeler" id="serappeler" class="custom-control-input"/>
                <label class="custom-control-label" for="customCheck1"> Se rappeler</label>
            </div>
            <div class="row col">
                <button type="submit" class="btn btn-primary btn-connexion">Se connecter</button>
            </div>
            <div class="row col">
                <a href="inscription.php" class="btn btn-primary btn-connexion">Créer un compte</a>
            </div>

        </form>
                
    </div>
    <!-- connexion formulaire -->

  
</section>
<!-- SECTION CONNEXION -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>