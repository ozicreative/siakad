<?php

namespace App\Models;

use CodeIgniter\Model;

class Mks extends Model
{
    public function getData()
    {
        return $this->db->table('kelas_siswa')
            ->join('siswa', 'siswa.id_siswa = kelas_siswa.siswa_id', 'Left')
            ->join('kelas', 'kelas.id_bagian = kelas_siswa.kelas_id', 'Left')
            ->join('tbl_active', 'tbl_active.id_active = kelas_siswa.active', 'Left')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('kelas_siswa')->insert($data);
    }
}