<?php
require('Personnage.php');
echo "Combat game :<br/>";

$data = array(
    'id' => 5,
    'nom' => 'Arthurus',
    'degats' => 0
  );

  $data1 = array(
    'id' => 4,
    'nom' => 'Arthurus1',
    'degats' => 0
  );

$perso = new Personnage($data);

$perso1 = new Personnage($data1);

$perso->nom();
echo "<br/>";
$perso->id();
echo "<br/>";
$perso->degats();

echo "<hr/>";
$perso1->nom();
echo "<br/>";
$perso1->id();
echo "<br/>";
$perso1->degats();
echo "<br/>";
//Bug
echo "<hr/>";
$perso->frapper($perso1);

echo "<br/>";

$perso1->degats();




?>