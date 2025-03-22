<?php 

//Built-in function
// Berkaitan TIME (time(),  date(), mktime(), strtotime())
    //date()
    echo "sekarang itu hari ". date("l, d F Y"); //bisa ganti format liat di php.net
    echo "<br>";

    // unix timestamp / Epoch time (detik sejak 1 jan 1970)
    echo time();
    echo "<br>";

    echo date("l d F Y", time() + (60*60*24*100) ); //nambah 100 hari
    echo "<br>";
    
    //MKTIME()
    echo date("l, d F Y", mktime(0,0,0,7,17,1998)); //jam menit detik bln tgl thn
    echo "<br>";
    
    //strtotime()
    echo date("l, ", strtotime("17 Jul 1998"));
    echo "<br>";
    
    // Berkaitan dengan string (lebih dipakai ketika REQUSET)
    //strlen()
    echo strlen("Revo Nando");
    echo "<br>";
    
    //strcmp() compare
    $depan = "revo";
    $belakang = "nando";
    echo strcmp($depan,$belakang);
    echo "<br>";
    
    //explode() mecah string jadi array
    $kalimat = "Belajar PHP itu mudah";
    $kata = explode(" ", $kalimat); // Memisahkan berdasarkan spasi
    print_r($kata);
    echo "<br>";
    
    // htmlspecialchars() menjaga daaari haacker 
    
    //Utility
    // var_dump()
    // isset()
    $nama = "Revo";
    
    if (isset($nama)) {
        echo "Variabel \$nama ada dan bernilai: $nama";
    } else {
        echo "Variabel \$nama tidak ada atau bernilai NULL";
    }
    echo "<br>";
    
    // empty()
    $nama = "";
    
    if (empty($nama)) {
        echo "Variabel \$nama kosong!";
    } else {
        echo "Variabel \$nama berisi: $nama";
    }
    echo "<br>";
    
    
    // die()
    echo "Skrip dimulai.<br>";
    // die("Skrip dihentikan di sini.");
    echo "Kalimat ini tidak akan dieksekusi.";
    echo "<br>";
    
    
    // sleep()
    // echo "Mulai...<br>";
    // sleep(3); // Tunggu 3 detik
    // echo "Selesai!";
    // echo "<br>";

?>