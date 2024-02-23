<?php

class Controller
{
    protected $model;
    protected $views;
    protected $fillable = [];

    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
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
