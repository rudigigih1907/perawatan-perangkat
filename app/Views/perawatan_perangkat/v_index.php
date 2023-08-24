<?= $this->extend('templates/index'); ?>

<?= $this->Section('title') ?>
<title><?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->Section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perawatan Perangkat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perawatan Perangkat</li>
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
                <h3 class="card-title mt-2">Tabel Perawatan Perangkat</h3>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#modal-xl-tambahdata" class="btn btn-primary btn-sm">Tambah Data</button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Waktu Pengecekan</th>
                        <th>ID Asset</th>
                        <th>Perawatan</th>
                        <th>Kondisi</th>
                        <th>Pelaksana</th>
                        <th>Mengetahui</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($perawatans as $perawatan) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $perawatan->waktu_pengecekan ?></td>
                            <td><?= $perawatan->id_asset ?></td>
                            <td><?= $perawatan->perawatan ?></td>
                            <td><?= $perawatan->kondisi ?></td>
                            <td><?= $perawatan->pelaksana ?></td>
                            <td><?= $perawatan->mengetahui ?></td>
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
<?= $this->endSection() ?>