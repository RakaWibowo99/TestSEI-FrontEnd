<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Load the models
        $this->load->model('Lokasi_model');
        $this->load->model('Proyek_model');
        

        // Get data from the models
        $data['lokasi'] = $this->Lokasi_model->getAllLokasi();
        $data['proyek'] = $this->Proyek_model->getAllProyek();

        // Check if the data exists and is an array
        if (!is_array($data['lokasi'])) {
            $data['lokasi'] = [];
        }

        if (!is_array($data['proyek'])) {
            $data['proyek'] = [];
        }

        // Load the view and pass the data
        $this->load->view('home', $data);
    }
}
?>
