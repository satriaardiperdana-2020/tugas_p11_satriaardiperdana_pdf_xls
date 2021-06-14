<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
</head>
<body>
    
<table border="1" width="100%" style="border-collapse: collapse;">
    <?php
    if($simpanan->num_rows() > 0){
        ?>
        <tr>
            <th align="left" style="padding:3px 5px" colspan="10"><h1>Laporan Nilai</h1></th>
        </tr>
        <tr>
            <th align="center" style="padding:3px 5px">No.</th>
            <th align="left" style="padding:3px 5px">Nim</th>
            <th align="left" style="padding:3px 5px">Nama</th>
            <th align="left" style="padding:3px 5px">Kode MTK</th>
            <th align="left" style="padding:3px 5px">Matakuliah</th>
            <th align="center" style="padding:3px 5px">Absen</th>
            <th align="center" style="padding:3px 5px">Tugas</th>
            <th align="center" style="padding:3px 5px">UTS</th>
            <th align="center" style="padding:3px 5px">Nilai Akhir</th>
            <th align="center" style="padding:3px 5px">Grade</th>
        </tr>
        <?php
        foreach ($simpanan->result() as $key => $val) {
                $akhir = ($val->tugas * 30 / 100) + ($val->uts * 30 / 100) + ($val->uas * 40 / 100);
                $grade = 'E';
                if($akhir >= 85 && $akhir <= 100) $grade = 'A';
                if($akhir >= 80 && $akhir < 85) $grade = 'A-';
                if($akhir >= 75 && $akhir < 80) $grade = 'B+';
                if($akhir >= 70 && $akhir < 75) $grade = 'B';
                if($akhir >= 65 && $akhir < 70) $grade = 'B-';
                if($akhir >= 60 && $akhir < 65) $grade = 'C';
                if($akhir >= 45 && $akhir < 60) $grade = 'D';
                if($akhir >= 0 && $akhir < 45) $grade = 'E';
            ?>
                <tr>
                    <td align="center"> <?=($key+1)?>. </td>
                    <td><?=$val->nim;?></td>
                    <td><?=$val->nama;?></td>
                    <td><?=$val->kdmtk;?></td>
                    <td><?=$val->namamtk;?></td>
                    <td align="center"><?=$val->absen;?></td>
                    <td align="center"><?=$val->tugas;?></td>
                    <td align="center"><?=$val->uts;?></td>
                    <td align="center">
                        <?=$akhir?>
                    </td>
                    <td align="center">
                        <?=$grade?>
                    </td>
                </tr>
            <?php
        }
    }else{
        ?>
            <tr>
                <th align="left" style="padding:3px 5px" colspan="9"><h1>Laporan Nilai</h1></th>
            </tr>
        <?php
    }
    ?>
</table>

</body>
</html>