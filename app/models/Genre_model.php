<?php

class Genre_model
{
    private $table = 'genre';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGenres()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getGenreById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getGenresByNama($nama)
    {
        if (!isset($nama)) {
            $this->db->query("SELECT * FROM {$this->table}");
            return $this->db->resultSet();
        } else {
            $this->db->query("SELECT * FROM {$this->table} WHERE nama like :nama");
            $this->db->bind('nama', "%" . $nama . "%");
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
