<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

    private $api_url;

    public function __construct() {
        parent::__construct();
        $this->api_url = 'http://localhost:8080/proyek'; // Set the API URL
        $this->load->model('Proyek_model');  // Load Proyek_model
        $this->load->model('Lokasi_model');  // Load Lokasi_model
    }
    public function edit($id) {
        $data['proyek'] = $this->Proyek_model->getProyekById($id);
        $data['lokasi'] = $this->Lokasi_model->getAllLokasi(); // Fetch all locations
        $this->load->view('proyek/edit', $data);
    }
    public function getAllProyek() {
        $response = $this->makeApiRequest($this->api_url);
        return json_decode($response, true); // Return all projects from API
    }

    public function createProyek($data) {
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );
        echo json_encode($data),
        $response = $this->makeApiRequest($this->api_url, $options);
        return json_decode($response, true); // Create a new project via API
    }

    public function getProyekById($id) {
        $response = $this->makeApiRequest($this->api_url . '/' . $id);
        return json_decode($response, true); // Get project by ID via API
    }

    public function updateProyek($id, $data) {
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ),
        );
        $response = $this->makeApiRequest($this->api_url . '/' . $id, $options);
        return json_decode($response, true); // Update project via API
    }

    public function deleteProyek($id) {
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'DELETE',
            ),
        );
        $response = $this->makeApiRequest($this->api_url . '/' . $id, $options);
        return json_decode($response, true); // Delete project via API
    }

    // Helper method for making API requests
    private function makeApiRequest($url, $options = null) {
        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);
        if ($response === FALSE) {
            log_message('error', 'API request failed for URL: ' . $url);
            return json_encode(array('error' => 'Unable to make API request.'));
        }
        return $response;
    }
}
?>
