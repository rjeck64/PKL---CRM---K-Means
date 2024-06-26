<!DOCTYPE html>
<html>
<head>
    <title>Data Kuesioner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            text-align:center;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #dddddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a{
            margin:10px;
        }
        button{
            background-color: #00a2ff;
            border: 0;
            padding: 12px 24px;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Data Kuesioner</h1>
    <?php
    include "koneksi.php";

    $sql = "SELECT * FROM kuesioner";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>Nama</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Rasa Kopi</th>
                <th>Variasi Menu</th>
                <th>Keramahan Staff</th>
                <th>Kecepatan Layanan</th>
                <th>Harga</th>
                <th>Kenyamanan</th>
                <th>Kebersihan</th>
                <th>Kepuasan Keseluruhan</th>
              </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nama"]. "</td>
                    <td>" . $row["usia"]. "</td>
                    <td>" . $row["jenis_kelamin"]. "</td>
                    <td>" . $row["rasa_kopi"]. "</td>
                    <td>" . $row["variasi_menu"]. "</td>
                    <td>" . $row["keramahan_staf"]. "</td>
                    <td>" . $row["kecepatan_layanan"]. "</td>
                    <td>" . $row["harga"]. "</td>
                    <td>" . $row["kenyamanan"]. "</td>
                    <td>" . $row["kebersihan"]. "</td>
                    <td>" . $row["kepuasan_keseluruhan"]. "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data kuesioner yang ditemukan.</p>";
    }
    $conn->close();
    ?>
    <a href="hitung.php"><button>Hitung</button></a>
</body>
</html>
