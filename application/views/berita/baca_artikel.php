    <!-- /.col-lg-3 -->

    <div class="col-lg-12">
      <div class="row">
          <?php if(empty($berita)) : ?>
            <div class="col-lg-12 col-md-12 mb-12">
              <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['nama_type']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
        <div class="col-lg-12 col-md-12 mb-12  mt-12">
          <div class="card">
            <div class="card-header bg-warning">
              <h2><?= $berita['judul_berita']; ?></h2>
            </div>
            <div class="card-body ">
				<center>
              <img src="<?= base_url('assets/berita/') . $berita['foto_berita']; ?>" class="img-fluid img-thumbnail"></center>
              <p class="blockquote-footer mt-1">Penulis : | <?= date('d-m-Y', strtotime($berita['tgl_post'])); ?> | <a href="" class="badge badge-secondary pt-1 pr-1"><i class="fa fa-tag"></i> <?= $berita['nama_kategori']; ?></a></p>
            <hr>
              <?= $berita['deskripsi']; ?>
              <br><br><br><br>
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
