<?php
  require_once __DIR__ . '/mpdf/vendor/autoload.php';
  $mpdf = new \Mpdf\Mpdf();
  // $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	// $mpdf->WriteHTML($content);
	// $mpdf->Output();
  
  session_start();
  include 'conn.php';
  $q_pasien = mysqli_query($conn, "SELECT * FROM pasien");
  
  $nama_dokumen='hasil_tes_covid';
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
</head>
<body>
	<div>
		<h2>Hasil Tes</h2>
 
		<table border="1">
	    	<thead>
            <tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Desa</th>
                <th>Riwayat</th>
              </tr>
	    	</thead>
	    	<tbody>
            <?php 
              while($data = mysqli_fetch_assoc($q_pasien)){
            ?>
              <tr>
                <td><?php echo $data['id_pasien']; ?></td>
                <td><?php echo $data['nama_pasien']; ?></td>
                <td><?php echo $data['umur_pasien']; ?></td>
                <td><?php echo $data['alamat_pasien']; ?></td>
                <td><?php echo $data['kota_pasien']; ?></td>
                <td><?php echo $data['desa_pasien']; ?></td>
                <td><?php echo $data['riwayat_pasien']; ?></td>
              </tr>
            <?php } ?>
            </tbody>
	    </table>
 
    </div>
 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>  
