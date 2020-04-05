
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Ujian <?php echo form_error('mapel') ?></label>
            <input type="text" class="form-control" name="mapel" id="mapel" placeholder="Jenis Ujian" value="<?php echo $mapel; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Operator <?php echo form_error('operator') ?></label>
            <input type="text" class="form-control" name="operator" id="operator" placeholder="Operator" value=">=" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Lulus <?php echo form_error('nilai_lulus') ?></label>
            <input type="text" class="form-control" name="nilai_lulus" id="nilai_lulus" placeholder="Nilai Lulus" value="<?php echo $nilai_lulus; ?>" />
        </div>
	    <input type="hidden" name="mapel_id" value="<?php echo $mapel_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mapel') ?>" class="btn btn-default">Cancel</a>
	</form>
   