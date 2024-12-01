<?php

namespace dao;
use dao\Connexion;
use PDO;
class ProduitDao  {
    private  $connexion; 
    public function __construct() {
       
        $connexion = new Connexion();
        $this->connexion = $connexion->getConnexion();    
    }
    
public function create($produit) {
    $sql = "INSERT INTO t_produit (nom, description, prix, date_creation) 
            VALUES (:nom, :description, :prix, :date_creation)";
    
    $sqlState = $this->connexion->prepare($sql);

    
    $nom = $produit->getNom();
    $description = $produit->getDescription();
    $prix = $produit->getPrix();
    $date_creation = $produit->getDate_creation();

    
    $sqlState->bindParam(":nom", $nom);
    $sqlState->bindParam(":description", $description);
    $sqlState->bindParam(":prix", $prix);
    $sqlState->bindParam(":date_creation", $date_creation);
    
    return $sqlState->execute();
}

public function findAll(){
    
     return $this->connexion->query('SELECT * FROM `t_produit`')->fetchAll(PDO::FETCH_ASSOC);
}
public function findById($id){
    $sqlState = $this->connexion->prepare('SELECT * FROM `t_produit` WHERE id=?');
     $sqlState->execute([$id]); 
     $sqlState->setFetchMode(PDO::FETCH_ASSOC) ;
     return $sqlState->fetch();
}
public function delete($id){
    $sqlState = $this->connexion->prepare('DELETE FROM t_produit WHERE id=?');
     return $sqlState->execute([$id]);
}
public function update($produit){
     $sql = "UPDATE t_produit 
            SET nom = :nom, 
                description = :description, 
                prix = :prix, 
                date_creation = :date_creation
            WHERE id = :id";

    $sqlState = $this->connexion->prepare($sql);

    $id = $produit->getId();
    $nom = $produit->getNom();
    $description = $produit->getDescription();
    $prix = $produit->getPrix();
    $date_creation = $produit->getDate_creation();

    $sqlState->bindParam(":id", $id);
    $sqlState->bindParam(":nom", $nom);
    $sqlState->bindParam(":description", $description);
    $sqlState->bindParam(":prix", $prix);
    $sqlState->bindParam(":date_creation", $date_creation);
    
    return $sqlState->execute();
}
}