<?php
include "../koneksi/koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan urut kepangkatan.xls");

$id=$_GET['id'];

$tahun=$_POST['tahun'];

$id_peg=$_POST['id_peg'];
$id_peg2=mysql_fetch_array(mysql_query("select nip, nama, gelar_depan, gelar_belakang from data_pegawai where id='$id_peg'"));

?>
	<h2 align="center" class="l1">LAPORAN TEGURAN</h2>
	<hr class="l2">
	<h3 align="center"></h3>

	<h4>Tahun <?php echo $tahun ?></h4>
	</h4></h4>

	<table border="1" align="center">
		<thead>
			<tr>

				<th width="15" align="center" ><strong>No</strong></th>
				<th width="15" align="center" ><strong>Nama</strong></th>
				<th width="30" align="center" ><strong>No Surat</strong></th>
				<th width="50" align="center" ><strong>Tanggal Surat</strong></th>
				<th width="50" align="center" ><strong>Jenis Teguran</strong></th>
				<th width="50" align="center" ><strong>Alasan Teguran</strong></th>
				
			</tr>
		</thead>
			<?php
			$q=mysql_query("select * from rwt_teguran where tanggal like '%$tahun%' ");
			while($data=mysql_fetch_array($q)){
			$no++;

			$teguran=$data['nama_teguran'];
			$teguran2=mysql_fetch_array(mysql_query("select teguran from master_teguran where id='$teguran' "));

			$pegawai=$data['id_peg'];
			$pegawai2=mysql_fetch_array(mysql_query("select nip, nama, gelar_depan, gelar_belakang from data_pegawai where id='$pegawai'"));

			?>
			<tr>
				<td align="center"><?php echo $no ?></td>
				<td align="center" width="50"><?php echo $pegawai2['nama'] ?></td>
				<td align="center"><?php echo $data['no_surat'] ?></td>
				<td align="center"><?php echo date("d M Y", strtotime($data['tanggal'])) ?></td>
				<td align="center"><?php echo $teguran2[0] ?></td>
				<td align="center"><?php echo $data['alasan'] ?></td>
			</tr>	

		<?php
		}
		?>	
	</table>