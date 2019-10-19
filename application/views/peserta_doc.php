<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Peserta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Created</th>
		<th>Updated</th>
		
            </tr><?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $peserta->nomor ?></td>
		      <td><?php echo $peserta->nama ?></td>
		      <td><?php echo $peserta->created ?></td>
		      <td><?php echo $peserta->updated ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>