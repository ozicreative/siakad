<?php

namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_user', 'username', 'password', 'email', 'img', 'level', 'createdby', 'created_at', 'updatedby', 'updated_at', 'active'];

    public function getData()
    {
        return $this->db->table('user')
            ->orderBy('nama_user', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function detail($id)
    {
        return $this->db->table('user')
            ->where('id_user', $id)
            ->get()
            ->getRowArray();
    }

    public function tambah($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
