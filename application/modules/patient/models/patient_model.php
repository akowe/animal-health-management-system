<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('hospital/hospital_model');
        $this->hospital_id = $this->hospital_model->hospitalId();
    }

    function insertPatient($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient', $data2);
    }


    function getPatient() {
        $this->db->where('hospital_id', $this->hospital_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('name', $search);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);

        $this->db->order_by('id', 'desc');

        $this->db->or_like('name', $search);
        $this->db->or_like('phone', $search);
        $this->db->or_like('address', $search);

        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByIonUserId($id) {
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function updatePatient($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient');
    }

    function insertMedicalHistory($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('medical_history', $data2);
    }

    function getMedicalHistoryByPatientId($id) {
        $this->db->where('patient_id', $id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistory() {
        $this->db->where('hospital_id', $this->hospital_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('patient_name', $search);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);

        $this->db->order_by('id', 'desc');

        $this->db->or_like('patient_name', $search);
        $this->db->or_like('patient_phone', $search);
        $this->db->or_like('patient_address', $search);

        $this->db->or_like('description', $search);

        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('medical_history');
        return $query->row();
    }

    function updateMedicalHistory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('medical_history', $data);
    }

    function insertDiagnosticReport($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('diagnostic_report', $data2);
    }

    function updateDiagnosticReport($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('diagnostic_report', $data);
    }

    function getDiagnosticReport() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function getDiagnosticReportById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByInvoiceId($id) {
        $this->db->where('invoice', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByPatientId($id) {
        $this->db->where('patient', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function insertPatientMaterial($data) {
        $data1 = array('hospital_id' => $this->hospital_id);
        $data2 = array_merge($data, $data1);
        $this->db->insert('patient_material', $data2);
    }

    function getPatientMaterial() {
        $this->db->order_by('id', 'desc');
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->like('id', $search);
        $this->db->or_like('patient_name', $search);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentByLimit($limit, $start) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentByLimitBySearch($limit, $start, $search) {

        $this->db->like('id', $search);

        $this->db->order_by('id', 'desc');

        $this->db->or_like('date_string', $search);

        $this->db->or_like('patient_name', $search);
        $this->db->or_like('patient_phone', $search);
        $this->db->or_like('patient_address', $search);

        $this->db->or_like('title', $search);

        $this->db->limit($limit, $start);
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getPatientMaterialById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function getPatientMaterialByPatientId($id) {
        $this->db->where('patient', $id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function deletePatientMaterial($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient_material');
    }

    function deleteMedicalHistory($id) {
        $this->db->where('id', $id);
        $this->db->delete('medical_history');
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

    function getDueBalanceByPatientId($patient) {
        $this->db->where('hospital_id', $this->hospital_id);
        $query = $this->db->get_where('payment', array('patient' => $patient))->result();
        $this->db->where('hospital_id', $this->hospital_id);
        $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient))->result();
        $balance = array();
        $deposit_balance = array();
        foreach ($query as $gross) {
            $balance[] = $gross->gross_total;
        }
        $balance = array_sum($balance);


        foreach ($deposits as $deposit) {
            $deposit_balance[] = $deposit->deposited_amount;
        }
        $deposit_balance = array_sum($deposit_balance);



        $bill_balance = $balance;

        return $due_balance = $bill_balance - $deposit_balance;
    }

    function getLimit() {
        $current = $this->db->get_where('patient', array('hospital_id' => $this->hospital_id))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->hospital_id))->row()->p_limit;
        return $limit - $current;
    }


    //select all hoina rural chip
    public function HoinaChipRural()
    {
        $query = $this->db->get('hoina_animal_id');
        return $query;
    }

    public function HoinaChipUrban()
    {
        $query = $this->db->get('animal_id_urban');
        return $query;
    }


    function feeds()
    {
        $query = $this->db->get('farm');
        return $query;
//
//        $this->db->select('name');
//        $this->db->from('farm');
    }

   // fetch chip
    function search_blog($title){
        $this->db->like('chip', $title , 'both');
        $this->db->order_by('chip', 'ASC');
        $this->db->limit(10);
       $query = $this->db->get('hoina_animal_id')->result();
        return $query;
//        if (count($query) > 0) {
//            return $query;
//        }

    }

    function search_chip(){
//        $this->db->like('chip');
//        $this->db->order_by('chip', 'ASC');
//        $this->db->limit(10);
        $query = $this->db->get('hoina_animal_id');
        return $query;


    }

}//class
