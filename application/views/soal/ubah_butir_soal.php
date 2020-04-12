<?php 
	$butir_soal_id = $this->uri->segment(3);
	$status_soal = $this->uri->segment(4);
	$data = $this->db->get_where('butir_soal', array('butir_soal_id'=>$butir_soal_id))->row();
 ?>
<form action="app/ubah_butir_soal/<?php echo $butir_soal_id.'/'.$status_soal ?>" method="POST">
<div class="row">
	<div class="form-group">
		<div class="col-md-12">
			<h4>Pertanyaan</h4>
			<textarea class="form-control textarea_editor" name="pertanyaan"><?php echo $data->pertanyaan ?></textarea>
		</div>
	</div>
</div>
<div class="row" style="text-align: center;">
	<div class="form-group">
	<div class="col-md-12">
			<h4>Pilih Type Soal</h4>
			<?php 
			if ($status_soal == 'ganda' || $status_soal == 'biasa') {
				?>
				<input type="radio" name="status_soal" value="ganda" id="type_soal1" checked=""> Ganda
				<input type="radio" name="status_soal" value="essay" id="type_soal2"> Essay
				<?php
			} else {
			 ?>
			<input type="radio" name="status_soal" value="ganda" id="type_soal1"> Ganda
			<input type="radio" name="status_soal" value="essay" id="type_soal2" checked=""> Essay
			<?php } ?>
	</div>
	</div>
</div><br>

<div id="ganda" style="display: none;">
	

	<div class="row" style="text-align: center;">
		<div class="form-group">
		<div class="col-md-12">
		<h4>Pilih Type Jawaban</h4>
		<?php 
		if ($status_soal == 'biasa') {
			?>
			<input type="radio" name="status_jawaban" value="1" checked=""> Pilih 1 Jawaban
			<input type="radio" name="status_jawaban" value="2"> Pilih 2 Jawaban
			<?php
		} elseif($status_soal == 'ganda') {
		 ?>
			<input type="radio" name="status_jawaban" value="1"> Pilih 1 Jawaban
			<input type="radio" name="status_jawaban" value="2" checked=""> Pilih 2 Jawaban
		<?php } ?>
		
		</div>
		</div>
	</div>

	<!-- <hr> -->
	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 1</h4>
				<textarea class="form-control textarea_editor" name="jawaban1"><?php echo $data->jawaban1 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 1</h4>
				<input type="text" class="form-control" name="bobot_jawaban1" value="<?php echo $data->bobot_jawaban1 ?>">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 2</h4>
				<textarea class="form-control textarea_editor" name="jawaban2"><?php echo $data->jawaban2 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 2</h4>
				<input type="text" class="form-control" name="bobot_jawaban2" value="<?php echo $data->bobot_jawaban2 ?>">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 3</h4>
				<textarea class="form-control textarea_editor" name="jawaban3"><?php echo $data->jawaban3 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 3</h4>
				<input type="text" class="form-control" name="bobot_jawaban3" value="<?php echo $data->bobot_jawaban3 ?>">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 4</h4>
				<textarea class="form-control textarea_editor" name="jawaban4"><?php echo $data->jawaban4 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 4</h4>
				<input type="text" class="form-control" name="bobot_jawaban4" value="<?php echo $data->bobot_jawaban4 ?>">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 5</h4>
				<textarea class="form-control textarea_editor" name="jawaban5"><?php echo $data->jawaban5 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 5</h4>
				<input type="text" class="form-control" name="bobot_jawaban5" value="<?php echo $data->jawaban5 ?>">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban 6</h4>
				<textarea class="form-control textarea_editor" name="jawaban6"><?php echo $data->jawaban6 ?></textarea>
			</div>
			<div class="col-md-3">
				<h4>Bobot Jawaban 6</h4>
				<input type="text" class="form-control" name="bobot_jawaban6" value="<?php echo $data->bobot_jawaban6 ?>">
			</div>
		</div>
	</div>
</div>

<div id="essay" style="display: none;">
	<!-- <hr> -->
	<div class="row">
		<div class="form-group">
			<div class="col-md-9">
				<h4>Jawaban Essay</h4>
				<textarea class="form-control textarea_editor" name="jawaban_essay"><?php echo $data->jawaban_essay ?></textarea>
			</div>
		</div>
	</div>

	
</div>

<button type="submit" class="btn btn-primary">Simpan</button> 
<!-- | <a href="soal" class="btn btn-info">kembali</a> -->
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$('#type_soal1').click(function(event) {
			$('#ganda').show();
			$('#essay').hide();
		});

		$('#type_soal2').click(function(event) {
			$('#ganda').hide();
			$('#essay').show();
		});

		<?php 
		if ($status_soal == 'ganda' || $status_soal == 'biasa') {
			?>
			$('#ganda').show();
			$('#essay').hide();
			<?php
		} else {
		 ?>
			$('#ganda').hide();
			$('#essay').show();
		<?php } ?>

	});
</script>