<?php

namespace App\Models;

use CodeIgniter\Model;

class Mactive extends Model
{

    public function getData()
    {
        return $this->db->table('tbl_active')
            ->get()
            ->getResultArray();
    }
}
