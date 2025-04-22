// mulai ajax dengan jquery (load, cuma bisa pakai GET)
// $(document).ready(function () {
//   $("#tombol-cari").hide();

//   $("#keyword").on("keyup", function () {
//     $("#container").load("ajax/mahasiswa.php?keyword=" + $(this).val());
//   });
// });

$(document).ready(function () {
  $("#tombol-cari").addClass("hidden"); // tetap hide tombol

  $("#keyword").on("keyup", function (e) {
    e.preventDefault();

    // tampilkan loader dengan hapus class hidden
    $("#loader").removeClass("hidden");

    $.get("ajax/mahasiswa.php?keyword=" + $(this).val(), function (data) {
      $("#container").html(data);

      // setelah selesai, sembunyikan loader lagi
      $("#loader").addClass("hidden");
    });
  });
});




