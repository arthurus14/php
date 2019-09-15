<?php
class PostManager{

public function getBillet(){

       //Connexion à la bdd
       $db = $this->dbConnect();
      //Requête à la bdd
        $req = $db -> query('SELECT id,title,content, DATE_FORMAT(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY id DESC LIMIT 10');

      //Valeur de retour qui sera utilisée dans le view
        return $req;
}

public function getPost($postId)
{
  
    $db = $this->dbConnect();

    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
   
}




// Nouvelle fonction qui nous permet d'éviter de répéter du code
private function dbConnect()
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
}

?>