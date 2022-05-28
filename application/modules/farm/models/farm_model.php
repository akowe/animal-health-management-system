<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Farm_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hospital/hospital_model');
        $this->hospital_id= $this->hospital_model->hospitalId();

    }

    function insertFarm($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('farm', $data2);
    }



    function getFarm() {
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('farm');
        return $query->result();
    }

    function getFarmBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('email', $search);
        //$this->db->or_like('department', $search);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('farm');
        return $query->result();
    }

    function getFarmByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('farm');
        return $query->result();
    }

    function getFarmrByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);

        $this->db->order_by('id', 'desc');

        $this->db->or_like('name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('email', $search);
        //$this->db->or_like('department', $search);

        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('farm');
        return $query->result();
    }

    function getFarmById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('farm');
        return $query->row();
    }

    function updateFarm($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('farm', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('farm');
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
        $current = $this->db->get_where('farm', array('hospital_id' => $this->hospital_id))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->hospital_id))->row()->d_limit;
        return $limit - $current;
    }


    function getPatient() {
        $this->db->where('hospital_id', $this->hospital_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getMedicalHistory() {
        $this->db->order_by('date', 'desc');
        $this->db->from('medical_history');
        $this->db->join('farm', 'farm.name = medical_history.patient_name');
       // $query = $this->db->get('medical_history');
        $query = $this->db->get();


        return $query->result();
    }

    function getPatientByIonUserId($id) {
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getMedicalHistoryByPatientId($id) {
        $this->db->where('patient_id', $id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }


    public function getAllpayment(){
        $query = $this->db->get('hoina_urban');
        return $query;
    }

    public function insert($user){
        $this->db->insert('hoina_urban', $user);
        return $this->db->insert_id();
    }

}//class
