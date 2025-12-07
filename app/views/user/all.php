<h2>Utilisateurs</h2>

<ul class="user-list">
<?php 
foreach ($users as $user) { // parcours de tous les utilisateurs
    echo '
    <li>
        <h3>' . htmlspecialchars($user["name"]) . ' ' . htmlspecialchars($user["firstname"]) . '</h3>
        <p>' . htmlspecialchars($user["email"]) . '</p>
    </li>';
}
?>
</ul>
