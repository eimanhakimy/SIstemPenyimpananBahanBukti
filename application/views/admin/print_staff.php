<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="official">Official Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            text-align: left;
            padding: 20px 20px;
            background-color: #f0f0f0; /* Header background color */
        }
        .logo {
            width: 100px; /* Adjust the width of your logo */
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .invoice-info {
            text-align: right; /* Align invoice info to the right */
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .info h2 {
            font-size: 16px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .signature-container {
            text-align: left;
            position: absolute;
            bottom: 0;
            width: 100%;
            margin-bottom: 20px; /* Add margin-bottom to create space for the signature */
        }
        .signature-line {
            width: 200px;
            border-top: 1px solid #333;
        }
        .signature-text {
            margin-top: 10px;
            margin-block: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src=" <?= base_url('assets/img/Polis-logo.png') ?>" alt="Company Logo" class="logo">
        <h1 class="official">POLIS DIRAJA MALAYSIA</h1>
        <h2 class="official">Senarai Akaun Staf</h2>
    </div>
    <div class="invoice-info">
        <div class="info">
            <h2>Print Date: <?= date('Y-m-d') ?></h2>
            <h2>Time: <?= date('H:i:s') ?></h2>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Emel</th>
            <th>Role</th>
            <th>Aktif</th>
        </tr>
        </thead>
            <?php $no=1;
            foreach($staff as $st) : ?>
            <tbody>
        <tr>
            <td><?= $no++?></td>
            <td><?= $st->name?></td>
            <td><?= $st->email?></td>
            <td>
                                <?php
                                 if ($st->role_id == 1) {
                                    echo 'Admin';
                                } elseif ($st->role_id == 2) {
                                    echo 'Staff';
                                } else {
                                    echo 'Unknown';
                                }
                                ?>
                                </td>
                                <td>    
                                <?php
                                if ($st->is_active == 1) {
                                    echo 'Active';
                                } elseif ($st->is_active == 0) {
                                    echo 'Not Active';
                                } else {
                                    echo 'Unknown';
                                }
                                ?>
                                </td>
            
        </tr>
        </tbody>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="signature-container">
        <div class="signature-text">Tandatangan</div>
        <div class="signature-line"></div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
