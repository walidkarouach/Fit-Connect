<?php

require_once "../config/Database.php";

class AbonnementRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        return $this->pdo
            ->query("SELECT * FROM abonnement")
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}