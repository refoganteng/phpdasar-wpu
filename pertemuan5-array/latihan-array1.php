<?php

//array adalah VARIABEL yang bisa menampung BANYAK NILAI, boleh beda type data

$mainanKaffa = ["dino", "pompa", "puter-puter", "buku", "obeng"]; //array cara baru
$mainanKaffa2 = array("dino", "pompa", "puter-puter", "buku", "obeng"); // array cara lama
print_r($mainanKaffa); echo "<br>";
var_dump($mainanKaffa); echo "<br>";

echo "mainan kaffa dengan index ke 4: $mainanKaffa[4]";

//nambah nilai di dalam array
$mainanKaffa[] = "boba";
$mainanKaffa[] = "mobil";
print_r($mainanKaffa); echo "<br>";


?>