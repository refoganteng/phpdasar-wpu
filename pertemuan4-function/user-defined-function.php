<?php
    //fungsi harus didefinisikan dahulu, then PANGGIL
function salam($user) {
    return "Selamat " . getWaktu() .", $user!";
}

function getWaktu() {
    $jam = date("H:i"); // Format jam:menit
    $hour = date("H");

    if ($hour >= 5 && $hour < 12) {
        return "Pagi ($jam)";
    } elseif ($hour >= 12 && $hour < 15) {
        return "Siang ($jam)";
    } elseif ($hour >= 15 && $hour < 18) {
        return "Sore ($jam)";
    } else {
        return "Malam ($jam)";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan function</title>
</head>
<body>
    <h1> 
        <?= salam("Revo Nando"); ?> 
    </h1>
</body>
</html>