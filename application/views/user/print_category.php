<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Dokumen</title>
</head>
<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Kategori ID</th>
            <th>Nama Kategori</th>
            <th>Description</th>
        </tr>
        <?php $no = 1; 
        foreach($category as $ct) : ?>
        <tr>
            <td><?= $no++ ?> </td>
            <td><?= $ct->id ?> </td>
            <td><?= $ct->category ?> </td>
            <td><?= $ct->description ?> </td>
        </tr>
        <?php endforeach ?>
    </table>


    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>