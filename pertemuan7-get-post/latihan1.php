<?php
//variabel scope / lingkup variabel
$x = 10;
echo $x; //normal
echo "<br>";

function tampilX()
{
    global $x; //global variabel
    echo $x;
    echo "<br>";
}

tampilX();

//variabel superglobal (semuanya adalah array asosiatif)
//$_GET
$_GET["nama"] = "Revo";
$_GET["nim"] = "044050187";
var_dump($_GET);

$databaseMahasiswa = [
    [
        "foto" => "foto1.jpeg",
        "nama" => "Revo Nando",
        "email" => "refonndd@gmail.com",
        "nim" => "044050187",
        "jurusan" => "Statistika",
        "nilai" => ["uts" => 90, "uas" => 80] //dalemnya array lagi juga bisa
    ],
    [
        "foto" => "foto2.jpeg",
        "nim" => "04484748", //sengaja dibolak-balik, kan udah ada nama indexnya
        "jurusan" => "Komputasi",
        "nama" => "Rezqy TA",
        "email" => "arumjamet@bps.go.id",
        "nilai" => ["uts" => 60, "uas" => 87] //dalemnya array lagi juga bisa

    ],
    [
        "foto" => "foto3.jpeg",
        "nama" => "Ahmad Kaffa",
        "jurusan" => "Teknik Pertambangan",
        "email" => "kaffakapoy@gmail.com",
        "nim" => "8324342",
        "nilai" => ["uts" => 57, "uas" => 75] //dalemnya array lagi juga bisa
    ]
];

//$_POST
// var_dump($_POST);

//$_REQUEST

//$_SESSION

//$_COOKIE

//$_SERVER
// var_dump($_SERVER);
// echo $_SERVER["SERVER_NAME"];
// echo "<br>";

//$_ENV

//$_FILES
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <!-- <?php foreach ($databaseMahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="foto-mahasiswa/<?= $mhs["foto"]; ?>" alt="foto">
            </li>
            <li>Nama: <?= $mhs["nama"]; ?></li>
            <li>NIM: <?= $mhs["nim"]; ?></li>
            <li>Jurusan: <?= $mhs["jurusan"]; ?></li>
            <li>Email: <?= $mhs["email"]; ?></li>
            <li>Nilai UTS: <?= $mhs["nilai"]["uts"]; ?></li>
            <li>Nilai UAS: <?= $mhs["nilai"]["uas"]; ?></li>
        </ul>
    <?php endforeach; ?> -->

    <ul>
        <?php foreach ($databaseMahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"] ?>&nim=<?= $mhs["nim"] ?>&jurusan=<?= $mhs["jurusan"] ?>&email=<?= $mhs["email"] ?>&foto=<?= $mhs["foto"] ?>">
                    <?= $mhs["nama"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
