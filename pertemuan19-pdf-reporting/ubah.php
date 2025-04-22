<?php
//session start
session_start();

//cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//[UPDATE QUERY] Ambil data mahasiswa berdasarkan id
$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
                <script>    
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>    
                    alert('Data gagal diubah!');
                    document.location.href = 'index.php';
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
    <title>Ubah Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-purple-50 flex justify-center items-center min-h-screen font-sans">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-purple-600 text-center mb-6">Ubah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="fotoLama" value="<?= $mhs["foto"]; ?>">

            <div class="mb-4">
                <label for="nama" class="block text-purple-700 font-semibold">Nama:</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>" class="w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-purple-700 font-semibold">NIM:</label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>" class="w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-purple-700 font-semibold">E-Mail:</label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>" class="w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="jurusan" class="block text-purple-700 font-semibold">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>" class="w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-purple-700 font-semibold">Foto:</label>
                <div class="mb-4 w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <img width="100" src="foto-mahasiswa/<?= $mhs["foto"]; ?>" alt="">
                </div>
                <input type="file" name="foto" id="foto"  class="w-full p-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <button type="submit" name="submit" class="mb-6 w-full bg-purple-500 text-white font-bold py-2 rounded-md hover:bg-purple-600 transition duration-200">
                Ubah Data
            </button>
            <div class="text-sm py-2 px-4 rounded-lg mb-4 text-center text-blue-500 hover:text-blue-700">
                <a href="index.php">Daftar Mahasiswa</a>
            </div>
        </form>
    </div>
</body>

</html>