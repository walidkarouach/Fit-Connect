<?php

class Adherent{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $dateInscription;
    private $idAbonnement;
    private $idSalle;
}   
public function __construct(
    $id,
    $nom,
    $prenom,
    $email,
    $telephone,
    $dateInscription,
    $idAbonnement,
    $idSalle
) {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->telephone = $telephone;
    $this->dateInscription = $dateInscription;
    $this->idAbonnement = $idAbonnement;
    $this->idSalle = $idSalle;
}
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function getIdAbonnement()
    {
        return $this->idAbonnement;
    }

    public function getIdSalle()
    {
        return $this->idSalle;
    }
}