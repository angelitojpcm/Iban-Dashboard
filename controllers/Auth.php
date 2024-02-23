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

        if (!$this->isAuth()) {
            // Si el usuario no está autenticado, renderizar la vista de inicio de sesión
            $this->views->render($this, "login", $data);
        } else {
            // Si el usuario está autenticado, redirigir al panel de control
            $this->redirect('dashboard');
        }
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

                    //Save the user in the session
                    $_SESSION['user'] = $data;
                    $this->json([
                        'success' => true,
                        'code' => 200,
                        'user' => $data
                    ]);
                } else {
                    $this->json([
                        'success' => false,
                        'code' => 400,
                        'message' => 'El usuario no existe o la contraseña es incorrecta'
                    ]);
                }
            }else {
                $this->json([
                    'success' => false,
                    'code' => 400,
                    'message' => 'El usuario no existe o la contraseña es incorrecta'
                ]);
            }
        }
    }

    //Logout
    public function logout()
    {
        $this->destroy();
        $this->redirect('auth/login');
    }   
}
