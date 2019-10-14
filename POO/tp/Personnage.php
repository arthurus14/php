<?php
class Personnage{

private $_id;
private $_nom;
private $_degats;

const CEST_MOI = "Je vais pas me frapper moi même !!!";
const PERSONNAGE_TUE = "KO";
const PERSONNAGE_FRAPPE = "Prends ça !";

//Le constructeur appel la fonction hydrate, il est important que l'objet est un array en paramètre
public function __construct(array $donnees)
{
  $this->hydrate($donnees);
}



    public function frapper(Personnage $perso){

        if($perso->id() == $this->_id){
            echo self::CEST_MOI;
           
        }else{
        return $perso->recevoirDegats();
        }
    }
    public function recevoirDegats(){
        $this->_degats +=5;

        if($this->_degats >=100){
            echo self::PERSONNAGE_TUE;
        }
        echo self::PERSONNAGE_FRAPPE;
    }

    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

   
    //Getters

      
  public function degats()
  {
    echo $this->_nom. " prend ".$this->_degats." points de dégats";
  }
  
  public function id()
  {
   return $this->_id;
  }
  
  public function nom()
  {
    echo "nom :".$this->_nom;
  }
  //Setters
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
     return $this->_degats = $degats;
    }
  }
  
  public function setId($id)
  {
    $id = (int) $id;
    
    if ($id > 0)
    {
     return $this->_id = $id;
    }
  }
  
  public function setNom($nom)
  {
    if (is_string($nom))
    {
     return $this->_nom = $nom;
    }
  }

}

?>