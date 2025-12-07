<?php if (isset($_SESSION['id'])): ?>

<div class="container">

    <!-- carte gauche : infos utilisateur -->
    <div class="left-card">
        <div class="left-content">
            <h2>Informations utilisateur</h2>
            
            <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['name']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['firstname']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
        </div>
    </div>

    <!-- carte droite : ttes les réservations du user -->
    <div class="right-card">

        <h1>
            Réservations de 
            <?= htmlspecialchars($_SESSION['firstname']) . ' ' . htmlspecialchars($_SESSION['name']) ?>
        </h1>



        <h2>Informations réservation</h2>

        <?php if (!empty($reservations)): ?>
            <?php foreach ($reservations as $resa): ?>
                <div class="resa-item">
                    <p><strong>Activité :</strong> <?= htmlspecialchars($resa['activityName']) ?></p>
                    <p><strong>Date de réservation :</strong> <?= htmlspecialchars($resa['ReservationDate']) ?></p>

                    <a class="btn-delete"
                      href="/reservation/enleverReservation/<?= $_SESSION['id'] ?>/<?= $resa['activityId'] ?>"
                      onclick="return confirm('Voulez-vous vraiment supprimer cette réservation ?');">
                      Supprimer la réservation
                    </a>

                    
                </div>
                
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune réservation trouvée.</p>
        <?php endif; ?>

    </div>
</div>

<?php else: ?>
    <?php header('Location: /user/login'); exit; ?>
<?php endif; ?>
