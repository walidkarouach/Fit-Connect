<?php

require_once __DIR__ . '/../../config/config.php';

class SeanceRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    // Afficher toutes les séances
    public function findAll()
    {
        $sql = "SELECT * FROM SEANCE";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Afficher une seule séance
    public function findById($id)
    {
        $sql = "SELECT * FROM SEANCE WHERE id_seance = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajouter une séance
public function create($data)
{
    $sql = "INSERT INTO SEANCE
            (date_seance, type_activite, duree, equipement, id_salle, id_adherent)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        $data['date_seance'],
        $data['type_activite'],
        $data['duree'],
        $data['equipement'],
        $data['id_salle'],
        $data['id_adherent']
    ]);
}

    // Modifier une séance
public function update($id, $data)
{
    $sql = "UPDATE SEANCE
            SET
            date_seance = ?,
            type_activite = ?,
            duree = ?,
            equipement = ?,
            id_salle = ?,
            id_adherent = ?
            WHERE id_seance = ?";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        $data['date_seance'],
        $data['type_activite'],
        $data['duree'],
        $data['equipement'],
        $data['id_salle'],
        $data['id_adherent'],
        $id
    ]);
}

    // Supprimer une séance
    public function delete($id)
    {
        $sql = "DELETE FROM SEANCE WHERE id_seance = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }

    // Nombre de séances
    public function count()
    {
        $sql = "SELECT COUNT(*) FROM SEANCE";

        return $this->pdo->query($sql)->fetchColumn();
    }
}