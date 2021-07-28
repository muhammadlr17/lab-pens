<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Laporan Data Peminjaman'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php
 //KONEKSI
include "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>LAB-PENS</title>
		<link rel="stylesheet" type="text/css" href="component.css" />
	</head>
<body>
				<div style="text-align: center;">
<img src="../asset/img/kop.jpg"  />
</div>
<h3 align="center">DATA PEMINJAMAN</h3>
<p align="right">Print on : <i><?php echo date('l, Y-m-d / H:i:s', time()+60*60*6) ?></i></p>
	
					<table>
						<thead>
							<tr>
								<th align="center">No</th>
								<th align="center">ID Peminjaman</th>
								<th align="center">ID Peminjam</th>
								<th align="center">Kode Barang</th>
								<th align="center">Jumlah</th>
								<th align="center">Tanggal Pinjam</th>
								<th align="center">Tenggat</th>
								<th align="center">Status Peminjaman</th>
								<th align="center">~</th>
							</tr>
						</thead>
						<tbody>
						<?php
                    $query="SELECT * FROM peminjaman ORDER BY status_peminjaman DESC";

                        /* cara oracle */
                            $parsesql = oci_parse($conn, $query);
                            oci_execute($parsesql);
                            $no=1;
                        // menampilkan data
                        while($rows=oci_fetch_object($parsesql)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows ->ID_PEMINJAMAN; ?></td>
                        <td><?php echo $rows ->ID_PENGGUNA; ?></td>
                        <td><?php echo $rows ->KODE_BARANG; ?></td>
                        <td><?php echo $rows ->JUMLAH; ?></td>
                        <td><?php echo $rows ->TANGGAL_PINJAM; ?></td>
                        <td><?php echo $rows ->TANGGAL_KEMBALI; ?></td>
                        <?php
							if($rows->STATUS_PEMINJAMAN == 'Selesai'){
								echo '<td class="text-success">'.$rows ->STATUS_PEMINJAMAN.'</td>';
							}else{
								echo '<td class="text-warning">'.$rows ->STATUS_PEMINJAMAN.'</td>';
							}
                        ?>
                    </tr>
                    <?php	
                        $no++;
                        }
                        oci_free_statement($parsesql);
                        oci_close($conn);
                    ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
