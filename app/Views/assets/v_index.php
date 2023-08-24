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
                    <h1 class="m-0">Assets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Assets</li>
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
                <h3 class="card-title mt-2">Tabel Daftar Assets</h3>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#modal-xl-tambahdata" class="btn btn-primary btn-sm">Tambah Data</button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Asset</th>
                        <th>Nama Asset</th>
                        <th>Lokasi Asset</th>
                        <th>P.I.C</th>
                        <th>Tanggal Delegasi</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($assets as $asset) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $asset->kode_asset ?></td>
                            <td><?= $asset->nama_asset ?></td>
                            <td><?= $asset->lokasi_asset ?></td>
                            <td><?= $asset->pic ?></td>
                            <td><?= $asset->tanggal_delegasi ?></td>
                            <td>
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-laptop"></i></button>
                                <div class="dropdown-menu">
                                    <a href="" data-toggle="modal" data-target="#modal-xl-editdataasset<?= $asset->asset_id?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
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
      <div class="col">
            <form action="<?= base_url('assets') ?>" method="POST" enctype='multipart/form-data' autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group col-md">
                    <label for="kode_asset">Kode Asset</label>
                    <input type="text" class="form-control" id="kode_asset" name="kode_asset" autofocus>
                    <label for="nama_asset">Nama Asset</label>
                    <input type="text" class="form-control" id="nama_asset" name="nama_asset" autofocus>
                    <label for="lokasi_asset">Lokasi Asset</label>
                    <input type="text" class="form-control" id="lokasi_asset" name="lokasi_asset" autofocus>
                    <label for="pic">P.I.C</label>
                    <input type="text" class="form-control" id="pic" name="pic" autofocus>
                    <label for="tanggal_delegasi">Tanggal Delegasi</label>
                    <input type="date" class="form-control" id="tanggal_delegasi" name="tanggal_delegasi" autofocus>
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

<?php foreach ($assets as $asset) : ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-xl-editdataasset<?= $asset->asset_id?>">
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
            <form action="<?= base_url('assets/update/' . $asset->asset_id) ?>" method="POST" enctype='multipart/form-data' autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group col-md">
                    <input type="hidden" value="<?= $asset->asset_id ?>" id="asset_id" name="asset_id" class="form-control" autofocus>
                    <label for="nama_asset">Nama Asset</label>
                    <input type="text" value="<?= $asset->nama_asset ?>" id="nama_asset" name="nama_asset" class="form-control" autofocus>
                    <label for="lokasi_asset">Lokasi Asset</label>
                    <input type="text" value="<?= $asset->lokasi_asset ?>" id="lokasi_asset" name="lokasi_asset" class="form-control" autofocus>
                    <label for="pic">P.I.C</label>
                    <input type="text" value="<?= $asset->pic ?>" id="pic" name="pic" class="form-control" autofocus>
                    <label for="tanggal_delegasi">Tanggal Delegasi</label>
                    <input type="date" value="<?= $asset->tanggal_delegasi ?>" id="tanggal_delegasi" name="tanggal_delegasi" class="form-control" autofocus>
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2" autofocus><?= $asset->keterangan ?></textarea>
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