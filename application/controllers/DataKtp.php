<?php
class DataKtp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Data Penduduk';
        // $data['dataKtp'] = $this->M_ktp->getDataKtpAll();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('ktp/v_ktp', $data);
        $this->load->view('layout/footer');
    }

    public function getDataKtp()
    {
        $dataKtp = $this->M_ktp->getDataKtpAll();
        $output = array(
            'message' => 'success',
            'data' => $dataKtp
        );
        echo json_encode($output);
    }

    public function tambah()
    {
        // $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        // $this->form_validation->set_rules('invoice', 'No Invoice', 'required');
        // $this->form_validation->set_rules('sj', 'Surat Jalan', 'required');
        // $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        // $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        // $this->form_validation->set_rules('no_po', 'No. PO', 'required');
        // $this->form_validation->set_rules('tempo', 'Jatuh Tempo', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar) {
            $config['max_size'] = 2048; //2mb
            $config['upload_path'] = './assets/images/poto/';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $this->toastr->error('Gagal');
            }
        } else {
            $gambar = 'default.png';
        }

        $this->db->insert('data_penduduk', array(
            'id' => $this->uuid->sid(),
            'nama' => trim(htmlspecialchars($this->input->post('nama_penduduk'))),
            'tempat_lahir' => trim(htmlspecialchars($this->input->post('t_lahir'))),
            'tgl_lahir' => trim(htmlspecialchars($this->input->post('tgl_lahir'))),
            'alamat' => trim(htmlspecialchars($this->input->post('alamat'))),
            'jenis_kelamin' => trim(htmlspecialchars($this->input->post('jk'))),
            'agama' => trim(htmlspecialchars($this->input->post('agama'))),
            'status' => trim(htmlspecialchars($this->input->post('status'))),
            'golongan_darah' => trim(htmlspecialchars($this->input->post('golongan'))),
            'gambar' => $gambar
        ));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('DataKtp');
    }

    public function getDataKtpkBySid($sid)
    {
        $dataKtp = $this->M_ktp->getKtpBySid($sid);
        $output = array(
            'message' => 'success',
            'data' => $dataKtp
        );
        echo json_encode($output);
    }

    public function edit()
    {
        $sid = $this->input->post('idpenduduk');

        $data['dataKtp'] = $this->M_ktp->getKtpBySid($sid);
        $gambarLama = $data['dataKtp']['gambar'];
        $gambarBaru = $_FILES['gambar']['name'];
        if ($gambarBaru) {
            // $config['max_size'] = 2048;
            $config['upload_path'] = './assets/images/poto/';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                unlink(FCPATH . '/assets/images/poto/' . $gambarLama);
            } else {
                //data gagal di upload
            }
        } else {
            $gambar = $gambarLama;
        }

        $this->db->where('id', $sid);
        $this->db->update('data_penduduk', array(
            'nama' => trim(htmlspecialchars($this->input->post('nama_penduduk'))),
            'tempat_lahir' => trim(htmlspecialchars($this->input->post('t_lahir'))),
            'tgl_lahir' => trim(htmlspecialchars($this->input->post('tgl_lahir'))),
            'alamat' => trim(htmlspecialchars($this->input->post('alamat'))),
            'jenis_kelamin' => trim(htmlspecialchars($this->input->post('jk'))),
            'agama' => trim(htmlspecialchars($this->input->post('agama'))),
            'status' => trim(htmlspecialchars($this->input->post('status'))),
            'golongan_darah' => trim(htmlspecialchars($this->input->post('golongan'))),
            'gambar' => $gambar
        ));
        $this->session->set_flashdata('flash', 'diubah');
        redirect('DataKtp');
    }

    public function detail($sid)
    {
        $data['title'] = 'Info Data Penduduk';
        $data['dataKtp'] = $this->M_ktp->getKtpBySid($sid);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('ktp/v_detail', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($sid)
    {
        $this->db->where('id', $sid);
        $this->db->delete('data_penduduk');
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('DataKtp');
    }
}
