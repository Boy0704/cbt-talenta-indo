<table class="table table-bordered tabel-data" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
                <th>Paket Soal</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            $sql = "SELECT * FROM paket_soal WHERE status_paket = 1 ";
            $siswa_data= $this->db->query($sql)->result();
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $siswa->paket_soal ?></td>
			<td style="text-align:center" width="200px">
                
				<a href="app/export_skor_ujian/<?php echo $siswa->paket_soal_id ?>" target="_blank" class="btn btn-success btn-sm">Export Excel</a>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        