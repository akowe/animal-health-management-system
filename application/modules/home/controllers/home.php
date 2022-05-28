<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $this->load->model('finance/finance_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('hospital/hospital_model');

        if ($this->ion_auth->in_group(array('superadmin'))) {
            // $language = $this->db->get('settings')->row()->language;
            $language = 'english';
            $this->lang->load('system_syntax', $language);
        } else {
            $this->hospital_id = $this->hospital_model->hospitalId();
            $this->db->where('hospital_id', $this->hospital_id);
            $language = $this->db->get('settings')->row()->language;
            $this->lang->load('system_syntax', $language);
        }


        $this->load->model('ion_auth_model');

        //   $this->modules = $this->hospital_model->modules();
        //   $this_controller = $this->router->fetch_class();
        //  if (!in_array($this_controller, $this->modules)) {
        //       redirect('home');
        //   }

        $this->load->model('settings/settings_model');
        $this->load->model('home_model');
    }

    public function index() {

        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $data['sum'] = $this->home_model->getSum('gross_total', 'payment');
            $data['payments'] = $this->finance_model->getPayment();
            $data['this_month'] = $this->finance_model->getThisMonth();
            $data['expenses'] = $this->finance_model->getExpense();
            $data['appointments'] = $this->appointment_model->getAppointment();
            $this->load->view('dashboard'); // just the header file
            $this->load->view('home', $data);
            $this->load->view('footer');
            if ($this->ion_auth->in_group(array('Accountant'))) {
               
            }

            if ($this->ion_auth->in_group(array('Pharmacist'))) {
                redirect('finance/pharmacy/home');
            }

            if ($this->ion_auth->in_group(array('Patient'))) {
                $user_id = $this->ion_auth->get_user_id();
                $patient_id = $this->db->get_where('patient', array('ion_user_id' => $user_id))->row()->id;
                redirect('patient/medicalHistory?id=' . $patient_id);
            }
        } else {
            $data['hospitals'] = $this->hospital_model->getHospital();
            $this->load->view('dashboard'); // just the header file
            $this->load->view('home', $data);
            $this->load->view('footer');
        }
    }

    public function permission() {
        $this->load->view('permission');
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
