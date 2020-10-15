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

    public function getKelas()
    {
        $builder = $this->db->query("SELECT t1.id_kelas, concat(t1.lvl_kelas,' - ',t1.`nama_kelas`) nama_kelas FROM kelas t1 WHERE t1.active='1' ORDER BY t1.`nama_kelas`");
        return $builder->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('jadwal')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }
}
