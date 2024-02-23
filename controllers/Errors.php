<?php
class Errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($redirect = null)
    {
        $data = [
            'title' => 'Error',
            'class' => 'container min-vh-100 d-flex justify-content-center
            align-items-center',
            'redirect' => $redirect
        ];
        $this->views->render($this, '404', $data);
    }
}
