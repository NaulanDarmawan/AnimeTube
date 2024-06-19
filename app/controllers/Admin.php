<?php

class Admin extends Controller {
    public function index() {
        $data['judul'] = 'DAFTAR PENGGUNA APLIKASI';

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('admin/index', $data);
        $this->view('layouts/footer');
    }
}