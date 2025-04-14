<?php
require 'functions.php';

//[cek sudah submit belum]
if (isset($_POST["submit"])) {
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('data gagal ditambahkan');            
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
            body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-green-50 flex justify-center items-center min-h-screen font-sans">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-600 text-center mb-6">Tambah Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="nama" class="block text-green-700 font-semibold">Nama:</label>
                <input type="text" name="nama" id="nama" required class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-green-700 font-semibold">NIM:</label>
                <input type="text" name="nim" id="nim" required class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-green-700 font-semibold">E-Mail:</label>
                <input type="text" name="email" id="email" required class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="jurusan" class="block text-green-700 font-semibold">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-green-700 font-semibold">Foto:</label>
                <input type="file" name="foto" id="foto" required class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit" name="submit" class="mb-6 w-full bg-green-500 text-white font-bold py-2 rounded-md hover:bg-green-600 transition duration-200">
                Tambah Data
            </button>
            <div class="text-sm py-2 px-4 rounded-lg mb-4 text-center text-blue-500 hover:text-blue-700">
                <a href="index.php">Daftar Mahasiswa</a>
            </div>
        </form>
    </div>

</body>

</html>

