<?php

require_once "../Repositories/SeanceRepository.php";

class SeanceService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SeanceRepository();
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }
}