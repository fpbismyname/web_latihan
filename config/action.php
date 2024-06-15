<?php
include "database.php";

class Action
{
    //isi database
    public $db;
    //function bawaan agar konek ke database
    public function __construct()
    {
        $this->db = new Database(); //inisiasi database
    }
    //function untuk berpindah halaman
    public function navigate($pages)
    {
        header("Location: $pages");
    }
    //function untuk mengeluarkan notifikasi
    public function message($msg, $resub = true)
    {
        if ($resub){
            echo "<script>alert('$msg')</script>";
            $this->fixResubmission();
        } else {
            echo "<script>alert('$msg')</script>";
        }
    }
    //function untuk cegah resubmission ketika di refresh
    public function fixResubmission()
    {
        header("refresh:0; url=" . $_SERVER["REQUEST_URI"]);
    }
    //mengambil data session
    public function getSession($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return $_SESSION[$key] = null;
        }
    }
    //Mengambil data session
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    //Menghapus data session
    public function removeSession($key)
    {
        unset($_SESSION[$key]);
    }
    //function untuk login 
    public function login($username, $password)
    {
        try {

            if (empty($username) || empty($password)) {
                $this->message("Form tidak boleh kosong !");
            } else {
                $data = $this->db->getUser($username, $password);
                if (!empty($data)) {
                    if ($username == $data["username"] && $password == $data["password"]) {
                        $this->navigate("pages/" . $data['role'] . "/home.php");
                    } else {
                        $this->message("Akun tidak ada !");
                    }
                } else {
                    $this->message("Akun tidak ada !");
                }
            }
        } catch (Exception $e) {
            $this->message("Akun tidak ada !");
        }
    }
    //function untuk daftar
    public function register($username, $password, $email)
    {
        try {
            if (empty($username) || empty($password) || empty($email)) {
                $this->message("Form tidak boleh kosong !");
            } else {
                $register = $this->db->inputUser($email, $username, $password);
                if ($register) {
                    $this->navigate("index.php");
                    $this->setSession("regis", true);
                } else {
                    $this->message("Nama akun tidak boleh sama !");
                }
            }
        } catch (Exception $e) {
            $this->message("Nama akun tidak boleh sama !");
        }
    }
}
