<div class="row">
    <div class="col-lg">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ?>

        <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddModal">
            Tambah Data
        </a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Tanggal Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($barang_masuk as $bm) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $bm['kode_barang']; ?></td>
                        <td><?= $bm['nama_barang']; ?></td>
                        <td><?= $bm['jumlah_barang']; ?></td>
                        <td><?= $bm['tanggal_masuk']; ?></td>
                        <td><?= $bm['harga_barang']; ?></td>
                        <td>
                            <a href="<?= base_url("transaksi/edit/" . $bm['kode_barang']); ?>" class="badge badge-success" data-toggle="modal" data-target="#EditModal">edit</a>
                            <a href="<?= base_url("transaksi/delete/" . $bm['kode_barang']); ?>" class="badge badge-danger">delete</a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("transaksi/add"); ?>" method="post">
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
                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Stok">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputPassword4">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">Harga Barang</label>
                                <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="Harga Barang">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("transaksi/edit"); ?>" method="post">
                <div class="modal-body">
                    <form>
                        <?php foreach ($barang_masuk_edit as $bme) : ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= $bme['kode_barang'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Stok</label>
                                    <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Stok">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputPassword4">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputCity">Harga Barang</label>
                                    <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="Harga Barang">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                <?php endforeach ?>
            </form>
        </div>
    </div>
</div>