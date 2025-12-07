<?php
class Activite
{
    private int $id;                    
    private int $type_id;              
    private int $places_disponibles;    
    private string $description;       
    private DateTime $datetime_debut;   
    private DateInterval $duree;        

    public function getId(): int        // renvoie l'id de l'activité
    {
        return $this->id;
    }

    public function getTypeId(): int    // same mais pour type d'activité
    {
        return $this->type_id;
    }

    public function setTypeId(int $type_id): self // définit le type d'activité
    {
        $this->type_id = $type_id;
        return $this;
    }

    public function setDescription(string $description): self // définit la description
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): string // renvoie la description
    {
        return $this->description;
    }

    public function setPlacesDisponibles(int $places): self // définit le nbre de places dispo
    {
        $this->places_disponibles = $places;
        return $this;
    }

    public function getPlacesDisponibles(): int // renvoie le nbre de places dispo
    {
        return $this->places_disponibles;
    }

    public function setDatetimeDebut(DateTime $datetime_debut): self // définit la date/heure de début
    {
        $this->datetime_debut = $datetime_debut;
        return $this;
    }

    public function getDatetimeDebut(): DateTime // renvoie la date/heure de début
    {
        return $this->datetime_debut;
    }

    public function setDuree(DateInterval $duree): self // définit la durée de l'activité
    {
        $this->duree = $duree;
        return $this;
    }

    public function getDuree(): DateInterval // renvoie la durée de l'activité
    {
        return $this->duree;
    }
}
