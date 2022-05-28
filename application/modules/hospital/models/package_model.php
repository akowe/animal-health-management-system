<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Package_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    

    function insertPackage($data) {
        $this->db->insert('package', $data);
    }

    function getPackage() {
        $query = $this->db->get('package');
        return $query->result();
    }

    function getPackageById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('package');
        return $query->row();
    }

    function updatePackage($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('package', $data);
    }


    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('package');
    }



}
