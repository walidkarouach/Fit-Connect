<?php

require_once __DIR__ . '/../Services/AdherentService.php';

class AdherentController
{
    private $service;

    public function __construct()
    {
        $this->service = new AdherentService();
    }

    public function index()
    {
        return $this->service->getAll();
    }
}