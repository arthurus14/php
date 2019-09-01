<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>

<body>
    
    <?php
    //inclusion du menu
    include("php/menu.php");
     ?>
    <h1 id="titre">Bienvenue sur PHP hello</h1>
    <a href="php/bonjour.php?nom=Mariette&prenom=Jeremy">Dis moi bonjour</a>
    <p>
        <?php echo "nous sommes le : ";  echo date("d/m/y");
        $nom = "Jérémy";
        echo "mon nom est : ".$nom;

        $age = 10;

        if($age < 18){
            echo " tu es mineur";
        }else{
            echo " tu es majeur";
        }

        $note = 10;
        switch($note)
        {
            case 0://cas où $note vaut 0
                echo "Faut tout refaire";
            break;

            case 10:
                echo "Juste, mais encouragent";
            break;

            case 15:
                echo "Bien, tu es sur la bonne boie";
            break;

            case 20:
                echo "Parfait, rie que ça";
            break;

        }

        //boucle for
        for($i=0;$i<10;$i++){
            echo $i;
        }

        $repetition = 1;
        //boucle while
        while($repetition<10){
            echo "répétition ".$repetition."<br/>";
            $repetition++;
        }
        //On définit un tableau avec un système de clés => valeur
        $perso = array(
            'nom' => 'Arthurus',
            'type' => 'mage',
            'niveau' => 80
        );
        //On parcours le tableau avec une boucle foreach
        foreach($perso as $libelle => $valeur){
            echo "<p>".$libelle." : ".$valeur."</p><br/>";
        }
        ?>
    </p>

<h2>Connexion</h2>
<form method="POST" action="php/cible.php" enctype="multipart/form-data">

        <p><input type="text" name="id" placeholder="identifiant" required /></p>
        <p><input type="password" name="pwd" placeholder="mot de passe" required /></p>

        <p><input type="file" name="monFichier" /></p>
        
        <div class="checkbox-group required">
            <p><input type="checkbox" name="choix" value="virement" /><label for="choix">virement</label></p>
            <p><input type="checkbox" name="choix" value="prelevement" /><label for="choix">prélévement</label></p>
        </div>

        <input type="submit" value="connexion"/>

</form>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>