<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hospital/hospital_model');
        $this->hospital_id= $this->hospital_model->hospitalId();
    }

    function insertDepartment($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('department', $data2);
    }

    function getDepartment() {
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('department');
        return $query->result();
    }

    function getDepartmentById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('department');
        return $query->row();
    }

    function updateDepartment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('department', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('department');
    }

}
