<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Feedback</title>

    <link rel="stylesheet" href="<?= base_url('public/css/feedback.css') ?>">
</head>

<body>

    <div class="container">
        <h2>Form Feedback</h2>

        <form action="<?= base_url('public/feedback/simpan') ?>" method="post" enctype="multipart/form-data">

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Cabang</label>
            <select name="cabang" required>
                <option value="">-- Pilih --</option>
                <option value="Cabang 1">Cabang 1</option>
                <option value="Cabang 2">Cabang 2</option>
                <option value="Cabang 3">Cabang 3</option>
            </select>

            <label>Keluhan</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="keluhan[]" value="Sistem Lemot"> Sistem Lemot</label>
                <label><input type="checkbox" name="keluhan[]" value="Sistem Error"> Sistem Error</label>
                <label><input type="checkbox" name="keluhan[]" value="Data Tidak Tersimpan"> Data Tidak
                    Tersimpan</label>
            </div>

            <label>Keterangan</label>
            <textarea name="keterangan"></textarea>

            <label>Upload Foto</label>
            <input type="file" name="foto">

            <button type="submit">Kirim Feedback</button>

        </form>
    </div>

</body>

</html>