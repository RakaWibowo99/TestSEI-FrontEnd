<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Proyek</title>
</head>
<body>
    <h1>Create Proyek</h1>
    <form action="<?php echo base_url('proyek/store'); ?>" method="POST">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" name="nama_proyek" required><br>
        <label for="lokasiProyek">Lokasi:</label>
        <select name="lokasi_proyek[]" required>
            <!-- Populate this with lokasi data -->
            <?php foreach ($lokasi as $lok): ?>
                <option value="<?php echo $lok['id']; ?>"><?php echo $lok['namaLokasi']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="client">Client:</label>
        <input type="text" name="client" required><br>
        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" name="tgl_mulai" required><br>
        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" name="tgl_selesai" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
