<?php
//Pengkondisian/Percabaangan/Selection
// if else
$x = 40;
if ($x < 30) {
    echo "benar";
} else {
    echo "salah";
}

echo "<br>";

// if else if else
$nilai = 86;
if ($nilai >= 80) {
    echo "Nilai yang didapatkan: A";
} else if ($nilai >= 70) {
    echo "Nilai yang didapatkan: B";
} else {
    echo "Nilai jelek banget!";
}

echo "<br>";

// ternary 
$hasil = ($nilai >= 90) ? "A" : 
        (($nilai >= 80) ? "B" : 
        (($nilai >= 70) ? "C" : 
        (($nilai >= 60) ? "D" : "E")));

$pesan = ($hasil == "A") ? "Godlike!" : 
        (($hasil == "B") ? "Keren banget!" : 
        (($hasil == "C") ? "Belajar lagi!" : 
        (($hasil == "D") ? "Niat sekolah gasih?!" : "DO aja!")));

echo "Nilai angka: $nilai => Nilai huruf: $hasil ==> Pesan: $pesan";
echo "<br>";

// switch
switch (true) {
    case ($nilai >= 90):
        $hasil = "A";
        break;
    case ($nilai >= 80):
        $hasil = "B";
        break;
    case ($nilai >= 70):
        $hasil = "C";
        break;
    case ($nilai >= 60):
        $hasil = "D";
        break;
    default:
        $hasil = "E";
        break;
}
echo "Nilai angka: $nilai => Nilai huruf: $hasil";
?>