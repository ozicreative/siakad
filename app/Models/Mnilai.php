<?php

namespace App\Models;

use CodeIgniter\Model;

class Mnilai extends Model
{
    public function getData()
    {
        return $this->db->table('nilai')
        ->join('kelas','kelas.id_kelas = nilai.kelas_id', 'Left')
        ->join('pelajaran','pelajaran.id_pelajaran = nilai.pelajaran_id', 'Left')
        ->get()
        ->getResultArray();
    }
}