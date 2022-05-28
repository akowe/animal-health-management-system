<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
         $this->load->model('hospital/hospital_model');
        $this->hospital_id= $this->hospital_model->hospitalId();
    }

    public function getSum($field, $table) {
        $this->db->select_sum($field);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get($table);
        return $query->result();
    }

}
