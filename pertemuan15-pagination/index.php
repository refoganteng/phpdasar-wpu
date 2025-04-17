<?php
//session start
session_start();

//cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Koneksi ke database + function query
require 'functions.php';

//konfigurasi pagination + cari
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : '';

// $jumlahDataPerHalaman = 3;
$jumlahDataPerHalaman = isset($_GET["jumlahDataTampil"]) ? (int)$_GET["jumlahDataTampil"] : 2;

// lihat jumlah data berdasarkan isi keyword
if ($keyword) {
    $jumlahData = count(query("SELECT * FROM mahasiswa WHERE 
        nim LIKE '%$keyword%' OR 
        nama LIKE '%$keyword%' OR 
        jurusan LIKE '%$keyword%' OR 
        email LIKE '%$keyword%'"));
} else {
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
}

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// [read query] Ambil data mahasiswa dari database + pagination + cari
if ($keyword) {
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE 
        nim LIKE '%$keyword%' OR 
        nama LIKE '%$keyword%' OR 
        jurusan LIKE '%$keyword%' OR 
        email LIKE '%$keyword%' 
        LIMIT $awalData, $jumlahDataPerHalaman");
} else {
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="icon" type="image/x-icon" href="favicon_io/favicon.ico">

    <!-- Tambahkan Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 p-6 font-sans">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="mb-4 flex justify-end">
            <a href="logout.php" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-red-700 transition duration-200">Logout</a>
        </div>

        <h1 class="text-2xl bg-blue-500 py-2 px-4 rounded-lg font-bold mb-4 text-center text-white shadow-md">Daftar Mahasiswa</h1>

        <div class="mt-6 flex justify-between">
            <a href="create.php" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-200">Tambah Data Mahasiswa
            </a> <br>

            <form action="" method="get">
                <input class="p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" autocomplete="off" autofocus placeholder="Ketik keyword..." type="text" name="keyword" id="">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">Cari</button>
            </form>

        </div>
        <table class="mt-5 w-full border-collapse border border-gray-300 shadow-sm">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No.</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    <th class="border border-gray-300 px-4 py-2">Gambar</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Jurusan</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <?php $i = $awalData + 1; ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center"><?= $i; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="ubah.php?id=<?= $mhs["id"]; ?>" class="inline-block bg-blue-500 text-white py-1 px-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">Ubah</a> 
                            <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="inline-block bg-red-500 text-white py-1 px-2 rounded-lg shadow-md hover:bg-red-700 transition duration-200">Hapus</a>

                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <img src="foto-mahasiswa/<?= htmlspecialchars($mhs["foto"]); ?>" alt="Foto" class="w-12 h-12 rounded-full object-cover mx-auto">
                        </td>
                        <td class="border border-gray-300 px-4 py-2"><?= $mhs["nama"]; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center"><?= $mhs["nim"]; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $mhs["email"]; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $mhs["jurusan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

                <!-- jika hasil cari kosong -->
                <?php if (empty($mahasiswa)) : ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>


            </tbody>
        </table>

        <!-- navigasi pagination -->
        <div class="mt-4 flex justify-end gap-2 items-center">
            <?php if ($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1; ?>&keyword=<?= $keyword; ?>&jumlahDataTampil=<?= $jumlahDataPerHalaman; ?>" class="text-blue-500 hover:underline"> &laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i; ?>&keyword=<?= $keyword; ?>&jumlahDataTampil=<?= $jumlahDataPerHalaman; ?>" class="font-bold text-blue-500"><?= $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>&keyword=<?= $keyword; ?>&jumlahDataTampil=<?= $jumlahDataPerHalaman; ?>" class="text-blue-500 hover:underline"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>&keyword=<?= $keyword; ?>&jumlahDataTampil=<?= $jumlahDataPerHalaman; ?>" class="text-blue-500 hover:underline">Next &raquo;</a>
            <?php endif; ?>

            <div class="flex items-center ml-4">
                <form action="" method="get">
                    <label for="jumlahDataTampil" class="mr-2">Jumlah Data:</label>
                    <select name="jumlahDataTampil" id="jumlahDataTampil" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="2" <?= $jumlahDataPerHalaman == 2 ? 'selected' : '' ?> class="text-center">2</option>
                        <option value="3" <?= $jumlahDataPerHalaman == 3 ? 'selected' : '' ?> class="text-center">3</option>
                        <option value="4" <?= $jumlahDataPerHalaman == 4 ? 'selected' : '' ?> class="text-center">4</option>
                    </select>
                </form>
            </div>
        </div>

    </div>
</body>

</html>