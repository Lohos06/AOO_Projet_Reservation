<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/CSS/destyle.css">
    <link rel="stylesheet" href="/CSS/variables.css">
    <link rel="stylesheet" href="/CSS/header.css">
    <link rel="stylesheet" href="/CSS/card.css">
    <link rel="stylesheet" href="/CSS/reservation.css">
    <link rel="stylesheet" href="/CSS/form.css">

    <title><?= $title ?? 'Mon titre par défaut' ?></title>
</head>

<body>
<header>
    <h1>NatureQuest 🌿</h1>

    <nav>

        <!-- liens visibles uniquement pour l’admin -->
        <?php if (!empty($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="/user/findAll">Liste des utilisateurs</a>
            <a href="/reservation/findAll">Toutes les réservations</a>
            <a href="/activite/create">Ajouter une activité</a>
        <?php endif; ?>

        <!-- liens visibles uniquement pour les visiteurs (non co) -->
        <?php if (empty($_SESSION['id'])): ?>
            <a href="/user/signUp">Inscription </a>
            <a href="/user/logIn">Connexion </a>
        <?php endif; ?>

        <!--liens visibles uniquement pour les utilisateurs connectés -->
        <?php if (!empty($_SESSION['id'])): ?>
            <a href="/user/logOut">Déconnexion</a>

            <a href="/activite/findAll">Liste des Activités</a>

            <a href="/reservation/findOneById/<?= htmlspecialchars($_SESSION['id']) ?>">
                Mes réservations
            </a>
        <?php endif; ?>

    </nav>

    <!-- info utilisateur -->
    <?php 
    if (!empty($_SESSION['id'])) {
        echo $_SESSION['name'] . " ";
        echo $_SESSION['firstname'] . " ";
        echo $_SESSION['email'];
    }
    ?>
</header>

<main>
    <?= $content ?? '<p>Aucun contenu à afficher</p>' ?>
</main>

<footer>
    <p>Tous droits réservés • 2025</p>
</footer>

</body>
</html>
