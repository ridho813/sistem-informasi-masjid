
    <div class="col-lg-12">
      <div class="row">
        <h4 class="mt-3 list-group-item list-group-item-action bg-warning text-black-100 ml-3">    
					 <div class="col-lg-7 col-md-4 col-sm-12 sidebar">
                  <form action="<?= base_url('Baca'); ?>" method="post">
                    <div class="input-group col-sm-10">
                      <input type="text" class="form-control" placeholder="Masukan Keyword..." name="keyword" autocomplete="off" autofocus="on">
                      <div class="input-group-append">
                        <input type="submit" name="submit" class="btn btn-success" value="Cari">
                      </div>
                    </div>
                  </form>
                </div 
								class="text-center">Semua Artikel</h4>
				
            
          <?php if(empty($berita)) : ?>
            <div class="col-lg-12 col-md-12 mb-5">
              <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['kategori']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
					<?php foreach($berita as $b){
					$nama     = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 1")->row_array();
							?>
        <div class="col-lg-7 col-md-5 mb-5">
          <div class="media">
            <img src="<?= base_url('assets/berita/') . $b['foto_berita']; ?>" class="mr-3" width="150">
            <div class="media-body">
              <h2 class="mt-0"><a href="<?= base_url('berita/baca/') . $b['seo_title']; ?>"><?= $b['judul_berita']; ?></a></h2>
              <a href="#"><span class="badge badge-secondary"><?= $b['nama_kategori']; ?></span></a>
              <?= substr($b['deskripsi'], 0,100); ?>... <a href="<?= base_url('berita/baca/') . $b['seo_title']; ?>" class="btn btn-warning text-light btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
				<?php } ?> 



        

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
	<div class="page-item text-right">
                  <?php echo $this->pagination->create_links(); ?>
                  </div>
  </div>
	
</div>
<!-- /.container -->


