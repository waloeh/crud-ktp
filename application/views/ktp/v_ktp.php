<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Penduduk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline ml-2 mr-2">
        <div class="card-header">
            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-ktp"><i class="fa fa-plus mr-2"></i>Tambah</a>
            <button onclick="window.location.reload()" class="btn btn-file text-gray float-right" type="button" data-dismis="modal">
                <i class="fa fa-sync-alt"></i>
            </button>
        </div>
        <div class="flash-data" data-flash="<?php echo $this->session->flashdata('flash') ?>"></div>
        <div class="card-body" style="min-height: 480px !important;">
            <table id="data-penduduk" class="table table-bordered table-sm table-hover" style="width: 100%; margin-top: 0 !important;">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Golongan Darah</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="show-data-penduduk"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-ktp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Tambah Data Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url('DataKtp/tambah') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Penduduk</label>
                        <input type="text" name="nama_penduduk" class="form-control" required>
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sj">Tempat Lahir</label>
                        <input type="text" name="t_lahir" class="form-control" required>
                        <?= form_error('sj', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Tangal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                        <?= form_error('nominal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        <?= form_error('nominal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Jenis Kelamin</label>
                        <select type="text" name="jk" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('supplier', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tempo">Agama</label>
                        <input type="text" name="agama" class="form-control" required>
                        <?= form_error('tempo', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select type="text" name="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Golongan Darah</label>
                        <select type="text" name="golongan" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="poto">Poto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                                <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-ktp-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Edit Data Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url('DataKtp/edit') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Penduduk</label>
                        <input type="hidden" name="gambar" id="gm">
                        <input type="hidden" name="idpenduduk" id="idpenduduk">
                        <input type="text" name="nama_penduduk" id="nama_penduduk" class="form-control" required>
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sj">Tempat Lahir</label>
                        <input type="text" name="t_lahir" id="t_lahir" class="form-control" required>
                        <?= form_error('sj', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Tangal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                        <?= form_error('nominal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                        <?= form_error('nominal', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Jenis Kelamin</label>
                        <select type="text" name="jk" id="jk" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('supplier', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="tempo">Agama</label>
                        <input type="text" name="agama" id="agama" class="form-control" required>
                        <?= form_error('tempo', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select type="text" name="status" id="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Golongan Darah</label>
                        <select type="text" name="golongan" id="golongan" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="poto">Poto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="" name="gambar" id="gambar">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                                <?= form_error('gambar', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>