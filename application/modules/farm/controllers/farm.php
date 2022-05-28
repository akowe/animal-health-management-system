<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Farm extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->model('ion_auth_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        $this->load->model('farm_model');
        //$this->load->model('department/department_model');
        $this->load->model('hospital/hospital_model');
        $this->hospital_id = $this->hospital_model->hospitalId();
        $this->db->where('hospital_id', $this->hospital_id);
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('ion_auth_model');

        $this->modules = $this->hospital_model->modules();
        $this_controller = $this->router->fetch_class();
        if (!in_array($this_controller, $this->modules)) {
            redirect('home/dashboard');
        }


        if (!$this->ion_auth->in_group(array('admin', 'Doctor', 'farm'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        $data['farms'] = $this->farm_model->getFarm();
        //$data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('farm', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $data = array();
        //$data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }


    public function addNew() {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
       // $department = $this->input->post('department');
       // $profile = $this->input->post('profile');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Address Field
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Phone Field
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();

                $data['farms'] = $this->farm_model->getFarmById($id);

                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);
            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'location' => $address,
                    'phone' => $phone,
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'location' => $address,
                    'phone' => $phone,
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New Doctor
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    redirect('farm/addNewView');
                } else {
                    $dfg = 12;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->farm_model->insertFarm($data);
                    $doctor_user_id = $this->db->get_where('farm', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->farm_model->updateFarm($doctor_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                    $this->session->set_flashdata('feedback', 'Added');
                }
            } else { // Updating Doctor
                $ion_user_id = $this->db->get_where('farm', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->farm_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->farm_model->updateFarm($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            // Loading View
            redirect('farm');
        }
    }

    function add_livestock() {
        $this->load->model('farm_model');
        $this->load->database();
        //$data['farms'] = $this->farm_model->getFarm();
        //$data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_livestock');
        $this->load->view('home/footer');
            //get user inputs
            $name = $this->input->post('name');
            $email = $this->input->post('email');
//            $phone = $this->input->post('phone');
//            $farm = $this->input->post('farm_name');
//            $location = $this->input->post('location');
            $cattle = $this->input->post('no_of_livestock');
            $amount = $this->input->post('amount');
            $ref = $this->input->post('reference');

            if ($this->input->post('hoina_btn')) {
                // set amount
                $c = $cattle * 5000;
                $price = $c;

                //insert into table
                $user['name'] = $name;
//                $user['phone'] = $phone;
//                $user['farm_name'] = $farm;
//                $user['location'] = $location;
                $user['email'] = $email;
                $user['no_of_livestock'] = $cattle;
                $user['amount'] = $price;
                $user['reference'] = $ref;
                $user['status'] = 'in-progress';
                $this->farm_model->insert($user);


                // paystack integration start's
                $curl = curl_init();
                $pay = $price * 100;  //the amount in kobo. This value is actually NGN 300
                // url to go to after payment
                $callback_url = site_url(). 'farm/pay';


                // Test secret key: sk_test_41c1144e4ddf66786d22a25af1aed53cf8712ee1
                // Live secrete key: sk_live_39a2e29cb152dc50c518c3257bb554a22fea7d3a

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'amount'=>$pay,
                        'email'=>$email,
                        'callback_url' => $callback_url,
                        'reference'=>$ref
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "authorization: Bearer sk_live_39a2e29cb152dc50c518c3257bb554a22fea7d3a", //replace this with your own test key
                        "content-type: application/json",
                        "cache-control: no-cache"
                    ],
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                if($err){
                    // there was an error contacting the Paystack API
                    die('Curl returned error: ' . $err);
                }

                $tranx = json_decode($response, true);

                if(!$tranx['status']){
                    // there was an error from the API
                    //	print_r('API returned error: ' . $tranx['message']);
                    $this->session->set_flashdata('error', 'Please try again later.'. $tranx['message']);
                }
                // comment out this line if you want to redirect the user to the payment page
                //print_r($tranx);
                // redirect to page so User can pay
                // uncomment this line to allow the user redirect to the payment page
                header('Location: ' . $tranx['data']['authorization_url']);
                //print_r($result);
                // handle curl error
            }

       // just the footer file
    }

    public function pay()
    {
        //$this->load->model('farm_model');
        $this->load->database();
        //$data['farms'] = $this->farm_model->getFarm();
        //$data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pay');
        $this->load->view('home/footer');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('date');
        //load library
        $this->load->library('pagination');
        $this->load->library('table');

        //$p_ref = $this->input->get('reference', TRUE);

        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if(!$reference){
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_live_39a2e29cb152dc50c518c3257bb554a22fea7d3a",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $better_response = json_decode($response);

        if(!$better_response->status){
            // there was an error from the API
            die('API returned error: ' . $better_response->message);
        }

        if('success' == $better_response->data->status){
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
            //print_r($response);
            //echo  $better_response;
            //print_r($better_response->status);

            //get data from table and send email to user
           $ref = $better_response->data->reference;
            $query = $this->db->query("SELECT name, amount, email, phone, farm_name, location, no_of_livestock FROM hoina_urban WHERE reference = '$ref'");
            $results = $query->result();

            foreach ($results as $row)
            {
//			echo $row->name;
//			echo $row->email;
//			echo $row->phone;
//			echo $row->amount;
            }
            // Update table
            $hoina['paystack_ref'] = $better_response->data->reference;
            $hoina['status']= 'Success';
            $this->db->where('reference', $better_response->data->reference);
            $this->db->update('hoina_urban', $hoina);

            //set up email
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'admin@livestock247.com', // change it to yours
                'smtp_pass' => 'b861N8cPchr3', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $to = $row->email;
            //$groupmail = 'esther.akowe@livestock247.com';

            $message = " 
						<html>
						<head>
							<title>Hoina Sales</title>
						</head>
						<body>
							<h3>Hoina - By Livestock247</h3>
							<p>
							You have successfully paid and registered $row->no_of_livestock livestock.
						    <a href='" . site_url() . "admin' class='btn btn-sm'></a>
    						</p>
    						<p>
    						<strong>Payment Details:</strong><br>
							Amount:				N$row->amount<br>
    						Payment reference: 	$ref<br>
							</p>
						</body>
						</html>
						";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($to);
            //$this->email->cc($groupmail);
            $this->email->subject('Livetock247 - Hoina Payment Successful');
            $this->email->message($message);

            if ($this->email->send()) {

            }
            echo '<script>alert("Your Payment Was Successful. A member of our team will contact you.")</script>';
            //$this->output->set_header('refresh:2;'.site_url());

            // send email to livestock247
            //set up email
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'admin@livestock247.com', // change it to yours
                'smtp_pass' => 'b861N8cPchr3', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $groupmail = 'esther.akowe@livestock247.com';
           // $groupmail = 'hoina@livestock247.com';

            $message = " 
						<html>
						<head>
							<title>Hoina Sales</title>
						</head>
						<body>
							<h3>Hoina - Payment Successful</h3>
							<p>
							<span style='text-transform: capitalize;'>$row->name</span> has successfully paid for more $row->no_of_livestock livestock.
							<br>
							</p>
    						<p>
    						<strong>Payment Details:</strong><br>
							Amount:				N$row->amount<br>
    						Payment reference: 	$ref<br>
    						Farm Name:			$row->farm_name<br>
    						Location:			$row->location<br>
    						Email:				$row->email<br>
    						Phone:				$row->phone<br>
    						
    						
							</p>
						</body>
						</html>
						";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($groupmail);
            $this->email->subject('Hoina - Payment Successful');
            $this->email->message($message);

            if ($this->email->send()) {

            }
            //$this->output->set_header('refresh:2;');
            $this->output->set_header('refresh:2;'.site_url());

        }
        // failed payment
        if (isset($better_response->status) && $better_response->status == false) {
            //echo  $better_response->result->data->amountSettled;
            $meat['reference'] = $better_response->data->reference;
            $meat['status']= 'Failed';
            $this->db->where('reference', $better_response->data->reference);
            $this->db->update('hoina_urban', $meat);
            // Display the alert box
            echo '<script>alert("Payment Failed.")</script>';
           // $this->output->set_header('refresh:2;'.site_url());
        }
       // $this->session->set_flashdata('pay', 'Payment successful');
        //$this->load->view('pay');
        $this->output->set_header('refresh:2;'.site_url());




    }



    function editFarm() {
        $data = array();
       // $data['departments'] = $this->department_model->getDepartment();
        $id = $this->input->get('id');
        $data['farm'] = $this->farm_model->getFarmById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function caseList() {
        $data['patients'] = $this->farm_model->getPatient();
        $data['medical_histories'] = $this->farm_model->getMedicalHistory();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('case_list', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function documents() {
        $data['patients'] = $this->farm_model->getPatient();
        $data['files'] = $this->farm_model->getPatientMaterial();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('documents', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function myCaseList()
    {
        if ($this->ion_auth->in_group(array('farm'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->farm_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['medical_histories'] = $this->farm_model->getMedicalHistoryByPatientId($patient_id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('my_case_list', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }


    function editDoctorByJason() {
        $id = $this->input->get('id');
        $data['farm'] = $this->farm_model->getFarmById($id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('farm', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->farm_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('farm');
    }

    function getFarm() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['farm'] = $this->farm_model->getFarmBysearch($search);
            } else {
                $data['farm'] = $this->farm_model->getFarm();
            }
        } else {
            if (!empty($search)) {
                $data['farm'] = $this->farm_model->getFarmByLimitBySearch($limit, $start, $search);
            } else {
                $data['farm'] = $this->doctor_model->getFarmByLimit($limit, $start);
            }
        }
        //  $data['doctors'] = $this->doctor_model->getDoctor();

        foreach ($data['farm'] as $farm) {
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options1 = '<a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" href="farm/editDoctor?id=' . $farm->id . '" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }
            if (in_array('appointment', $this->modules)) {
                $options2 = '<a class="btn btn-info btn-xs detailsbutton" title="' . lang('appointments') . '"  href="appointment/getAppointmentByFarmId?id=' . $farm->id . '"> <i class="fa fa-calendar"> </i> ' . lang('appointments') . '</a>';
            } else {
                $options2 = '';
            }
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options3 = '<a class="btn btn-info btn-xs btn_width delete_button" title="' . lang('delete') . '" href="farm/delete?id=' . $farm->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash-o"> </i> ' . lang('delete') . '</a>';
            }

            $info[] = array(
                $farm->id,
                $farm->name,
                $farm->email,
                $farm->address,
                $farm->phone,
                $farm->department,
                $farm->profile,
                $options1 . ' ' . $options2 . ' ' . $options3,
                //  $options2 . ' ' . $options3,
                //  $options2
            );
        }

        if (!empty($data['farm'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get_where('farm', array('hospital_id' => $this->hospital_id))->num_rows(),
                "recordsFiltered" => $this->db->get_where('farm', array('hospital_id' => $this->hospital_id))->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

}

/* End of file doctor.php */
/* Location: ./application/modules/doctor/controllers/doctor.php */
