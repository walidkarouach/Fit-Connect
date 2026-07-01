<?php
require_once __DIR__ . '/../../app/Controllers/AdherentController.php';

$controller = new AdherentController();

if (!isset($_GET['id'])) {
    die("ID introuvable.");
}

$id = $_GET['id'];
$adherent = $controller->show($id);

if (!$adherent) {
    die("Adhérent introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "nom"              => $_POST["nom"],
        "prenom"           => $_POST["prenom"],
        "email"            => $_POST["email"],
        "telephone"        => $_POST["telephone"],
        "date_inscription" => $_POST["date_inscription"],
        "id_abonnement"    => $_POST["id_abonnement"],
        "id_salle"         => $_POST["id_salle"]
    ];

    $controller->update($id, $data);
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
            <div class="nav-links">
                <a href="index.php">Retour à la liste</a>
            </div>
        </div>
    </header>

    <div class="container-form">
        <div class="box">
            <h2>Modifier l'adhérent #<?= htmlspecialchars($adherent['id_adherent']) ?></h2>
            
            <form method="POST">
                <div class="grid-2">
                    <div class="field">
                        <label>Nom</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($adherent['nom']) ?>" required>
                    </div>
                    <div class="field">
                        <label>Prénom</label>
                        <input type="text" name="prenom" value="<?= htmlspecialchars($adherent['prenom']) ?>" required>
                    </div>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($adherent['email']) ?>" required>
                </div>

                <div class="grid-2">
                    <div class="field">
                        <label>Téléphone</label>
                        <input type="text" name="telephone" value="<?= htmlspecialchars($adherent['telephone']) ?>" required>
                    </div>
                    <div class="field">
                        <label>Date d'inscription</label>
                        <input type="date" name="date_inscription" value="<?= htmlspecialchars($adherent['date_inscription']) ?>" required>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="field">
                        <label>ID Abonnement</label>
                        <input type="number" name="id_abonnement" value="<?= htmlspecialchars($adherent['id_abonnement']) ?>" required>
                    </div>
                    <div class="field">
                        <label>ID Salle</label>
                        <input type="number" name="id_salle" value="<?= htmlspecialchars($adherent['id_salle']) ?>" required>
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