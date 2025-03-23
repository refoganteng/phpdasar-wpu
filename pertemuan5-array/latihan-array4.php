<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak {
            width: 150px;
            height: 30px;
            background-color: khaki;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>

    //array numerik
    <div class="clear"></div>
    <?php
    $numbers = [1, 2, 3, 4, 5, 6, 7];
    ?>

    <?php foreach ($numbers as $number) : ?>
        <div class="kotak">
            <?= $number ?>
        </div>
    <?php endforeach; ?>

    <div class="clear"></div>
    <hr>

    //array multidimensi [masih numerik]
    <?php
    $someNumbers = [
        ["Revo", 35, "Laki-Laki"],
        ["Nando", 30, "Perempuan"],
        ["Joko", 19, "Perempuan"]
    ];
    echo "<br>";
    echo $someNumbers[1][1];
    echo "<br>"; //mencetak 30
    echo $someNumbers[2][0]; //mencetak Joko
    ?>

    <div class="clear"></div>

    <?php foreach ($someNumbers as $someNumber) : ?>
        <?php foreach ($someNumber as $number) : ?>
            <div class="kotak">
                <?= $number ?>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
    <hr>

    //array asosiatif
    <?php
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
    ?>

    <div class="clear"></div>

    <?php foreach ($databaseMahasiswa as $nomorAbsen => $dataMhs) : ?>
        <h4>Mahasiswa ke-<?= ($nomorAbsen + 1) . "=======> " . $dataMhs["nama"]; ?></h4>
        <ul>
            <li>
                <img src="foto-mahasiswa/<?= $dataMhs["foto"]; ?> ">
            </li>
            <li>NIM: <?= $dataMhs["nim"]; ?></li>
            <li>Jurusan: <?= $dataMhs["jurusan"]; ?></li>
            <li>Email: <?= $dataMhs["email"]; ?></li>
            <li>Nilai UTS: <?= $dataMhs["nilai"]["uts"]; ?></li>
            <li>Nilai UAS: <?= $dataMhs["nilai"]["uas"]; ?></li>
        </ul>
    <?php endforeach; ?>





</body>

</html>