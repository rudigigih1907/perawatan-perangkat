<?= $this->extend('templates/index'); ?>

<?= $this->Section('title') ?>
<title><?= $title ?></title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jenis Perawatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jenis Perawatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-2">Tabel Jenis Perawatan</h3>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#modal-xl-tambahdata" class="btn btn-primary btn-sm">Tambah Data</button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Perawatan</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($jPerawatans as $jPerawatan) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $jPerawatan->jenis_perawatan ?></td>
                            <td>
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-laptop"></i></button>
                                <div class="dropdown-menu">
                                    <a href="" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="" class="dropdown-item"><i class="fas fa-trash"></i> Hapus</a>
                                </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-xl-tambahdata">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>