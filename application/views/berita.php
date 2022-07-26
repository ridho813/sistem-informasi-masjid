<section class="content">
		<div class="container">
			<div class="row">
				<script type="text/javascript">
var page = 1;
var total_page = "0";
$(document).ready(function() {
	if (parseInt(total_page) == page || parseInt(total_page) == 0) {
		$('.more-comments').remove();
	}
});
function get_post_comments() {
	page++;
	var data = {
		page_number: page,
		comment_post_id: '4'
	};
	if ( page <= parseInt(total_page) ) {
		$.post( _BASE_URL + 'public/post_comments/get_post_comments', data, function( response ) {
			var res = _H.StrToObject( response );
			var rows = res.comments;
			var str = '';
			for (var z in rows) {
				var row = rows[ z ];
				str += '<div class="card rounded-0 border border-secondary mb-3 post-comments">';
				str += '<div class="card-body">';
				str += row.comment_content;
				str += '</div>';
				str += '<div class="card-footer">';
				str += '<small class="text-muted float-right">';
				str += row.created_at.substr(8, 2) + '/' + row.created_at.substr(5, 2) + '/' + row.created_at.substr(0, 4);
				str += ' ' + row.created_at.substr(11, 5);
				str += ' - ' + row.comment_author;
				str += '</small>';
				str += '</div>';
				str += '</div>';
			}
			var elementId = $(".post-comments:last");
			$( str ).insertAfter( elementId );
			if ( page == parseInt(total_page) ) $('.more-comments').remove();
		});
	}
}
</script>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
      <div class="row">
          <?php if(empty($berita)) : ?>
            <div class="col-lg-12 col-md-12 mb-5">
              <div class="alert alert-danger" role="alert">Kategori <b><?= $kateid['nama_type']; ?></b> Tidak Ditemukan.</div>
            </div>
          <?php endif; ?>
        <div class="col-lg-12 col-md-5 mb-5  mt-4">
          <div class="card">
            <div class="card-header bg-warning">
              <h2><?= $berita['judul_berita']; ?></h2>
            </div>
            <div class="card-body">
              <img src="<?= base_url('assets/berita/') . $berita['foto_berita']; ?>" class="img-fluid img-thumbnail">
              <p class="blockquote-footer mt-1">Penulis : <?= $berita['nama']; ?> | <?= date('d-m-Y', strtotime($berita['tgl_post'])); ?> | <a href="" class="badge badge-secondary pt-1 pr-1"><i class="fa fa-tag"></i> <?= $berita['nama_kategori']; ?></a></p>
            <hr>
              <?= $berita['deskripsi']; ?>
              <br><br><br><br>
          <!-- Profil -->
              <div class="card mb-4" style="max-width: 340px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img  src="<?= base_url('assets/profil/wridho.jpeg'); ?>" class="card-img" alt="Penyemangat">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= $customer['nama']; ?></h5>
                      <p class="card-text">Masjid An-nur</p>
                      <p class="card-text"><small class="text-muted">pengagum rahasia</small></p>
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

	<!--  Komentar-->
	
	<!-- Form Comment -->
					<h5 class="page-title mt-3 mb-3">Komentari Tulisan Ini</h5>
				<div class="card rounded-0 border border-secondary mb-3">
					<div class="card-body">
						<div class="form-group row mb-2">
							<label for="comment_author" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="comment_author" name="comment_author">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="comment_email" class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="comment_email" name="comment_email">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="comment_url" class="col-sm-3 control-label">URL</label>
							<div class="col-sm-9">
								<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="comment_url" name="comment_url">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="comment_content" class="col-sm-3 control-label">Komentar <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control form-control-sm rounded-0 border border-secondary" id="comment_content" name="comment_content" rows="4"></textarea>
							</div>
						</div>
											</div>
					<div class="card-footer">
						<div class="form-group row mb-0">
							<div class="offset-sm-3 col-sm-9">
								<input type="hidden" name="comment_post_id" id="comment_post_id" value="4">
								<button type="button" onclick="post_comments(); return false;" class="btn action-button rounded-0"><i class="fa fa-send"></i> Submit</button>
							</div>
						</div>
					</div>
				</div>
			
			<!-- Get Anther Posts -->
							<h5 class="page-title mt-3 mb-3">Tulisan Lainnya</h5>
									<div class="card rounded-0 border border-secondary mb-3">
						<div class="card-body p-3">
							<h5 class="card-title"><a href="http://192.168.64.2/sekolah/read/5/sample-post-2">Sample Post 2</a></h5>
							<p class="card-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco l</p>
							<div class="d-flex justify-content-between align-items-center mt-1">
								<small class="text-muted">24/06/2021 10:18 - Oleh Administrator - Dilihat 1 kali</small>
								<a href="http://192.168.64.2/sekolah/read/5/sample-post-2" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
									<div class="card rounded-0 border border-secondary mb-3">
						<div class="card-body p-3">
							<h5 class="card-title"><a href="http://192.168.64.2/sekolah/read/6/sample-post-3">Sample Post 3</a></h5>
							<p class="card-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco l</p>
							<div class="d-flex justify-content-between align-items-center mt-1">
								<small class="text-muted">24/06/2021 10:18 - Oleh Administrator - Dilihat 1 kali</small>
								<a href="http://192.168.64.2/sekolah/read/6/sample-post-3" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
									<div class="card rounded-0 border border-secondary mb-3">
						<div class="card-body p-3">
							<h5 class="card-title"><a href="http://192.168.64.2/sekolah/read/7/sample-post-4">Sample Post 4</a></h5>
							<p class="card-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco l</p>
							<div class="d-flex justify-content-between align-items-center mt-1">
								<small class="text-muted">24/06/2021 10:18 - Oleh Administrator - Dilihat 1 kali</small>
								<a href="http://192.168.64.2/sekolah/read/7/sample-post-4" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
									<div class="card rounded-0 border border-secondary mb-3">
						<div class="card-body p-3">
							<h5 class="card-title"><a href="http://192.168.64.2/sekolah/read/8/sample-post-5">Sample Post 5</a></h5>
							<p class="card-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco l</p>
							<div class="d-flex justify-content-between align-items-center mt-1">
								<small class="text-muted">24/06/2021 10:18 - Oleh Administrator - Dilihat 1 kali</small>
								<a href="http://192.168.64.2/sekolah/read/8/sample-post-5" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
							
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 sidebar">
	<!-- Sambutan Kepala Sekolah  -->
			<div class="card rounded-0 border border-secondary mb-3">
			<img src="<?= base_url()?>assets/img/infaq.jpg" class="card-img-top rounded-0">
			<div class="card-body">
			
			</div>
			<!-- <div class="card-footer text-center">
				<small class="text-muted text-uppercase"><a href="ass">Selengkapnya</a></small>
			</div> -->
		</div>
	
		
	
	<!-- Paling Dikomentari -->
	
	
	<h5 class="page-title mt-3 mb-3">Berlangganan</h5>
	<form class="card p-1 border border-secondary mt-2 mb-2 rounded-0">
		<div class="input-group">
			<input type="text" id="subscriber" onkeydown="if (event.keyCode == 13) { subscribe(); return false; }" class="form-control rounded-0 border border-secondary" placeholder="Email Address...">
			<div class="input-group-append">
				<button type="button" onclick="if (event.keyCode == 13) { subscribe(); return false; }" class="btn action-button rounded-0"><i class="fa fa-envelope"></i></button>
			</div>
		</div>
	</form>

	<!--  Banner -->
	<h5 class="page-title mt-3 mb-3">Tonton Youtube</h5>
	<iframe width="420" height="315"
src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=1">
</iframe>
			</div>
		
		</div>
<!-- /CONTENT -->
			</div>
		</div>
	</section>
		
		
		