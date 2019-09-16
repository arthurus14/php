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
        
        post($_GET['id']);
       
    }   
        else {
                 // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                 throw new Exception('Aucun identifiant de billet envoyé');
        }

    if(!empty($_POST['author'])){
      
        addComment($_POST['post_id'], $_POST['author'], $_POST['comment']);
    }
    if($_GET['action'] == 'update' && !empty($_GET['id'])){
        update($_GET['id']);        
    }
   
}
else {
    listPosts();
} 

if($_GET['action'] == 'applyUpdate'){
    echo "applyUpdate ".$_POST['id']."  auteur : ".$_POST['authorU']." commentaire ".$_POST['comment'];
    updateDb($_POST['id'],$_POST['authorU'],$_POST['comment']);
}

}catch(Exception $e){
    echo 'Erreur : '.$e->getMessage();
}
