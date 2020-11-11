<?php

namespace App\Models;

use CodeIgniter\Model;

class Mnilai extends Model
{
    public function getAll()
    {
        $builder = $this->db->query("SELECT t1.key_nilai, DATE_FORMAT(t1.tanggal,'%d-%m-%Y') tanggal, t1.jenis, concat(t2.lvl_kelas,' - ',t2.`nama_kelas`) nama_kelas, t3.`nama_pelajaran` pelajaran
                                    FROM nilai t1
                                    JOIN kelas t2 ON t1.kelas_id=t2.id_kelas
                                    JOIN pelajaran t3 ON t1.pelajaran_id=t3.id_pelajaran
                                    GROUP BY t1.key_nilai, t1.tanggal, t2.`nama_kelas`");
        return $builder->getResultArray();
    }

    public function getData($nomer)
    {
        $builder = $this->db->query("SELECT t1.id_nilai,t1.key_nilai,t1.jenis,t2.`nama_siswa`,concat(t3.lvl_kelas,' - ',t3.`nama_kelas`) kelas,t4.`nama_pelajaran` pelajaran,t1.tanggal,t1.total_nilai 
                                    FROM nilai t1
                                    JOIN siswa t2 ON t1.siswa_id=t2.id_siswa
                                    JOIN kelas t3 ON t1.kelas_id=t3.id_kelas
                                    JOIN pelajaran t4 ON t1.pelajaran_id=t4.id_pelajaran
                                    WHERE key_nilai='$nomer' ORDER BY t2.`nama_siswa`");
        return $builder->getResultArray();
    }

    public function getKelas()
    {
        $query = $this->db->query("SELECT t1.id_kelas, t1.`nama_kelas` FROM kelas t1
                                    WHERE t1.active='1' ORDER BY t1.`nama_kelas`");
        return $query->getResultArray();
    }

    public function getPelajaran()
    {
        $query = $this->db->query("SELECT t1.id_pelajaran, t1.`nama_pelajaran` FROM pelajaran t1
                                    WHERE t1.active='1' ORDER BY t1.`nama_pelajaran`");
        return $query->getResultArray();
    }

    public function getDataSiswa($klas)
    {
        $query = $this->db->query("SELECT * FROM kelas_siswa WHERE kelas_id='$klas'");
        return $query->getResultArray();
    }

    public function generate($data, $nomer)
    {
        $siswa = $this->getDataSiswa($data["kelas_id"]);

        $query = "";
        $this->db->transStart();
        foreach ($siswa as $row) {
            $this->db->query("INSERT INTO nilai (`key_nilai`,siswa_id,kelas_id,tanggal,jenis,total_nilai,pelajaran_id) 
								VALUES ('" . $nomer . "','" . $row["siswa_id"] . "','" . $data["kelas_id"] . "','" . $data["tanggal"] . "','" . $data["jenis"] . "'
                                ,'0','" . $data["pelajaran_id"] . "')");

            if ($this->db->transStatus() === TRUE) {
            } else {
                $query = "x";
            }
        }

        if ($query == "") {
            $this->db->transCommit();
            $res["status"] = "1";
        } else {
            $this->db->transRollback();
            $res["status"] = "0";
        }

        return $res;
    }

    public function ubah($data)
    {
        $this->db->table('nilai')
            ->where('id_nilai', $data['id_nilai'])
            ->update($data);
    }
}
