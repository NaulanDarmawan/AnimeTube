<?php

class AnimeComment_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommentsBySlugNews($slug)
    {
        $this->db->query("SELECT anime.*, user.*, anime_comments.*
        FROM anime
        INNER JOIN anime_comments ON anime.id = anime_comments.anime_id
        INNER JOIN user ON anime_comments.user_id = user.id
        WHERE anime.slug_nama =:slug_nama");

        $this->db->bind('slug_nama', $slug);
        return $this->db->resultSet();
    }

    public function tambahDataKomentar($anime_id, $komentar)
    {
        $query = "INSERT INTO anime_comments (anime_id, user_id, komentar) VALUES (:anime_id, :user_id, :komentar)";
        $this->db->query($query);
        $this->db->bind('anime_id', $anime_id);
        $this->db->bind('user_id', $_SESSION['user']['id']);
        $this->db->bind('komentar', $komentar);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
