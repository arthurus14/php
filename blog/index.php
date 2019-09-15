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

try{
if (isset($_GET['id'])) {

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        //$post = getPost($_GET['id']);
        //$comments = getComments($_GET['id']);
        post($_GET['id']);
        //require('view/frontend/postView.php');
    }   
        else {
                 // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                 throw new Exception('Aucun identifiant de billet envoyé');
        }

    if(!empty($_POST['author'])){
      
        addComment($_POST['post_id'], $_POST['author'], $_POST['comment']);
    }
}
else {
    listPosts();
}

}catch(Exception $e){
    echo 'Erreur : '.$e->getMessage();
}
