<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';

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