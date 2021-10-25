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
                        <li class="breadcrumb-item active">Info Penduduk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline ml-2 mr-2" style="min-height: 480px !important;">
        <!-- Default box -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Info Data Penduduk</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div id="info-dataKtp" class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Penduduk : </th>
                                        <th><?php echo $dataKtp['nama'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir : </th>
                                        <th><?php echo $dataKtp['tempat_lahir'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir : </th>
                                        <th><?php echo $dataKtp['tgl_lahir'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat : </th>
                                        <th><?php echo $dataKtp['alamat'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin : </th>
                                        <th><?php echo $dataKtp['jenis_kelamin'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Agama : </th>
                                        <th><?php echo $dataKtp['agama'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Status Pernikahan : </th>
                                        <th><?php echo $dataKtp['status'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah : </th>
                                        <th><?php echo $dataKtp['golongan_darah'] ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Gambar</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <img src="<?php echo base_url('assets/images/poto/') . $dataKtp['gambar'] ?>" width="310px" width="400px" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('dataKtp') ?>" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
</div>
</div>