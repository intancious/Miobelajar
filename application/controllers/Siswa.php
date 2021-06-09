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
    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['tempat_lahir'] = $this->input->post('tempat_lahir');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['no_telp'] = $this->input->post('no_telp');
            $data['alamat'] = $this->input->post('alamat');
            $this->siswa_model->save($data);
            redirect('siswa');
        } else {
            $this->load->view('template/header');
            $this->load->view('siswa/create');
            $this->load->view('template/footer');
        }
    }
}
