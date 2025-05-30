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

// [read query] Ambil data mahasiswa dari database
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

// ketika tombol cari diklik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
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
            <div class="flex align-items-center">
                <img src="img/loader.gif"
                    class="hidden w-10 mr-2 transition-opacity duration-200 ease-in-out"
                    id="loader"
                    alt="Memuat...">

                <form onsubmit="return false;" action="" method="post">
                    <input class="p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" autocomplete="off" autofocus placeholder="Ketik keyword..." type="text" name="keyword" id="keyword">
                    <button name="cari" id="tombol-cari" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-200 hidden">Cari</button>
                </form>
            </div>

        </div>

        <div id="container">
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
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2 text-center"><?= $i; ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="ubah.php?id=<?= $mhs["id"]; ?>" class="text-blue-500 hover:underline">Ubah</a> |
                                <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="text-red-500 hover:underline">Hapus</a>
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
                </tbody>
            </table>
        </div>

    </div>

    <!-- script js -->
    <script src="javascript/jquery.js"></script>
    <script src="javascript/script.js"></script>
</body>

</html>