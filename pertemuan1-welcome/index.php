<?php

//cobain echo
echo 1000*90;
echo "<br>";
echo "hello duniawiiiiiiii";

//variabel
$namaLengkap= "REvO nanDo";
$jenisKelamin="Laki-Laki";
$status="Kawin";
$pesan='selamat datang, ';
$benar=true;
$salah=false;
$binatang=array("babi","anjing","kampret");
$burung=["murai","waalet","jalak bali"]
// echo $namaLengkap;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang ya Ahli Coding</h1>
    <p>
        Nama: <?php echo $namaLengkap; ?>
    </p>
    <p>
        Nama UPPER: <?php echo strtoupper($namaLengkap); ?>
    </p>
    <p>
        Nama Proper: <?php echo ucwords(strtolower($namaLengkap)); ?>
    </p>
    <p>
        Nama lower----: <?php echo strtolower($namaLengkap); ?>
    </p>

    <hr>

    <p>
        Jenis Kelamin: <?php echo $jenisKelamin; ?>
    </p>
    <p>
        Status: <?php echo $status; ?>
    </p>

    <p>
        Greeting: <?php echo $pesan . "------------" . ucwords(strtolower($namaLengkap))?>
    </p>

    <p>
        <?php echo $benar. ' dan ' . $salah;
        var_dump($benar)?>
    </p>

    <p>
        <?php echo $binatang[2]. " " . $burung[2] ?>
    </p>
</body>
</html>