<?php
require_once __DIR__ . '/../../app/Controllers/AdherentController.php';

$controller = new AdherentController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "nom"              => $_POST["nom"],
        "prenom"           => $_POST["prenom"],
        "email"            => $_POST["email"],
        "telephone"        => $_POST["telephone"],
        "date_inscription" => date("Y-m-d"),
        "id_abonnement"    => 1,
        "id_salle"         => 1
    ];

    $controller->store($data);
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
            <div class="nav-links">
                <a href="index.php">Retour à la liste</a>
            </div>
        </div>
    </header>

    <div class="container-form">
        <div class="box">
            <h2>Ajouter un nouvel adhérent</h2>
            
            <form method="POST">
                <div class="field">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="Ex: Alami" required>
                </div>

                <div class="field">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="Ex: Youssef" required>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Ex: youssef@mail.com" required>
                </div>

                <div class="field">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" placeholder="Ex: 0612345678" required>
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