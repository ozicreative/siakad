<?php

namespace App\Models;

use CodeIgniter\Model;

class Mrapor extends Model
{
    public function getAll()
    {
        $query = $this->db->query("SELECT t1.id_siswa,t1.nisn,t1.nama_siswa,t1.kelahiran,t1.tgl_lhr,
									t1.alamat,t1.gender,COALESCE(t2.periode,'') periode,COALESCE(t2.kelas_id,'') kelasid,
									COALESCE(concat(t3.lvl_kelas,' - ',t3.`nama_kelas`),'') lvl_kelas
									FROM siswa t1
									LEFT JOIN kelas_siswa t2 ON t1.id_siswa=t2.siswa_id AND t2.active='1'
									LEFT JOIN kelas t3 ON t2.kelas_id=t3.id_kelas	WHERE t1.active='1' ORDER BY t1.nisn ASC");
        return $query->getResultArray();
    }

    public function getDataNilai($id)
    {
        $query = $this->db->query("select e.`nama_siswa` nama, concat(c.lvl_kelas,'-',c.`nama_kelas`) kelas, d.`nama_pelajaran` pelajaran, a.periode, ROUND(coalesce(avg(f.total_nilai),0), 2) Nilai, ROUND(coalesce(avg(g.total_nilai),0), 2) ketrampilan
                                from kelas_siswa a
                                join jadwal b on a.kelas_id = b.kelas_id and b.active = '1'
                                join kelas c on a.kelas_id = c.id_kelas
                                join pelajaran d on b.pelajaran_id = d.id_pelajaran
                                join siswa e on a.siswa_id = e.id_siswa
                                left join nilai f on a.siswa_id = f.siswa_id and a.kelas_id = f.kelas_id and b.pelajaran_id = f.pelajaran_id 
                                and f.jenis <> 'KETRAMPILAN'
                                left join nilai g on a.siswa_id = g.siswa_id and a.kelas_id = g.kelas_id and b.pelajaran_id = g.pelajaran_id 
                                and g.jenis = 'KETRAMPILAN'
                                where a.siswa_id = '$id' and a.active = '1'
                                group by e.`nama_siswa`, c.lvl_kelas, c.`nama_kelas`, d.`nama_pelajaran`");
        return $query;
    }

    public function getDataKehadiran($id)
    {
        $query = $this->db->query("select `status`, count(`status`) jumlah from kehadiran where siswa_id='$id' and `status` <> 'MASUK' group by `status`");

        return $query;
    }
}
