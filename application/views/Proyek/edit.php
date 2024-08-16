<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
    <style>
        /* style.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], select {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 4px;
            color: #fff;
            background-color: #2196F3;
            text-decoration: none;
            transition: background-color 0.3s;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #0b79d0;
        }

        .button-container {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Proyek</h1>
        <form action="<?php echo site_url('proyek/update/' . $proyek['id']); ?>" method="post">
    <input type="text" name="nama_proyek" value="<?php echo $proyek['namaProyek']; ?>">

    <label for="lokasi">Lokasi:</label>
    <select name="lokasi_proyek[]">
        <?php foreach ($lokasiList as $lokasi): ?>
            <option value="<?php echo $lokasi['id']; ?>" <?php echo (isset($current)&& $lokasi['id'] == $current) ? 'selected' : ''; ?>>
                <?php echo $lokasi['namaLokasi']; ?>
            </option>
        <?php endforeach; ?>
    </select>

            <label for="client">Client:</label>
            <input type="text" id="client" name="client" value="<?php echo isset($proyek['client']) ? $proyek['client'] : ''; ?>" required>

            <label for="tglMulai">Tanggal Mulai:</label>
            <input type="date" id="tglMulai" name="tgl_mulai" value="<?php echo isset($proyek['tglMulai']) ? $proyek['tglMulai'] : ''; ?>" required>

            <label for="tglSelesai">Tanggal Selesai:</label>
            <input type="date" id="tglSelesai" name="tgl_selesai" value="<?php echo isset($proyek['tglSelesai']) ? $proyek['tglSelesai'] : ''; ?>" required>

            <div class="button-container">
                <button type="submit" class="btn">Update Proyek</button>
            </div>
        </form>
    </div>
</body>
</html>
