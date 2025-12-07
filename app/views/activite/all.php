<h2>Activités :</h2>

<link rel="stylesheet" href="/CSS/card.css">

<div class="cards-container">

<?php if (!empty($activites) && is_array($activites)): ?>
    
    <?php foreach ($activites as $activite): 
        $id     = htmlspecialchars($activite['id']);
        $nom    = htmlspecialchars($activite['name']);
        $type   = htmlspecialchars($activite['typeName'] ?? '');
        $desc   = htmlspecialchars($activite['description'] ?? '');
    ?>

    <div class="card">
        <div class="card-inner">

            <!-- face avant -->
            <div class="card-front">
                <h3><?= $nom ?></h3>
                <p><?= $type ?></p>
            </div>

            <!-- face arrière -->
            <div class="card-back">
                <h4><?= $nom ?></h4>
                <p><?= substr($desc,0,60) ?>...</p>

                <a href="/activite/show/<?= $id ?>" class="btn-info">Voir + d'infos</a>

                <!--seul admin peut voir lien supprimer/modifier activité-->
                <?php if (!empty($isAdmin)): ?>
                    <a href="/activite/update/<?= $id ?>" class="btn-warning">Modifier</a>
                    <a href="/activite/delete/<?= $id ?>" class="btn-danger"
                    onclick="return confirm('Supprimer cette activité ?');">
                    Supprimer
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php endforeach; ?>

<?php else: ?>
    <p>Aucune activité trouvée.</p>
<?php endif; ?>

</div>

