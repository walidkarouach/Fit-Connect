<?php

require_once "../config/Database.php";

class SeanceRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        return $this->pdo
            ->query("SELECT * FROM seance")
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}