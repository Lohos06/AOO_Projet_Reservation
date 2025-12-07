<h2>Toutes les réservations</h2>

<div class="reservation-list">

<?php if (!empty($reservations)): ?><!-- verifie qu'il y a des résa -->

    <?php foreach ($reservations as $resa): ?>  <!-- parcous les résas -->
        <div class="reservation-card">
          <!-- infos principales -->
            <h3>Réservation</h3>
            <p><strong>User :</strong> <?= htmlspecialchars($resa['userName']) ?></p>
            <p><strong>Activité :</strong> <?= htmlspecialchars($resa['activityName']) ?></p>
            <p><strong>Date de Réservation :</strong> <?= htmlspecialchars($resa['ReservationDate']) ?></p>
        </div>
    <?php endforeach; ?>

<?php else: ?><!-- si aucune réservation -->
    <p>Aucune réservation trouvée.</p>
<?php endif; ?>

</div>
