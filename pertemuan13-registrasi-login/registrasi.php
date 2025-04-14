<?php

require 'functions.php';

if(isset($_POST["register"])) {
    if(register($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>
        ";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-50 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-blue-600 text-center mb-6">Halaman Registrasi</h1>

        <form action="" method="post" class="space-y-4">
            <div>
                <label for="username" class="block text-blue-700 font-semibold">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="password" class="block text-blue-700 font-semibold">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="password2" class="block text-blue-700 font-semibold">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" required
                       class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <button type="submit" name="register"
                        class="w-full bg-blue-500 text-white font-bold py-2 rounded-md hover:bg-blue-600 transition duration-200">
                    Registrasi
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <a href="login.php" class="text-sm text-blue-500 hover:underline">Sudah punya akun? Login</a>
        </div>
    </div>

</body>
</html>
