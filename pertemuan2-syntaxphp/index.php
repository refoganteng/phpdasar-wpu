<!-- SYNTAX PHP --------- konsep sama dengan JS -->

<?php
//Standar output
// echo, print (mencetak di browser)
// printr (mencetak isi array)
// var_dump (melihat isi variabel)
echo "Revo Nando"; echo "<br>";
print "Refonando"; echo "<br>";
print_r ("Repo Nanda"); echo "<br>";
var_dump("revonando"); 
echo "<hr>";

// Varibel dan Type Data 
// Varibel (pakai dolar, jangan angka di awal, usahakan camelCase, pas echo di html pakai petik 2)
$nama = "Ahmad Kaffa";
$jenisKelamin = "Lakikkkk";
$x = 1;
$y = 2;
$z = $x + $y;

//Operator
// Aritmatika
echo 1+2+4; echo "<br>";
echo $z; echo "<br>";

// Penggabung string
echo $nama. " - " .$jenisKelamin; echo "<br>";


// Assignment ( = += -= *= /= %= .=)
echo $z *= 6; echo "<br>";

// Perbandingan (> <  == ===)
var_dump ($x < $y);

// Logika (AND && OR || NOT !)
$a = 10;
var_dump($a < 11 && $a % 2 == 0);

?>

<!-- Penulisan Syntax PHP -->
<!-- PHP di dalam HTML -->
<!-- HTML di dalam PHP (tidak disarankan) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP dalam HTML</title>
</head>
<body>
    <?php echo "<h2> ini adalah h2 dari HTML dalam PHP </h2>"; ?>

    <h1>Nama Saya adalah: <?php echo " Revo Nando"; ?></h1>
    <h2>Nama saya (dari variabel): <?php echo $nama; ?>  </h2>
    <p> <?php echo "ini adalah paragraf PHP"; ?></p>
</body>
</html>







