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

    public function updateGenre()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);

            $query = "UPDATE {$this->table} SET nama = :nama WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('nama', $nama);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Data berhasil diperbarui.', 'aksi' => ''];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
            }
            return $this->db->rowCount();
        }
    }

    public function deleteGenre($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Data berhasil diperbarui.', 'aksi' => ''];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
            }
            return $this->db->rowCount();
        }
    }
}
