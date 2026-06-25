<?php

require_once "../Services/SeanceService.php";

class SeanceController
{
    private $service;

    public function __construct()
    {
        $this->service = new SeanceService();
    }

    public function index()
    {
        return $this->service->getAll();
    }
}