<?php

//koneksi ke database phpdasar
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar"); //para: host, username, pw, database

//[READ] baca tabel mahasiswa
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//[CREATE] tambah data mahasiswa
function tambah($data)
{
    //ambil data dari tiap elemen dalam form
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $foto = htmlspecialchars($data["foto"]);

    //query insert data
    $query = "INSERT INTO mahasiswa (nama, nim, email, jurusan, foto) 
          VALUES ('$nama', '$nim', '$email', '$jurusan', '$foto')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

//[UPDATE] ubah data mahasiswa
function ubah($data)
{
    //ambil data dari tiap elemen dalam form
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $foto = htmlspecialchars($data["foto"]);

    //query update data 
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                email = '$email',   
                jurusan = '$jurusan',
                foto = '$foto'
                WHERE id = $id
            ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


