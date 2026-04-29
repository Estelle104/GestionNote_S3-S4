<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['user', 'pwd', 'id_type_user'];

    public function checkLogin(string $username, string $password): ?array
    {
        return $this->select('utilisateur.*, type_user.type as role')
            ->join('type_user', 'type_user.id = utilisateur.id_type_user', 'left')
            ->where('utilisateur.user', $username)
            ->where('utilisateur.pwd', $password)
            ->first();
    }

    public function getAllUsers(): array
    {
        return $this->findAll();
    }

    public function getUserById(int $id): ?array
    {
        return $this->find($id);
    }

    public function createUser(array $data): int
    {
        $this->insert($data);
        return (int) $this->getInsertID();
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->delete($id);
    }
}
