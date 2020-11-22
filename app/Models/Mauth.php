<?php

namespace App\Models;

use CodeIgniter\Model;

class Mauth extends Model
{

    public function login_user($username, $password)
    {
        return $this->db->table('user')
            ->where([
                'username' => $username,
                'password' => $password,
            ])
            ->get()
            ->getRowArray();
    }
}
