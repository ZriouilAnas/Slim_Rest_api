<?php

namespace Entite;

use Dao\Connexion;

use PDO;
class Produit  {
// Attributs
private $id;
private $nom;
private $description;
private $prix;
private $date_creation;












/**
 * Get the value of nom
 */ 
public function getNom()
{
return $this->nom;
}

 
public function setNom($nom)
{
$this->nom = $nom;

return $this;
}

/**
 * Get the value of description
 */ 
public function getDescription()
{
return $this->description;
}

 
public function setDescription($description)
{
$this->description = $description;

return $this;
}

/**
 * Get the value of prix
 */ 
public function getPrix()
{
return $this->prix;
}

 
public function setPrix($prix)
{
$this->prix = $prix;

return $this;
}

/**
 * Get the value of date_creation
 */ 
public function getDate_creation()
{
return $this->date_creation;
}

 
public function setDate_creation($date_creation)
{
$this->date_creation = $date_creation;

return $this;
}
}
?>