<div>
   
<?php
 //Connexion à la bdd
 $bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
?>

<h1>Article</h1>

<?php
    $article = $bdd->query('SELECT id,titre,contenu, DATE_FORMAT(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS date_fr FROM billets 
    WHERE id = "'.$_GET['id'].'" ');
    while($resultat = $article->fetch()){

        echo "<p><strong>".$resultat['titre']."</strong> : ".$resultat['contenu']." ".$resultat['date_fr']."</p>";
    }

?>



<h2>commentaire :</h2>

        <?php
    
        //Requête à la bdd
        $req = $bdd -> prepare('SELECT id, id_billet,auteur,commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%y à %Hh%imin%ss\') AS date_fr FROM commentaires 
        WHERE id_billet = ? ORDER BY date_fr DESC ');
        $req->execute(array($_GET['id']));
        //Parcours de la boucle
        while($data = $req->fetch()){

            echo "<p><strong>".$data['auteur']."</strong> : ".$data['commentaire']." ".$data['date_fr']."</p>";
        }


        $req->closeCursor();
        ?>


    </div>