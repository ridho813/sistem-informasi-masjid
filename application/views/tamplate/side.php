
<!--img slide-->
<div class="container p-0 ">
					<div id="slide-indicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators mt-3 mb-3">
							
															<li data-target="#slide-indicators" data-slide-to="0" class="active"></li>
															<li data-target="#slide-indicators" data-slide-to="1" ></li>
													</ol>
						<div class="carousel slide" data-ride="carousel">
							<div class="carousel-inner pt-0">
																	<div class="carousel-item active">
										<img src="<?= base_url()?>assets/img/masjid.jpg" class="img-fluid w-100">
										<div class="carousel-caption d-none d-md-block">
				
										</div>
									</div>
																	<div class="carousel-item ">
										<img src="<?= base_url()?>assets/img/kegiatan.jpeg" class="img-fluid w-100">
										<div class="carousel-caption d-none d-md-block">

										</div>
									<!-- </div>				<div class="contaner">
							<div class="ro"></div>
<div class="slideshow_wrap">
    <div class="slidesho">
      <div class="slide_one slidel">
		<p class="text-white">Muh Ridho wachid s</p>
		<p class="text-white">Bendahara</p>
      
      </div>
      
      <div class="slide_two slidel">
        <img src="<?= base_url()?>assets/img/kegiatan.jpeg" />
      </div>
      
       <div class="slide_three slidel">
        <img class="slide_img" src="<?= base_url()?>assets/img/kegiatan.jpeg" />
      </div>
	 
    </div> 
</div></div>	 --></div>	
															</div><h5 class="text-center"id="table"></h5>
							 <!--  /Profil -->
		

						</div>
					</div>
					
				</div>
						<!-- /IMAGE SLIDERS -->
	

			<!-- QUOTE -->
							<div class="container p-0 mb-3">
					<div class="quote">
						<div class="quote-title"><i class="fa fa-comments"></i> KUTIPAN</div>
	<ul id="quote" class="quote">
<li >Pendidikan merupakan tiket untuk masa depan. Hari esok untuk orang-orang yang telah mempersiapkan dirinya hari ini. <span class="font-weight-bold">Anonim</span></li> 

<li>Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh. <span class="font-weight-bold">Anonim</span></li> 
															<li>Hiduplah seakan-akan kau akan mati besok. Belajarlah seakan-akan kau akan hidup selamanya. <span class="font-weight-bold">Anonim</span></li>
													</ul>
					</div>
				</div>
						<!--  /QUOTE -->
</div>


<!--  /End -->

 

</header>
<!--  /End -->



<!-- styele infaq-->
<style>
	.ro {
		display: flex;
    flex-wrap: wrap;
    margin-right: auto;
    margin-left: auto;
	display: block;
}
.table-responsiv {
    display: block;
    width: 165%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.contaner {
  background:#218838#;
  width:200px;
 
  margin-right: auto;
    margin-left: auto;
	position: relative;
	margin-top: 200px;
}
.slideshow_wrap {
  width:250px;
  height:197px;
  overflow: hidden;
   
}

.slidesho {
  width:1900px;
  height:180px;
  margin: 0 0 0 -1000px;
 position: relative;
  -webkit-animation-name: slide_animation;
  -webkit-animation-duration:15s;
  -webkit-animation-iteration-count:infinite;
  -webkit-animation-direction:alternate;
   -webkit-animation-play-state: running;
}

.slidel {
  
  width:500px;
  height: 470px;
  position:relative;
  float:left;
  overflow:hidden;
  
}

.slidesho img{
  width:350px; height:250px;
}

@-webkit-keyframes slide_animation {
  
  0% {left:0px;}
  10% {left:500px;}
  20% {left:500px;}
  30% {left:500px;}
  40% {left:500px;}
  50% {left:500px;}
  60% {left:500px;}
  70% {left:1000px;}
  80% {left:1000px;}
  90% {left:1000px;}
  100% {left:1000px;}

  
}
</style>
	<section class="content">
	
	
		<div class="container">
			<div class="row">
				<!-- CONTENT -->

<div class="col-lg-8 col-md-8 col-sm-12 ">
	<!-- TULISAN POPULER -->  
	
			<h5 class="page-title mb-3">Berita Terbaru</h5>
			<?php if(empty($berita)) : ?>
            <div class="col-lg-12 col-md-12 mb-5">
              <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['nama_type']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
		  <?php foreach($berita as $b){
					$nama     = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 3")->row_array();
											?>
					<div class="card rounded-0 border border-secondary mb-3">
				<div class="row">
					<div class="col-md-5">
						<img src="<?= base_url('assets/berita/') . $b->foto_berita ?>" class="card-img rounded-0" alt="Sample Post 1">
					</div>
					<div class="col-md-7">
						<div class="card-body p-3">
							<h5 class="card-title"><a href="<?= base_url('berita/baca/') . $b->id_berita; ?>"><?= $b->judul_berita; ?></a></h5>
							<p class="card-text mb-0"> <?php echo substr($b->deskripsi, 0,100);?></p><a href="<?= base_url('berita/baca/') . $b->seo_title; ?>" class="text-green">Baca Selengkapnya.....</a>
							
							<div class="d-flex justify-content-between align-items-center mt-1">
						 <a href="<?= base_url('artikel/kategori/') . $b->id_kategori; ?>"><small class="text-muted" ><?= $b->nama_kategori; ?></small></a>
								<a href="<?= base_url('berita/baca/') . $b->seo_title; ?>" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
				</div> 

			</div><?php } ?>
					<br>	
			
					
		  
			<h5  class="page-title mb-3">Laporan Infaq Masjid AN-NUUR</h5><br>
		
			<div class="table-responsive">
           <table class="table table-bordered table-md">   
			
                    <tr>
<td>Kategori</td>
<td>Tanggal</td>
<td>Jumlah</td>
</tr>	  <?php foreach($tb_kas_masjid as $b){     
				    	$nama     = $this->db->query("SELECT * FROM tb_kategori_kas ORDER BY id_kategori DESC LIMIT 5")->row_array();
				
					?>	   
<tr>
	<td><?= $b->kategori; ?></td>
	<td><?= $b->date; ?></td>
	<td><?= $b->pemasukan - $b->pengeluaran; ; ?></td>
</tr><?php } ?> 
</table>
		  </div>
		
	</div>  
	<br>
				<?php foreach($tb_kegiatan as $a){
					$nama     = $this->db->query("SELECT * FROM tb_kegiatan ORDER BY id_kegiatan DESC LIMIT 1")->row_array();
					$narasumber 
											?>								
<div class="col-lg-4 col-md-2 col-sm-10 sidebar">

	<!--  Banner -->
	<h5 class="page-title mt-3 mb-3">RIS INFAQ MASJID AN-NUUR</h5>
<img src="<?= base_url()?>assets/img/ris.jpeg" class="img-fluid mb-2 w-100" alt="MASJID AN-NUUR">
		
	<!-- Sambutan Kepala Sekolah  -->
	<h5 class="text-center page-title mt-3 mb-3">Kegiatan Terbaru</h5>
			<div class="card rounded-0 border border-secondary mb-2">
			<img src="<?= base_url('assets/kegiatan/') . $a->foto ?>" class="card-img-top rounded-0">
			<div class="card-body">
				<h5 class="card-title text-center text-uppercase"><?= $a->narasumber; ?></h5>
				<p class="card-text text-center mt-0 text-muted">- <?= $a->judul_kegiatan; ?> -</p>
				<p class="card-text text-justify"><?php echo substr($a->keterangan, 0,100);?>.......</p>
			</div>
			<div class="card-footer text-center">
				<small class="text-muted text-uppercase"><a href="<?= base_url('depan/baca_kegiatan/') . $a->seo_title; ?>">Selengkapnya......</a></small>
			</div>
		</div>
					<?php } ?> 
				</div>

				</div>
	<!-- Form Comment -->
	 <h5 class="page-title mt-13 mb-12"> Galeri</h5>
	 
	    <!-- Portfolio Start -->
		<div class="container-fluid bg-portfolio py-2">
        <div class="container py-5">
            <div class="row m-0 portfolio-container">
			<?php foreach($kegiatan as $b){     
				    	$nama     = $this->db->query("SELECT * FROM tb_kegiatan ORDER BY id_kegiatan DESC LIMIT 6")->row_array();
				
					?>	
                <div class="col-lg-2 col-md-2 col-sm-10 p-0 portfolio-item">
                    <div class="position-relative overflow-hidden">
                        <div class="portfolio-img">
						<img class="img-fluid w-100" src="<?= base_url('assets/kegiatan/') . $b->foto ?>" alt="" width="30px">
                        </div>
                        <div class="portfolio-text bg-primary">
                            <p class="font-weight-bold mb-4"><?= $b->judul_kegiatan; ?> </p>
                            <div class="d-flex align-items-center justify-content-center">
           
                                <a class="btn btn-sm btn-secondary m-1" href="<?= base_url('depan/baca_kegiatan/') . $a->seo_title; ?>" >
								<i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><?php } ?>
	
        </div>
        </div>
    </div> </div><br>
    <!-- Portfolio End -->

		<div class="col-lg-9">
      <div class="row">
         	<?php foreach($vidio as $b){     
				    	$nama     = $this->db->query("SELECT * FROM vidio ORDER BY id_vidio DESC LIMIT 5")->row_array();
					$link;
					?>				    						
						   
                          <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
		  <iframe class="vidloop" src="https://www.youtube.com/embed/<?=$b['link'];?> " frameborder="0" allowfullscreen></iframe>
              <h4 class="card-title mb-0">
			  <h4><a href="<?= base_url('vidio/baca/'). $b['post_titel']; ?>"><?=$b['judul'];?></a></h4>
              </h4>
			  <i class="far fa-clock"></i> <?=$b['tgl_post'];?> 
   
              <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
            </div>
     
		</div>   <?php } ?>
        </div>
      </div>
      <!-- /.row -->
	 
</div></div>

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->


  