<?php

namespace App\Models;

use CodeIgniter\Model;

class Mjadwal extends Model
{

    public function getData()
    {
        return $this->db->table('jadwal')
        ->join('kelas','kelas.id_kelas = jadwal.kelas_id','Left')
        ->join('pelajaran','pelajaran.id_pelajaran = jadwal.pelajaran_id','Left')
        ->join('guru','guru.id_guru = jadwal.guru_id','Left')
        ->join('tbl_active','tbl_active.id_active = jadwal.active','Left')
        ->get()
        ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('jadwal')->insert($data);
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
