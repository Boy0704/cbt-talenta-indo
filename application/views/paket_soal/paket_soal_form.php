
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Paket Soal <?php echo form_error('paket_soal') ?></label>
            <input type="text" class="form-control" name="paket_soal" id="paket_soal" placeholder="Paket Soal" value="<?php echo $paket_soal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Batch Id </label>
            <!-- <input type="text" class="form-control" name="batch_id" id="batch_id" placeholder="Batch Id" value="<?php echo $batch_id; ?>" /> -->
            <select name="batch_id" class="form-control">
                <option value="<?php echo $batch_id ?>"><?php echo $batch_id ?></option>
                <?php 
                $data = $this->db->get('batch');
                foreach ($data->result() as $row) {
                 ?>
                <option value="<?php echo $row->batch_id ?>"><?php echo $row->batch_id.'-'.$row->nama_batch ?></option>
                <?php } ?>
            </select>
        </div>
	    <!-- <div class="form-group">
            <label for="int">User Id Tambah <?php echo form_error('user_id_tambah') ?></label>
            <input type="text" class="form-control" name="user_id_tambah" id="user_id_tambah" placeholder="User Id Tambah" value="<?php echo $user_id_tambah; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Waktu Tambah <?php echo form_error('waktu_tambah') ?></label>
            <input type="text" class="form-control" name="waktu_tambah" id="waktu_tambah" placeholder="Waktu Tambah" value="<?php echo $waktu_tambah; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id Ubah <?php echo form_error('user_id_ubah') ?></label>
            <input type="text" class="form-control" name="user_id_ubah" id="user_id_ubah" placeholder="User Id Ubah" value="<?php echo $user_id_ubah; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Waktu Ubah <?php echo form_error('waktu_ubah') ?></label>
            <input type="text" class="form-control" name="waktu_ubah" id="waktu_ubah" placeholder="Waktu Ubah" value="<?php echo $waktu_ubah; ?>" />
        </div> -->
        <div class="form-group">
            <label for="varchar">Tata Cara Pengerjaan</label>
            <textarea class="form-control textarea_editor" name="tata_cara"><?php echo $tata_cara ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Waktu Soal</label>
            <input type="text" class="form-control" name="waktu_soal" id="waktu_soal" placeholder="Waktu Soal" value="<?php echo $waktu_soal; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Keyboard</label>
            <select name="keyboard" class="form-control">
                <option value="<?php echo $keyboard ?>"><?php echo $keyboard ?></option>
                <option value="tidak">tidak</option>
                <option value="ya">ya</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Klik Kanan</label>
            <select name="klik_kanan" class="form-control">
                <option value="<?php echo $klik_kanan ?>"><?php echo $klik_kanan ?></option>
                <option value="tidak">tidak</option>
                <option value="ya">ya</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Soal Acak</label>
            <select name="random_soal" class="form-control">
                <option value="<?php echo $random_soal ?>"><?php echo $random_soal ?></option>
                <option value="ya">ya</option>
                <option value="tidak">tidak</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Jawaban Acak</label>
            <select name="random_jawaban" class="form-control">
                <option value="<?php echo $random_jawaban ?>"><?php echo $random_jawaban ?></option>
                <option value="tidak">tidak</option>
                <option value="ya">ya</option>
                
            </select>
        </div>
	    <div class="form-group">
            <label for="enum">Status Paket <?php echo form_error('status_paket') ?></label>
            <!-- <input type="text" class="form-control" name="status_paket" id="status_paket" placeholder="Status Paket" value="<?php echo $status_paket; ?>" /> -->
            <select name="status_paket" class="form-control">
                <option value="<?php echo $status_paket ?>"><?php echo $status_paket ?></option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                
            </select>
        </div>
	    <input type="hidden" name="paket_soal_id" value="<?php echo $paket_soal_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paket_soal') ?>" class="btn btn-default">Cancel</a>
	</form>
   