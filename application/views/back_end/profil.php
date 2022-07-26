<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class=""></i> <?= $judul; ?></h1>
    </div>
    <div class="section-body">
	      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
	      	<button type="button" class="btn btn-primary mb-2 formModalTambahArtikel" data-toggle="modal" data-target="#formModalKategori"><i class="fas fa-plus-circle"></i>
            Tambah Profil DKM
          </button>
          <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
          <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h4>Dewan Pengurus Masjid</h4>
              </div>
              <!-- Kolom Pencarian -->
              <div class="row">
                <div class="col-md-4 ml-4">
                  <form action="<?= base_url('back_end/profil'); ?>" method="post">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Masukan Keyword..." name="keyword" autocomplete="off" autofocus="on">
                      <div class="input-group-append">
                        <input type="submit" name="submit" class="btn btn-primary" value="Cari">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Kolom Pencarian -->
              <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <?= $this->session->flashdata('pesan'); ?>
                </div>
              </div>
                <h6 class="text-muted">Total <?= $total_rows; ?> Mobil</h6>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
					  <th>Foto</th>
                      <th>Nama</th>
					  <th>Alamat</th>
					  <th>Tempat Lahir</th>
					  <th>Tanggal Lahir</th>
					  <th>Aktifitas</th>
					  <th>Jabatan</th>
					  <th>Pendidikan</th>
					  <th>Ig</th>
					  <th>Fb</th>
                      <th>Aksi</th>
                    </tr>
                    <?php if(empty($profil)) : ?>
                      <tr>
                        <td colspan="7">
                          <div class="alert alert-danger text-center" role="alert">Data Kosong.</div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach($profil as $k) : ?>
										<tr>
											<td><?= ++$start; ?></td>
											<td>
                        <img src="<?= base_url('assets/profil/') . $k['foto']; ?>" width="80">           
                      </td>
											<td><?= $k['nama']; ?></td>
											<td><?= $k['alamat']; ?></td>
											<td><?= $k['tempat_lhr']; ?></td>
											<td><?= $k['tgl_lhr']; ?></td>
											<td><?= $k['aktifitas']; ?></td>
											<td><?= $k['jabatan']; ?></td>
											<td><?= $k['pendidikan']; ?></td>
											<td><a href="<?= $k['ig']; ?>"></a></td>
											<td><?= $k['fb']; ?></td>
                      <td>
                        <button type="button" class="btn btn-info formModalUbahArtikel" data-toggle="modal" data-target="#formModalKategori" data-id="<?= $k['id_profil']; ?>"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('back_end/profil/hapus/') . $k['id_profil']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
										</tr>
                    <?php endforeach; ?>
                  </table>
                </div>
                <div class="card-footer text-right">
                  <?php echo $this->pagination->create_links(); ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
	</section>

</div>


<!-- Modal -->
<div class="modal fade" id="formModalKategori" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="" enctype="multipart/form-data" method="post">
          
          <div class="form-group">
            <label for="kategori">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" onkeyup="createTextSlug()">
            <small class="muted text-danger"><?= form_error('kategori'); ?></small>
          </div>
					<div class="form-group">
            <label for="kategori">Seo Title</label>
            <input type="text" name="seo_title" id="slug" class="form-control">
            <small class="muted text-danger"><?= form_error('seo_title'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
            <small class="muted text-danger"><?= form_error('alamat'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Tempat Lahir</label>
            <input type="text" name="tempat_lhr" id="tempat_lhr" class="form-control">
            <small class="muted text-danger"><?= form_error('tempat_lhr'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Tanggal Lahir</label>
            <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control">
            <small class="muted text-danger"><?= form_error('tgl_lhr'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Aktifitas</label>
            <input type="text" name="aktifitas" id="aktifitas" class="form-control">
            <small class="muted text-danger"><?= form_error('aktifitas'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control">
            <small class="muted text-danger"><?= form_error('jabatan'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control">
            <small class="muted text-danger"><?= form_error('pendidikan'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Motto</label>
            <input type="text" name="motto" id="motto" class="form-control">
            <small class="muted text-danger"><?= form_error('motto'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Fb</label>
            <input type="text" name="fb" id="fb" class="form-control">
            <small class="muted text-danger"><?= form_error('fb'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Ig</label>
            <input type="text" name="ig" id="ig" class="form-control">
            <small class="muted text-danger"><?= form_error('ig'); ?></small>
          </div>
		  <div class="form-group">
            <label for="kategori">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            <small class="muted text-danger"><?= form_error('foto'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    function createTextSlug()
    {
        var title = document.getElementById("nama").value;
                    document.getElementById("slug").value = generateSlug(title);
    }
    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }
</script>
