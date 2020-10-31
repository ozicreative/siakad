<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkehadiran extends Model
{

    public function getData()
    {
        return $this->db->table('kehadiran')
            ->join('kelas', 'kelas.id_kelas=kehadiran.kelasid', 'Left')
            ->get()
            ->getResultArray();
    }
}
