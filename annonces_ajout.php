<?php
    require_once 'inc/functions.php';
    $pageencours = "annonces_ajout";
    require 'inc/header.php';     
    
    estConnecte();

    if(isset($_SESSION['auth']))
    {
        $formateurId = $_SESSION['auth']->id;
        //var_dump($formateurId);
    }

    require_once 'inc/db.php';

    $req = $pdo->prepare('SELECT * FROM annonce WHERE formateur_id = ?');
    $req->execute([ $formateurId ]);
    $annonce = $req->fetch();  

    if($annonce)
    {
        header('refresh:5, url=annonce_edit.php');
    }

    if(!empty($_POST))
    {    
        $errors = array();        
    
        if(empty($_POST['titre']))
        {
            $errors['titre'] = "Veuillez mettre un titre";
        } 

        if(empty($_POST['contenu']))
        {
            $errors['contenu'] = "Votre contenu n'est pas suffisant";
        }

        if(empty($errors))
        {
            require_once 'inc/db.php';            

            $req = $pdo->prepare("INSERT INTO annonce SET titre = ?, contenu = ?, date_de_creation = now(), formateur_id = ?");
            $req->execute([ $_POST['titre'], $_POST['contenu'], $formateurId ]);
            
            $_SESSION['flash']['success'] = 'Votre annonce a bien été mise en ligne';  
            
            header('refresh:0; url=annonces.php');
        }           
    }
?>

<!-- MAIN -->
<main> 

<!-- SECTION ANNONCE AJOUT -->
<section id="inscription" class="container w-50 mx-auto my-0">
    
    <!-- ajout formulaire -->
    <h1 class="text-center mt-0 pt-0 pb-2">Mettre une annonce</h1> 

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

        <h1 class="text-center inscription-left-title" style="color:white!important;">À remplir</h1>

        <p class="text-center">Créez une annonce pour handicapé<br><br>

            <form class="mx-auto" action="" method="POST" enctype="multipart/form-data"> 

                <div class="row col"> 
                    <input type="text" id="titre" name="titre" class="form-control titre" placeholder="Titre"/>                    
                </div> 
                <div class="row col">
                    <input type="text" id="contenu" name="contenu" class="form-control contenu" placeholder="Contenu"/>
                </div> 
                <div class="row col">
                    <button type="submit" class="btn btn-primary btn-inscription">Envoyer l'annonce</button>
                </div>
                
            </form> 
        
    </div>
    <!-- ajout formulaire -->
  
</section>
<!-- SECTION ANNONCE AJOUT -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>