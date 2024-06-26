<?php

    include "koneksi.php";

    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $rasa_kopi = $_POST['rasa_kopi'];
    $variasi_menu = $_POST['variasi_menu'];
    $keramahan_staf = $_POST['keramahan_staf'];
    $kecepatan_layanan = $_POST['kecepatan_layanan'];
    $harga = $_POST['harga'];
    $kenyamanan = $_POST['kenyamanan'];
    $kebersihan = $_POST['kebersihan'];
    $kepuasan_keseluruhan = $_POST['kepuasan_keseluruhan'];
    
    // Menyiapkan query SQL untuk memasukkan data ke dalam tabel
    $sql = "INSERT INTO kuesioner (nama, usia, jenis_kelamin, rasa_kopi, variasi_menu, keramahan_staf, kecepatan_layanan, harga, kenyamanan, kebersihan, kepuasan_keseluruhan)
    VALUES ('$nama', '$usia', '$jenis_kelamin', '$rasa_kopi', '$variasi_menu', '$keramahan_staf', '$kecepatan_layanan', '$harga', '$kenyamanan', '$kebersihan', '$kepuasan_keseluruhan')";
    
    // Menjalankan query dan memeriksa apakah data berhasil dimasukkan
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dimasukkan";
        header("Location: index.php?notif=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>