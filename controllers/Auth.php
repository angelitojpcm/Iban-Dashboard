<?php

class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($param = "")
    {
        $data = [
            'class' => 'container d-flex flex-column',
            'title' => 'Sign In',
        ];

        $this->views->render($this, "login", $data);
    }

    //Validate login

    public function validate()
    {
        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->login($email, $password);

            $this->json($user);
        }
    }
}
