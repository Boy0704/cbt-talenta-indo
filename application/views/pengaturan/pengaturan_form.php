
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="pengaturan">Pengaturan <?php echo form_error('pengaturan') ?></label>
            <?php 
            if ($this->uri->segment(3) == 'logo') {
            	?>
            	<p style="color: red">Ekstenti Logo .png (Ukuran 100x100 pixel;) </p>
            	<input type="file" name="pengaturan" class="form-control">
            	<?php
            } else{
             ?>
            
            <textarea class="form-control" rows="3" name="pengaturan" id="pengaturan" placeholder="Pengaturan"><?php echo $pengaturan; ?></textarea>
        <?php } ?>
        </div>
	    <input type="hidden" name="pengaturan_id" value="<?php echo $pengaturan_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default">Cancel</a>
	</form>
   