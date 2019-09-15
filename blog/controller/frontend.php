<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function post($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    
    require('view/frontend/postView.php');
    
}


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getBillet(); // Appel d'une fonction de cet objet
    
    require('view/frontend/affichageAccueil.php');
}




function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?id=' . $postId);
    }
}