<?php 
$soal_id = $this->uri->segment(3);
 ?>

<div class="row" id="uploadExcel" style="margin-left: 5px; display: none; ">
    <form action="app/import_soal_ganda/<?php echo $soal_id ?>" method="POST" enctype="multipart/form-data">
        <div class="col-md-4"><input type="file" name="uploadexcel" class="form-control"></div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
        </div>
        <div class="col-md-4">
            <a href="upload/import_data/import_soal_ganda.xlsx" class="label label-info">Download Template Import</a>
        </div>
    </form>
</div><br>

<a href="app/tambah_butir_soal/<?php echo $soal_id ?>" class="btn btn-primary">Tambah Pertanyaan</a>
<button id="upload" class="btn btn-info">Import Excel</button>
<hr>
<table class="table table-bordered tabel-data" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th>No</th>
				<th>Pertanyaan</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            
            $soal_data= $this->db->get_where('butir_soal', array('soal_id'=>$soal_id))->result();
            foreach ($soal_data as $soal)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $soal->pertanyaan ?></td>
			
			<td style="text-align:center" width="200px">
				<a href="app/ubah_butir_soal/<?php echo $soal->butir_soal_id ?>" class="btn btn-info">Ubah</a>
                | <a href="app/hapus_butir_soal/<?php echo $soal->butir_soal_id.'/'.$soal_id ?>" class="btn btn-danger" onclick="javasciprt: return confirm('Are You Sure ?')">Hapus</a>
            </td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
    <script type="text/javascript">
            $(document).ready(function() {
                // $('#uploadExcel').hide();

                $('#upload').click(function(event) {
                    $('#uploadExcel').show();
                });;                
            });
        </script>