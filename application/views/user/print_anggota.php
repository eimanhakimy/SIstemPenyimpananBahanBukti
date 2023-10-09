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
        <img src="assets\img\Polis-logo.png" alt="Company Logo" class="logo">
        <h1 class="official">POLIS DIRAJA MALAYSIA</h1>
        <h2 class="official">Senarai Anggota</h2>
    </div>
    <div class="invoice-info">
        <div class="info">
            <h2>Print Date: <?= date('Y-m-d') ?></h2>
            <h2>Due Time: <?= date('H:i:s') ?></h2>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Anggota</th>
                <th>No. Badan</th>
                <th>Email</th>
                <th>No. Telefon</th>
                <th>Alamat</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($anggota as $ag) : ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $ag->anggota_name?></td>
                    <td><?= $ag->no_body?></td>
                    <td><?= $ag->anggota_email?></td>
                    <td><?= $ag->anggota_phoneNumber?></td>
                    <td><?= $ag->anggota_address?></td>
                    <td><?= $ag->department_name?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="signature-container">
        <div class="signature-text">Tandatangan</div>
        <div class="signature-line"></div>
    </div>
    <div class="footer">
        Generated on: <?= date('Y-m-d H:i:s') ?>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
