<?php
//Ouverture de session
session_start();

//Teste valeur de session
//var_dump($_SESSION['pseudo']);

//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mini chat</title>
</head>
<body>
    <h1>CHAT</h1>

    <form method="POST" action="minichat_post.php">

        <?php
            //Si session existe alors faire cela
            if(!empty($_SESSION['pseudo'])){
                echo '<p><input type="text" name="pseudo" value="'.$_SESSION['pseudo'].'" required/></p>';
            }else{
            //Sinon faire ceci
                echo '<p><input type="text" name="pseudo" placeholder="pseudo" required/></p>';
            }
        ?>
        
        <p><textarea type="text" name="message" placeholder="message" required></textarea></p>

        <input type="submit" value="envoyer"/>

    </form>


    <div>
        <h2>messages :</h2>

        <?php
        //Connexion à la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=chat','root','root');
        //Requête à la bdd
        $req = $bdd -> query('SELECT pseudo,msg, DATE_FORMAT(date_creation, \'%d/%m/%y à %Hh%imin%ss\') AS date_fr FROM minichat ORDER BY date_fr DESC LIMIT 10');
        //Parcours de la boucle
        while($data = $req->fetch()){

            echo "<p>".$data['date_fr']." <strong>".$data['pseudo']."</strong> : ".$data['msg']."</p>";
        }
        ?>

    </div>
</body>
</html>