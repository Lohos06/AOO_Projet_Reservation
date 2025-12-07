<div class="form-card">
    <h1>Créer un compte</h1>

    <form action="" method="POST">

        <div class="form-row">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit" class="btn-submit">S’inscrire</button>
    </form>

    <?php if (!empty($data['error'])) echo "<p class='error'>{$data['error']}</p>"; ?>
</div>
