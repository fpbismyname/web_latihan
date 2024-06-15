<?php
class Database 
{
    //Menampung kebutuhan data untuk menyambung ke database
    protected $hostname = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $db_name = "db_myshop";
    protected $port = 3311;
    protected $db = null;

    //Menjalankan fungsi koneksi ke database ketika di panggil
    public function __construct()
    {
        //Setup koneksi ke database
        $db = new mysqli($this->hostname, $this->user, $this->pass, $this->db_name, $this->port);
        //cek jika terjadi kesalahan di database
        if ($db->connect_error) {
            die("Terjadi Kesalahan !" . $db->connect_error);
        }
        //inisialisasi method database baru
        $this->db = $db;
    }

    //Query CRUD database
    //mengambil data akun untuk kebutuhan validasi login 
    public function getUser($username, $password)
    {
        //membersikan data yang akan di input ke query
        $user = $this->db->real_escape_string($username);
        $pass = $this->db->real_escape_string($password);

        //query untuk memanggil data dari database
        $sql = "SELECT * FROM akun WHERE username = '$user' AND password = '$pass'";

        //menampung data yang di panggil dari database
        $result = $this->db->query($sql);

        //mengeluarkan data yang telah di tampung
        if ($result->num_rows > 0){ //jika data yang dipanggil ada, maka akan dikeluarkan nilainya
            return $result->fetch_assoc();
        } else {
            return null; //jika data yang dipanggil tidak ada, maka datanya akan di kosongkan (null)
        }
    }
    //menginput data akun ke database
    public function inputUser($email, $username, $password){
        //membersihkan data yang akan di input ke query
        $email = $this->db->real_escape_string($email);
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        //query untuk menginput akun baru
        $sql = "INSERT INTO akun(role, email, username, password) VALUES('user','$email','$username','$password')";

        //menampung hasil input
        $result = $this->db->query($sql);

        //mengeluarkan nilai, apakah data terinput ? atau tidak ?
        if ($result){
            return true;//jika terinput, keluarkan nilai true (berhasil terinput)
        }
    }
}
