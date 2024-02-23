<?php

class AuthModel extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function login($email, $password) {

        //Mostrar contraseña encriptada

        $password = password_hash($password, PASSWORD_DEFAULT);
        echo $password;
        die();
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}