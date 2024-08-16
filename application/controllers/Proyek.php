<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
    }

    public function index() {
        $data['proyek'] = $this->Proyek_model->getAllProyek();
        $this->load->view('proyek/index', $data);
    }

    public function create() {
        $data['lokasi'] = $this->Lokasi_model->getAllLokasi();
        $this->load->view('proyek/create', $data);

    }

    public function store() {
        $proyek_data = array(
            'namaProyek' => $this->input->post('nama_proyek'),
            'lokasi' => $this->input->post('lokasi_proyek[]'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->Proyek_model->createProyek($proyek_data);
        redirect('home');
    }

    public function edit($id) {
        // Fetch the project data by ID
        $data['proyek'] = $this->Proyek_model->getProyekById($id);
        
        // Check if the project data is found
        if (!$data['proyek']) {
            show_404(); // Display a 404 page if the project data is not found
            return;
        }
    
        $lokasi = $data['proyek']['lokasi'];
        if(count($lokasi)>0){
            $data['current'] = $lokasi[0]["id"];
        }

        // Fetch the list of all locations
        $this->load->model('Lokasi_model');
        $data['lokasiList'] = $this->Lokasi_model->getAlllokasi(); 
        // Load the edit view and pass the project data and location list
        $this->load->view('proyek/edit', $data);
    }
    
    

    public function update($id) {
        $proyek_data = array(
            'namaProyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'lokasi' => $this->input->post('lokasi_proyek[]'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->Proyek_model->updateProyek($id, $proyek_data);
        redirect('home');
    }

    public function delete($id) {
        $this->Proyek_model->deleteProyek($id);
        redirect('home');
    }
}
?>
