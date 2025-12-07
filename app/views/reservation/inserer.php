<?php

if (!empty($error)) {
    echo "<p class='error-msg'>" . htmlspecialchars($error) . "</p>";
}

// sécurité:  vérifie que activityId existe
$activityId = $activityId ?? null;

if ($activityId === null) {
    echo "<p class='error-msg'>Erreur : aucune activité sélectionnée.</p>";
    return;
}
?>

<div class="reservation-card">

    <h2>Confirmation de réservation</h2>

    <form action="" method="POST">

        <!-- userId auto : récup depuis la session du user connecté -->
        <input type="hidden" name="userId" value="<?= htmlspecialchars($_SESSION['id']) ?>">

        <!-- id de l'activité récup depuis l'url et envoyé avec le form -->
        <input type="hidden" name="activityId" value="<?= htmlspecialchars($activityId) ?>">

        <p>
            Vous êtes sur le point de réserver l’activité 
            <strong><?= htmlspecialchars($activityName) ?></strong>.
        </p>

        <p>Confirmez en appuyant sur le bouton ci-dessous.</p>

        <button type="submit" class="btn-reserver">Réserver</button>

    </form>

</div>
