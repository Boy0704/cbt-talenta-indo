<table class="table table-bordered tabel-data" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Paket Soal</th>
                <th>Jam Mulai</th>
				<th>Status</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            $sql = "SELECT * FROM skor WHERE status = 0 AND waktu_mulai LIKE CONCAT(CURDATE(),'%') GROUP BY user_id ORDER BY waktu_mulai DESC";
            $siswa_data= $this->db->query($sql)->result();
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo get_data('user','user_id',$siswa->user_id,'nama_lengkap') ?></td>
            <td><?php echo get_data('paket_soal','paket_soal_id',$siswa->paket_soal_id,'paket_soal') ?></td>
			<td><?php echo $siswa->jam_mulai ?></td>
            <td>
                <?php echo $retVal = ($siswa->status == 1) ? '<span class="label label-success">Selesai</span>' : '<span class="label label-info">Sedang Mengerjakan</span>' ; ?>
            </td>
			<td style="text-align:center" width="200px">
                
				<?php if ($siswa->status == 0): ?>
                    <a href="app/hentikan_ujian/<?php echo $siswa->user_id.'/'.$siswa->paket_soal_id ?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="btn btn-warning btn-sm">Hentikan Ujian</a>
                <?php endif ?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        