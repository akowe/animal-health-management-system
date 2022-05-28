<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hospital/hospital_model');
        $this->hospital_id= $this->hospital_model->hospitalId();
    }

    function insertDoctor($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('doctor', $data2);
    }

    function getDoctor() {
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('department', $search);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);

        $this->db->order_by('id', 'desc');

        $this->db->or_like('name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('department', $search);

        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('doctor');
        return $query->row();
    }

    function updateDoctor($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('doctor', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('doctor');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }
    
    function getLimit() {
        $current = $this->db->get_where('doctor', array('hospital_id' => $this->hospital_id))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->hospital_id))->row()->d_limit;
        return $limit - $current;
    }

}
