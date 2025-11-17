<?php

require_once 'AppController.php';

class SecurityController extends AppController {


    public function login(){

        if(!$this->isPost()){
            return $this->render("login");
        }
        
        $username = $_POST["username"]??'';
        $password = $_POST["password"]??'';

        // TODO zwroc HTML logowania, przetworz dane
        //return $this->render("dashboard", ["cards" => []]);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function register(){

        return $this->render("register");
    }
}