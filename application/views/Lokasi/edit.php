<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Lokasi</title>
    
</head>
<body>
    <h1>Edit Lokasi</h1>
    <form action="<?php echo base_url('lokasi/update/' . (isset($lokasi['id']) ? $lokasi['id'] : '')); ?>" method="POST">
    Nama Lokasi:
    <div>
        <input type="text" name="nama_lokasi" value="<?php echo isset($lokasi['namaLokasi']) ? $lokasi['namaLokasi'] : ''; ?>" required>
    </div>
    Negara:
    <div>
        <input type="text" name="negara" value="<?php echo isset($lokasi['negara']) ? $lokasi['negara'] : ''; ?>" required>
    </div>
    Provinsi:
    <div>
        <input type="text" name="provinsi" value="<?php echo isset($lokasi['provinsi']) ? $lokasi['provinsi'] : ''; ?>" required>
    </div>
    Kota:
    <div>
        <input type="text" name="kota" value="<?php echo isset($lokasi['kota']) ? $lokasi['kota'] : ''; ?>" required>
    </div>
    <input type="submit" value="Update">
</form>



</body>
</html>


