<?php

namespace App\Controllers;

use App\Models\UserModel;

use function PHPSTORM_META\map;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
        helper('cookie');
        helper('global_fungsi_helper');
    }




    public function login()
    {

        $data = ['validation' => $this->validation];
        return view('users/login', $data);
    }

    public function main()
    {

        $data = ['validation' => $this->validation];
        return view('users/main', $data);
    }

    public function logout()
    {
        $data = ['validation' => $this->validation];
        delete_cookie('cookie_email');
        delete_cookie('cookie_password');
        session()->destroy();
        if (session()->get('email') != '') {
            session()->setFlashdata('success', 'Berhasil Logout');
        }

        return view('users/login', $data);
    }

    public function lupapassword()
    {
        # code...
        $data = ['validation' => $this->validation];
        return view('users/lupapassword', $data);
    }

  
    public function resetpassword()
    {
        # code...

        $err = [];
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        if ($email != '' and $token != '') {
            $dataAkun = $this->userModel->getData($email);
            if ($dataAkun['token'] != $token) {
                $err[] = "Token tidak valid";
            }
        } else {
            $err[] = "Parameter yang dikirimkan tidak valid";
        }

        if ($err) {
            session()->setFlashdata('pesan', $err);
        }

        if ($this->request->getMethod() == 'post') {
            $aturan = [
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Minimal 5 karakter'
                    ]
                ],
                'konfirmasi_password' => [
                    'rules' => 'required|min_length[5]|matches[password]',
                    'errors' => [
                        'required' => 'Konfirmasi Password harus diisi',
                        'min_length' => 'Konfirmasi password Minimal 5 karakter',
                        'matches' => 'Password tidak sesuai'
                    ]
                ]
            ];

            if (!$this->validate($aturan)) {
                session()->setFlashdata('pesan', $this->validation->getErrors());
            } else {
                $dataUpdate = [
                    'email' => $email,
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token' => null
                ];
                $this->userModel->updateData($dataUpdate);
                session()->setFlashdata('success', 'Password berhasil di reset');
                delete_cookie('cookie_email');
                delete_cookie('cookie_password');
                return redirect()->to('user/login')->withCookies();
            }
        }

        return view('users/resetpassword');
    }

    public function fungsiLupapassword()
    {
        # code...
        $err = [];

        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getVar('email');

            if ($email == '') {
                $err[] = "Silahkan masukan email yang anda punya";
            }

            if (empty($err)) {
                $data = $this->userModel->getData($email);

                if (empty($data)) {
                    $err[] = "Akun yang kamu masukan tidak terdaftar";
                }
            }

            if (empty($err)) {
                $email = $data['email'];
                $token = md5(date('ymdhis'));
                $link = site_url("user/resetpassword/?email=$email&token=$token");
                $attachment = "";
                $to = $email;
                $title = "Reset Password";
                $message = "Berikut ini adalah link untuk melakukan reset password anda ";
                $message .=  "Silahkan klik/salin link ini $link";

                kirim_email($attachment, $to, $title, $message);

                $dataUpdate = [
                    'email' => $email,
                    'token' => $token,
                ];
                $this->userModel->updateData($dataUpdate);
                session()->setFlashdata('success', 'Email recovery sudah kami kirimkan');
            }

            if ($err) {
                session()->setFlashdata('warning', $err);
            }
            return redirect()->to('user/lupapassword')->withInput();
        }
    }


    public function fungsiLogin()
    {


        if (get_cookie('cookie_email') && get_cookie('cookie_password')) {
            $email = get_cookie('cookie_email');
            $password = get_cookie('cookie_password');

            $dataAkun = $this->userModel->getData($email);
            if ($password != $dataAkun['password']) {
                session()->setFlashdata('pesan', 'Akun yang kamu masukan tidak sesuai');
                delete_cookie('cookie_email');
                delete_cookie('cookie_password');
                return redirect()->to('user/main')->withCookies();
            }
            $dataUser = [
                'nama' => $dataAkun['nama'],
                'email' => $dataAkun['email'],
                'gambar' => $dataAkun['gambar']
            ];
            session()->set($dataUser);
            return redirect()->to('user/main')->withCookies();
        }

        if ($this->request->getMethod() == 'post') {

            if (!$this->validate([
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email harus diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
                ],
            ])) {
                return redirect()->to('user/login')->withInput();
            }

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $remember = $this->request->getVar('remember');

            $dataAkun = $this->userModel->getData($email);
            if (!password_verify($password, $dataAkun['password'])) {
                session()->setFlashdata('pesan', 'Login gagal! periksa kembali Email dan Password!');
                return redirect()->to('/user/login');
            }

            if ($remember == '1') {
                set_cookie('cookie_email', $email, 3600);
                set_cookie('cookie_password', $dataAkun['password'], 3600);
            }

            $dataUser = [
                'nama' => $dataAkun['nama'],
                'email' => $dataAkun['email'],
                'gambar' => $dataAkun['gambar']
            ];
            session()->set($dataUser);
            return redirect()->to('user/main')->withCookies();
        }
    }



    public function registrasi()
    {
        $data = [
            'validation' => $this->validation
        ];
        return view('users/regis', $data);
    }

    public function save()
    {
        # code...

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[users.nama]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'is_unique' => 'Nama sudah ada yang pakai'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah ada',
                    'valid_email' => 'Ini bukan email!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ],
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Bukan gambar maseh!',
                    'mime_in' => 'Format yang di dukung jpg,jpeg,png'
                ]
            ]
        ])) {
            return redirect()->to('/user/registrasi')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        //apakah tidak ada gambar yang di upload

        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            //ambil nama file
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan
            $fileGambar->move('img', $namaGambar);
        }

        $data_user = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'gambar' => $namaGambar
        ];

        $this->userModel->insert($data_user);

        session()->setFlashdata('success', 'Akun anda berhasil didaftarkan');
        return redirect()->to('/user/login');
   
    }





    function coba() {
        return view('users/template');
    }

 

}
