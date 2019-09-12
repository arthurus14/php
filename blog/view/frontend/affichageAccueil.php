<?php

 //Cette page est appelée juste après la requête SQL
 //Parcours de la boucle
 while($data = $posts->fetch()){

    echo "<p><strong>".$data['title']."</strong> : ".$data['content']." ".$data['date_fr']."</p>";
    echo '<a href="index.php?id='.$data['id'].' "/>Commentaire</a>';
}

?>