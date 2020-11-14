<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Sip Akas | SMK Wahid Hasym</title>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/smk.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Sip Akas" />
    <meta name="keywords" content="smk,website" />
    <meta name="author" content="Afrizal" />

    <style type="text/css">
        body {
            margin: 20px;
        }

        #customers {
            /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            /* color: white; */
        }

        #absen {
            /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
            border-collapse: collapse;
            width: 30%;
        }

        #absen td,
        #absen th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #absen tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #absen tr:hover {
            background-color: #ddd;
        }

        #absen th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            /* color: white; */
        }
    </style>
</head>

<body>
    <center>
        <h4><b>Laporan Pengetahuan Dan Ketrampilan Siswa<br>Periode <?= $periode ?></b></h4>
    </center>
    <br>
    <table style="margin: 20px;">
        <tr>
            <td>Nama Siswa</td>
            <td>: <?= $nama ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: <?= $kelas ?></td>
        </tr>
    </table>
    <br>
    <table id="customers">
        <tr>
            <th style="text-align: center; width: 10%">No</th>
            <th style="text-align: center; width: 50%">Pelajaran</th>
            <th style="text-align: center; width: 20%">Pengetahuan</th>
            <th style="text-align: center; width: 20%">Ketrampilan</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($rapor as $row) : ?>
            <tr>
                <td style="text-align: center;"><?= $no ?></td>
                <td><?= $row['pelajaran'] ?></td>
                <td style="text-align: right;"><?= $row['Nilai'] ?></td>
                <td style="text-align: right;"><?= $row['ketrampilan'] ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach ?>
        <!-- <tr>
                <td>1</td>
                <td>08-08-2019</td>
                <td>Penjelasan A</td>
                <td>20 / 2</td>
            </tr> -->
    </table>
    <br>
    <br>
    <table id="absen">
        <tr>
            <th style="text-align: center;" colspan="2">Kehadiran Siswa</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($absensi as $row) : ?>
            <tr>
                <td><?= $row['status'] ?></td>
                <td style="text-align: right;"><?= $row['jumlah'] ?> hari</td>
            </tr>
            <?php $no++; ?>
        <?php endforeach ?>
    </table>
</body>

</html>