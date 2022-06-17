<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;

class Pages extends BaseController
{


    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }


    public function index()
    {
        //

        $data = [
            'title' => 'Halaman Home'
        ];
        return view('pages/home', $data);
    }


    public function about()
    {
        //
        $data = [
            'title' => 'Halaman About'
        ];
        return view('pages/about', $data);
    }


    public function kontak()
    {
        //
        $data = [
            'title' => 'Halaman Kontak'
        ];
        return view('pages/kontak', $data);
    }

  


}
