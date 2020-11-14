<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkbm extends Model
{

    public function getAll()
    {
        $query = $this->db->query("SELECT a.id_kbm,a.jadwal_id, b.hari, CONCAT(c.lvl_kelas,' - ',c.`nama_kelas`) kelas, d.`nama_pelajaran` pelajaran, e.`nama_guru` guru
                                        ,a.tanggal, a.materi, a.t_hadir, a.t_tdkhadir
                                        FROM kbm a
                                        JOIN jadwal b ON a.jadwal_id=b.id_jadwal
                                        JOIN kelas c ON b.kelas_id=c.id_kelas
                                        JOIN pelajaran d ON b.pelajaran_id=d.id_pelajaran
                                        JOIN guru e ON b.guru_id=e.id_guru
                                        WHERE a.active='1'");
        return $query->getResultArray();
    }

    public function getJadwal()
    {
        $query = $this->db->query("SELECT b.id_jadwal, CONCAT(b.hari,' / ',e.`nama_guru`,' / ',c.lvl_kelas,' - ',c.`nama_kelas`,' / ',d.`nama_pelajaran`) `pelajaran`
                                        FROM jadwal b
                                        JOIN kelas c ON b.kelas_id=c.id_kelas
                                        JOIN pelajaran d ON b.pelajaran_id=d.id_pelajaran
                                        JOIN guru e ON b.guru_id=e.id_guru
                                        WHERE b.active='1' ORDER BY b.hari");
        return $query->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('kbm')->insert($data);
    }

    public function ubah($data)
    {
        $this->db->table('kbm')
            ->where('id_kbm', $data['id_kbm'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('kbm')
            ->where('id_kbm', $data['id_kbm'])
            ->delete($data);
    }
}
