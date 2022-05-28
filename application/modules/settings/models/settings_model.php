<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hospital/hospital_model');
        $this->hospital_id = $this->hospital_model->hospitalId();
    }

    function getSettings() {
        $this->db->order_by('hospital_id', 'desc');
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('settings');
        return $query->row();
    }
    
     function getSubscription() {
        $this->db->where('id', $this->hospital_id);
        $query = $this->db->get('hospital');
        return $query->row();
    }

    function updateSettings($hospital_id, $data) {
        $this->db->where('hospital_id', $hospital_id);
        $this->db->update('settings', $data);
    }

    function insertSettings($hospital_settings_data) {
        $this->db->insert('settings', $hospital_settings_data);
    }

}
