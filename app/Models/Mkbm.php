<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkbm extends Model
{
    
    function getAll()
    {
        $query = $this->db->query("SELECT a.id_kbm,a.jadwal_id, b.hari, CONCAT(c.lvl_kelas,' - ',c.`nama_kelas`) nama_kelas, d.`nama_pelajaran` nama_pelajaran, e.`nama_guru` nama_guru
                                        , DATE_FORMAT(a.tanggal,'%d %M,%Y') tanggal, a.materi, a.t_hadir, a.t_tdkhadir
                                        FROM kbm a
                                        JOIN jadwal b ON a.jadwal_id=b.id_jadwal
                                        JOIN kelas c ON b.kelas_id=c.id_kelas
                                        JOIN pelajaran d ON b.pelajaran_id=d.id_pelajaran
                                        JOIN guru e ON b.guru_id=e.id_guru
                                        WHERE a.active='1'");
        return $query->getResultArray();
    }

    function getJadwal()
    {
        $query = $this->db->query("SELECT b.id_jadwal, CONCAT(b.hari,' / ',e.`nama_guru`,' / ',c.lvl_kelas,' - ',c.`nama_kelas`,' / ',d.`nama_pelajaran`) `nama_pelajaran`
                                        FROM jadwal b
                                        JOIN kelas c ON b.kelas_id=c.id_kelas
                                        JOIN pelajaran d ON b.pelajaran_id=d.id_pelajaran
                                        JOIN guru e ON b.guru_id=e.id_guru
                                        WHERE b.active='1' ORDER BY b.hari");
        return $query->getResultArray();
    }
}
