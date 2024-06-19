<?php

class App
{
    // Membuat Default Attribute
    protected $controller = 'User';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Jika Controller Ada, Maka Ganti Controller Default nya
        if (isset($url[0])) {
            if (file_exists("../app/controllers/{$url[0]}.php")) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        // Jika Method Ada, Maka Ganti Method Default nya
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Kelola Parameter, Masukkan Sisa Parameter URL Dalam 01 Array
        if (!empty($url)) {
            $this->params =  array_values($url);
        }

        //Jalankan Controller & Method, Serta Kirimkan Params Jika Ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // Hapus Tanda / Di Akhir URL Agar Tidak Terbaca Oleh Program
            $url = rtrim($_GET['url'], '/');

            // Bersihkan URL dari tulisan aneh aneh / cegah hacking melalui url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
