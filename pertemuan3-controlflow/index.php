<?php
//Looping
// For (inisialisasi, terminasi, increment/decrement)
echo "For <hr>";

for ($i = 0; $i < 5; $i++) {
    echo $i . " ";
    echo "Hello Word";
    echo "<br>";
}

// While Do
echo "<br> While Do <hr>";

$j = 1;
while ($j <= 5) {
    echo $j . " ";
    echo "Hello World! <br>";
    $j++;
}

// Do While
echo "<br> Do While <hr>";

$k = 0;
do {
    echo $k . " ";
    echo "Hello World!! <br>";
    $k++;
} while ($k < 5)

    // Foreach (nanti dibahas di materi array)
?>