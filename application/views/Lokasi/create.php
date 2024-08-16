<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Lokasi</title>
</head>
<body>
    <h1>Create Lokasi</h1>
    <form action="<?php echo base_url('lokasi/store'); ?>" method="POST">
        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" name="nama_lokasi" required><br>
        <label for="negara">Negara:</label>
        <input type="text" name="negara" required><br>
        <label for="provinsi">Provinsi:</label>
        <input type="text" name="provinsi" required><br>
        <label for="kota">Kota:</label>
        <input type="text" name="kota" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
