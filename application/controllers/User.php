<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        // if ($this->session->userdata("username") == '' && $this->session->userdata('id_user') == '') {
        //     redirect('auth');
        // }
    }
    public function index()
    {
        $data['title'] = "Data User";
        $data['dataUser'] = $this->M_user->getUserAll();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/v_user', $data);
        $this->load->view('layout/footer');
    }

    public function getDataUserAll()
    {
        $dataUser = $this->M_user->getUserAll();
        $output = array(
            'message' => 'success',
            'data' => $dataUser
        );
        echo json_encode($output);
    }

    public function tambah()
    {
        $gambar = $_FILES['gambar']['name'];
        if ($gambar) {
            // $config['max_size'] = 2048;
            $config['upload_path'] = './assets/images/users/';
            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                //sweetAlert
            }
        } else {
            $gambar = 'default.png';
        }
        $this->db->insert('user', array(
            'nama' => trim(htmlspecialchars($this->input->post('nama'))),
            'alamat' => trim(htmlspecialchars($this->input->post('alamat'))),
            'jenis_kelamin' => trim(htmlspecialchars($this->input->post('kelamin'))),
            'email' => trim(htmlspecialchars($this->input->post('email'))),
            'no_hp' => trim(htmlspecialchars($this->input->post('no_hp'))),
            'username' => trim(htmlspecialchars($this->input->post('username'))),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'gambar' => $gambar
        ));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('User');
    }

    public function edit($id)
    {

        $data['title'] = 'Edit User';
        $data['dataUserById'] = $this->M_user->dataUserById($id);
        $this->form_validation->set_rules('nama', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat User', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis_kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('user/v_edit', $data);
            $this->load->view('layout/footer');
        } else {
            $gambarLama = $data['dataUserById']['gambar'];
            $gambarBaru = $_FILES['gambar']['name'];
            if ($gambarBaru) {
                // $config['max_size'] = 2048;
                $config['upload_path'] = './assets/images/users/';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambarBaru = $this->upload->data('file_name');
                    $gambar = $gambarBaru;
                    unlink(FCPATH . '/assets/images/users/' . $gambarLama);
                } else {
                    // echo 'gagal upload';
                }
            } else {
                $gambar = $gambarLama;
            }
            if ($this->input->post('password') != '') {
                $password =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            } else {
                $password = $data['dataUserById']['password'];
            }
            $data = array(
                'nama' => trim(htmlspecialchars($this->input->post('nama'))),
                'alamat' => trim(htmlspecialchars($this->input->post('alamat'))),
                'jenis_kelamin' => trim(htmlspecialchars($this->input->post('kelamin'))),
                'email' => trim(htmlspecialchars($this->input->post('email'))),
                'no_hp' => trim(htmlspecialchars($this->input->post('no_hp'))),
                'username' => trim(htmlspecialchars($this->input->post('username'))),
                'password' => $password,
                'gambar' => $gambar
            );
            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('user');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail User';
        $data['detailUser'] = $this->M_user->dataUserById($id);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('user/v_detail', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $dataUser = $this->M_user->dataUserById($id);
        $result = $this->M_user->delete($id);
        if ($result > 0) {
            unlink(FCPATH . '/assets/images/users/' . $dataUser['gambar']);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect('user');
        } else {
            $this->session->set_flashdata('flash', 'dihapus');
            redirect('user');
        }
    }
}
