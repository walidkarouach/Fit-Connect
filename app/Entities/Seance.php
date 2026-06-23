<?php

class Seance
{
    private $id;
    private $dateSeance;
    private $typeActivite;
    private $duree;
    private $equipement;
    private $idSalle;
    private $idAdherent;

    public function __construct(
        $id,
        $dateSeance,
        $typeActivite,
        $duree,
        $equipement,
        $idSalle,
        $idAdherent
    ) {
        $this->id = $id;
        $this->dateSeance = $dateSeance;
        $this->typeActivite = $typeActivite;
        $this->duree = $duree;
        $this->equipement = $equipement;
        $this->idSalle = $idSalle;
        $this->idAdherent = $idAdherent;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateSeance()
    {
        return $this->dateSeance;
    }

    public function getTypeActivite()
    {
        return $this->typeActivite;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getEquipement()
    {
        return $this->equipement;
    }

    public function getIdSalle()
    {
        return $this->idSalle;
    }

    public function getIdAdherent()
    {
        return $this->idAdherent;
    }
}