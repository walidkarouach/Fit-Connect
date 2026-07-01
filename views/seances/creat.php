<?php
require_once __DIR__ . '/../../app/Controllers/SeanceController.php';

$controller = new SeanceController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->store($_POST);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Ajouter une séance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="index.php">Retour à la liste</a>
            </div>
        </div>
    </header>

    <div class="container-form">
        <div class="box">
            <h2>Créer une nouvelle séance</h2>

            <form method="POST">

                <div class="field">
                    <label>Activité</label>
                    <select name="type_activite" required>
                        <option value="Musculation">Musculation</option>
                        <option value="Cardio">Cardio</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Yoga">Yoga</option>
                    </select>
                </div>

                <div class="grid-2">

                    <div class="field">
                        <label>Date de la séance</label>
                        <input type="date" name="date_seance" required>
                    </div>

                    <div class="field">
                        <label>Durée (minutes)</label>
                        <input type="number" name="duree" required>
                    </div>

                </div>

                <div class="field">
                    <label>Équipement</label>
                    <input type="text" name="equipement" placeholder="Ex : Tapis, Haltères...">
                </div>

                <div class="grid-2">

                    <div class="field">
                        <label>ID Salle</label>
                        <input type="number" name="id_salle" placeholder="Ex: 1" min="1" required>
                    </div>

                    <div class="field">
                        <label>ID Adhérent</label>
                        <input type="number" name="id_adherent" placeholder="Ex: 1" min="1" required>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit save">Enregistrer</button>
                    <a href="index.php" class="btn-cancel">Annuler</a>
                </div>

            </form>

        </div>
    </div>

</body>
</html>