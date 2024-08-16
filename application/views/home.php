<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lokasi and Proyek List</title>
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

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 10px;
            border-radius: 4px;
            color: #fff;
            background-color: #2196F3;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0b79d0;
        }

        .btn-edit, .btn-delete {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
        }

        .btn-edit {
            background-color: #4CAF50;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }

        .button-container {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List of Lokasi</h1>
        <?php if (!empty($lokasi)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lokasi</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lokasi as $lok): ?>
                        <tr>
                            <td><?php echo isset($lok['id']) ? $lok['id'] : '-'; ?></td>
                            <td><?php echo isset($lok['namaLokasi']) ? $lok['namaLokasi'] : 'Unnamed Location'; ?></td>
                            <td><?php echo isset($lok['negara']) ? $lok['negara'] : '-'; ?></td>
                            <td><?php echo isset($lok['provinsi']) ? $lok['provinsi'] : '-'; ?></td>
                            <td><?php echo isset($lok['kota']) ? $lok['kota'] : '-'; ?></td>
                            <td>
                                <a class="btn-edit" href="<?php echo isset($lok['id']) ? base_url('lokasi/edit/'.$lok['id']) : ''; ?>">Edit</a>
                                <a class="btn-delete" href="<?php echo isset($lok['id']) ? base_url('lokasi/delete/'.$lok['id']) : '#'; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>    <div class="button-container">
            <a class="btn" href="<?php echo base_url('lokasi/create'); ?>">Add New Lokasi</a>
        </div>
            </table>
        <?php else: ?>
            <p>No lokasi found.</p>
        <?php endif; ?>

        <h2>List of Proyek</h2>
      

        <?php if (!empty($proyek)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Proyek</th>
                        <th>Nama Lokasi</th>
                        <th>Client</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyek as $pro): ?>
                        <tr>
                            <td><?php echo isset($pro['id']) ? $pro['id'] : '-'; ?></td>
                            <td><?php echo isset($pro['namaProyek']) ? $pro['namaProyek'] : 'Unnamed Project'; ?></td>
                            <td>
                                <?php 
                                // Check if proyek has locations and display them
                                if (!empty($pro['lokasi'])): 
                                    $lokasiNames = array_map(function($lok) {
                                        return isset($lok['namaLokasi']) ? $lok['namaLokasi'] : 'Unnamed Location';
                                    }, $pro['lokasi']);
                                    echo implode(', ', $lokasiNames); 
                                else: 
                                    echo 'No Location';
                                endif; 
                                ?>
                            </td>
                            <td><?php echo isset($pro['client']) ? $pro['client'] : '-'; ?></td>
                            <td><?php echo isset($pro['tglMulai']) ? $pro['tglMulai'] : '-'; ?></td>
                            <td><?php echo isset($pro['tglSelesai']) ? $pro['tglSelesai'] : '-'; ?></td>
                            
                            <td>
                            <a class="btn-edit" href="<?php echo base_url('proyek/edit/'.$pro['id']); ?>">Edit</a>
                            <a class="btn-delete" href="<?php echo base_url('proyek/delete/'.$pro['id']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="button-container">
            <a class="btn" href="<?php echo base_url('proyek/create'); ?>">Add New Proyek</a>
        </div>
        <?php else: ?>
            <p>No proyek found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
