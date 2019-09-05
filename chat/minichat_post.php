<?php
//Ouverture de session
session_start();

//On récupère les variables
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

$_SESSION['pseudo'] = $pseudo;
//Connexion à la bdd
$bdd = new PDO('mysql:host=localhost;dbname=chat','root','root');

//Requête sql
$req = $bdd->prepare('INSERT INTO minichat (pseudo,msg,date_creation) VALUES (?,?,NOW()) ');
$req->execute(array(
    $pseudo,
    $message
));
//Retour à la page précedente
header('location:minichat.php');
?>