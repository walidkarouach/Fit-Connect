<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Détails Adhérent</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
    padding:30px;
}

.card{
    width:500px;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}
</style>

</head>
<body>

<div class="card">

<h2>Détails Adhérent</h2>

<p><strong>ID :</strong> <?= $adherent['id_adherent'] ?></p>

<p><strong>Nom :</strong> <?= $adherent['nom'] ?></p>

<p><strong>Prénom :</strong> <?= $adherent['prenom'] ?></p>

<p><strong>Email :</strong> <?= $adherent['email'] ?></p>

<p><strong>Téléphone :</strong> <?= $adherent['telephone'] ?></p>

</div>

</body>
</html>