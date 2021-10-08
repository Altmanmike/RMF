<?php
    require_once 'inc/functions.php';
    $pageencours = "annonces";    
    require 'inc/header.php';
    reconnexion();

    require_once 'inc/db.php';

    if(isset($_SESSION['auth']))
    {
        $formateurId = $_SESSION['auth']->id;
        //var_dump($formateurId);
        $req = $pdo->prepare('SELECT * FROM annonce WHERE formateur_id = ?');
        $req->execute([ $formateurId ]);
        $monAnnonce = $req->fetch(); 
        //var_dump($monAnnonce); 
    }

    $req = $pdo->prepare('SELECT * FROM annonce');
    $req->execute();
    $annonces = $req->fetchAll();       
?> 

<!-- MAIN -->
<main>    

<!-- SECTION ANNONCES -->
<section id="annonces" class="container w-75 mx-auto my-0">
    
    <!-- voir toutes les annonces postées -->
    <h1 class="text-center mt-0 pt-0 pb-2">Annonces mises en ligne</h1>

    <?php 

        if(isset($_SESSION['auth']))
        {
            ?><?php if(!$monAnnonce): ?>
                <div class="text-center">
                    <a href="annonces_ajout.php" class="btn btn-primary btn-inscription p-2"> Postez une nouvelle annonce &nbsp<i class="fas fa-plus"></i></a>
                </div>
            <?php endif; ?>

            <p class="text-center pt-5">Toutes les formations possibles<br><br>
                
            <table class="table">
                    <thead>
                        <tr>                
                        <th scope="col">TITRE DE L'ANNONCE</th>
                        <th scope="col">CONTENU DE LA FORMATION</th>
                        <th scope="col">MISE EN LIGNE</th>
                        <th scope="col">ÉDITER</th>               
                        </tr>
                    </thead>
                    <tbody>                    
                        <tr>  
                        <td style="padding-left: 10px;"><?= $monAnnonce->titre; ?></td>               
                        <td style="padding-left: 10px;"><?= $monAnnonce->contenu; ?></td>            
                        <td style="padding-left: 10px;"><?= $monAnnonce->date_de_creation; ?></td>
                        <td><?php if($monAnnonce): ?>
                            <a href="annonces_edit.php?id=<?= $monAnnonce->id ?>" class="btn btn-primary btn-inscription p-2"> &nbsp<i class="fas fa-plus"></i>&nbsp</a>
                            <?php endif; ?></td>                              
                        </tr>                        
                    </tbody>
            </table><?php
        }
        else
        {
            ?><p class="text-center pt-5">Toutes les formations possibles<br><br>
    
            <table class="table">
                    <thead>
                        <tr>                
                        <th scope="col">TITRE DE L'ANNONCE</th>
                        <th scope="col">CONTENU DE LA FORMATION</th>
                        <th scope="col">MISE EN LIGNE</th>                                                                
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($annonces as $annonce): ?>
                        <tr>  
                        <td style="padding-left: 10px;"><?= $annonce->titre ?></td>               
                        <td style="padding-left: 10px;"><?= $annonce->contenu ?></td>
                        <td style="padding-left: 10px;"><?= $annonce->date_de_creation ?></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table><?php 
        }
    ?>

  
</section>
<!-- SECTION ANNONCES -->

</main>
<!-- MAIN -->
<?php require 'inc/footer.php'; ?>