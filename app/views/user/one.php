<?php

if ($user) {
  echo '<h1>'. $user['email'].'</h1>';
}
else{
  echo '<p>Utilisateur introuvable</p>';
}