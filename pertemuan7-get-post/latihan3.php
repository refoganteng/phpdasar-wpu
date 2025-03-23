<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>untuk halaman latihan4.php</h4>
    <form action="latihan4.php" method="post">
        Masukkan Nama: 
        <input type="text" name="nama">
        <br>
        <button type="submit">Kirim</button>
    </form>


    <h4>untuk merubah halaman ini</h4>
    <form action="" method="post">
        Masukkan Nama: 
        <input type="text" name="namaku">
        <br>
        <button type="submit" name="submited">Kirim</button>
    </form>
    <?php if(isset($_POST["submited"])) : ?>
        <h1>
            Selamat datang, <?= $_POST["namaku"] ?>!
        </h1>
    <?php endif; ?>

</body>
</html>