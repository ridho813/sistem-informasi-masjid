
		<h5 class="page-title mt-3 mb-3"></h5>
		<h5 class="text-center"> Profil Dewan Pengelola Mssjid</h5> 
				<div class="card rounded-0 border border-secondary mb-3">
					<div class="card-body">
						<div class="form-group row mb-2">
								<?php foreach($profil as $a){
					$nama     = $this->db->query("SELECT * FROM profil ORDER BY id_profil DESC LIMIT 1")->row_array();
				
									?>
							<div class="col-sm-3">
							<a href="<?= base_url('profil/baca_kegiatan/') . $a['seo_title']; ?>"><img src="<?= base_url('assets/profil/') . $a['foto'] ?>" class="card-img-top rounded-0" height="35%"></a>
			
			<p class="card-title"><a href="<?= base_url('profil/baca_kegiatan/') . $a['seo_title']; ?>"><?= $a['nama']; ?></a></p>
			<p> <b>jabatan:</b> <?= $a['jabatan']; ?></p>
			<p><b>Motto:</b> <br>"<?= $a['motto']; ?>"</p>
			
			
							</div><?php } ?> 	
											
					
						</div>
						<div class="card-footer text-right">
                  <?php echo $this->pagination->create_links(); ?>
                  </div>
								</div>
										</div>
	
				
				
