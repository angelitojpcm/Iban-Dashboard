<?php

class Controller
{
    protected $model;
    protected $views;

    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
    }

    public function loadModel()
    {
        $mdl = get_class($this) . "Model";
        $dir = "models/" . $mdl . ".php";

        if (file_exists($dir)) {
            require_once($dir);
            $this->model = new $mdl();
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

    
}
