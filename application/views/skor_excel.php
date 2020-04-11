<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$paket_soal.xls");
$rowspan='';
if ($status_soal == 'essay') {
	$rowspan = 'rowspan="2"';
}
 ?>

<h3>Paket Soal : <?php echo $paket_soal ?></h3>
<table border="1">
	<tr>
		<td <?php echo $rowspan ?>>No</td>
		<td <?php echo $rowspan ?>>Nama</td>
		<?php 
		$no = 0;
		foreach ($this->db->get_where('butir_soal', array('soal_id'=>get_data('item_soal','paket_soal_id',$paket_soal_id,'soal_id')))->result() as $rw) {
		 ?>
		<td><?php echo ++$no; ?></td>
		<?php } ?>

		<?php if ($status_soal == 'essay') { ?>
			
		<!-- jika soal essay -->
		<tr>
			<?php 
			$no = 0;
			foreach ($this->db->get_where('butir_soal', array('soal_id'=>get_data('item_soal','paket_soal_id',$paket_soal_id,'soal_id')))->result() as $rw) {
			 ?>
			<td><?php echo $rw->pertanyaan ?></td>
			<?php } ?>
		</tr>

		<!-- batas soal essay -->

		<?php } ?>

		<!-- jika soal ganda multi pilih -->
		<?php if ($status_soal == 'ganda'): ?>
		<td>Total Benar</td>
		<td>Total Salah</td>
		<?php endif ?>

		<!-- batas multi pilih -->

	</tr>
	<?php 
	$no = 0;
	$total_benar = 0;
	$total_salah = 0;
	foreach ($this->db->get_where('skor', array('paket_soal_id'=>$paket_soal_id,'status'=>1))->result() as $rw) {
		$nama_user = get_data('user','user_id',$rw->user_id,'nama_lengkap');

	 ?>
	 <tr>
	<td><?php echo ++$no; ?></td>
	<td><?php echo $retVal = ($nama_user == '') ? 'User telah dihapus' : $nama_user ; ?></td>
	<?php 
	foreach ($this->db->get_where('skor_detail', array('skor_id'=>$rw->skor_id))->result() as $key => $value) {
		$ket_nilai = ($value->nilai % 2 == 0) ? 'benar' : 'salah' ;
		$nilai = ($status_soal == 'ganda') ? $ket_nilai : $value->nilai ;
		if ($ket_nilai == 'benar') {
			$total_benar++;
		} else {
			$total_salah++;
		}
		?>
		<td><?php echo $retVal = ($status_soal == 'essay') ? $value->jawaban : $nilai; ?></td>



		<?php
	}
	 ?>
		<!-- jika soal ganda multi pilih -->
			<?php if ($status_soal == 'ganda'): ?>
			<td><?php echo $total_benar ?></td>
			<td><?php echo $total_salah ?></td>
			<?php endif ?>

		<!-- batas multi pilih -->
	</tr>

	

	<?php } ?>

</table>