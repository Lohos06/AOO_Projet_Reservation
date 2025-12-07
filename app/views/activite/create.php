<div class="form-card"> <!-- conteneur du form -->

    <h2>Créer une activité</h2>

    <form action="" method="POST"> <!-- envoi du formulaire -->

        <div class="form-row"> 
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group"> <!-- type (id du type d'activité) -->
                <label for="type_id">Type d’activité (ID)</label>
                <input type="number" id="type_id" name="type_id" required>
            </div>
        </div>

        <div class="form-row"> 
            <div class="form-group"> <!-- places dispo -->
                <label for="places_disponibles">Places disponibles</label>
                <input type="number" id="places_disponibles" name="places_disponibles" required>
            </div>

            <div class="form-group"> <!-- durée -->
                <label for="duree">Durée (en minutes)</label>
                <input type="number" id="duree" name="duree" required>
            </div>
        </div>

        <div class="form-group"> <!-- description -->
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <div class="form-group"> <!-- date et heure -->
            <label for="datetime_debut">Date & heure de début</label>
            <input type="datetime-local" id="datetime_debut" name="datetime_debut" required>
        </div>

        <button type="submit" class="btn-info">Créer l’activité</button> <!-- bouton envoi -->

    </form>

    <?php if (!empty($data['error'])): ?> <!-- Affiche erreur si  -->
        <p class="error"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>

</div>
