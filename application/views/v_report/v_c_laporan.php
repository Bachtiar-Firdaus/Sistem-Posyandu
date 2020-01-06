<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
   <style>

        table{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }        
        .table1{
            border-collapse: collapse;
            width: 35%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }        
        .table2{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .table2 td{
            border: 1px solid white; background-color: white;
            text-align: right;
        }      
        .table1 td{
            border: 1px solid white; background-color: white;
            text-align: left;
        }
        .daus{
            border: 1px solid white; background-color: white;

        }
        h2{
            text-align: center;
        }
        h1{
            text-align: center;
        }
        table th{
            border:1px solid #000;
            padding: 1px;
            font-weight: bold;
            text-align: center;
        }
        table td{
            border:1px solid #000;
            padding: 1px;
            text-align: center;
        }

        #judul{
            font-size: 20px;
            font-weight: bold;
        }

        #tebal2{
            font-weight: bold;
        }

        #tebal{
            border:1px solid #000;
            padding: 3px;
            font-weight: normal;
            text-align: center;
        }

        #garis{
            width: 40%;
            border: 1px solid #000000;
        }
        #nis{
            text-align: left;
        }
        th {
            font-size: 11px;
        }
        td{
            font-size: 11px;
        }
        p{
            font-size: 12px;
        }

    </style>
    
    
</head>
<body >
<h3 style="text-align: center; "><b>LAPORAN HASIL KEGIATAN POSYANDU</b></h3>
<h3 style="text-align: center; "></h3>

<table class="table1">
<tr>
    <td>NAMA POSYANDU </td>
    <td> : </td>
    <td> KENCANA 1</td> 
</tr>
<tr>
    <td>RT </td>
    <td> : </td>
    <td> 13 - 15</td> 
</tr>
<tr>
    <td>KELURAHAN </td>
    <td> : </td>
    <td>KELAPA 3</td> 
</tr>
<tr>
    <td>TANGGAL PELAKSANAAN </td>
    <td> : </td>
    <td> <?php echo $dataa?></td> 
</tr>            

</table>

<table class="table2">
    <tr>
    <td style="text-align: right;">KG</td> 
    </tr>
</table>

<table>
     <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>JENIS KELAMIN</th>
        <th>KATEGORI</th>
        <th>UMUR BULAN</th>
        <th>BERAT BADAN</th>
    </tr>

     <?php foreach($data_cetak as $r){?>
    <tr>

        <td><?php echo $r->no; ?></td>
        <td><?php echo $r->nama; ?></td>
        <td><?php echo $r->jk; ?></td>
        <td><?php echo $r->kategori; ?></td>
        <td><?php echo $r->umur_b; ?></td>
        <td><?php echo $r->berat_badan; ?></td>

    </tr>
    <?php }?>
<!-- 
    <tr>
        
        <td colspan="3">JUMLAH</td>
        <td>
            <?php 

            if(count($isibgr)>0){
            foreach($isibgr as $s1)
            {
                echo number_format($s1->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($kosongbgr)>0){    
            foreach($kosongbgr as $t1)
            {
                echo number_format($t1->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($totalbgr)>0){
            foreach($totalbgr as $u1)
            {
                echo number_format($u1->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="5"></td>
        </tr>




             <?php 
            if(count($timbanganbgr1)>0){
         foreach($timbanganbgr1 as $r11){?>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">JUMLAH MOBIL</td>
            <td><?php echo $r11->mob_bgr; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>

 -->

    
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3">Kelapa 3, <?php 
        date_default_timezone_set("Asia/Jakarta"); 
        echo date("d-m-Y");?><br>KETUA POSYANDU <br><br><br><br><br></td>
</tr>


<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"><hr style="background-color: black; width: 120px;"></td>
</tr>
</table>





</body>
</html>