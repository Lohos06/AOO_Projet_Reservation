<?php 
echo "<h2> Reservation : </h2> <br>";
foreach ($reservations as $reservation) {
  echo '<br><hr>';
  echo '<p> User :'. $reservation['userId'].'</p>';
  echo '<p> Activité :'. $reservation['activityId'] .'</p>';
  echo '<p> Date de Réservation : ' . $reservation['ReservationDate'] . '</p>';
}