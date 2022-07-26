
		<h5 class="page-title mt-3 mb-3"></h5>
		<h5 class="text-center"> Foto Kegiatan Masjid AN-NUUR</h5>
					 <div class="col-lg-6 col-md-4 col-sm-12 sidebar">
                  <form action="<?= base_url('profil'); ?>" method="post">
                    <div class="input-group col-sm-10">
                      <input type="text" class="form-control" placeholder="Masukan Keyword..." name="keyword" autocomplete="off" autofocus="on">
                      <div class="input-group-append">
                        <input type="submit" name="submit" class="btn btn-success" value="Cari">
                      </div>
                    </div>
                  </form>
                </div> 
				<div class="card rounded-0 border border-secondary mb-3">
					<div class="card-body">
						<div class="form-group row mb-2">
								<?php foreach($tb_kegiatan as $a){
					$nama     = $this->db->query("SELECT * FROM tb_kegiatan ORDER BY id_kegiatan DESC LIMIT 1")->row_array();
					$narasumber 
									?>
							<div class="col-sm-3">
							<a href="<?= base_url('foto_kegiatan/baca_kegiatan/') . $a['seo_title']; ?>"><img src="<?= base_url('assets/kegiatan/') . $a['foto'] ?>" class="card-img-top" height="30%" weight="30"></a>
			
			<h5 ><?= $a['narasumber']; ?></h5>
			<p class="card-title"><a href="<?= base_url('foto_kegiatan/baca_kegiatan/') . $a['seo_title']; ?>"><?= $a['judul_kegiatan']; ?></a></p>
			
							</div><?php } ?> 	
											
					
						</div>
						<div class="card-footer text-right">
                  <?php echo $this->pagination->create_links(); ?>
                  </div>
								</div>
										</div>
	
				
				
