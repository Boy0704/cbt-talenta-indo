<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$paket_soal.xls");
 ?>

<table border="1">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<?php 
		$no = 0;
		foreach ($this->db->get_where('butir_soal', array('soal_id'=>get_data('item_soal','paket_soal_id',$paket_soal_id,'soal_id')))->result() as $rw) {
		 ?>
		<td><?php echo ++$no; ?></td>

		<?php } ?>
	</tr>
	<?php 
	$no = 0;
	foreach ($this->db->get_where('skor', array('paket_soal_id'=>$paket_soal_id))->result() as $rw) {
	 ?>
	 <tr>
	<td><?php echo ++$no; ?></td>
	<td><?php echo get_data('user','user_id',$rw->user_id,'nama_lengkap') ?></td>
	<?php 
	foreach ($this->db->get_where('skor_detail', array('skor_id'=>$rw->skor_id))->result() as $key => $value) {
		?>
		<td><?php echo $value->nilai; ?></td>
		<?php
	}
	 ?>
	</tr>
	<?php } ?>

</table>