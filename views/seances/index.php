<?php
require_once __DIR__ . '/../../app/Controllers/SeanceController.php';

$controller = new SeanceController();
$seances = $controller->index();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Séances</title>
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
                <a href="../abonnements/index.php">Abonnements</a>
                <a href="index.php" class="active">Séances</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="action-bar">
            <a href="creat.php" class="btn-main"><i class="ti ti-plus"></i> Ajouter une séance</a>
        </div>

        <div class="box">
            <h2>Liste des séances (<?= count($seances) ?>)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Activité</th>
                        <th>Date & Heure</th>
                        <th>Salle (ID)</th>
                        <th>Adhérent (ID)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($seances)): ?>
                        <tr>
                            <td colspan="6" class="empty">Aucune séance trouvée.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($seances as $seance): ?>
                        <tr>
                            <td><strong>#<?= $seance['id_seance'] ?></strong></td>
                            <td>
                                <span class="badge mensuel">
                                    <?= htmlspecialchars($seance['type_activite']) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($seance['date_seance']) ?></td>
                            <td> <?= htmlspecialchars($seance['id_salle']) ?></td>
                            <td> <?= htmlspecialchars($seance['id_adherent']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $seance['id_seance'] ?>" class="btn-action-edit">Modifier</a>
                                <a href="../../app/Controllers/SeanceController.php?action=delete&id=<?= $seance['id_seance'] ?>" 
                                   class="btn-action-del" 
                                   onclick="return confirm('Supprimer cette séance ?');">Supprimer</a>
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