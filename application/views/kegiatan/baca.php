    <!-- /.col-lg-3 -->

    <div class="col-lg-12">
      <div class="row">
          <?php if(empty($tb_kegiatan)) : ?>
            <div class="col-lg-12 col-md-12 mb-12">
              <div class="alert alert-danger" role="alert">Jenis Kegiatan <b><?= $kateid['jenis_kegiatan']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
        <div class="col-lg-12 col-md-5 mb-12  mt-5">
          <div class="card">
            <div class="card-header bg-warning">
              <h2><?= $tb_kegiatan['judul_kegiatan']; ?></h2>
            </div>
            <div class="card-body ">
				<center>
              <img src="<?= base_url('assets/kegiatan/') . $tb_kegiatan['foto']; ?>"height="200"width="400"></center>
              <p class="blockquote-footer mt-1">Jam Mulai <?= ($tb_kegiatan['jam_mulai']); ?> | <a href="" class="badge badge-secondary pt-1 pr-1"><i class="fa fa-tag"></i> <?= $tb_kegiatan['jam_selesai']; ?></a> |  <p class="blockquote-footer mt-1">Tanggal <?= date('d-m-Y', strtotime($tb_kegiatan['tanggal'])); ?> </p></p>
            <hr>
              <?= $tb_kegiatan['keterangan']; ?>
              <br><br><br><br>
							<img src="<?= base_url('assets/kegiatan/') . $tb_kegiatan['foto']; ?>"height="200"width="400"></center>
          <!-- Profil -->
              <div class="card mb-4" style="max-width: 340px;">
                <div class="row no-gutters">
                 
                  <div class="col-md-8">
                    <div class="card-body">
                   
                      <p class="card-text">Masjid An-Naur</p>
                      <p class="card-text"><small class="text-muted">Muh Ridho Wachid S</small></p>
                    </div>
                  </div>
                </div>
              </div>
          <!-- Profil -->
            </div>
          </div>

        </div>



        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
	
    </div>
    <!-- Blog End -->
