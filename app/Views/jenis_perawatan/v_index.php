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
      <?php if(session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">x</button>
          <b>Success !</b>
          <?= session()->getFlashdata('success') ?>
        </div>
      </div>
      <?php endif ?>
      <?php if(session()->getFlashdata('validation')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <ul>
              <?php foreach(session()->getFlashdata('validation') as $error) : ?>
                <li><?= $error ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      <?php endif ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-2">Tabel Jenis Perawatan</h3>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#modal-xl-tambahdataJperawatan" class="btn btn-primary btn-sm">Tambah Data</button>
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
                                    <a href="" data-toggle="modal" data-target="#modal-xl-editdatajperawatan<?= $jPerawatan->id_perawatan?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
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
<div class="modal fade" id="modal-xl-tambahdataJperawatan">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
            <form action="<?= base_url('jenis-perawatan') ?>" method="POST" enctype='multipart/form-data' autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group col-md">
                    <label for="jenis_perawatan">Jenis Perawatan</label>
                    <input type="text" class="form-control" id="jenis_perawatan" name="jenis_perawatan" autofocus>
                </div>
                <div class="col-md p-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php foreach ($jPerawatans as $jPerawatan) : ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-xl-editdatajperawatan<?= $jPerawatan->id_perawatan?>">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
            <form action="<?= base_url('jenis-perawatan/update/' . $jPerawatan->id_perawatan) ?>" method="POST" enctype='multipart/form-data' autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group col-md">
                    <label for="jenis_perawatan">Jenis Perawatan</label>
                    <input type="hidden" value="<?= $jPerawatan->id_perawatan ?>" id="id_perawatan1" name="id_perawatan" class="form-control" autofocus>
                    <input type="text" value="<?= $jPerawatan->jenis_perawatan ?>" id="jenis_perawatan1" name="jenis_perawatan" class="form-control" autofocus>
                </div>
                <div class="col-md p-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<?= $this->endSection(); ?>