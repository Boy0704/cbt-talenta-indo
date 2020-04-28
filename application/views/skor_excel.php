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

		<!-- jika soal ganda 1 pilihan -->
		<?php if ($status_soal == 'biasa'): ?>
		<td>Total Skor</td>
		<?php endif ?>

		<!-- batas multi pilih -->

	</tr>
	<?php 
	$no = 0;
	
	foreach ($this->db->get_where('skor', array('paket_soal_id'=>$paket_soal_id,'status'=>1))->result() as $rw) {
		$nama_user = get_data('user','user_id',$rw->user_id,'nama_lengkap');
		$total_benar = 0;
		$total_salah = 0;
		$total_skor = 0;
	 ?>
	 <tr>
	<td><?php echo ++$no; ?></td>
	<td><?php echo $rw->skor_id //$retVal = ($nama_user == '') ? 'User telah dihapus' : $nama_user ; ?></td>
	<?php 
	$nilai = '';

	// soal biasa (hanya bisa 1 jawaban)
	foreach ($this->db->get_where('butir_soal', array('soal_id'=>get_data('item_soal','paket_soal_id',$paket_soal_id,'soal_id')))->result() as $value) {
		$skor_detail = $this->db->get_where('skor_detail', array('skor_id'=>$rw->skor_id,'butir_soal_id'=>$value->butir_soal_id));
		
		if ($status_soal == 'biasa') {
			if ($skor_detail->num_rows() > 0) {
				$total_skor = $total_skor + $skor_detail->row()->nilai;
				?>
				<td><?php echo $skor_detail->row()->nilai ?></td>
				<?php
			} else {
				?>
				<td>0</td>
				<?php
			}
		}

		if ($status_soal == 'ganda') {

			if ($skor_detail->num_rows() > 0) {
				$ket_nilai = ($skor_detail->row()->nilai % 2 == 0 && $skor_detail->row()->nilai != 0 ) ? 'benar' : 'salah' ;
				if ($ket_nilai == 'benar') {
					$total_benar++;
				} else {
					$total_salah++;
				}
				?>
				<td><?php echo $ket_nilai ?></td>
				<?php
			} else {
				$total_salah++;
				?>
				<td>salah</td>
				<?php
			}
		}

		if ($status_soal == 'essay') {
			if ($skor_detail->num_rows() > 0) {
				?>
				<td><?php echo $skor_detail->row()->jawaban ?></td>
				<?php
			} else {
				?>
				<td>tidak ada jawaban</td>
				<?php
			}
		}

	}

	 ?>
		<!-- jika soal ganda multi pilih -->
			<?php if ($status_soal == 'ganda'): ?>
			<td><?php echo $total_benar ?></td>
			<td><?php echo $total_salah ?></td>
			<?php endif ?>

		<!-- batas multi pilih -->

		<!-- jika soal ganda multi pilih -->
			<?php if ($status_soal == 'biasa'): ?>
			<td><?php echo $total_skor ?></td>
			<?php endif ?>

		<!-- batas multi pilih -->
	</tr>

	

	<?php } ?>

</table>