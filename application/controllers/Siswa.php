<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); //load model siswa_model.php, agar dapat terhubung dengan tabel di db
        $this->load->model("siswa_model");
        $this->load->library('form_validation'); //load library form validation
    }
    public function index()
    {
        $data['siswa'] = $this->siswa_model->getAll(); //mengambil data siswa, kita mengakses method getAll di model siswa_model, data tersebut kita simpan di array $data dengan elemen siswa
        $this->load->view('template/header');
        $this->load->view('index', $data); //$data adalah passing data berupa array berisi data siswa hasil query dari method getAll di model siswa_model.php
        $this->load->view('template/footer');
    }
    public function create()
    {
        $this->load->view('template/header');
        $this->load->view('create');
        $this->load->view('template/footer');
    }
}
