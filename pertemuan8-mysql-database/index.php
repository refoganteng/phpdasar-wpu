<?php
//koneksio ke database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar"); //para: host, username, pw, database

//ambil data dari tabel mahasiswa
$result = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa"
);

// var_dump($result);
// if (!$result) {
//     echo mysqli_error($koneksi);
// };

//ambil data mahasiswa dari objek result
// mysqli_fetch_row() //mengembalikan array numerik
// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[3]);

// mysqli_fetch_assoc() //mengembalikan array asosiatif
// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs["email"]);
// };

// mysqli_fetch_array() //mengembalikan keduanya
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs["email"]);
// var_dump($mhs[3]);

// mysqli_fetch_object() //mengembalikan objek
// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->email);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
                </td>
                <td>
                    <img src="foto-mahasiswa/<?= $mhs["foto"]; ?>" alt="" width="50">
                </td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>

    </table>

</body>

</html>