<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpelajaran extends Model
{

    public function getData()
    {
        return $this->db->table('pelajaran')
            ->join('tbl_active', 'tbl_active.id_active = pelajaran.active', 'Left')
            ->get()
            ->getResultArray();
    }

    function getAll()
    {
        $query = $this->db->query("SELECT id_pelajaran,nama_pelajaran FROM pelajaran WHERE active='1' ORDER BY nama_pelajaran ASC");
        
        return $query->getResultArray();
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
