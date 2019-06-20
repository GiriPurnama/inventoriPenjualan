<div class="row">
    <div class="col-lg">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ?>

        <?= $this->session->flashdata('message'); ?>

        <!-- Cek user yang bisa melakukan proses tambah data -->
        <?php if ($user['role_id'] == 2) { ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahModal">
                Tambah Data
            </a>
        <?php } ?>
        <!-- akhir dari proses pengecekan -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Tanggal Barang</th>
                                <th scope="col">Harga Barang</th>
                                <!-- Cek untuk menampilkan tabel header "action" -->
                                <?php if ($user['role_id'] == 2) { ?>
                                    <th scope="col">Action</th>
                                <?php } ?>
                                <!-- akhir dari proses pengecekan -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang_keluar as $bm) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $bm->kode_barang; ?></td>
                                    <td><?= $bm->nama_barang; ?></td>
                                    <td><?= $bm->jumlah_barang; ?></td>
                                    <td><?= $bm->tanggal_keluar; ?></td>
                                    <td><?= $bm->harga_barang; ?></td>
                                    <!-- Cek user yang bisa melakukan proses ubah dan hapus data -->
                                    <?php if ($user['role_id'] == 2) { ?>
                                        <td>
                                            <a data-toggle="modal" data-target="#EditModal<?= $bm->kode_barang; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('t_barangkeluar/hapus/' . $bm->kode_barang); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $bm->nama_barang; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    <?php } ?>
                                    <!-- akhir dari proses pengecekan -->
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("t_barangkeluar/add"); ?>" method="post">
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Stok</label>
                                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Stok">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" placeholder="Tanggal Keluar">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">Harga Barang</label>
                                <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Harga Barang">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Data -->
<?php $no = 0;
foreach ($barang_keluar as $bm) : $no++; ?>
    <div class="modal fade" id="EditModal<?= $bm->kode_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url("t_barangkeluar/edit"); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" readonly value="<?= $bm->kode_barang; ?>" name="kode_barang" class="form-control">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Barang</label>
                                <input disabled type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= $bm->kode_barang; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= $bm->nama_barang; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Stok</label>
                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Stok" value="<?= $bm->jumlah_barang; ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" placeholder="Tanggal Masuk" value="<?= $bm->tanggal_keluar; ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">Harga Barang</label>
                                <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="Harga Barang" value="<?= $bm->harga_barang; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>