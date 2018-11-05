<?php
//membuat koneksi
$connect = mysqli_connect ("localhost","root","","Mahasiswa");
//ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query ($connect, "SELECT * FROM mahasiswa");

// while($mhs = mysqli_fetch_assoc ($result)){
//     var_dump($mhs);
// }

function query($query_kedua){
    global $connect;

    $result = mysqli_query($connect,$query_kedua);

    $rows= [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $connect;

    $nama = $_POST["Nama"];
    $nim = $_POST["Nim"];
    $email = $_POST["Email"];
    $jurusan = $_POST["Jurusan"];
    $gambar = $_POST["Gambar"];

    $query = "INSERT INTO mahasiswa VALUES
    ('','$nama','$nim','$email','$jurusan','$gambar')";
    mysqli_query($connect,$query);

    return mysqli_affected_rows($connect);
}

function hapus($id){
    global $connect;
    mysqli_query($connect,"DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($connect);
}
?>
