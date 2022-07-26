
		<h5 class="page-title mt-3 mb-3"></h5>
		<h5 class="text-center"> Vidio Kegiatan</h5> 
				<div class="card rounded-0 border border-secondary mb-3">
					<div class="card-body">
						<div class="form-group row mb-2">
								<?php foreach($vidio as $a){
					$nama     = $this->db->query("SELECT * FROM vidio ORDER BY id_vidio DESC LIMIT 1")->row_array();
					$narasumber 
									?>
							<div class="col-sm-3">
							<iframe class="vidloop" src="https://www.youtube.com/embed/<?=$a['link'];?> " frameborder="0" allowfullscreen></iframe>
			
			<h5 ><?= $a['post_titel']; ?></h5>
			
			
							</div><?php } ?> 	
											
					
						</div>
						<div class="card-footer text-right">
                  <?php echo $this->pagination->create_links(); ?>
                  </div>
												</div>
										</div>
	
				
				
