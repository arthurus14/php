<?php
//Protection faille XSS
$mdp = htmlspecialchars($_POST['pwd']);

//Si $mdp n est pas vide et est égale à kangourou
if(!empty($mdp) && $mdp == "kangourou"){
    echo "le mot de passe est correct </br>";

    echo "<p>le code du serveur est : 123-ABC-456-CDE</p>";
    print_r($_SERVER);
//Sinon
}else{
    echo "le mot de passe est incorrect";
}

?>