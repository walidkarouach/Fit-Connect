<?php

class Abonnement
{
    private $id;
    private $type;
    private $dateDebut;
    private $dateFin;

    public function __construct(
        $id,
        $type,
        $dateDebut,
        $dateFin
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }
}