<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['judul'] = "Halaman Mahasiswa";
        $data['mahasiswa'] = $this->M_mahasiswa->GetAllMhs();
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->M_mahasiswa->carimahasiswa();
        }
        $this->load->view('templates/v_header', $data);
        $this->load->view('mahasiswa/v_mahasiswa', $data);
        $this->load->view('templates/v_footer');
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah";
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('mahasiswa/v_tambah', $data);
            $this->load->view('templates/v_footer');
        } else {
            $this->M_mahasiswa->tambahmahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Mahasiswa');
        }
    }
    public function hapus($id)
    {
        $this->M_mahasiswa->hapusmahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Data Mahasiswa";
        $data['mahasiswa'] = $this->M_mahasiswa->getmahasiswa($id);
        $this->load->view('templates/v_header', $data);
        $this->load->view('mahasiswa/v_detail', $data);
        $this->load->view('templates/v_footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Halaman ubah";
        $data['mahasiswa'] = $this->M_mahasiswa->getmahasiswa($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/v_header', $data);
            $this->load->view('mahasiswa/v_ubah', $data);
            $this->load->view('templates/v_footer');
        } else {
            $this->M_mahasiswa->ubahmahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Mahasiswa');
        }
    }
}
