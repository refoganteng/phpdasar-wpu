<?php

//koneksi ke database phpdasar
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar"); //para: host, username, pw, database

//[READ] baca tabel mahasiswa
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $mhss = [];
    while ($mhs = mysqli_fetch_assoc($result)) {
        $mhss[] = $mhs;
    }
    return $mhss;
}

//[CREATE] tambah data mahasiswa
function tambah($data)
{
    //ambil data dari tiap elemen dalam form
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // $foto = htmlspecialchars($data["foto"]);
    
    //upload foto
    $foto = upload();
    if (!$foto) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO mahasiswa (nama, nim, email, jurusan, foto) 
          VALUES ('$nama', '$nim', '$email', '$jurusan', '$foto')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

//[UPDATE] ubah data mahasiswa
function ubah($data)
{
    //ambil data dari tiap elemen dalam form
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    //cek apakah user ubah gambar
    if ($_FILES['foto']['error'] === 4) {
        $foto = $data["fotoLama"];
    } else {
        $foto = upload();
    }

    //query update data 
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                email = '$email',   
                jurusan = '$jurusan',
                foto = '$foto'
                WHERE id = $id
            ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


//[SEARCH] cari data mahasiswa
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                email LIKE '%$keyword%'
            ";
    return query($query);
}

//[CREATE] upload foto
function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }    

    //lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'foto-mahasiswa/'.$namaFileBaru);
    return $namaFileBaru;
}

//[REGISTRASI] 
function register($data) {
    global $koneksi;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar!');
        </script>";
        return false;
    }
    
    //cek password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    $query = "INSERT INTO user (username, password) 
                VALUES ('$username', '$password')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);  

}



