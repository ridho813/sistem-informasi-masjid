<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><i class=""></i> <?= $judul; ?></h1>
    </div>
    <div class="section-body">
	      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
	      	<button type="button" class="btn btn-primary mb-2 formModalTambahArtikel" data-toggle="modal" data-target="#formModalKategori"><i class="fas fa-plus-circle"></i>
            Tambah Kategori Jenis Kegiatan
          </button>
          <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
          <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <h4>Jenis Kegiatan</h4>
              </div>
              <!-- Kolom Pencarian -->
              <div class="row">
                <div class="col-md-4 ml-4">
                  <form action="<?= base_url('back_end/kategori_kas'); ?>" method="post">
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
                <h6 class="text-muted">Total <?= $total_rows; ?> Kategori Kas</h6>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Kategori Kas</th>
                      <th>Aksi</th>
                    </tr>
                    <?php if(empty($tb_jenis_kegiatan)) : ?>
                      <tr>
                        <td colspan="7">
                          <div class="alert alert-danger text-center" role="alert">Data Kosong.</div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach($tb_jenis_kegiatan as $k) : ?>
										<tr>
											<td><?= ++$start; ?></td>
											<td><?= $k['jenis_kegiatan']; ?></td>
                      <td>
                        <button type="button" class="btn btn-info formModalUbahArtikel" data-toggle="modal" data-target="#formModalKategori" data-id="<?= $k['id_jenis']; ?>"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('back_end/kegiatan/hapus/') . $k['id_jenis']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Kategori Jenis Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
            <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control">
            <small class="muted text-danger"><?= form_error('jenis_kegiatan'); ?></small>
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
