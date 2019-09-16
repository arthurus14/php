<?php

require_once("model/Manager.php");

class CommentManager extends Manager{


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

    public function updateComment($id){

        try{
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM commentaires WHERE id = ?');
        $req->execute(array($id));
        $update = $req->fetch();

        

        return $update;
        }catch(Exception $e){
            die('update error '.$e->getMessage());
        }

    }
    

    public function updateBDD($id,$author,$comment){

        try{
        $db = $this->dbConnect();

        $updateBd = $db->prepare("UPDATE commentaires SET author = :author , comment = :comment  WHERE id = :id ");
        $updateBd->execute(array(
            'author' => $author,
            'comment' => $comment,
            'id' => $id
        ));
        
        }catch(Exception $e){
            die('update error '.$e->getMessage());
        }

    }

}
?>