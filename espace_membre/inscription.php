<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST" action="">

        <p><input type="text" name="pseudo" placeholder="pseudo" required></input></p>

        <p><input type="password" name="mdp1" placeholder="mot de passe" required></input></p>
        <p><input type="password" name="mdp2" placeholder="confirmation mot de passe" required></input></p>

        <p><input type="text" name="email" placeholder="email" required></input></p>

        <p><input type="submit" value="Inscription"></input></p>
    </form>


    <?php


    $bdd = new PDO ('mysql:host=localhost;dbname=chat','root','root');

    
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp1'])  && !empty($_POST['mdp2'])  && !empty($_POST['email'])){
            
            if($_POST['mdp1'] == $_POST['mdp2']){
                echo "Les mots de passes sont identiques";
                
                // Hachage du mot de passe
                $pass_hache = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);

                $req = $bdd->prepare('INSERT INTO membres (pseudo,pass,email,date_inscription) VALUES (?,?,?,NOW())');
                $req ->execute(array(
                    $_POST['pseudo'],
                    $pass_hache,
                    $_POST['email'])
                );





            }else{
                echo "Une erreur est survenue lors de la confirmation di mot de passe";
            }

        }else{
            echo "merci de remplir tous les champs";
        }

    ?>

</body>
</html>