<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpelajaran extends Model
{

    public function getData()
    {
        return $this->db->table('pelajaran')
        ->join('tbl_active','tbl_active.id_active = pelajaran.active','Left')
        ->get()
        ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('pelajaran')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('pelajaran')
            ->where('id_pelajaran', $data['id_pelajaran'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('pelajaran')
            ->where('id_pelajaran', $data['id_pelajaran'])
            ->delete($data);
    }
}
