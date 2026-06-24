<?php

require_once "../Repositories/AbonnementRepository.php";

class AbonnementService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AbonnementRepository();
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }
}