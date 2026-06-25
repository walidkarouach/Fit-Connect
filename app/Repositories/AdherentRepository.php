<?php

require_once __DIR__ . '/../../config/config.php';

class AdherentRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM ADHERENT";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM ADHERENT WHERE id_adherent = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO ADHERENT
        (nom, prenom, email, telephone, date_inscription, id_abonnement, id_salle)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

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

    public function update($id, $data)
    {
        $sql = "UPDATE ADHERENT SET
                nom = ?,
                prenom = ?,
                email = ?,
                telephone = ?,
                date_inscription = ?,
                id_abonnement = ?,
                id_salle = ?
                WHERE id_adherent = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone'],
            $data['date_inscription'],
            $data['id_abonnement'],
            $data['id_salle'],
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM ADHERENT WHERE id_adherent = ?";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
}