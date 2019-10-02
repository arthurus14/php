<title>POO</title>
<?php
require('Personnage.php');
require('Perso.php');
require('PersoManager.php');
require('hydrate.php');
$perso1 = new Personnage(60,0);
$perso2 = new Personnage(100,10);


$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);


$perso1->frapper($perso2);  // $perso1 frappe $perso2
$perso1->gagnerExperience(); // $perso1 gagne de l'expérience

$perso2->frapper($perso1);  // $perso2 frappe $perso1
$perso2->gagnerExperience(); // $perso2 gagne de l'expérience

//Appel d'une fonction static
Personnage::Hello();

Personnage::getCompteur();

echo 'Le personnage 1 a ', $perso1->force(), ' de force, contrairement au personnage 2 qui a ', $perso2->force(), ' de force.<br />';
echo 'Le personnage 1 a ', $perso1->experience(), ' d\'expérience, contrairement au personnage 2 qui a ', $perso2->experience(), ' d\'expérience.<br />';
echo 'Le personnage 1 a ', $perso1->degats(), ' de dégâts, contrairement au personnage 2 qui a ', $perso2->degats(), ' de dégâts.<br />';

echo "<hr/>";



// On admet que $db est un objet PDO.
$bdd = new PDO('mysql:host=localhost;dbname=personnage','root','root');
$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM perso');
    
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
  // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
  
 
  $perso = new Perso($donnees);
        
  echo $perso->nom(), ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau().'<br/>';
 
}

echo "<hr/>";

//Hydratation


// On admet que $db est un objet PDO.
$bdd = new PDO('mysql:host=localhost;dbname=personnage','root','root');
$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM perso');
    
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
  // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
  
 
  $perso = new Hydrate($donnees);
        
  echo $perso->nom(), ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau().'<br/>';
 
}
echo "<hr/>";
//Gestion de la BDD

$data = array(
  'nom' => 'Arthurus',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 1
);

//echo "tableau ".$data['nom'];

$persoM = new Hydrate($data);
//$persoM = new Perso($data);
   // var_dump($data);

    echo $persoM->nom()."<br/>";
    echo $persoM->experience();
  
$db = new PDO('mysql:host=localhost;dbname=personnage','root','root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$manager = new PersonnagesManager($db);
$manager->add($persoM);

?>