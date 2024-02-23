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
}
