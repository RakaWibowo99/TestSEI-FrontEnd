<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    private $api_url;

    public function __construct() {
        parent::__construct();
        $this->api_url = 'http://localhost:8080/lokasi'; // Set the API URL
        $this->load->model('Proyek_model');  // Load Proyek_model
        $this->load->model('Lokasi_model');  // Load Lokasi_model
    }
    public function edit($id) {
        $data['proyek'] = $this->Proyek_model->getProyekById($id);
        $data['lokasi'] = $this->Lokasi_model->getAllLokasi(); // Fetch all locations
        $this->load->view('proyek/edit', $data);
    }
    public function getAllLokasi() {
        $response = file_get_contents($this->api_url);
        return json_decode($response, true);
    }

    public function createLokasi($data) {
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ),
        );
        echo json_encode($data);
        $context = stream_context_create($options);
        $result = file_get_contents($this->api_url, false, $context);
        return json_decode($result, true);
    }

    public function getLokasiById($id) {
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'GET', // Ensure this is the correct method
            ),
        );
        $context = stream_context_create($options);
        $response = @file_get_contents($this->api_url . '/' . $id, false, $context);
        if ($response === FALSE) {
            log_message('error', 'Failed to fetch location with ID: ' . $id);
            return null;
        }
        return json_decode($response, true);
    }
    

    public function updateLokasi($id, $data) {
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'PUT',
                'content' => json_encode($data),
            ),
        );
        json_encode($data);
        $context = stream_context_create($options);
        $result = file_get_contents($this->api_url . '/' . $id, false, $context);
        return json_decode($result, true);
    }

    public function deleteLokasi($id) {
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'DELETE',
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($this->api_url . '/' . $id, false, $context);
        return json_decode($result, true);
    }
}
?>
