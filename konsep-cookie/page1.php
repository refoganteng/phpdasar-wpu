<?php
//membuat cookie
setcookie('nama', 'revo', time() + 60);


//cek cookie
if (isset($_COOKIE['nama'])) {
    echo $_COOKIE['nama'];
}
