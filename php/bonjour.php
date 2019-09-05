<?php
session_start();

?>
<title>Bonjour</title>

<?php 
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    echo $_SESSION['mdp'];

    if(!empty($nom) && !empty($prenom)){
        echo "<h1>Bonjour ".$nom .' '.$prenom."</h1>";
    }else{
        echo "il manque des paramètres";
    }
?>

