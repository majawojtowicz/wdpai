<?php

require_once "Repository.php";
class UserRepository extends Repository{
    protected $database;

    public function getUsers(): ?array
    {
        $query = $this->database->connect()->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function addUser(string $username, string $password): void
    {
        $query = $this->database->connect()->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $query->execute([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    
}