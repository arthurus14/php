<?php

namespace Arthurus\Blog;

class Manager{


// Nouvelle fonction qui nous permet d'éviter de répéter du code
protected function dbConnect()
{
    try
    {
        // \PDO pour utiliser la fonction php avec un namespace
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
}



?>