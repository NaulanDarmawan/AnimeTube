<?php

class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getUserBySlug($slug)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE slug_nama=:slug_nama");
        $this->db->bind('slug_nama', $slug);
        return $this->db->single();
    }

    public function getUsersByNama($nama)
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

    public function tambahDataUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $slug_nama = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $username));
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->db->query("INSERT INTO {$this->table} (nama, slug_nama, email, password, role, image) VALUES (:nama, :slug_nama, :email, :password, :role, :image)");
            $this->db->bind('nama', $username);
            $this->db->bind('slug_nama', $slug_nama);
            $this->db->bind('email', $email);
            $this->db->bind('password', $password);
            $this->db->bind('role', "User");
            $this->db->bind('image', "profile.png");

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Akun berhasil dibuat', 'aksi' => ''];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat membuat akun', 'aksi' => ''];
            }
            return $this->db->rowCount();
        }
    }

    public function updateDataUser($postData, $fileData)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($postData['username']);
            $email = htmlspecialchars($postData['email']);
            $slug_nama = htmlspecialchars($postData['id']);
            $foto = '';

            if (!empty($fileData['image']['name'])) {
                $targetDir = "assets/images/";
                $targetFile = $targetDir . basename($fileData["image"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                $check = getimagesize($fileData["image"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($fileData["image"]["tmp_name"], $targetFile)) {
                        $foto = basename($fileData["image"]["name"]);
                    } else {
                        $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Gagal mengunggah gambar.', 'aksi' => ''];
                        return false;
                    }
                } else {
                    $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'File bukan gambar.', 'aksi' => ''];
                    return false;
                }
            } else {
                $foto = isset($postData['current_foto']) ? basename($postData['current_foto']) : 'profile.png';

                if (isset($postData['delete_foto']) && $postData['delete_foto'] === 'true') {
                    $foto = 'profile.png';
                }
            }

            $query = "UPDATE {$this->table} SET nama = :nama, email = :email, image = :foto WHERE slug_nama = :slug_nama";
            $this->db->query($query);
            $this->db->bind('nama', $username);
            $this->db->bind('email', $email);
            $this->db->bind('foto', $foto);
            $this->db->bind('slug_nama', $slug_nama);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Data berhasil diperbarui.', 'aksi' => ''];
                return true;
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
                return false;
            }
        }
    }

    public function updateRole()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = htmlspecialchars($_POST['role']);
            $nama = htmlspecialchars($_POST['nama']);

            $query = "UPDATE {$this->table} SET role = :role WHERE nama = :nama";
            $this->db->query($query);
            $this->db->bind('role', $role);
            $this->db->bind('nama', $nama);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Data berhasil diperbarui.', 'aksi' => ''];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
            }
            return $this->db->rowCount();
        }
    }

    public function deleteUser($slug)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $query = "DELETE FROM {$this->table} WHERE slug_nama = :slug_nama";
            $this->db->query($query);
            $this->db->bind('slug_nama', $slug);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Data berhasil diperbarui.', 'aksi' => ''];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
            }
            return $this->db->rowCount();
        }
    }

    public function validasiUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $this->db->query("SELECT * FROM {$this->table} WHERE email = :email");
            $this->db->bind('email', $email);
            $user = $this->db->single();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'slug_nama' => $user['slug_nama'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'image' => $user['image']
                ];

                // Arahkan pengguna berdasarkan peran mereka
                switch ($user['role']) {
                    case 'Admin':
                        header('Location: ' . BASEURL . '/admin/index');
                        break;
                    case 'User':
                        header('Location: ' . BASEURL . '/member/index');
                        break;
                    case 'Creator':
                        header('Location: ' . BASEURL . '/creator/index');
                        break;
                    default:
                        $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Peran tidak dikenal', 'aksi' => ''];
                        header('Location: ' . BASEURL . '/user/index');
                        break;
                }
                exit;
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Email atau password salah', 'aksi' => ''];
                header('Location: ' . BASEURL . '/user/index');
                exit;
            }
        }
    }

    public function middlewareRole()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/user/index');
            exit;
        }

        // Periksa peran pengguna dan arahkan ke halaman yang sesuai
        switch ($_SESSION['user']['role']) {
            case 'Admin':
                header('Location: ' . BASEURL . '/admin/index');
                exit;
            case 'User':
                header('Location: ' . BASEURL . '/member/index');
                exit;
            case 'Creator':
                header('Location: ' . BASEURL . '/kreator/index');
                exit;
            default:
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Peran tidak dikenal', 'aksi' => ''];
                header('Location: ' . BASEURL . '/user/index');
                exit;
        }
    }
}
