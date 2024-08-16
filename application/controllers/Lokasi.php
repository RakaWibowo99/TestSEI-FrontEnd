<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lokasi_model');
    }

    public function index() {
        $data['lokasi'] = $this->Lokasi_model->getAllLokasi();
        $this->load->view('lokasi/index', $data);
    }

    public function create() {
        $this->load->view('lokasi/create');
    }

    public function store() {
        $lokasi_data = array(
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
        );
        $this->Lokasi_model->createLokasi($lokasi_data);
        redirect('home');
    }

    public function edit($id) {
        $data['lokasi'] = $this->Lokasi_model->getLokasiById($id);
        $this->load->view('lokasi/edit', $data);
    }

    public function update($id) {
        $lokasi_data = array(
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
        );
        $this->Lokasi_model->updateLokasi($id, $lokasi_data);
        redirect('home');
    }

    public function delete($id) {
        $this->Lokasi_model->deleteLokasi($id);
        redirect('home');
    }
}
?>
