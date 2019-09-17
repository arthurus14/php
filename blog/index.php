<?php    
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
      
        addComment(htmlspecialchars($_POST['post_id']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
    }
    if($_GET['action'] == 'update' && !empty($_GET['id'])){
        update($_GET['id']);        
    }
   
}
else {
    listPosts();
} 

if($_GET['action'] == 'applyUpdate'){
    
    updateDb(htmlspecialchars($_POST['id']),htmlspecialchars($_POST['authorU']),htmlspecialchars($_POST['comment']));
    
}

}catch(Exception $e){
    echo 'Erreur : '.$e->getMessage();
}
