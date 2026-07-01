<?php
require_once __DIR__ . '/../../app/Controllers/AdherentController.php';

$controller = new AdherentController();
$adherents = $controller->index();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Adhérents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="../dashboard/index.php">Dashboard</a>
                <a href="index.php" class="active">Adhérents</a>
                <a href="../abonnements/index.php">Abonnements</a>
                <a href="../seances/index.php">Séances</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="action-bar">
            <a href="creat.php" class="btn-main"><i class="ti ti-user-plus"></i> Ajouter un adhérent</a>
        </div>

        <div class="box">
            <h2>Liste des adhérents (<?= count($adherents) ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Membre</th>
                        <th>Téléphone</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($adherents)): ?>
                        <tr>
                            <td colspan="5" class="empty">Aucun adhérent trouvé.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($adherents as $adherent): ?>
                        <tr>
                            <td><strong>#<?= $adherent['id_adherent'] ?></strong></td>
                            <td>
                                <div class="member-info">
                                    <span class="member-name"><?= htmlspecialchars($adherent['prenom'] . ' ' . $adherent['nom']) ?></span>
                                    <span class="member-email"><?= htmlspecialchars($adherent['email']) ?></span>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($adherent['telephone']) ?></td>
                            <td><?= htmlspecialchars($adherent['date_inscription']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $adherent['id_adherent'] ?>" class="btn-action-edit">Modifier</a>
                                <a href="../../app/Controllers/AdherentController.php?action=delete&id=<?= $adherent['id_adherent'] ?>" 
                                   class="btn-action-del" 
                                   onclick="return confirm('Supprimer cet adhérent ?');">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>