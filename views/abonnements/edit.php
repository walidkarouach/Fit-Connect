<?php
require_once "../../app/Controllers/AbonnementController.php";
$controller = new AbonnementController();
$id = $_GET['id'];
$abonnement = $controller->show($id);

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
    <title>FitConnect — Modifier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links"><a href="index.php">Retour à la liste</a></div>
        </div>
    </header>

    <div class="container-form">
        <div class="box">
            <h2>Modifier l'abonnement #<?= htmlspecialchars($abonnement['id_abonnement']) ?></h2>
            <form method="POST">
                <div class="field">
                    <label>Type d'abonnement</label>
                    <select name="type_abonnement" required>
                        <option value="Mensuel" <?= $abonnement['type_abonnement'] == 'Mensuel' ? 'selected' : '' ?>>Mensuel</option>
                        <option value="Trimestriel" <?= $abonnement['type_abonnement'] == 'Trimestriel' ? 'selected' : '' ?>>Trimestriel</option>
                        <option value="Annuel" <?= $abonnement['type_abonnement'] == 'Annuel' ? 'selected' : '' ?>>Annuel</option>
                    </select>
                </div>
                <div class="field">
                    <label>Date de début</label>
                    <input type="date" name="date_debut" value="<?= htmlspecialchars($abonnement['date_debut']) ?>" required>
                </div>
                <div class="field">
                    <label>Date de fin</label>
                    <input type="date" name="date_fin" value="<?= htmlspecialchars($abonnement['date_fin']) ?>" required>
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