<?php
require_once __DIR__ . '/../../app/Repositories/AdherentRepository.php';
require_once __DIR__ . '/../../app/Repositories/AbonnementRepository.php';
require_once __DIR__ . '/../../app/Repositories/SeanceRepository.php';

$adherentRepository = new AdherentRepository();
$abonnementRepository = new AbonnementRepository();
$seanceRepository = new SeanceRepository();

$nombreAdherents   = $adherentRepository->count();
$nombreAbonnements = $abonnementRepository->count();
$nombreSeances     = $seanceRepository->count();

$derniersAdherents = $adherentRepository->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect — Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

    <header>
        <div class="container nav">
            <div class="logo">
                <i class="ti ti-bolt"></i> FitConnect
            </div>
            <div class="nav-links">
                <a href="#" class="active">Dashboard</a>
                <a href="../adherents/index.php">Adhérents</a>
                <a href="../abonnements/index.php">Abonnements</a>
                <a href="../seances/index.php">Séances</a>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="grid">
            
            <div class="card">
                <h3>Adhérents</h3>
                <div class="val"><?= $nombreAdherents ?></div>
                <div class="card-actions">
                    <a href="../adherents/creat.php" class="btn-add">+ Ajouter</a>
                    <a href="../adherents/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
            
            <div class="card">
                <h3>Abonnements</h3>
                <div class="val"><?= $nombreAbonnements ?></div>
                <div class="card-actions">
                    <a href="../abonnements/creat.php" class="btn-add">+ Ajouter</a>
                    <a href="../abonnements/index.php" class="link-view">Voir tout</a>
                </div>
            </div>
            
            <div class="card">
                <h3>Séances</h3>
                <div class="val"><?= $nombreSeances ?></div>
                <div class="card-actions">
                    <a href="../seances/creat.php" class="btn-add">+ Ajouter</a>
                    <a href="../seances/index.php" class="link-view">Voir tout</a>
                </div>
            </div>

        </div>

        <div class="box">
            <h2>Derniers adhérents inscrits</h2>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom & Prénom</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($derniersAdherents)): ?>
                        <tr>
                            <td colspan="4" class="empty">Aucun adhérent enregistré pour le moment.</td>
                        </tr>
                    <?php else: ?>
                        <?php
                        $compteur = 0;
                        foreach (array_reverse($derniersAdherents) as $adherent):
                            if ($compteur == 5) break;
                        ?>
                        <tr>
                            <td><strong>#<?= $adherent['id_adherent'] ?></strong></td>
                            <td>
                                <div class="member-info">
                                    <span class="member-name"><?= htmlspecialchars($adherent['nom'] . ' ' . $adherent['prenom']) ?></span>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($adherent['email']) ?></td>
                            <td><?= htmlspecialchars($adherent['date_inscription']) ?></td>
                        </tr>
                        <?php 
                            $compteur++; 
                        endforeach; 
                        ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>