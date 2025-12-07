<?php 


Class ReservationModel extends Bdd {

  public function __construct(){
    parent::__construct();
  }
 
  // crée une réserva pour un utilisateur
  public function createReservation(int $userId, int $activityId) : bool
  {
        $now = new DateTime();
        $now = $now->format('Y-m-d H:i:s');
        $reservations = $this->co->prepare("INSERT INTO reservations (userId, activityId, ReservationDate) VALUES (:userId, :activityId, :ReservationDate)");
        $reservations->execute([
      ':userId' => $userId,
      ':activityId' => $activityId,
      ':ReservationDate' => $now
    ]);
        return True;  
  }
  // récupère les résa d’un utilisateur
  public function getReservationsByUserId(int $userId): array
{
    $sql = "
        SELECT r.*, a.name AS activityName
        FROM reservations r
        JOIN activities a ON r.activityId = a.id
        WHERE r.userId = ?
    ";

    $stmt = $this->co->prepare($sql);
    $stmt->execute([$userId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    
    // récupère ttes les résa avec activité + utilisateur
     public function getAllReservations(): array
{
    $sql = "
        SELECT r.*, a.name AS activityName, u.firstname, u.name AS userName
        FROM reservations r
        JOIN activities a ON r.activityId = a.id
        JOIN users u ON r.userId = u.id
    ";

    $stmt = $this->co->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

 // supprime une réservation 
    public function cancelReservation(int $reservationId): bool
    {
      $stmt = $this->co->prepare("DELETE FROM reservations WHERE activityId = ?");
    return $stmt->execute([$activityId]);
}
 
  }
