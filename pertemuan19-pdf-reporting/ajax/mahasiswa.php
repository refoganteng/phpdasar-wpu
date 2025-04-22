<?php

require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE
        nim LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
    ";
$mahasiswa = query($query);

// echo json_encode($mahasiswa);
?>

<table class="mt-5 w-full border-collapse border border-gray-300 shadow-sm">
    <thead class="bg-blue-500 text-white">
        <tr>
            <th class="border border-gray-300 px-4 py-2">No.</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
            <th class="border border-gray-300 px-4 py-2">Gambar</th>
            <th class="border border-gray-300 px-4 py-2">Nama</th>
            <th class="border border-gray-300 px-4 py-2">NIM</th>
            <th class="border border-gray-300 px-4 py-2">Email</th>
            <th class="border border-gray-300 px-4 py-2">Jurusan</th>
        </tr>
    </thead>

    <tbody class="bg-white">
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2 text-center"><?= $i; ?></td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="ubah.php?id=<?= $mhs["id"]; ?>" class="text-blue-500 hover:underline">Ubah</a> |
                    <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="text-red-500 hover:underline">Hapus</a>
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <img src="foto-mahasiswa/<?= htmlspecialchars($mhs["foto"]); ?>" alt="Foto" class="w-12 h-12 rounded-full object-cover mx-auto">
                </td>
                <td class="border border-gray-300 px-4 py-2"><?= $mhs["nama"]; ?></td>
                <td class="border border-gray-300 px-4 py-2 text-center"><?= $mhs["nim"]; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $mhs["email"]; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $mhs["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>