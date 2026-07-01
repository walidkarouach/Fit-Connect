<?php
require_once __DIR__ . '/../../app/Controllers/AbonnementController.php';
$controller = new AbonnementController();
$abonnements = $controller->index();

function typeClass($type) {
    $type = strtolower($type);
    if (str_contains($type, 'mensuel')) return 'mensuel';
    if (str_contains($type, 'trimestriel')) return 'trimestriel';
    if (str_contains($type, 'annuel')) return 'annuel';
    return 'default';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Abonnements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <header>
        <div class="container nav">
            <div class="logo"><i class="ti ti-bolt"></i> FitConnect</div>
            <div class="nav-links">
                <a href="../dashboard/index.php">Dashboard</a>
                <a href="../adherents/index.php">Adhérents</a>
                <a href="index.php" class="active">Abonnements</a>
                <a href="../seances/index.php">Séances</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="action-bar">
            <a href="creat.php" class="btn-main"><i class="ti ti-plus"></i> Ajouter un abonnement</a>
        </div>
        <div class="box">
            <h2>Liste des abonnements (<?= count($abonnements) ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($abonnements)): ?>
                        <tr><td colspan="5" class="empty">Aucun abonnement trouvé.</td></tr>
                    <?php else: ?>
                        <?php foreach ($abonnements as $abonnement): ?>
                        <tr>
                            <td><strong>#<?= $abonnement['id_abonnement'] ?></strong></td>
                            <td><span class="badge <?= typeClass($abonnement['type_abonnement']) ?>"><?= htmlspecialchars($abonnement['type_abonnement']) ?></span></td>
                            <td><?= htmlspecialchars($abonnement['date_debut']) ?></td>
                            <td><?= htmlspecialchars($abonnement['date_fin']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $abonnement['id_abonnement'] ?>" class="btn-action-edit">Modifier</a>
                                <a href="../../app/Controllers/AbonnementController.php?action=delete&id=<?= $abonnement['id_abonnement'] ?>" class="btn-action-del" onclick="return confirm('Supprimer ?');">Supprimer</a>
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