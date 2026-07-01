<?php
require_once "../../app/Controllers/SeanceController.php";

$controller = new SeanceController();
$id = $_GET['id'];
$seance = $controller->show($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->update($id, $_POST);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Modifier une séance</title>
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
            <h2>Modifier la séance #<?= htmlspecialchars($seance['id_seance']) ?></h2>
            
            <form method="POST">
                <div class="field">
                    <label>Activité</label>
                    <select name="activite" required>
                        <option value="Musculation" <?= $seance['type_activite'] == 'Musculation' ? 'selected' : '' ?>>Musculation</option>
                        <option value="Cardio" <?= $seance['type_activite'] == 'Cardio' ? 'selected' : '' ?>>Cardio</option>
                        <option value="Fitness" <?= $seance['type_activite'] == 'Fitness' ? 'selected' : '' ?>>Fitness</option>
                        <option value="Yoga" <?= $seance['type_activite'] == 'Yoga' ? 'selected' : '' ?>>Yoga</option>
                    </select>
                </div>

                <div class="grid-2">
                    <div class="field">
                        <label>Date de la séance</label>
                        <input type="date" name="date_seance" value="<?= htmlspecialchars($seance['date_seance']) ?>" required>
                    </div>
                <div class="grid-2">
                    <div class="field">
                        <label>ID Salle</label>
                        <input type="number" name="id_salle" value="<?= htmlspecialchars($seance['id_salle']) ?>" min="1" required>
                    </div>
                    <div class="field">
                        <label>ID Adhérent</label>
                        <input type="number" name="id_adherent" value="<?= htmlspecialchars($seance['id_adherent']) ?>" min="1" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit edit">Modifier</button>
                    <a href="index.php" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>