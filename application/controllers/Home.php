<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $data['judul'] = "Halaman Home";

        $this->load->view('templates/v_header', $data);
        $this->load->view('home/v_home');
        $this->load->view('templates/v_footer');
    }
}
