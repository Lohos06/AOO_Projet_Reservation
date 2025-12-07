<?php

// sécurité et valeurs par défaut pour chaque info de l'activité
$nom         = htmlspecialchars($activite['name'] ?? 'Nom indisponible', ENT_QUOTES);
$typeName    = htmlspecialchars($activite['typeName'] ?? 'Non défini', ENT_QUOTES);
$description = htmlspecialchars($activite['description'] ?? 'Aucune description', ENT_QUOTES);
$seatsLeft   = htmlspecialchars($activite['seatsLeft'] ?? '0', ENT_QUOTES);
$startDate   = htmlspecialchars($activite['startDate'] ?? 'Non défini', ENT_QUOTES);
$duration    = htmlspecialchars($activite['duration'] ?? '0', ENT_QUOTES);

$id = htmlspecialchars($activite['id'], ENT_QUOTES);
?>

<div class="activity-card">

    <h2>Détails de l’activité</h2>
    <!-- infos principales -->
    <p><strong>Nom :</strong> <?= $nom ?></p>
    <p><strong>Type :</strong> <?= $typeName ?></p>
    <p><strong>Description :</strong> <?= $description ?></p>
    <p><strong>Places disponibles :</strong> <?= $seatsLeft ?></p>
    <p><strong>Date de début :</strong> <?= $startDate ?></p>
    <p><strong>Durée :</strong> <?= $duration ?> minutes</p>
    <!-- bouton réservation  -->
    <a href="/reservation/inserer/<?= $id ?>" class="btn-reserver">Réserver</a>

</div>
