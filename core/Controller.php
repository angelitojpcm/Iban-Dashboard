<?php

class Controller extends Session
{
    protected $model;
    protected $views;
    protected $fillable = [];

    public function __construct()
    {
        parent::__construct();
        $this->views = new Views();
        $this->loadModel();

        // Verificar si el usuario está autenticado
        if (!$this->isAuth() && get_class($this) !== 'Auth') {
            // Si el usuario no está autenticado, redirigir al inicio de sesión
            $this->redirect('auth/login');
            exit();
        }
    }

    public function loadModel($modelName = null)
    {
        // Cargar el modelo principal del controlador
        $mdl = get_class($this) . "Model";
        $dir = "models/" . $mdl . ".php";

        if (file_exists($dir)) {
            require_once($dir);
            $this->model = new $mdl();
        }

        // Si se proporcionó un nombre de modelo, cargar ese modelo también
        if ($modelName !== null) {
            $mdl = $modelName . "Model";
            $dir = "models/" . $mdl . ".php";

            if (file_exists($dir)) {
                require_once($dir);
                return new $mdl();
            }
        }
    }

    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function redirect($url)
    {
        header("Location: " . BASE_URL . $url);
    }


    public function isActive($controller)
    {
        return strtolower(get_class($this)) == strtolower($controller) ? 'active' : '';
    }

    //

    public function filter($object, $fillable)
    {
        $filtered = new stdClass();
        foreach ($fillable as $property) {
            if (property_exists($object, $property)) {
                $filtered->$property = $object->$property;
            }
        }
        return $filtered;
    }
}
