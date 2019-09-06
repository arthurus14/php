<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST" action="">

        <p><input type="text" name="pseudo" placeholder="pseudo" required></input></p>

        <p><input type="password" name="mdp" placeholder="mot de passe" required></input></p>
        
        <p><input type="submit" value="Connexion"></input></p>
    </form>


    <?php


    $bdd = new PDO ('mysql:host=localhost;dbname=chat','root','root');

    
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) ){
            
           
                
                // Hachage du mot de passe
                $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

                $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
                $req ->execute(array(
                    $_POST['pseudo']
                ));
                $resultat = $req->fetch();


                $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['pass']);

                if($isPasswordCorrect){

                    echo "les identifiants sont correct, bienvenu";
                    //Ajouter des sessions

                }else{
                    echo "Mauvais mot de passe";

                    echo $resultat['pass']."</br>";
                    echo $pass_hache."</br>";
                }





           

        }else{
            echo "merci de remplir tous les champs";
        }

    ?>

</body>
</html>