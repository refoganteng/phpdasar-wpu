<?php

//koneksi ke database phpdasar
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar"); //para: host, username, pw, database
//baca tabel mahasiswa
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



?>