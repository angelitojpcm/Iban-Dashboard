<?php

class Auth extends Controller
{
    protected $rol;

    public function __construct()
    {
        parent::__construct();
        $this->rol = $this->loadModel("Roles");
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
            //Call the model
            $user = $this->model->login($email, $password);
            $fillable = $this->model->getFillable();

            //If the user exists
            if ($user) {
                //Verified password
                if (password_verify($password, $user->password)) {
                    $data = $this->filter($user, $fillable);
                    // Call the correct method on the correct model
                    $RoleFilleable = $this->rol->getFillable();
                    $data->role = $this->filter($this->rol->one($user->rol_id), $RoleFilleable);

                    $this->json($data);
                } else {
                    $this->json(['error' => 'Invalid password']);
                }
            }
        }
    }
}
