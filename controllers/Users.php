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

        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            //Guardar la imagen en la carpeta assets/images/avatar
            $data = [];
            $photo = $_FILES['photo'];
            $photoName = $photo['name'];
            $photoTmp = $photo['tmp_name'];
            $photoSize = $photo['size'];
            $photoError = $photo['error'];
            $photoType = $photo['type'];

            $photoExt = explode('.', $photoName);

            $photoActualExt = strtolower(end($photoExt));

            $allowed = ['jpg', 'jpeg', 'png'];

            //Eliminar la imagen anterior
            $user = $this->model->find($id);

            if (isset($user->photo) && !empty($user->photo)) {
                unlink('assets/images/avatar/' . $user->photo);
            }

            if (in_array($photoActualExt, $allowed)) {
                if ($photoError === 0) {
                    if ($photoSize < 1000000) {
                        $photoNameNew = uniqid('', true) . "." . $photoActualExt;
                        $photoDestination = 'assets/images/avatar/' . $photoNameNew;
                        move_uploaded_file($photoTmp, $photoDestination);
                    } else {
                        $this->json(['status' => 400, 'message' => 'La imagen es demasiado grande']);
                    }
                } else {
                    $this->json(['status' => 400, 'message' => 'Hubo un error al subir la imagen']);
                }
            } else {
                $this->json(['status' => 400, 'message' => 'No puedes subir archivos de este tipo']);
            }

            $data['photo'] = $photoNameNew;
        }


        if (!empty($_POST['full_name'])) {
            $data['full_name'] = $_POST['full_name'];
        }

        if (!empty($_POST['email'])) {
            $data['email'] = $_POST['email'];
        }

        if (!empty($_POST['phone'])) {
            $data['phone'] = $_POST['phone'];
        }

        if (!empty($photoNameNew)) {
            $data['photo'] = $photoNameNew;
        }

        try {
            $this->model->update($id, $data);
            $this->json(['status' => 200, 'message' => 'Usuario actualizado correctamente']);
        } catch (Exception $e) {
            $this->json(['status' => 400, 'message' => 'Hubo un error al actualizar el usuario: ' . $e->getMessage()]);
        }
    }
}
