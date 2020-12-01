<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdashboard extends Model
{

	public function gethadir()
	{
		$builder = $this->db->query("SELECT (SELECT COUNT(`status`) jumlah
					FROM kehadiran
					WHERE tanggal = DATE_FORMAT(now(), '%Y-%m-%d')
					AND `status` <> 'ALPHA') alpha,
					(SELECT COUNT(`status`) jumlah
					FROM kehadiran
					WHERE tanggal = DATE_FORMAT(now(), '%Y-%m-%d')
					AND `status` <> 'SAKIT') sakit,
					(SELECT COUNT(id_siswa)
					FROM siswa
					WHERE active = '1') siswa");

		// $query = $this->db->query($builder)->getResultArray();
		// return $query;
		return $builder->getResultArray();
	}

	public function gettop()
	{
		$builder = $this->db->query("SELECT CONCAT(b.`nama_siswa`, '(',d.`nama_kelas`,')') `nama`, AVG(a.total_nilai) `value`
					FROM nilai a
					JOIN siswa b ON a.siswa_id = b.id_siswa
					JOIN kelas_siswa c ON a.siswa_id = c.siswa_id
					JOIN kelas d ON c.kelas_id = d.id_kelas
					GROUP BY a.siswa_id
					ORDER BY AVG(a.total_nilai) DESC
					LIMIT 5");

		//     $query = $this->db->query($builder)->getResultArray();
		//     return $query;
		return $builder->getResultArray();
	}

	public function avgkelas()
	{
		$builder = $this->db->query("SELECT CONCAT(d.lvl_kelas,'-',d.`nama_kelas`) `nama`, AVG(a.total_nilai) `value`
					FROM nilai a
					JOIN siswa b ON a.siswa_id = b.id_siswa
					JOIN kelas_siswa c ON a.siswa_id = c.siswa_id
					JOIN kelas d ON c.kelas_id = d.id_kelas
					GROUP BY d.`nama_kelas`
					ORDER BY AVG(a.total_nilai) ASC
					LIMIT 5");

		// $query = $this->db->query($builder)->getResultArray();
		// return $query;
		return $builder->getResultArray();
	}

	public function getGrafik()
	{
		$query = $this->db->query("SELECT CONCAT(b.`nama_siswa`, '(',d.`nama_kelas`,')') `nama`, AVG(a.total_nilai) `value`
				FROM nilai a
				JOIN siswa b ON a.siswa_id = b.id_siswa
				JOIN kelas_siswa c ON a.siswa_id = c.siswa_id
				JOIN kelas d ON c.kelas_id = d.id_kelas
				GROUP BY a.siswa_id
				ORDER BY AVG(a.total_nilai) DESC
				LIMIT 5");

		$hasil = [];
		if (!empty($query)) {
			foreach ($query->getResultArray() as $data) {
				$hasil[] = $data;
			}
		}
		return $hasil;
	}

	// public function getTop()
	// {
	// 	return $this->table('nilai')
	// 			->select('')
	// }
}
