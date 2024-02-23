<?php

class Views  extends Session
{
    protected $ctr;

    public function __construct()
    {
        parent::__construct();
    }


    public function render($controller, $view, $data = [])
    {
        //Convert data to objecto example $data->title
        $data = (object) $data;
        $ctr = is_object($controller) ? get_class($controller) : $controller;
        if ($ctr == "Home") {
            $view = "views/pages/" . $view . ".php";
        } else {
            $view = "views/pages/" . $ctr . "/" . $view . ".php";
        }
        require_once "views/layouts/header.php";
        // Verificar si el usuario ha iniciado sesión
        if ($this->isAuth()) {
            $session = $this;
            // Pasar la instancia del controlador a la vista
            $this->ctr = $controller;

            if ($ctr != 'Errors') {
                require_once "views/layouts/sidebar.php";
            }
        }
        require $view;
        require_once "views/layouts/footer.php";
    }
}
