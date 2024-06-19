<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // Database Handler
    private $stmt; // Statement

    public function __construct()
    {
        // Data Source Name
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

        $option = [
            PDO::ATTR_PERSISTENT => true, // Menjaga Database Agar Koneksi Terjaga Terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Tampilkan Exception Jika terjadi Error
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Agar App Kita Bisa Membaca Parameter SQL, Seperti Klausa Where, Value Insert Into, SET Alter, DLL
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT; // Set Parameter Menjadi Tipe Integer
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL; // Set Parameter Menjadi Tipe Boolean
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL; // Set Parameter Menjadi Null
                    break;

                default:
                    $type = PDO::PARAM_STR; // Jika Selain Diatas, Otomatis Dibaca Sebagai String
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    // Jika Result Return Banyak Data Pakai Fungsi Ini
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // Return Array Assosiatif Dari Fungsi PDO Fetch Assoc
    }

    // Jika Result Return Single / Satu Data pakai Fungsi Ini
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghitung Ada Berapa Baris Yang Berubah Didalam Tabel
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
