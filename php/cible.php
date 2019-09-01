<html>
    <title>Espace menbre</title>

    <body>

    <?php
        //htmlspecialchers pour éviter la faille xss
        $id = htmlspecialchars($_POST['id']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $choix = $_POST['choix'];
        $fichier = $_FILES['monFichier']['name'];
        $fichierType = $_FILES['monFichier']['type'];
        $fichierSize = $_FILES['monFichier']['size'];
        $fichierError = $_FILES['monFichier']['error'];
        $extension = pathinfo($fichier);

        //Vérifie que les variable ne osnt pas vides
        if(!empty($id) && !empty($pwd)){
            echo "Vous avez rempli les champs nécessaires";
            //Contrôle le contenu des variables
            if($id == 'moi' && $pwd == "mdp"){
                echo "vos identifiants sont correct";
                echo "votre choix est : ".$choix;
                echo "le nom du fichier est : ".$fichier.' type : '.$fichierType.' taille : '
                .$fichierSize.' Octets code erruer '.$fichierError.' extension : '.$extension['extension'];
                //Vérifie qu il n y a pas d erreurs et que le poids est correct 
                if($fichierError == 0 && $fichierSize < 1000000){
                        echo " le fichier ne contient pas d erreur et est inférieur à 1 Mo, il pèse : ".$fichierSize." Octets";
                        //upload du fichier dans le dossiser uploads
                        move_uploaded_file($_FILES['monFichier']['tmp_name'],'../uploads/'.basename($fichier));
                }else{
                    echo "Votre fichier est soit trop lourd, soit il contient une erreur";
                }

            }else{
                echo "vos identifiant ne sont pas corrects";
            }

        }else{
            echo "merci de remplir tous les champs";
        }

    ?>

    </body>
</html>