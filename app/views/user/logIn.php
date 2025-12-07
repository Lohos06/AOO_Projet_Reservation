<div class="form-card">
    <h1>Connexion</h1>

    <form action="" method="POST">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit" class="btn-submit">Se connecter</button>
    </form>

    <?php if (!empty($data['error'])) echo "<p class='error'>{$data['error']}</p>"; ?>
</div>
