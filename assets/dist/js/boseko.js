
$(document).ready(function () {
    const URL = 'http://localhost:8080/KTP/'
    dataKTP()
    function dataKTP() {
        $.ajax({
            url: URL + 'DataKtp/getDataKtp',
            async: false,
            type: 'post',
            dataType: 'json',
            success: function (response) {
                // console.log(response.data)
                let html = '';
                let i;
                let no = 0;
                for (i = 0; i < response.data.length; i++) {
                    no++;
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + response.data[i].nama + '</td>' +
                        '<td>' + response.data[i].tempat_lahir + ', ' + response.data[i].tgl_lahir + '</td>' +
                        '<td>' + response.data[i].jenis_kelamin + '</td>' +
                        '<td>' + response.data[i].alamat + '</td>' +
                        '<td>' + response.data[i].agama + '</td>' +
                        '<td>' + response.data[i].status + '</td>' +
                        '<td>' + response.data[i].golongan_darah + '</td>' +
                        '<td class="text-center">' + '<a href="#" class="tombol-ktp-edit" data-sid="' + response.data[i].id + '" data-toggle="modal" data-target="#modal-ktp-edit"><button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>' + '<a href="' + URL + 'DataKtp/detail/' + response.data[i].id + '"><button type="button" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></button></i></a>' + '<a href="' + URL + 'DataKtp/Hapus/' + response.data[i].id + '" class="tombol-hapus"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button></a></td>' +
                        '</tr>';
                }
                $('#show-data-penduduk').html(html);
            }
        })
    }

    $('.tombol-ktp-edit').on('click', function () {
        sid = $(this).data('sid')
        // console.log(sid)
        $.ajax({
            url: URL + 'DataKtp/getDataKtpkBySid/' + sid,
            async: false,
            type: 'post',
            dataType: 'json',
            success: function (response) {
                console.log(response.data.gambar)
                $('#idpenduduk').val(response.data.id)
                $('#nama_penduduk').val(response.data.nama)
                $('#t_lahir').val(response.data.tempat_lahir)
                $('#tgl_lahir').val(response.data.tgl_lahir)
                $('#alamat').val(response.data.alamat)
                $('#jk').val(response.data.jenis_kelamin)
                $('#agama').val(response.data.agama)
                $('#status').val(response.data.status)
                $('#golongan').val(response.data.golongan_darah)
                $('#gm').val(response.data.gambar)
            }
        })
    })

    // barangKelaur()
    // function barangKelaur() {
    //     $.ajax({
    //         url: URL + 'BarangKeluar/getDataBarangKeluar',
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response.data)
    //             let html = '';
    //             let i;
    //             let no = 0;
    //             let statusbayar;
    //             for (i = 0; i < response.data.length; i++) {
    //                 if (response.data[i].status_bayar == 1) { statusbayar = '<button class="badge badge-pill badge-success">Lunas</button>' } else { statusbayar = '<button class="badge badge-pill badge-danger">Belum</button>' }
    //                 no++;
    //                 html += '<tr>' +
    //                     '<td class="text-center">' + no + '</td>' +
    //                     '<td>' + response.data[i].no_invoice + '</td>' +
    //                     '<td>' + response.data[i].no_sj + '</td>' +
    //                     '<td>' + response.data[i].nama_barang + '</td>' +
    //                     '<td>' + formatNumber(response.data[i].nominal) + '</td>' +
    //                     '<td>' + response.data[i].tgl_jatuh_tempo + '</td>' +
    //                     '<td>' + response.data[i].nama_customer + '</td>' +
    //                     '<td>' + response.data[i].no_po + '</td>' +
    //                     '<td class="text-center">' + statusbayar + '</td>' +
    //                     '<td class="text-center">' + '<a href="#" class="tombol-barangkeluar-edit" data-sid="' + response.data[i].barang_keluar_sid + '" data-toggle="modal" data-target="#modal-barangkeluar-edit"><button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>' + '<a href="' + URL + 'BarangKeluar/detail/' + response.data[i].barang_keluar_sid + '"><button type="button" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></button></i></a>' + '<a href="' + URL + 'BarangKeluar/Hapus/' + response.data[i].barang_keluar_sid + '" class="tombol-hapus"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button></a></td>' +
    //                     '</tr>';
    //             }
    //             $('#show-data-barangkeluar').html(html);
    //         }
    //     })
    // }

    // $('.tombol-barangkeluar-edit').on('click', function () {
    //     sid = $(this).data('sid')
    //     // console.log(sid)
    //     $.ajax({
    //         url: URL + 'BarangKeluar/getDataBarangKeluarBySid/' + sid,
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response.data)
    //             $('#sidBarangKeluar').val(response.data.barang_keluar_sid)
    //             $('#nama_barang').val(response.data.nama_barang)
    //             $('#invoice').val(response.data.no_invoice)
    //             $('#sj').val(response.data.no_sj)
    //             $('#nominal').val(formatNumber(response.data.nominal))
    //             $('#customer').val(response.data.customer_sid)
    //             $('#no_po').val(response.data.no_po)
    //             $('#tempo').val(response.data.tgl_jatuh_tempo)
    //             $('#status').val(response.data.status_bayar)
    //             $('#customer').html(response.data.nama_customer)
    //         }
    //     })
    // })

    // Customer()
    // function Customer() {
    //     $.ajax({
    //         url: URL + 'Customer/getDataCustomerAll',
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response.data)
    //             let html = ''
    //             let i;
    //             let no = 0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 no++;
    //                 html += '<tr>' +
    //                     '<td class="text-center">' + no + '</td>' +
    //                     '<td>' + response.data[i].nama_customer + '</td>' +
    //                     '<td>' + response.data[i].alamat + '</td>' +
    //                     '<td>' + response.data[i].no_hp + '</td>' +
    //                     '<td class="text-center">' + '<a href="#" class="tombol-customer-edit" data-sid="' + response.data[i].customer_sid + '" data-toggle="modal" data-target="#modal-customer-edit"><button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>' + '<a href="' + URL + 'Customer/detail/' + response.data[i].customer_sid + '"><button type="button" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></button></i></a>' + '<a href="' + URL + 'Customer/Hapus/' + response.data[i].customer_sid + '" class="tombol-hapus"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button></a></td>' +
    //                     '</tr>';
    //                 $('#show-data-customer').html(html)
    //             }
    //         }
    //     })
    // }

    // $('.tombol-customer-edit').on('click', function () {
    //     sid = $(this).data('sid')
    //     $.ajax({
    //         url: URL + 'Customer/getDataCustomerBySid/' + sid,
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             console.log(response.data)
    //             $('#sid').val(response.data.customer_sid)
    //             $('#nama_customer').val(response.data.nama_customer)
    //             $('#alamat').val(response.data.alamat)
    //             $('#telpon').val(response.data.no_hp)
    //         }
    //     })
    // })

    // Supplier()
    // function Supplier() {
    //     $.ajax({
    //         url: URL + 'Supplier/getDataSupplierAll',
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response.data)
    //             let html = ''
    //             let i;
    //             let no = 0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 no++;
    //                 html += '<tr>' +
    //                     '<td class="text-center">' + no + '</td>' +
    //                     '<td>' + response.data[i].nama_suplier + '</td>' +
    //                     '<td>' + response.data[i].alamat_suplier + '</td>' +
    //                     '<td>' + response.data[i].no_hp + '</td>' +
    //                     '<td class="text-center">' + '<a href="#" class="tombol-supplier-edit" data-sid="' + response.data[i].suplier_sid + '" data-toggle="modal" data-target="#modal-supplier-edit"><button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>' + '<a href="' + URL + 'Supplier/Detail/' + response.data[i].suplier_sid + '"><button type="button" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></button></i></a>' + '<a href="' + URL + 'Supplier/Hapus/' + response.data[i].suplier_sid + '" class="tombol-hapus"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button></a></td>' +
    //                     '</tr>';
    //                 $('#show-data-supplier').html(html)
    //             }
    //         }
    //     })
    // }

    // $('.tombol-supplier-edit').on('click', function () {
    //     sid = $(this).data('sid')
    //     console.log(sid)
    //     $.ajax({
    //         url: URL + 'Supplier/getDataSupplierBySid/' + sid,
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             console.log(response.data)
    //             $('#sid').val(response.data.suplier_sid)
    //             $('#nama_supplier').val(response.data.nama_suplier)
    //             $('#alamat').val(response.data.alamat_suplier)
    //             $('#telpon').val(response.data.no_hp)
    //         }
    //     })
    // })

    // Pemasukan()
    // function Pemasukan() {
    //     $.ajax({
    //         url: URL + 'Laporan/getDataPemasukan',
    //         async: false,
    //         type: 'post',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response.data)
    //             let html = ''
    //             let i;
    //             let no = 0;
    //             for (i = 0; i < response.data.length; i++) {
    //                 no++;
    //                 html += '<tr>' +
    //                     '<td class="text-center">' + no + '</td>' +
    //                     '<td>' + response.data[i].no_invoice + '</td>' +
    //                     '<td>' + response.data[i].nama_customer + '</td>' +
    //                     '<td>' + response.data[i].nama_barang + '</td>' +
    //                     '<td>' + response.data[i].jml_barang + '</td>' +
    //                     '<td>' + response.data[i].tgl_pemasukan + '</td>' +
    //                     '<td>' + response.data[i].nominal + '</td>' +
    //                     '</tr>';
    //                 $('#show-data-pemasukan').html(html)
    //             }
    //         }
    //     })
    // }

    dataflash = $('.flash-data').data('flash')
    if (dataflash) {
        Swal.fire(
            'Data',
            'Berhasil ' + dataflash,
            'success'
        )
    }

    $('.tombol-hapus').on('click', function (e) {
        //matikan aksi default (href tidak akan berjalan)
        e.preventDefault()
        //ambil link di href
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Data akan dihapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })

    //format number
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
})
