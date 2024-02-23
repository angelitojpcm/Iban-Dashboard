<?php

class Profile extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Perfil de Usuario',
            'user' => $this->model->find($_SESSION['user']['id'])
        ];
        $this->views->render($this, 'edit', $data);
    }

    public function update()
    {
        $id = $_POST['id'];
        $user = $this->model->find($id);
        if ($user) {
            $this->model->update($_POST);
            $this->json(['status' => 200, 'message' => 'Usuario actualizado correctamente']);
        } else {
            $this->json(['status' => 404, 'message' => 'Usuario no encontrado']);
        }
    }
}
