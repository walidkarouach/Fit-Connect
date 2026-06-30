<?php

require_once __DIR__ . '/../../config/config.php';

class AbonnementRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        return $this->pdo->query("SELECT * FROM ABONNEMENT")
                         ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ABONNEMENT WHERE id_abonnement=?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO ABONNEMENT(type_abonnement,date_debut,date_fin)
            VALUES(?,?,?)
        ");

        return $stmt->execute([
            $data['type_abonnement'],
            $data['date_debut'],
            $data['date_fin']
        ]);
    }

    public function update($id,$data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE ABONNEMENT
            SET
            type_abonnement=?,
            date_debut=?,
            date_fin=?
            WHERE id_abonnement=?
        ");

        return $stmt->execute([
            $data['type_abonnement'],
            $data['date_debut'],
            $data['date_fin'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt=$this->pdo->prepare("
            DELETE FROM ABONNEMENT
            WHERE id_abonnement=?
        ");

        return $stmt->execute([$id]);
    }

    public function count()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM ABONNEMENT")
                         ->fetchColumn();
    }
}