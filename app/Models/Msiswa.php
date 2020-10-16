<?php

namespace App\Models;

use CodeIgniter\Model;

class Msiswa extends Model
{

    public function getData()
    {
        return $this->db->table('siswa')
            ->join('tbl_active', 'tbl_active.id_active = siswa.active', 'Left')
            ->get()
            ->getResultArray();
    }

    public function kelasSiswa()
    {
        $builder = $this->db->query("SELECT t1.id_siswa,t1.nisn,t1.nama_siswa,t1.kelahiran,
        t1.tgl_lhr,
        t1.alamat,t1.gender,COALESCE(t2.periode,'') periode,COALESCE(t2.kelas_id,'') kelas_id,
        COALESCE(concat(t3.lvl_kelas,' - ',t3.`nama_kelas`),'') lvl_kelas
        FROM siswa t1
        LEFT JOIN kelas_siswa t2 ON t1.id_siswa=t2.siswa_id AND t2.active='1'
        LEFT JOIN kelas t3 ON t2.kelas_id=t3.id_kelas WHERE t1.active='1' ORDER BY t1.nisn ASC");
        return $builder->getResultArray();
    }

    public function getKelas()
    {
        $builder = $this->db->query("SELECT t1.id_kelas, concat(t1.lvl_kelas,' - ',t1.`nama_kelas`) nama_kelas FROM kelas t1 WHERE t1.active='1' ORDER BY t1.`nama_kelas`");
        return $builder->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('siswa')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->delete($data);
    }
}
