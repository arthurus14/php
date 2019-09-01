<title>Bonjour</title>

<?php 
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];


    if(!empty($nom) && !empty($prenom)){
        echo "<h1>Bonjour ".$nom .' '.$prenom."</h1>";
    }else{
        echo "il manque des paramètres";
    }
?>

