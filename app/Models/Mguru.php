<?php

namespace App\Models;

use CodeIgniter\Model;

class Mguru extends Model
{

    public function getData()
    {
        return $this->db->table('guru')
        ->join('tbl_active','tbl_active.id_active = guru.active','Left')
        ->get()
        ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('guru')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('guru')
            ->where('id_guru', $data['id_guru'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('guru')
            ->where('id_guru', $data['id_guru'])
            ->delete($data);
    }
}
