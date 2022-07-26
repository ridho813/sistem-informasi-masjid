<!-- /CONTENT -->
</div>
		</div>
	</section>
	<footer>
		<div class="container-fluid primary-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-12 text-md-left mb-2 mt-2">
						<h6 class="page-title">Hubungi Kami</h6>
						<p>MASJID AN-NUUR &sdot; Where Tomorrow's Leaders Come Together</p>
						<dl class="row">
							<dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-map-marker"></span> Alamat</dt>
							<dd class="col-lg-8 col-md-8 col-sm-12">Jl. Garuda, Blotan, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584</dd>
							<dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-phone"></span> Telepon</dt>
							<dd class="col-lg-8 col-md-8 col-sm-12">0232123456</dd>
							<dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-envelope"></span> Email</dt>
							<dd class="col-lg-8 col-md-8 col-sm-12">masjidannuursono@gmail.com</dd>
						</dl>
					</div>
					<div class="col-md-4 col-xs-12 text-md-left mb-2 mt-2">
						<h6 class="page-title">Tags</h6>
						<div class="tag-content-block tag">
																								<a href="<?= base_url('baca'); ?>">Berita</a>
																	<a href="<?= base_url('baca'); ?>">Pengumuman</a>
																	<a href="http://192.168.64.2/sekolah/tag/sekilas-info">Sekilas Info</a>
																					</div>
					</div>
					<div class="col-md- col-xs-19 text-md-left mb-2 mt-2">
						<h6 class="page-title">Lokasi Kami</h6>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.471643674623!2d110.4235983!3d-7.7396918999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5962fcf2a0a3%3A0x4c6e072d30768e1f!2sMasjid%20AN%20NUUR!5e0!3m2!1sen!2sid!4v1658517862653!5m2!1sen!2sid" width="340" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						<ul class="list-unstyled">
																																		</ul>
					</div>
				</div>
			</div>
		</div>




<div class="container-fluid secondary-footer">
			<div class="container copyright">
				<div class="row pt-1 pb-1">
					<div class="col-md-6 col-xs-12 text-md-left text-center">
						Copyright &copy; 2022 - 2024<a href="http://192.168.64.2/sekolah/"> MASJID AN-NUR</a> All rights reserved.					</div>
				
				</div>
			</div>
		</div>
	</footer>
	<div id="search_form">
		<form action="http://192.168.64.2/sekolah/hasil-pencarian" method="POST">
			<input type="search_form" name="keyword" autocomplete="off" placeholder="Masukan kata kunci pencarian" />
			<button type="submit" class="btn btn-lg btn btn-outline-light rounded-0"><i class="fa fa-search"></i> CARI</button>
		</form>
	</div>


	<!-- jquery latest version -->
	

		<script src="<?= base_url()?>assets/js/frontend.min.js"></script>
		<script src="<?= base_url()?>assets/js/main.js"></script>
    <!-- JavaScript Libraries -->
	<link href="<?= base_url()?>assets/plugins/bootstrap-3/bootstrap.js" rel="stylesheet" type="text/css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url()?>assets/lib/easing/easing.min.js"></script>
  

    <script src="<?= base_url()?>assets/lib/easing/easing.min.js"></script>
    <script src="<?= base_url()?>assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url()?>assets/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url()?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url()?>assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url()?>assets/lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="<?= base_url()?>assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= base_url()?>assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url()?>assets/js/main.js"></script>
	
	<a href="javascript:" id="return-to-top" class="rounded-lg"><i class="fa fa-angle-double-up"></i></a>

	<!--- waktu sholat, jika menggati lokasi ganti -6.1744,110,3608 GMT nya 7.00 -->
    <script type="text/javascript">
         
        var date = new Date(); // today
        var times = prayTimes.getTimes(date, [-7.7955798, 110.3694896], 7.00);
        var list = ['Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
 
        var html = '<table id="timetable"><tr>';
 
            for(var i in list)  {
            //html += '<tr><td>'+ list[i]+ '</td>';
            html += '<td><span>'+ list[i]+"</span><br/>"+times[list[i].toLowerCase()]+ '</td>';
        }
        html += '</tr></table>';
        document.getElementById('table').innerHTML = html;
         
    </script>
    </div>


</script>
</body>
</html>
