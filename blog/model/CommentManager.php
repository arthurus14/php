<?php
class CommentManager{


    public function getComments($postId)
    {
        try{
       $db = $this->dbConnect();
    
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
        }catch(Exception $e){
            die('getComments error '.$e->getMessage());
        }
    }
    
    public function postComment($postId, $author, $comment){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires (post_id,author,comment,comment_date) VALUES (?,?,?,NOW())');
          $affectedLines = $comments->execute(array(
               $postId, 
               $author, 
               $comment
           ));
       
           return $affectedLines;
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