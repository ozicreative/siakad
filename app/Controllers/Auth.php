<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('auth');
    }

    public function cekuser()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'username' => [
                    'label' => 'ID User',
                    'rules' => 'required',
                    'label' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'label' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'username' => $validation->getError('username'),
                        'password' => $validation->getError('password'),
                    ]
                ];
            } else {
                //Cek User
                $query_cekuser = $this->db->query("SELECT * FROM user WHERE level='$username'");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    $row = $query_cekuser->getRow();
                    $pass = $row->password;

                    if (password_verify($password, $pass)) {
                        $simpan_session = [
                            'auth' => true,
                            'username' => $username,
                            'nama_user' => $row->nama_user,
                            'level' => $row->level
                        ];
                        $this->session->set($simpan_session);

                        $msg = [
                            'sukses' => [
                                'link' => 'dashboard'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'Password salah'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'username' => 'User tidak ditemukan'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        }
    }
}
