<?php

class BeritaComment_model
{
    private $table = 'berita_comments';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommentsBySlugNews($slug)
    {
        $this->db->query("SELECT berita.*, user.*, berita_comments.*
        FROM berita
        INNER JOIN berita_comments ON berita.id = berita_comments.id_berita
        INNER JOIN user ON berita_comments.id_user = user.id
        WHERE berita.slug_judul =:slug_judul");

        $this->db->bind('slug_judul', $slug);
        return $this->db->resultSet();
    }

    public function tambahDataKomentar($id_berita, $komentar)
    {
        $query = "INSERT INTO berita_comments (id_berita, id_user, komentar) VALUES (:id_berita, :id_user, :komentar)";
        $this->db->query($query);
        $this->db->bind('id_berita', $id_berita);
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('komentar', $komentar);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
