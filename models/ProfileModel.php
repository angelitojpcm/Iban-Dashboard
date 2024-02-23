<?php
class ProfileModel extends Database
{
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'phone',
        'photo',
        'created_at',
    ];

    public function constructor()
    {
        parent::__construct();
    }

    public function all($search = null)
    {
        if ($search) {
            $sql = "SELECT * FROM users WHERE full_name LIKE :search OR email LIKE :search OR phone LIKE :search";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['search' => "%$search%"]);
        } else {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
        }
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function update($id, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . ' = :' . $key . ', ';
        }
        $fields = rtrim($fields, ', ');

        $sql = "UPDATE users SET " . $fields . " WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }
}
