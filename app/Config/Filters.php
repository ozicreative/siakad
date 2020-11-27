<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'fit' => \App\Filters\Fit::class,
		'fadmin' => \App\Filters\Fadmin::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'fit' => ['except' => [
				'auth', 'auth/*',
			]],
			'fadmin' => ['except' => [
				'auth', 'auth/*',
			]]
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'fit' => ['except' => [
				'dashboard',
				'guru', 'guru/*',
				'siswa', 'siswa/*',
				'kelas', 'kelas/*',
				'pelajaran', 'pelajaran/*',
				'jadwal', 'jadwal/*',
				'user', 'user/*',
				'kbm', 'kbm/*',
				'nilai', 'nilai/*',
				'kehadiran', 'kehadiran/*',
				'rapor', 'rapor/*',
				'profile', 'profile/*',
			]],
			'fadmin' => ['except' => [
				'dashboard',
				'guru', 'guru/*',
				'siswa', 'siswa/*',
				'kelas', 'kelas/*',
				'pelajaran', 'pelajaran/*',
				'jadwal', 'jadwal/*',
				'user', 'user/*',
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
