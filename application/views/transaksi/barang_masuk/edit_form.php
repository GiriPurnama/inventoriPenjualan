<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- Card  -->
<div class="card mb-3">
    <div class="card-header">

        <a href="<?php echo site_url('transaksi') ?>"><i class="fas fa-arrow-left"></i>
            Back</a>
    </div>
    <div class="card-body">

        <form action="<?php base_url('transaksi/edit') ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $barang_masuk->kode_barang ?>" />

            <div class="form-group">
                <label for="name">Name*</label>
                <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Product name" value="<?php echo $barang_masuk->nama_barang ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('name') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" value="<?php echo $barang_masuk->jumlah_barang ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('price') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Photo</label>
                <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" value="<?php echo $barang_masuk->jumlah_barang ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('image') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="price">TANGGAL</label>
                <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="date" name="price" min="0" placeholder="Product price" value="<?php echo $barang_masuk->tanggal_masuk ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('price') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" value="<?php echo $barang_masuk->harga_barang ?>" />
                <div class="invalid-feedback">
                    <?php echo form_error('price') ?>
                </div>
            </div>

            <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>

    </div>

    <div class="card-footer small text-muted">
        * required fields
    </div>