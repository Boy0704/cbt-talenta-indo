<?php if ($this->session->userdata('level') == 'siswa'): ?>
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Info! </strong>Silahkan masuk ke menu Daftar Ujian untuk mengerjakan paket soal yang lain yang belum selesai.
Jika pada menu Daftar Ujian tidak ada batch soal yang bisa dipilih, maka anda telah menyelesaikan seluruh ujian.
 .
  </div>
<?php endif ?>

<table class="table table-bordered tabel-data" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Batch Soal</th>
				<th>Paket Soal</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            $user_id = $this->session->userdata('id_user');
            $sql = "SELECT * FROM skor where user_id=$user_id and status=1 ";
            $siswa_data= $this->db->query($sql)->result();
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo get_data('batch','batch_id',get_data('paket_soal','paket_soal_id',$siswa->paket_soal_id,'batch_id'),'nama_batch') ?></td>
			<td><?php echo get_data('paket_soal','paket_soal_id',$siswa->paket_soal_id,'paket_soal') ?></td>
			<td style="text-align:center" width="200px">
                <span class="label label-success">Selesai</span>
				<!-- <a href="app/detail_paket_soal/<?php echo $siswa->paket_soal_id ?>/<?php echo $this->session->userdata('id_user'); ?>" class="btn btn-primary">Pilih</a> -->
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        