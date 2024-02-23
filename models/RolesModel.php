<?php

class RolesModel extends Database
{

    protected $fillable = [
        'id',
        'name',
    ];

    public function constructor()
    {
        parent::__construct();
    }

    public function all()
    {
        $sql = "SELECT * FROM roles";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $roles;
    }

    /**
     * Get a role by id
     * @param int $id
     * @var object $rol
     * @return object
     */

    public function one($id)
    {
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $role = $stmt->fetch(PDO::FETCH_OBJ);
        return $role;
    }
}
