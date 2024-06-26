<!DOCTYPE html>
<html>
<head>
    <title>K-Means Clustering</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>K-Means Clustering</h2>

    <?php

    // Fungsi untuk menghitung jarak antara dua titik
    function euclideanDistance($point1, $point2) {
        $sum = 0;
        for ($i = 0; $i < count($point1); $i++) {
            $sum += pow(floatval($point1[$i]) - floatval($point2[$i]), 2);
        }
        return sqrt($sum);
    }

    // Fungsi untuk mengelompokkan data ke klaster terdekat
    function assignToClusters($data, $centroids) {
        $clusters = array_fill(0, count($centroids), array());
        foreach ($data as $point) {
            $minDistance = PHP_INT_MAX;
            $clusterIndex = null;
            foreach ($centroids as $index => $centroid) {
                $distance = euclideanDistance(array_slice($point, 1), array_slice($centroid, 1));
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                    $clusterIndex = $index;
                }
            }
            $clusters[$clusterIndex][] = $point;
        }
        return $clusters;
    }

    // Fungsi untuk menghitung pusat baru dari setiap klaster
    function updateCentroids($clusters) {
        $centroids = array();
        foreach ($clusters as $cluster) {
            $dimension = count($cluster[0]);
            $centroid = array_fill(0, $dimension, 0);
            $count = count($cluster);
            foreach ($cluster as $point) {
                for ($i = 1; $i < $dimension; $i++) {
                    $centroid[$i] += floatval($point[$i]);
                }
            }
            for ($i = 1; $i < $dimension; $i++) {
                $centroid[$i] /= $count;
            }
            $centroids[] = $centroid;
        }
        return $centroids;
    }

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pkl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data dari database
    $sql = "SELECT nama, rasa_kopi, variasi_menu, keramahan_staf, kecepatan_layanan, harga, kenyamanan, kebersihan FROM kuesioner";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array_values($row);
        }
    }

    // Inisialisasi jumlah klaster
    $k = 3;

    // Inisialisasi centroid awal secara acak
    function initializeCentroids($data, $k) {
        $centroids = array();
        $keys = array_keys($data);
        shuffle($keys);
        $random_keys = array_slice($keys, 0, $k);
        foreach ($random_keys as $key) {
            $centroids[] = $data[$key];
        }
        return $centroids;
    }

    $centroids = initializeCentroids($data, $k);

    // Tampilkan centroid awal
    echo "<h3>Langkah 1: Inisialisasi Centroid Awal</h3>";
    echo "<table>";
    echo "<tr><th>Centroid</th><th>Rasa Kopi</th><th>Variasi Menu</th><th>Keramahan Staf</th><th>Kecepatan Layanan</th><th>Harga</th><th>Kenyamanan</th><th>Kebersihan</th></tr>";
    foreach ($centroids as $index => $centroid) {
        echo "<tr><td>Centroid " . ($index + 1) . "</td><td>" . $centroid[1] . "</td><td>" . $centroid[2] . "</td><td>" . $centroid[3] . "</td><td>" . $centroid[4] . "</td><td>" . $centroid[5] . "</td><td>" . $centroid[6] . "</td><td>" . $centroid[7] . "</td></tr>";
    }
    echo "</table>";

    // Langkah 2-5: Iterasi K-Means
    for ($iteration = 1; $iteration <= 5; $iteration++) {
        // Langkah 2: Mengelompokkan data ke klaster terdekat
        $clusters = assignToClusters($data, $centroids);

        // Tampilkan hasil kelompokkan
        echo "<h3>Langkah $iteration: Mengelompokkan Data ke Klaster Terdekat</h3>";
        echo "<table>";
        echo "<tr><th>Klaster</th><th>Nama</th><th>Rasa Kopi</th><th>Variasi Menu</th><th>Keramahan Staf</th><th>Kecepatan Layanan</th><th>Harga</th><th>Kenyamanan</th><th>Kebersihan</th></tr>";
        foreach ($clusters as $index => $cluster) {
            foreach ($cluster as $point) {
                echo "<tr><td>Klaster " . ($index + 1) . "</td><td>" . $point[0] . "</td><td>" . $point[1] . "</td><td>" . $point[2] . "</td><td>" . $point[3] . "</td><td>" . $point[4] . "</td><td>" . $point[5] . "</td><td>" . $point[6] . "</td><td>" . $point[7] . "</td></tr>";
            }
        }
        echo "</table>";

        // Langkah 3: Menghitung pusat baru dari setiap klaster
        $centroids = updateCentroids($clusters);

        // Tampilkan pusat baru
        echo "<h3>Langkah $iteration: Menghitung Pusat Baru dari Setiap Klaster</h3>";
        echo "<table>";
        echo "<tr><th>Centroid</th><th>Rasa Kopi</th><th>Variasi Menu</th><th>Keramahan Staf</th><th>Kecepatan Layanan</th><th>Harga</th><th>Kenyamanan</th><th>Kebersihan</th></tr>";
        foreach ($centroids as $index => $centroid) {
            echo "<tr><td>Centroid " . ($index + 1) . "</td><td>" . $centroid[1] . "</td><td>" . $centroid[2] . "</td><td>" . $centroid[3] . "</td><td>" . $centroid[4] . "</td><td>" . $centroid[5] . "</td><td>" . $centroid[6] . "</td><td>" . $centroid[7] . "</td></tr>";
        }
        echo "</table>";
    }

    echo "<h3>Hasil Akhir K-Means Clustering</h3>";
    echo "<table>";
    echo "<tr><th>No</th><th>Nama</th><th>Rasa Kopi</th><th>Variasi Menu</th><th>Keramahan Staf</th><th>Kecepatan Layanan</th><th>Harga</th><th>Kenyamanan</th><th>Kebersihan</th><th>C1</th><th>C2</th><th>C3</th><th>Hasil</th></tr>";

    foreach ($data as $index => $point) {
        $distances = [];
        foreach ($centroids as $centroid) {
            $distances[] = euclideanDistance(array_slice($point, 1), array_slice($centroid, 1));
        }
        $clusterIndex = array_keys($distances, min($distances))[0];
        $result = ($clusterIndex == 0) ? "Puas" : (($clusterIndex == 1) ? "Biasa Saja" : "Tidak Puas");

        echo "<tr><td>" . ($index + 1) . "</td><td>" . $point[0] . "</td><td>" . $point[1] . "</td><td>" . $point[2] . "</td><td>" . $point[3] . "</td><td>" . $point[4] . "</td><td>" . $point[5] . "</td><td>" . $point[6] . "</td><td>" . $point[7] . "</td><td>" . $distances[0] . "</td><td>" . $distances[1] . "</td><td>" . $distances[2] . "</td><td>" . $result . "</td></tr>";
    }

    echo "</table>";

    // Menutup koneksi database
    $conn->close();
    ?>

</body>
</html>
