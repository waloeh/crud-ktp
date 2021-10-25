<?php 
function hari($tanggal = '') {
    $hari = date('l', strtotime($tanggal));
    switch ($hari) {
        case 'Sunday':
            $hari = 'Minggu';
            break;
        case 'Monday':
            $hari = 'Senin';
            break;
        case 'Tuesday':
            $hari = 'Selasa';
            break;
        case 'Wednesday':
            $hari = 'Rabu';
            break;
        case 'Thursday':
            $hari = 'Kamis';
            break;
        case 'Friday':
            $hari = 'Jum`at';
            break;
        case 'Saturday':
            $hari = 'Sabtu';
            break;
        default:
            'Tidak Ada';
        break;
    }
    return $hari;
}

function tanggal($tanggal = '2021-08-01') {
    $tgl = explode("-", $tanggal);
    $tgl = array($tgl[2], $tgl[1], $tgl[0]);
    $tgl = implode('-', $tgl);
    return $tgl;
}