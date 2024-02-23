<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        $this->views->render($this, 'home', $data);
    }
}