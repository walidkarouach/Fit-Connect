<?php

require_once "../Services/AdherentService.php";

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