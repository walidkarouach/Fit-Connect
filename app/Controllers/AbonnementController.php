<?php

require_once "../Services/AbonnementService.php";

class AbonnementController
{
    private $service;

    public function __construct()
    {
        $this->service = new AbonnementService();
    }

    public function index()
    {
        return $this->service->getAll();
    }
}