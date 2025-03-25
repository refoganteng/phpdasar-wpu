<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

if (isset($_POST["submit"])) {
    // Ambil data dari tiap elemen dalam form
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $email = $_POST["email"];
    $jurusan = $_POST["jurusan"];
    $foto = $_POST["foto"];

    // Query INSERT data
    $query = "INSERT INTO mahasiswa 
                VALUES 
                ('', '$nama, '$nim', '$email', '$jurusan', '$foto')";

    mysqli_query($koneksi, $query);

    // Redirect ke index.php setelah data berhasil ditambahkan
    header("Location: index.php");

    cek berhasil nggak?
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "berhasil";
        echo "<br>";
    } else {
        echo "gagal";
        echo "<br>";
        echo mysqli_error($koneksi);
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
    <link href="https://fonts.googleapis.com/css2?family=Meslo+LG+S&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'MesloLGS NF', monospace;
        }
    </style>
</head>

<body class="bg-green-50 flex justify-center items-center min-h-screen font-mono">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-600 text-center mb-6">Tambah Mahasiswa</h1>

        <form action="" method="post">
            <div class="mb-4">
                <label for="nama" class="block text-green-700 font-semibold">Nama:</label>
                <input type="text" name="nama" id="nama" class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-green-700 font-semibold">NIM:</label>
                <input type="text" name="nim" id="nim" class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-green-700 font-semibold">E-Mail:</label>
                <input type="text" name="email" id="email" class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="jurusan" class="block text-green-700 font-semibold">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-green-700 font-semibold">Foto:</label>
                <input type="text" name="foto" id="foto" class="w-full p-2 border border-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit" name="submit" class="w-full bg-green-500 text-white font-bold py-2 rounded-md hover:bg-green-600 transition duration-200">
                Tambah Data
            </button>
        </form>
    </div>

</body>

</html>