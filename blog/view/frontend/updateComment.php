<?php 
$title = 'Mon blog'; ?>



<h2>Modifier Commentaires</h2>

<form action="index.php?action=applyUpdate" method="post">
    <div>
        <label for="authorU">Auteur</label><br />
        <input type="text" id="authorU" name="authorU" value='<?php echo $update['author']; ?>' />
    </div>

    <div>
        <input type="hidden"  name="post_id" value="<?php echo $update['post_id'];  ?>" />
    </div>
    <div>
        <input type="hidden"  name="id" value="<?php echo $update['id'];  ?>" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment" > <?php echo $update['comment']; ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>



<?php var_dump($update['post_id']); ?>
        
    </body>
</html>