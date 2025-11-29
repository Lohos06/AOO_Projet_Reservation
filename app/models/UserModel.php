<?php 

class UserModel extends Bdd{
 
  public function __construct(){
    parent::__construct();
  }
 
  // fonction pour recuperer la liste de tout les utilisateurs
  public function findAll(): array
  {
    $users = $this->co->prepare('SELECT * FROM users');
    $users->execute();
 
    return $users->fetchAll();
  }
 
  // fonction pour trouver un utilisateur par son id
  public function findOneById(int $id): array | false
  {
    $users = $this->co->prepare('SELECT * FROM Users WHERE id = :id LIMIT 1');
    $users->execute([
      ':id' => $id
    ]);
 
    return $users->fetch();
  }

  // fonction pour trouver un utilisateur par son email
    public function findOneByEmail(string $email): array | false
  {
    $users = $this->co->prepare('SELECT * FROM Users WHERE email = :email LIMIT 1');
    $users->execute([
      ':email' => $email
    ]);
 
    return $users->fetch();
  }

  // fonction pour enregister un utilisateur en base de donnée
    public function signUp($name, $firstname, $email, $passwordhash) : bool
  {
    $userSignUp = $this->co->prepare('INSERT INTO Users (name, firstname, email, password, role) 
                                      VALUES (:name, :firstname, :email, :password, :role)');
    $userSignUp->execute([
      ':name' => $name,
      ':firstname' => $firstname,
      ':email' => $email,
      ':password' => $passwordhash,
      ':role' => 'User'
    ]);
 
    return True;
  }

  // fonction pour verifier une tentative de connexion
    public function logIn(string $email, $password): array | false
  {
    $request = $this->co->prepare('SELECT * FROM Users WHERE email = :email LIMIT 1');
    $request->execute([
      ':email' => $email
    ]);
    $user = $request->fetch();

    if(!$user) {
      return false;
    } 

    if (password_verify($password, $user['password'])) {
      return $user;
    } else {
      return false;
    }
  }
}