<?php

namespace App\Models;

use CodeIgniter\Model;

class Mrapor extends Model
{
    public function getAll()
    {
        $query = $this->db->query("SELECT t1.id_siswa, t1.nisn, t1.nama_siswa, t1.kelahiran, t1.tgl_lhr, t1.alamat, t1.gender,
                                    COALESCE(t2.periode,'') periode,
                                    COALESCE(t2.kelas_id,'') kelasid,
									COALESCE(CONCAT(t3.lvl_kelas,' - ', t3.`nama_kelas`),'') lvl_kelas
									FROM siswa t1
									LEFT JOIN kelas_siswa t2 
                                    ON t1.id_siswa = t2.siswa_id 
                                    AND t2.active = '1'
									LEFT JOIN kelas t3 
                                    ON t2.kelas_id = t3.id_kelas	
                                    WHERE t1.active = '1' 
                                    ORDER BY t1.nisn ASC");
        return $query->getResultArray();
    }

    public function getDataNilai($id)
    {
        $query = $this->db->query("SELECT e.`nama_siswa` nama, CONCAT(c.lvl_kelas,'-',c.`nama_kelas`) kelas, d.`nama_pelajaran` pelajaran, a.periode, ROUND(COALESCE(AVG(f.total_nilai),0), 2) Nilai, ROUND(COALESCE(AVG(g.total_nilai),0), 2) ketrampilan
                                FROM kelas_siswa a
                                JOIN jadwal b ON a.kelas_id = b.kelas_id AND b.active = '1'
                                JOIN kelas c ON a.kelas_id = c.id_kelas
                                JOIN pelajaran d ON b.pelajaran_id = d.id_pelajaran
                                JOIN siswa e ON a.siswa_id = e.id_siswa
                                LEFT JOIN nilai f ON a.siswa_id = f.siswa_id AND a.kelas_id = f.kelas_id AND b.pelajaran_id = f.pelajaran_id 
                                AND f.jenis <> 'KETRAMPILAN'
                                LEFT JOIN nilai g ON a.siswa_id = g.siswa_id AND a.kelas_id = g.kelas_id AND b.pelajaran_id = g.pelajaran_id 
                                AND g.jenis = 'KETRAMPILAN'
                                WHERE a.siswa_id = '$id' AND a.active = '1'
                                GROUP BY e.`nama_siswa`, c.lvl_kelas, c.`nama_kelas`, d.`nama_pelajaran`");
        return $query;
    }

    public function getDataKehadiran($id)
    {
        $query = $this->db->query("SELECT `status`,
                                COUNT(`status`) jumlah
                                FROM kehadiran
                                WHERE siswa_id = '$id'
                                AND `status` <> 'MASUK'
                                GROUP BY `status`");

        return $query;
    }
}
