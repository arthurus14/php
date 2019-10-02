<?php
class Personnage
{
  private $_degats; // Les dégâts du personnage.
  private $_experience; // L'expérience du personnage.
  private $_force; // La force du personnage (plus elle est grande, plus l'attaque est puissante).

  //Attibut static
  private static $text = "Bienvenue dans la variable static <br/>";

  private static $_compteur = 0;
        
  public function __construct($force, $degats) // Constructeur demandant 2 paramètres
  {
    echo 'Voici le constructeur !<br/>'; // Message s'affichant une fois que tout objet est créé.
    $this->setForce($force); // Initialisation de la force.
    //$this->setDegats($degats); // Initialisation des dégâts.
    $this->_experience = 1; // Initialisation de l'expérience à 1.

    self::$_compteur++;
  }

  public static function getCompteur(){
    echo "La classe a été instanciée : ".self::$_compteur." fois<br>";
  }
 
 
  public function gagnerExperience()
  {
    // On ajoute 1 à notre attribut $_experience.
    $this->_experience++;
   
  }
  public function frapper(Personnage $persoAFrapper){
      $persoAFrapper->_degats += $this->_force;
  }


  

//Setters

 // Mutateur chargé de modifier l'attribut $_force.
 public function setForce($force)
 {
   if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
   {
     trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
     return;
   }
   
   if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
   {
     trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
     return;
   }
   
   $this->_force = $force;
 }
 
 // Mutateur chargé de modifier l'attribut $_experience.
 public function setExperience($experience)
 {
   if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
   {
     trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
     return;
   }
   
   if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
   {
     trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
     return;
   }
   
   $this->_experience = $experience;
 }


//Getters


  public function experience(){
    return $this->_experience;
  }
  public function force(){
    return $this->_force;
  }
  public function degats(){
    return $this->_degats;
  }

  //Static

  public static function Hello(){
    echo self :: $text;
  }
}