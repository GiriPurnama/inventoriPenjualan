<div class="row">
    <div class="col-lg">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ?>

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahModal">
            Tambah Data
        </a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Penjualan</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($penjualan as $bm) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $bm->kode_penjualan; ?></td>
                        <td><?= $bm->kode_barang; ?></td>
                        <td><?= $bm->nama_barang; ?></td>
                        <td><?= $bm->jumlah_barang; ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#EditModal<?= $bm->kode_penjualan; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url('t_penjualan/hapus/' . $bm->kode_penjualan); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $bm->nama_barang; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
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
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("t_penjualan/add"); ?>" method="post">
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Penjualan</label>
                                <input type="text" class="form-control" id="kode_penjualan" name="kode_penjualan" placeholder="Kode Penjualan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Jumlah Barang</label>
                                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang">
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
foreach ($penjualan as $bm) : $no++; ?>
    <div class="modal fade" id="EditModal<?= $bm->kode_penjualan; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url("t_penjualan/edit"); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" readonly value="<?= $bm->kode_penjualan; ?>" name="kode_penjualan" class="form-control">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Penjualan</label>
                                <input disabled type="text" class="form-control" id="kode_penjualan" name="kode_penjualan" placeholder="Kode Barang" value="<?= $bm->kode_penjualan; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Barang</label>
                                <input disabled type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= $bm->kode_barang; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= $bm->nama_barang; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Jumlah Barang</label>
                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" value="<?= $bm->jumlah_barang; ?>">
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