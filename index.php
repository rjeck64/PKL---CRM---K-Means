

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Kepuasan Pelanggan Toko Kopi Rasa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container">
    <?php
        
        if (isset($_GET["notif"])) {
            if ($_GET["notif"] == 1 ) {
                echo '
                    <div class="alert" role="alert">
                        Data Berhasil Diterima
                    </div>
                ';
            }
        }

    ?>
        <h1>Kuesioner Kepuasan Pelanggan Toko Kopi Rasa</h1>
        <form action="input_kuesioner.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="number" id="usia" name="usia" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <h2>Penilaian</h2>

            <div class="form-group">
                <label for="rasa_kopi">Rasa Kopi:</label>
                <select id="rasa_kopi" name="rasa_kopi" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="variasi_menu">Variasi Menu:</label>
                <select id="variasi_menu" name="variasi_menu" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="keramahan_staf">Keramahan Staf:</label>
                <select id="keramahan_staf" name="keramahan_staf" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kecepatan_layanan">Kecepatan Layanan:</label>
                <select id="kecepatan_layanan" name="kecepatan_layanan" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <select id="harga" name="harga" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kenyamanan">Kenyamanan:</label>
                <select id="kenyamanan" name="kenyamanan" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kebersihan">Kebersihan:</label>
                <select id="kebersihan" name="kebersihan" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kepuasan_keseluruhan">Kepuasan Keseluruhan:</label>
                <select id="kepuasan_keseluruhan" name="kepuasan_keseluruhan" required>
                    <option value="1">Sangat Tidak Puas</option>
                    <option value="2">Tidak Puas</option>
                    <option value="3">Netral</option>
                    <option value="4">Puas</option>
                    <option value="5">Sangat Puas</option>
                </select>
            </div>

            <button type="submit">Kirim</button>
            </form>
            <br>
            </div>
        <a href="data.php" style="margin:20px;"><button style="padding:15px 25px;">Lihat Data</button></a>
            </body>
</html>
