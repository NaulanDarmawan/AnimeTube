<?php

class Berita_model
{
    private $table = 'berita';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNews()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getNewsBySlug($slug)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE slug_judul=:slug_judul");

        // Kita cek tipe data yang masuk dengan fungsi bind, agar tidak bisa di
        // SQL injection
        $this->db->bind('slug_judul', $slug);

        return $this->db->single();
    }

    public function getNewsByJudulOrDesc($judul)
    {
        if (!isset($judul)) {
            $this->db->query("SELECT * FROM {$this->table}");
            return $this->db->resultSet();
        } else {
            $this->db->query("SELECT * FROM {$this->table} WHERE judul like :judul OR deskripsi like :judul");
            $this->db->bind('judul', "%" . $judul . "%");
            return $this->db->resultSet();
        }
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa(nama, nim, email, jurusan) VALUES (:nama, :nim, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
