<div class="form-card">
    <h2>Modifier une activité</h2>

    <form action="" method="POST">

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"
                   value="<?= htmlspecialchars($activite['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="type_id">Type d’activité</label>
            <input type="number" id="type_id" name="type_id"
                   value="<?= htmlspecialchars($activite['typeId']) ?>" required>
        </div>

        <div class="form-group">
            <label for="places_disponibles">Places disponibles</label>
            <input type="number" id="places_disponibles" name="places_disponibles"
                   value="<?= htmlspecialchars($activite['seatsLeft']) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?= htmlspecialchars($activite['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="datetime_debut">Date & heure de début</label>
            <input type="datetime-local" id="datetime_debut" name="datetime_debut"
                   value="<?= date('Y-m-d\TH:i', strtotime($activite['startDate'])) ?>" required>
        </div>

        <div class="form-group">
            <label for="duree">Durée (en minutes)</label>
            <input type="number" id="duree" name="duree"
                   value="<?= htmlspecialchars($activite['duration']) ?>" required>
        </div>

        <button class="btn-submit" type="submit">Enregistrer les modifications</button>

    </form>
</div>
