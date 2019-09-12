<?php

function getBillets(){

       //Connexion à la bdd
       $bdd = dbConnect();
      //Requête à la bdd
        $req = $bdd -> query('SELECT id,title,content, DATE_FORMAT(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY id DESC LIMIT 10');

      //Valeur de retour qui sera utilisée dans le view
        return $req;
}

function getPost($postId)
{
    $db = dbConnect();

    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
   $db = dbConnect();

    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}