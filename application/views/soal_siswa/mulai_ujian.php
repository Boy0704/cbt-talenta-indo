<center>
	<p>
		<img src="assets/img/exam.png" style="width: 100px;">
	</p>
</center>
<div class="row">
	<div class="col-md-12">
		<?php echo get_data('paket_soal','paket_soal_id',$paket_soal_id,'tata_cara') ?>
	</div>
</div>
<hr>
<center>
	
	
	<a href="app/aksi_mulai_ujian/<?php echo $paket_soal_id.'/'.$soal_id.'/'.$userid ?>" class="btn btn-primary ">Mulai Ujian</a><br><br>
</center>