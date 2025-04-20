const keyword =  document.getElementById("keyword");
const container = document.getElementById("container");

keyword.addEventListener("keyup", function () {

    //buat object ajaxx / xhr
    const xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
    xhr.send();
});