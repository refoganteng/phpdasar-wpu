<?php
// Koneksi ke database
require 'functions.php';

// Ambil data mahasiswa dari database
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <!-- Tambahkan Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @font-face {
            font-family: 'Dank Mono';
            src: url('fonts/DankMono-Regular.woff2') format('woff2'),
                url('fonts/DankMono-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        .font-dank {
            font-family: 'Dank Mono', monospace;
        }
    </style>
</head>

<body class="bg-gray-100 p-6 font-dank">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">


        <div class="mt-4">
            <a href="create.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition duration-200">Tambah Data Mahasiswa</a>
        </div>

        <h1 class="text-2xl font-bold mb-4 text-center text-gray-700">Daftar Mahasiswa</h1>

        <table class="w-full border-collapse border border-gray-300 shadow-sm">
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
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center"><?= $i; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="#" class="text-blue-500 hover:underline">Ubah</a> |
                            <a href="#" class="text-red-500 hover:underline">Hapus</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <img src="foto-mahasiswa/<?= htmlspecialchars($row["foto"]); ?>" alt="Foto" class="w-12 h-12 rounded-full object-cover mx-auto">
                        </td>
                        <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row["nama"]); ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center"><?= htmlspecialchars($row["nim"]); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row["email"]); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row["jurusan"]); ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>