<div>
        <h2>messages :</h2>

        <?php
        //Connexion à la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=blog','root','root');
        //Requête à la bdd
        $req = $bdd -> query('SELECT id,titre,contenu, DATE_FORMAT(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS date_fr FROM billets ORDER BY id DESC LIMIT 10');
        //Parcours de la boucle
        while($data = $req->fetch()){

            echo "<p><strong>".$data['titre']."</strong> : ".$data['contenu']." ".$data['date_fr']."</p>";
            echo '<a href="commentaire.php?id='.$data['id'].' "/>Commentaire</a>';
        }
        ?>

    </div>