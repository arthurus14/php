<div>
        <h2>messages :</h2>

        <?php
        //Appel de la requête SQL
       // require('model.php');
        //On attribut la fonciton à la variable $req qui sera utlisée pour le view
       // $posts = getBillets();


        //Appel de la page contenant le script d'affichage
        //require('affichageAccueil.php');


require('controller/frontend.php');

if (isset($_GET['id'])) {

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = getPost($_GET['id']);
        $comments = getComments($_GET['id']);
        require('view/frontend/postView.php');
    }   
        else {
            echo 'Erreur : aucun identifiant de billet envoyé, try again';
        }
}
else {
    listPosts();
}
        ?>

    </div>