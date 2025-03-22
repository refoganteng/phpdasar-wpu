<?php

$students = ["Revo Nando", "044050187", "Statistika", "refonndd@gmail.com"];

//array in array [multidemensi]
$dataStudents = [
    ["Revo Nando", "044050187", "Statistika", "refonndd@gmail.com"],
    ["Rezqy TA", "04484748", "Komputasi", "arumjamet@bps.go.id"],
    ["Ahmad Kaffa", "8324342", "Teknik Pertambangan", "kaffakapoy@gmail.com"],
];

//array asosiatif
$dataStudentsAsosiatifs = [
    [
        "nama" => "Revo Nando",
        "nim" => "044050187",
        "jurusan" => "Statistika",
        "email" => "refonndd@gmail.com"
    ],
    [
        "nama" => "Rezqy TA",
        "nim" => "04484748",
        "jurusan" => "Komputasi",
        "email" => "arumjamet@bps.go.id"
    ],
    [
        "nama" => "Ahmad Kaffa",
        "nim" => "8324342",
        "jurusan" => "Teknik Pertambangan",
        "email" => "kaffakapoy@gmail.com"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    //foreach
    <ul>
        <?php foreach ($students as $student) : ?>
            <li>
                <?= $student; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <hr>

    //manual index array
    <ul>
        <li><?= $students[0]; ?></li>
        <li><?= $students[1]; ?></li>
        <li><?= $students[2]; ?></li>
        <li><?= $students[3]; ?></li>
    </ul>

    <hr>

    //gimana kalo mahasiswanya BANYAK?
    <?php foreach ($dataStudents as $index => $dataStudent) : ?>
        <h3>
            <?= "Mahasiswa ke " . ($index + 1); ?>
        </h3>

        <ul>
            <li>Nama: <?= $dataStudent[0]; ?></li>
            <li>NIM: <?= $dataStudent[1]; ?></li>
            <li>Jurusan: <?= $dataStudent[2]; ?></li>
            <li>Email: <?= $dataStudent[3]; ?></li>
        </ul>
    <?php endforeach; ?>

    //pakai array asosiatif
    <?php foreach ($dataStudentsAsosiatifs as $index => $dataStudentsAsosiatif) : ?>
        <h3>Mahasiswa ke-<?= $index + 1; ?></h3>
        <ul>
            <?php foreach ($dataStudentsAsosiatif as $key => $value) : ?>
                <li><?= ucfirst($key); ?>: <?= $value; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

</body>

</html>