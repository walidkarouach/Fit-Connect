<?php

require_once "../config/Database.php";

class AdherentRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM adherent";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM adherent WHERE id_adherent = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO adherent
        (nom,prenom,email,telephone,date_inscription,id_abonnement,id_salle)
        VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone'],
            $data['date_inscription'],
            $data['id_abonnement'],
            $data['id_salle']
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM adherent WHERE id_adherent = ?";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
}