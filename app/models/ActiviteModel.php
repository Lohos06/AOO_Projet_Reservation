<?php

class ActiviteModel extends Bdd
{
    public function __construct()
    {
        parent::__construct();
    }

    /* récupère ttes les activités*/
    public function getAllActivities(): array
    {
        $stmt = $this->co->prepare('SELECT * FROM activities');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

        /*récupère une activité par son ID*/
    public function getActivityById(int $id): array|false
    {
        $stmt = $this->co->prepare('
            SELECT a.*, t.name AS typeName
            FROM activities a
            JOIN activitytypes t ON a.typeId = t.id
            WHERE a.id = :id
            LIMIT 1
        ');

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*calcule le nombre de places restantes pour une activités*/
    public function getPlacesLeft(int $id): int
    {
        $stmt = $this->co->prepare('SELECT places_max, places_prises FROM activities WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $id]);
        
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$activity) {
            return 0;
        }

        // calcul
        return (int)($activity['places_max'] - $activity['places_prises']);
    }

    public function createActivity($nom, $typeId, $seatsLeft, $description, $startDate, $duration): void
{
    $stmt = $this->co->prepare("
        INSERT INTO activities (name, typeId, seatsLeft, description, startDate, duration)
        VALUES (:nom, :typeId, :seatsLeft, :description, :startDate, :duration)
    ");

    $stmt->execute([
        ':nom'         => $nom,
        ':typeId'      => $typeId,
        ':seatsLeft'   => $seatsLeft,
        ':description' => $description,
        ':startDate'   => $startDate,
        ':duration'    => $duration
    ]);
}
    /* Diminue le nombre de places disponibles d'une activité*/
    public function decreaseSeats(int $activityId): bool
    {
        $query = $this->co->prepare("
            UPDATE activities
            SET seatsLeft = seatsLeft - 1
            WHERE id = :id AND seatsLeft > 0
        ");

        return $query->execute([":id" => $activityId]);
    }
    //maj une activité
    public function update(int $id, array $data): bool
    {
        $stmt = $this->co->prepare("
            UPDATE activities
            SET 
                name = :nom,
                typeId = :type_id,
                seatsLeft = :places_disponibles,
                description = :description,
                startDate = :datetime_debut,
                duration = :duree
            WHERE id = :id
        ");

        return $stmt->execute([//$data : contient les champs à modifier 
            ':nom'                => $data['nom'],
            ':type_id'            => $data['type_id'],
            ':places_disponibles' => $data['places_disponibles'],
            ':description'        => $data['description'],
            ':datetime_debut'     => $data['datetime_debut'],
            ':duree'              => $data['duree'],
            ':id'                 => $id
        ]);
    }
    //supprime une activité de la base de données
    public function delete(int $id): bool
    {
        //id:identifiant de l'activité à supprimer
        $stmt = $this->co->prepare("
            DELETE FROM activities
            WHERE id = :id
        ");

        return $stmt->execute([':id' => $id]);
    }

}