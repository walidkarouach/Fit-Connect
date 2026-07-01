<?php
require_once "../../app/Controllers/AbonnementController.php";
$controller = new AbonnementController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->store($_POST);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Ajouter</title>
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
            <h2>Créer un abonnement</h2>
            <form method="POST">
                <div class="field">
                    <label>Type d'abonnement</label>
                    <select name="type_abonnement" required>
                        <option value="Mensuel">Mensuel</option>
                        <option value="Trimestriel">Trimestriel</option>
                        <option value="Annuel">Annuel</option>
                    </select>
                </div>
                <div class="field">
                    <label>Date de début</label>
                    <input type="date" name="date_debut" required>
                </div>
                <div class="field">
                    <label>Date de fin</label>
                    <input type="date" name="date_fin" required>
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