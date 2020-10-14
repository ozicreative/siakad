<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkelas extends Model
{

    public function getData()
    {
        return $this->db->table('kelas')
        ->join('tbl_active','tbl_active.id_active = kelas.active','Left')
        ->get()
        ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('kelas')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }
}
