<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Umpan Balik Pengguna</title>
    <link rel="stylesheet" href="src/style.css">
</head>

<body>

    <h2>Umpan Balik Pengguna</h2>

    <form id="feedbackForm" action="process.php" method="post" enctype="multipart/form-data">

        <label>1. Nama</label>
        <input type="text" name="nama" placeholder="Nama" required>

        <label>2. Jenis Kelamin</label>
        <div class="radio-group">
            <label><input type="radio" name="jk" value="Laki-laki" required> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
        </div>

        <label>3. Keluhan</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="keluhan[]" value="Antrian terlalu lama"> Antrian terlalu lama</label>
            <label><input type="checkbox" name="keluhan[]" value="Aplikasi lelet"> Aplikasi lelet</label>
            <label><input type="checkbox" name="keluhan[]" value="Pelayanan kurang"> Pelayanan kurang</label>
        </div>

        <label>4. Alamat</label>

        <select name="provinsi" id="provinsi" required>
            <option value="">-- Pilih Provinsi --</option>
            <option value="jawa_tengah">Jawa Tengah</option>
            <option value="jawa_timur">Jawa Timur</option>
            <option value="jawa_barat">Jawa Barat</option>
        </select>

        <select name="kabupaten" id="kabupaten" required>
            <option value="">-- Pilih Kabupaten/Kota --</option>
        </select>

        <select name="kecamatan" id="kecamatan" required>
            <option value="">-- Pilih Kecamatan --</option>
        </select>

        <select name="desa" id="desa" required>
            <option value="">-- Pilih Desa --</option>
        </select>


        <label>5. Unggah Foto</label>
        <input type="file" name="foto">

        <label>6. Keterangan</label>
        <textarea name="keterangan" placeholder="Tuliskan keterangan tambahan..."></textarea>

        <button type="submit">Kirim Feedback</button>

    </form>

    <script src="src/feedback.js"></script>
</body>

</html>