<?php

require_once './app/utils/Render.php';
require_once './app/models/ActiviteModel.php';
require_once './app/utils/Auth.php';

class ActiviteController
{
    use Render;
    use Auth;

    /* affiche toutes les activités */
    public function findAll(): void
    {
        $model = new ActiviteModel();
        $activites = $model->getAllActivities();

        $data = [
            'title'     => 'Liste des activités',
            'activites' => $activites,
            'isAdmin'   => ($_SESSION['role'] ?? '') === 'admin'
        ];

        $this->renderView('activite/all', $data);
    }


    /* affiche une activité */
    public function show(int $id): void
    {
       
        $model = new ActiviteModel();
        $activite = $model->getActivityById($id);
        

        if (!$activite) {
            die("Activité introuvable.");
        }

        $data = [
            'title'     => "Activité #{$id}",
            'activite'  => $activite,
            'isAdmin'   => ($_SESSION['role'] ?? '') === 'admin'
        ];

        $this->renderView('activite/show', $data);
    }


    /* modification d’une activité */
    public function update(int $id): void
    {
        $this->requireAdmin(); // sécurité

        $model = new ActiviteModel();

        //  afficher le formulaire
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            $activite = $model->getActivityById($id);

            $data = [
                'title'    => 'Modifier une activité',
                'activite' => $activite
            ];

            $this->renderView('activite/update', $data);
            return;
        }

        // récupérer les données du formulaire
        $dataForm = [
            'nom'                => $_POST['nom'] ?? null,
            'type_id'            => $_POST['type_id'] ?? null,
            'places_disponibles' => $_POST['places_disponibles'] ?? null,
            'description'        => $_POST['description'] ?? null,
            'datetime_debut'     => $_POST['datetime_debut'] ?? null,
            'duree'              => $_POST['duree'] ?? null,
        ];

        // mise à jour
        $model->update($id, $dataForm);

        // redirection
        header("Location: /activite/show/$id");
        exit();
    }


    /* création une activité */
    public function create(): void
{
    if (($_SESSION['role'] ?? '') !== 'admin') {
        die("Accès refusé.");
    }

    $model = new ActiviteModel();

    //  affiche le formulaire
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        $data = [
            'title' => 'Créer une activité'
        ];

        $this->renderView('activite/create', $data);
        return;
    }

    //  récupérer les champs
    $nom        = $_POST['nom'] ?? null;
    $typeId     = $_POST['type_id'] ?? null;
    $seatsLeft  = $_POST['places_disponibles'] ?? null;
    $description = $_POST['description'] ?? null;
    $startDate  = $_POST['datetime_debut'] ?? null;
    $duration   = $_POST['duree'] ?? null;

    // validation correcte
    if (empty($nom) || empty($typeId) || empty($seatsLeft) || empty($startDate) || empty($duration)) {

        $data = [
            'title' => 'Créer une activité',
            'error' => 'Tous les champs obligatoires doivent être remplis.'
        ];

        $this->renderView('activite/create', $data);
        return;
    }

    // insertion dans bdd
    $model->createActivity($nom, $typeId, $seatsLeft, $description, $startDate, $duration);

    // redirection
    header("Location: /activite/findAll");
    exit();
}


    /* suppression d’une activité */
    public function delete(int $id): void
{
    $reservationModel = new ReservationModel();
    $activiteModel = new ActiviteModel();

    // supprime d'abord toutes les résa liées à l'activité
    $reservationModel->deleteByActivityId($id);

    // supprime ensuite l'activité elle-même
    $activiteModel->delete($id);

    // redirection vers la liste des activités
    header("Location: /activite/findAll");
exit();
}
}

