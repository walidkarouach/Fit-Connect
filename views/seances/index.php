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
    
    <style>
        /* ===== BASE SYSTEM ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            background: #f8fafc;
            color: #333;
            padding-bottom: 40px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== TOP NAVIGATION ===== */
        header {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 18px;
            font-weight: 700;
            color: #2563eb;
        }
        .nav-links a {
            color: #64748b;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }
        .nav-links a.active {
            color: #2563eb;
            font-weight: 600;
        }

        /* ===== ACTIONS BAR ===== */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn-main {
            background: #2563eb;
            color: #ffffff;
            padding: 10px 18px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 6px;
            font-weight: 600;
        }
        .btn-main:hover {
            background: #1d4ed8;
        }

        /* ===== TABLE CONTENT ===== */
        .box {
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .box h2 {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th {
            background: #f8fafc;
            text-align: left;
            padding: 12px;
            color: #64748b;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
        }
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f1f5f9;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover td {
            background: #f8fafc;
        }

        /* ===== BADGES & ACTIONS ===== */
        .badge-activity {
            background: #eff6ff;
            color: #2563eb;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }
        .btn-edit {
            color: #b45309;
            text-decoration: none;
            font-weight: 600;
            margin-right: 12px;
        }
        .btn-del {
            color: #991b1b;
            text-decoration: none;
            font-weight: 600;
        }
        .empty {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }
    </style>
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
                                <span class="badge-activity">
                                    <?= htmlspecialchars($seance['type_activite']) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($seance['date_seance']) ?></td>
                            <td>Mosaïque (ID: <?= htmlspecialchars($seance['id_salle']) ?>)</td>
                            <td>ID: <?= htmlspecialchars($seance['id_adherent']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $seance['id_seance'] ?>" class="btn-edit">Modifier</a>
                                <a href="../../app/Controllers/SeanceController.php?action=delete&id=<?= $seance['id_seance'] ?>" 
                                   class="btn-del" 
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