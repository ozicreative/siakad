<?php

namespace App\Models;

use CodeIgniter\Model;

class Mauth extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_user', 'username', 'password', 'email', 'img','updatedby'];

    public function getUser($iduser = false)
    {
        if ($iduser == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $iduser])->first();
    }
}
