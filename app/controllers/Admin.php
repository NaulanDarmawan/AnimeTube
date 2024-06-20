<?php

class Admin extends Controller {
    public function index() {
        $data['judul'] = 'DAFTAR PENGGUNA APLIKASI';

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/index', $data);
        $this->view('layouts/admin_footer');
    }
}