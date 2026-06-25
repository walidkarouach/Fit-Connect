<?php

require_once __DIR__ . '/../app/Controllers/AdherentController.php';

$controller = new AdherentController();
$adherents = $controller->index();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th{
            background-color: #f4f4f4;
        }

        h1{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h1>Liste des Adhérents</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Date inscription</th>
    </tr>

    <?php foreach ($adherents as $adherent): ?>
        <tr>
            <td><?= $adherent['id_adherent'] ?></td>
            <td><?= $adherent['nom'] ?></td>
            <td><?= $adherent['prenom'] ?></td>
            <td><?= $adherent['email'] ?></td>
            <td><?= $adherent['telephone'] ?></td>
            <td><?= $adherent['date_inscription'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>