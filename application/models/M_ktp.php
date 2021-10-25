<?php
class M_ktp extends CI_Model
{
    public function jmlBarangMasuk()
    {
        return $this->db->get('tb_barang_masuk')->num_rows();
    }

    public function getDataKtpAll()
    {
        return $this->db->get('data_penduduk')->result_array();
    }

    public function getKtpBySid($sid)
    {
        $this->db->where('id', $sid);
        return $this->db->get('data_penduduk')->row_array();
    }
}
