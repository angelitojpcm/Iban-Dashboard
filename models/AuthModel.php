<?php

class AuthModel extends Database
{
    protected $fillable = [
        'id',
        'full_name',
        'email', 
        'photo',
        'rol_id',
    ];
    
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }
}
