<?php
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //cek username dan pwd ada di database atau tidak
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password    
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">Halaman Login</h1>

        <form action="" method="post" class="space-y-4">
            <div>
                <label for="username" class="block text-green-800 font-medium">Username:</label>
                <input type="text" name="username" id="username"
                    class="mt-1 w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label for="password" class="block text-green-800 font-medium">Password:</label>
                <input type="password" name="password" id="password"
                    class="mt-1 w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <button type="submit" name="login"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition duration-300">
                    Login
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-green-700">Belum punya akun?
                <a href="registrasi.php" class="text-green-600 hover:underline font-semibold">Registrasi</a>
            </p>
        </div>
    </div>
</body>

</html>