<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Masjid An-Nur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/css2//images/icon/favicon.ico">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/typography.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/default-css.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/styles.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css2/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url()?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>
	    <!-- amchart css -->
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- others css -->
   
	<link href="<?= base_url()?>assets/plugins/bootstrap-4/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- modernizr css -->
    <script src="assets/css2/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
	
</style>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li class="active"><a href="<?= base_url('back_end/Home'); ?>"><span>Home</span></a></li>
							<li>
                                <a href="<?php echo('../') ?>"><i class="ti-dashboard"></i><span>Lihat Situs</span></a>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Situs
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="<?= base_url('back_end/artikel'); ?>">Kelola Artikel</a></li>
									<li><a href="<?= base_url('back_end/kategori'); ?>">Kelola Kategori Artikel</a></li>
									<li><a href="<?= base_url('back_end/kegiatan'); ?>">Kelola jenis Kegiatan</a></li>
									<li><a href="<?= base_url('back_end/tausiyah'); ?>">Kegiatan</a></li>
									<li><a href="<?= base_url('back_end/vidio'); ?>">  Data Vidio</a></li>

								
                                </ul>
                            </li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Sumbangan Dana
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="<?= base_url('back_end/infaq'); ?>">Kelola Infaq</a></li>
									<li><a href="<?= base_url('back_end/kategori_kas'); ?>">Kelola Kategori Kas</a></li>

                                </ul>
                            </li> 
							
							<li><a href="<?= base_url('back_end/profil'); ?>"><i class="ti-user"></i><span>Kelola DKM</span></a></li>
							<li>
                                <a href="<?php echo('../home') ?>"><span>Logout</span></a>
                                
                            </li>
							<li><a href="user.php"><span> </span></a></li>
                           
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
			
			