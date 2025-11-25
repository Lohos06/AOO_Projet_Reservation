<?php

class UserModel {

    private $id;
    private $prenom;
    private $nom;
    private $email;
    private $motDePasse;
    private $role;

    public function logUser(string $email, string $motDePasse) : array
    {
        //fonction de connexion a la base de donnée si les deux parametres valides
    }

    public function createUser(array $data) : bool
    {
        // fonction d'envoie en base de donnée d'un utilisateur si il respecte les criteres
        return TRUE
    }

    public function getAllUsers() : array
    {
        // requete SELLECT * FROM USERS a recuperer et afficher
    }

}