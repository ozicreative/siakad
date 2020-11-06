<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkehadiran extends Model
{

    public function getAll()
    {
        $builder = $this->db->query("SELECT t1.key_kehadiran, DATE_FORMAT(t1.tanggal,'%d-%m-%Y') tanggal, concat(t2.lvl_kelas,' - ',t2.`nama_kelas`) nama_kelas,
                                (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid) TOTAL,
                                (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='MASUK') MASUK,
                                (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='SAKIT') SAKIT,
                                (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='ALPHA') ALPHA,
                                (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='IJIN') IJIN
                                FROM kehadiran t1
                                JOIN kelas t2 ON t1.kelasid=t2.id_kelas
                                GROUP BY t1.key_kehadiran, t1.tanggal, t2.`nama_kelas`");

        return $builder->getResultArray();
    }

    public function getData($nomer)
    {
        $builder = $this->db->query("SELECT t1.id_kehadiran,t1.key_kehadiran,t1.`status`,t2.`nama_siswa`,t3.`lvl_kelas`,t3.`nama_kelas` kelas,
                                    DATE_FORMAT(t1.tanggal,'%d-%m-%Y') tanggal,t1.keterangan 
									FROM kehadiran t1
									JOIN siswa t2 ON t1.siswaid=t2.id_siswa
									JOIN kelas t3 ON t1.kelasid=t3.id_kelas
                                    WHERE key_kehadiran='$nomer'
                                    ORDER BY t2.`nama_siswa`");

        return $builder->getResultArray();
    }

    public function getKelas()
    {
        $builder = $this->db->query("SELECT t1.id_kelas, t1.`nama_kelas`
                                    FROM kelas t1
                                    WHERE t1.active='1'
                                    ORDER BY t1.`nama_kelas`");

        return $builder->getResultArray();
    }

    public function getDataSiswa($kelas)
    {
        $query = $this->db->query("SELECT *
                                    FROM kelas_siswa
                                    WHERE kelas_id = '$kelas'");

        return $query->getResultArray();
    }

    public function generate($data, $nomer)
    {
        $siswa = $this->getDataSiswa($data["kelas_id"]);

        foreach ($siswa as $row) {
            $this->db->query("INSERT INTO kehadiran (`key_kehadiran`,siswaid,kelasid,tanggal,`status`) 
            VALUES ('" . $nomer . "','" . $row["siswa_id"] . "','" . $data["kelas_id"] . "',
            STR_TO_DATE('" . $data["tanggal"] . "','%d%M,%Y'),'MASUK')");
        }

        // $builder = "";
        // $this->db->transStart();
        // foreach ($siswa as $row) {
        //     $this->db->query("INSERT INTO kehadiran (`key_kehadiran`,siswaid,kelasid,tanggal,`status`) 
        //     VALUES ('" . $nomer . "','" . $row["siswa_id"] . "','" . $data["kelas_id"] . "',
        //     STR_TO_DATE('" . $data["tanggal"] . "','%d%M,%Y'),'MASUK')");

        //     if ($this->db->transStatus() === TRUE) {
        //     } else {
        //         $builder = "x";
        //     }
        // }

        // if ($builder == "") {
        //     $this->db->transCommit();
        //     $res["status"] = "1";
        // } else {
        //     $this->db->transRollback();
        //     $res["status"] = "0";
        // }

        // return $res;
    }
}