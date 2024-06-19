<?php

class Member extends Controller {
    public function index() {
        $data['judul'] = 'Beranda Kamu';

        $this->view('layouts/header', $data);
        $this->view('member/index', $data);
        $this->view('layouts/footer');
    }
}