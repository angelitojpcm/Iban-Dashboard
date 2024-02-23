<?php
class Users extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $users = $this->model->all();
        $data = [
            'title' => 'Listado de Usuarios',
            'users' => $users
        ];

        $this->views->render($this, 'list', $data);
    }


    public function delete()
    {
        $id = $_POST['id'];
        $user = $this->model->find($id);
        if ($user) {
            $this->model->delete($id);
            $this->json(['status' => 200, 'message' => 'Usuario eliminado correctamente']);
        } else {
            $this->json(['status' => 404, 'message' => 'Usuario no encontrado']);
        }
    }

    public function edit($params)
    {
        $id = $params[0];
        $user = $this->model->find($id);

        if ($user) {
            $data = [
                'title' => 'Editar Usuario',
                'user' => $user
            ];
            $this->views->render($this, 'edit', $data);
        } else {
            $data = [
                'title' => 'Error 404',
                'class' => 'container min-vh-100 d-flex justify-content-center
                align-items-center',
            ];

            $this->views->render('Errors', '404', $data);
        }
    }

    public function update($params)
    {
        $id = $params[0];

        if ($_POST['photo']) {
          //Guardar la imagen en la carpeta assets/images/avatar
            $photo = $_POST['photo'];
        }
    }
}
