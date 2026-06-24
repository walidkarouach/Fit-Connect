<?php

require_once "../Repositories/AdherentRepository.php";

class AdherentService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AdherentRepository();
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }
}