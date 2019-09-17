<?php $title = 'Mon blog'; ?>

<?php
    if($_GET['action'] == "update"){
        ?>

        <?php
    }else{
       ?>
    <h2>Commentaires</h2>

<form action="index.php?id=<?php echo $post['id']; ?> " method="post">
    <div>
        <label for="author">Auteur à enregister</label><br />
        <input type="text" id="author" name="author" />
    </div>

    <div>
        <input type="hidden"  name="post_id"  value="<?php echo $post['id']; ?>"/>
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php
//Va encapsuler le contenu HTML
ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= (htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> </p> 
          <?php  echo '<a href="index.php?action=update&id='.$comment['id'].' "/>Modifier</a>'; ?>
        <?php
        }
        ?>

<?php
//Retourne le contenu HTML
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

<?php
    }
?>
        
    </body>
</html>