    <!-- /.col-lg-3 -->

    <div class="col-lg-12">
      <div class="row">
          <?php if(empty($profil)) : ?>
            <div class="col-lg-12 col-md-12 mb-12">
              <div class="alert alert-danger" role="alert">Jenis Kegiatan <b><?= $kateid['jenis_kegiatan']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
        <div class="col-lg-12 col-md-5 mb-12  mt-5">
          <div class="card">
            <div class="card-header bg-warning">
              <h2><?= $profil['nama']; ?></h2>
            </div>
            <div class="card-body ">
				<center>
              <img src="<?= base_url('assets/kegiatan/') . $profil['foto']; ?>"height="200"width="400"></center><br><br>
              <h3 class="text-center" class="blockquote-footer mt-1" >Jabatan <?= ($profil['jabatan']); ?> </h3>
            <p  class="text-center"> Motto:" <br><?= $profil['motto']; ?>"
              </p><br><br>
			  <h4 class="text-center"><?= $profil['aktifitas']; ?></h4><br>
			  <a href=" <?= $profil['fb']; ?>" > <p class="text-center">Klik Fb</p> </a>
				<a href=" <?= $profil['ig']; ?>"  > <p class="text-center"> Klik Instagram</p></a>
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
