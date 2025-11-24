<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(){

        if(!$this->isPost()){
            return $this->render("login");
        }
        
        $username = $_POST["username"]??'';
        $password = $_POST["password"]??'';

        $users = $this->userRepository->getUsers();



        // TODO zwroc HTML logowania, przetworz dane
        //return $this->render("dashboard", ["cards" => []]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function register(){

        $_POST['username'] = $_POST['username'] ?? '';
        $_POST['password'] = $_POST['password'] ?? '';
        $this->userRepository->addUser($_POST['username'], $_POST['password']);

        return $this->render("register");
    }
}