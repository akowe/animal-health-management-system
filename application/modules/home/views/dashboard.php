
<?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    $hospital_id = $this->hospital_model->hospitalId();
    $modules = $this->hospital_model->modules();
}
?>


<!DOCTYPE html>
<html lang="en" <?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    $this->db->where('hospital_id', $hospital_id);
    $settings_lang = $this->db->get('settings')->row()->language;
    if ($settings_lang == 'arabic') {
        ?>
              dir="rtl"
          <?php } else { ?>
              dir="ltr"
              <?php
          }
      } else {
          $this->db->where('hospital_id', 'superadmin');
          $settings_lang = $this->db->get('settings')->row()->language;
          if ($settings_lang == 'arabic') {
              ?>
              dir="rtl"
          <?php } else { ?>
              dir="ltr"
              <?php
          }
      }
      ?>>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keyword" content="Animal Identification, Clinic, Online Vet Clinic, Tracability, Fit for Slaughter">
        <link rel="shortcut icon" href="uploads/favicon.png">
        <title>
            <?php echo $this->router->fetch_class(); ?> | 
            <?php
            if ($this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', 'superadmin');
            } else {
                $this->db->where('hospital_id', $this->hospital_id);
            }
            ?>
            <?php
            echo $this->db->get('settings')->row()->system_vendor;
            ?> 
        </title>
        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
        <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
        <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
        <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
        <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css"/>
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->


        <?php
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        } else {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        }
        ?>

    </head>

    <body>
        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-dedent fa-bars tooltips"></div>
                </div>
                <!--logo start-->
                <?php
                if (!$this->ion_auth->in_group(array('superadmin'))) {
                    $this->db->where('hospital_id', $hospital_id);
                    $settings_title = $this->db->get('settings')->row()->title;
                    $settings_title = explode(' ', $settings_title);
                    ?>
                    <a href="" class="logo">
                        <strong>
                            <?php echo $settings_title[0]; ?><span><?php
                                if (!empty($settings_title[1])) {
                                    echo $settings_title[1];
                                }
                                ?></span>
                        </strong>
                    </a>

                <?php } else { ?>

                    <a href="" class="logo">
                        <strong>
                            Online
                            <span>
                                Clinic
                            </span>
                        </strong>
                    </a>

                <?php } ?>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- Bed Notification start -->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse'))) { ?> 
                            <?php if (in_array('bed', $modules)) { ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-hdd-o"></i>
                                        <span class="badge bg-success">  



                                            <?php
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('bed')->result();
                                            $available_bed = 0;
                                            foreach ($query as $bed) {
                                                $last_a_time = explode('-', $bed->last_a_time);
                                                $last_d_time = explode('-', $bed->last_d_time);
                                                if (!empty($last_d_time[1])) {
                                                    $last_d_h_am_pm = explode(' ', $last_d_time[1]);
                                                    $last_d_h = explode(':', $last_d_h_am_pm[1]);
                                                    if ($last_d_h_am_pm[2] == 'AM') {
                                                        $last_d_m = ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                                    } else {
                                                        $last_d_m = (12 * 60 * 60) + ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                                                    }
                                                    $last_d_time_s = strtotime($last_d_time[0]) + $last_d_m;
                                                    if (time() > $last_d_time_s) {
                                                        $available_bed = $available_bed + 1;
                                                    }
                                                } else {
                                                    $available_bed = $available_bed + 1;
                                                }
                                            }
                                            echo $available_bed;
                                            ?>

                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended tasks-bar">
                                        <div class="notify-arrow notify-arrow-green"></div>
                                        <li>
                                            <p class="green">
                                                <?php
                                                if (!empty($query)) {
                                                    echo $available_bed;
                                                } else {
                                                    $available_bed = 0;
                                                    echo $available_bed;
                                                }
                                                ?> 
                                                <?php
                                                if ($available_bed <= 1) {
                                                    echo lang('bed_is_available');
                                                } else {
                                                    echo lang('beds_are_available');
                                                }
                                                ?>
                                            </p>
                                        </li>
                                        <?php ?>
                                        <li class="external">
                                            <a href="<?php echo site_url(); ?>bed/bedAllotment"><p class="green"><?php
                                                    if ($available_bed > 0) {
                                                        echo lang('add_a_allotment');
                                                    } else {
                                                        echo lang('no_bed_is_available_for_allotment');
                                                    }
                                                    ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!-- Bed notification end -->
                        <!-- Payment notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) { ?> 
                            <?php if (in_array('finance', $modules)) { ?>
                                <li id="header_inbox_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-money"></i>
                                        <span class="badge bg-important"> 
                                            <?php
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('payment');
                                            $query = $query->result();
                                            foreach ($query as $payment) {
                                                $payment_date = date('y/m/d', $payment->date);
                                                if ($payment_date == date('y/m/d')) {
                                                    $payment_number[] = '1';
                                                }
                                            }
                                            if (!empty($payment_number)) {
                                                echo $payment_number = array_sum($payment_number);
                                            } else {
                                                $payment_number = 0;
                                                echo $payment_number;
                                            }
                                            ?>        
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended inbox">
                                        <div class="notify-arrow notify-arrow-red"></div>
                                        <li>
                                            <p class="red"> <?php
                                                echo $payment_number . ' ';
                                                if ($payment_number <= 1) {
                                                    echo lang('payment_today');
                                                } else {
                                                    echo lang('payments_today');
                                                }
                                                ?></p>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/payment"><p class="green"> <?php echo lang('see_all_payments'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!-- payment notification end -->  
                        <!-- patient notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?> 
                            <?php if (in_array('patient', $modules)) { ?>
                                <li id="header_notification_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-user"></i>
                                        <span class="badge bg-warning">   
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('patient');
                                            $query = $query->result();
                                            foreach ($query as $patient) {
                                                $patient_number[] = '1';
                                            }
                                            if (!empty($patient_number)) {
                                                echo $patient_number = array_sum($patient_number);
                                            } else {
                                                $patient_number = 0;
                                                echo $patient_number;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended notification">
                                        <div class="notify-arrow notify-arrow-yellow"></div>
                                        <li>
                                            <p class="yellow"><?php
                                                echo $patient_number . ' ';
                                                if ($patient_number <= 1) {
                                                    echo lang('patient_registerred_today');
                                                } else {
                                                    echo lang('patients_registerred_today');
                                                }
                                                ?> </p>
                                        </li>    
                                        <li>
                                            <a href="<?php echo site_url(); ?>patient"><p class="green"><?php echo lang('see_all_patients'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!-- patient notification end -->  
                        <!-- donor notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?> 
                            <?php if (in_array('donor', $modules)) { ?>
                                <li id="header_notification_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-user"></i>
                                        <span class="badge bg-success">       
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('donor');
                                            $query = $query->result();
                                            foreach ($query as $donor) {
                                                $donor_number[] = '1';
                                            }
                                            if (!empty($donor_number)) {
                                                echo $donor_number = array_sum($donor_number);
                                            } else {
                                                $donor_number = 0;
                                                echo $donor_number;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended notification">
                                        <div class="notify-arrow notify-arrow-yellow"></div>
                                        <li>
                                            <p class="green"><?php
                                                echo $donor_number . ' ';
                                                if ($donor_number <= 1) {
                                                    echo lang('donor_registerred_today');
                                                } else {
                                                    echo lang('donors_registerred_today');
                                                }
                                                ?> </p>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>donor"><p class="green"><?php echo lang('see_all_donors'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?> 
                        <!-- donor notification end -->  
                        <!-- medicine notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                            <?php if (in_array('medicine', $modules)) { ?>
                                <li id="header_notification_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-medkit"></i>
                                        <span class="badge bg-success">                          
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('medicine');
                                            $query = $query->result();
                                            foreach ($query as $medicine) {
                                                $medicine_number[] = '1';
                                            }
                                            if (!empty($medicine_number)) {
                                                echo $medicine_number = array_sum($medicine_number);
                                            } else {
                                                $medicine_number = 0;
                                                echo $medicine_number;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended notification">
                                        <div class="notify-arrow notify-arrow-yellow"></div>
                                        <li>
                                            <p class="yellow"><?php
                                                echo $medicine_number . ' ';
                                                if ($medicine_number <= 1) {
                                                    echo lang('medicine_registerred_today');
                                                } else {
                                                    echo lang('medicines_registered_today');
                                                }
                                                ?> </p>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>medicine"><p class="green"><?php echo lang('see_all_medicines'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?> 
                        <!-- medicine notification end -->  
                        <!-- report notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('report', $modules)) { ?>
                                <li id="header_notification_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-hospital-o"></i>
                                        <span class="badge bg-success">                         
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('report');
                                            $query = $query->result();
                                            foreach ($query as $report) {
                                                $report_number[] = '1';
                                            }
                                            if (!empty($report_number)) {
                                                echo $report_number = array_sum($report_number);
                                            } else {
                                                $report_number = 0;
                                                echo $report_number;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended notification">
                                        <div class="notify-arrow notify-arrow-yellow"></div>
                                        <li>
                                            <p class="yellow"><?php
                                                echo $report_number . ' ';
                                                if ($report_number <= 1) {
                                                    echo lang('report_added_today');
                                                } else {
                                                    echo lang('reports_added_today');
                                                }
                                                ?> </p>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>report"><p class="green"><?php echo lang('see_all_reports'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Patient')) { ?> 
                            <?php if (in_array('report', $modules)) { ?>
                                <li id="header_notification_bar" class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <i class="fa fa-hospital-o"></i>
                                        <span class="badge bg-success">                         
                                            <?php
                                            $this->db->where('hospital_id', $this->hospital_id);
                                            $query = $this->db->get('report');
                                            $query = $query->result();
                                            foreach ($query as $report) {
                                                if ($this->ion_auth->user()->row()->id == explode('*', $report->patient)[1]) {
                                                    $report_number[] = '1';
                                                }
                                            }
                                            if (!empty($report_number)) {
                                                echo $report_number = array_sum($report_number);
                                            } else {
                                                $report_number = 0;
                                                echo $report_number;
                                            }
                                            ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu extended notification">
                                        <div class="notify-arrow notify-arrow-yellow"></div>
                                        <li>
                                            <p class="yellow"><?php
                                                echo $report_number . ' ';
                                                if ($report_number <= 1) {
                                                    echo lang('report_is_available_for_you');
                                                } else {
                                                    echo lang('reports_are_available_for_you');
                                                }
                                                ?> </p>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>report/myreports"><p class="green"><?php echo lang('see_your_reports'); ?></p></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!-- report notification end -->
                    </ul>
                </div>
                <div class="top-nav ">
                    <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <div class="flashmessage pull-left"><i class="fa fa-check"></i> <?php echo $message; ?></div>
                    <?php } ?> 
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="uploads/favicon.png" width="21" height="23">
                                <span class="username"><?php echo $this->ion_auth->user()->row()->username; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href=""><i class="fa fa-dashboard"></i> <?php echo lang('dashboard'); ?></a></li>
                                <?php } ?>
                                <li><a href="<?php echo site_url(); ?>profile"><i class=" fa fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href="<?php echo site_url(); ?>settings"><i class="fa fa-cog"></i> <?php echo lang('settings'); ?></a></li>
                                <?php } ?>

                                <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                                <li><a href="<?php echo site_url(); ?>auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href=""> 
                                <i class="fa fa-dashboard"></i>
                                <span><?php echo lang('dashboard'); ?></span>
                            </a>
                        </li>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('department', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>department">
                                        <i class="fa fa-sitemap"></i>
                                        <span><?php echo lang('departments'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('doctor', $modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-users"></i>
                                        <span><?php echo lang('doctor'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="<?php echo site_url(); ?>doctor"><i class="fa fa-user"></i><?php echo lang('list_of_doctors'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>appointment/treatmentReport"><i class="fa fa-money"></i><?php echo lang('treatment_history'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>


                            <?php if (in_array('farm', $modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-users"></i>
                                        <span>Farms/Ranch</span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="<?php echo site_url(); ?>farm"><i class="fa fa-user"></i>Farm List</a></li>

                                    </ul>
                                </li>
                            <?php } ?>

                        <?php } ?>
                        <!-- Appointment sidebar start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-stethoscope"></i>
                                        <span><?php echo lang('appointment'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="<?php echo site_url(); ?>appointment"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>appointment/addNew"><i class="fa fa-plus-circle"></i><?php echo lang('add'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>appointment/todays"><i class="fa fa-list-alt"></i><?php echo lang('todays'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>appointment/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>appointment/calendar"><i class="fa fa-list-alt"></i><?php echo lang('calendar'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!--appointment ends -->

                        <!-- Patient sidebar start-->

                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor'))) { ?>
                            <?php if (in_array('patient', $modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-users"></i> 
                                        <span><?php echo lang('patient'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="<?php echo site_url(); ?>patient"><i class="fa fa-user"></i>
                                                <?php echo lang('patient_list'); ?></a></li>

                            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>

                                        <!-- <?php if (in_array('finance', $modules)) { ?>
                                            <li><a href="<?php echo site_url(); ?>patient/patientPayments"><i class="fa fa-dollar"></i><?php echo lang('payments'); ?></a></li>
                                        <?php } ?> -->
                                <li><a href="<?php echo site_url(); ?>patient/addNew"><i class="fa fa-plus-circle"></i><?php echo lang('add_new'); ?> Patient</a></li>
                                <li><a href="<?php echo site_url(); ?>patient/caseList"><i class="fa fa-book"></i><?php echo lang('case_history'); ?></a></li>
                                        <li><a href="<?php echo site_url(); ?>patient/documents"><i class="fa fa-file-text"></i><?php echo lang('documents'); ?></a></li>
                            <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <!-- Patient sidebar end-->

                        <!-- Farm sidebar-->
                        <?php if ($this->ion_auth->in_group(array('farm'))) { ?>
                            <li><a href="<?php echo site_url(); ?>farm/caseList"><i class="fa fa-book"></i>Animal Health</a></li>
                            <li><a href="<?php echo site_url(); ?>farm/add_livestock"><i class="fa fa-book"></i>Add Livestock</a></li>
                        <?php } ?>
                        <!-- Farm sidebar end-->

                        <!-- Pharmacy sidebar start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Accountant'))) { ?>
                            <?php if (in_array('pharmacy', $modules)) { ?>
                                <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-dollar"></i>
                                    <span><?php echo lang('pharmacy'); ?></span>
                                </a>
                                <ul class="sub">
                                <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                                <?php } ?>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/payment"><i class="fa fa-money"></i> <?php echo lang('sales'); ?></a></li>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_new_sale'); ?></a></li>
                            <?php } ?>
                            <?php if ($this->ion_auth->in_group(array('admin',  'Accountant'))) { ?>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/home"><i class="fa fa-money"></i> <?php echo lang('dashboard'); ?></a></li>

                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/expense"><i class="fa fa-money"></i><?php echo lang('expense'); ?></a></li>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/addExpenseView"><i class="fa fa-plus-circle"></i><?php echo lang('add_expense'); ?></a></li>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/expenseCategory"><i class="fa fa-edit"></i><?php echo lang('expense_categories'); ?> </a></li>
                                <li><a  href="<?php echo site_url(); ?>finance/pharmacy/financialReport"><i class="fa fa-book"></i><?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?> </a></li>
                            <?php } ?>
                            </ul>
                            </li>

                        <?php } ?>
                        <!-- Pharmacy sidebar end-->

                        <!-- Payment sidebar start-->
                        <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <?php if (in_array('patient', $modules)) { ?>
                                <!-- <li>
                                    <a href="<?php echo site_url(); ?>patient/addNewView" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('add_patient'); ?> </span>
                                    </a>
                                </li> -->
                            <?php } ?>
                            <?php if (in_array('finance', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-dollar"></i>
                                        <span><?php echo lang('payment'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>finance/payment"><i class="fa fa-money"></i> <?php echo lang('payments'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/expense" >
                                                <i class="fa fa-money"></i>
                                                <span> <?php echo lang('expense'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/addExpenseView" >
                                                <i class="fa fa-plus-circle"></i>
                                                <span> <?php echo lang('add_expense'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/expenseCategory" >
                                                <i class="fa fa-edit"></i>
                                                <span> <?php echo lang('expense_categories'); ?> </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!-- Payment sidebar end-->







                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li> <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-users"></i>
                                    <span><?php echo lang('human_resources'); ?></span>
                                </a>
                                <ul class="sub">
                                  <!--  <?php if (in_array('nurse', $modules)) { ?>
                                        <li><a href="<?php echo site_url(); ?>nurse"><i class="fa fa-user"></i><?php echo lang('nurse'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('pharmacist', $modules)) { ?>
                                        <li><a href="<?php echo site_url(); ?>pharmacist"><i class="fa fa-user"></i><?php echo lang('pharmacist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('laboratorist', $modules)) { ?>
                                        <li><a href="<?php echo site_url(); ?>laboratorist"><i class="fa fa-user"></i><?php echo lang('laboratorist'); ?></a></li>
                                    <?php } ?> -->
                                    <?php if (in_array('accountant', $modules)) { ?>
                                        <li><a href="<?php echo site_url(); ?>accountant"><i class="fa fa-user"></i><?php echo lang('accountant'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('receptionist', $modules)) { ?>
                                        <li><a href="<?php echo site_url(); ?>receptionist"><i class="fa fa-user"></i><?php echo lang('customer_support'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('finance', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-dollar"></i>
                                        <span><?php echo lang('payments'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>finance/payment"><i class="fa fa-money"></i> <?php echo lang('payments'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/paymentCategory"><i class="fa fa-edit"></i><?php echo lang('payment_procedures'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/expense"><i class="fa fa-money"></i><?php echo lang('expense'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/addExpenseView"><i class="fa fa-plus-circle"></i><?php echo lang('add_expense'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/expenseCategory"><i class="fa fa-edit"></i><?php echo lang('expense_categories'); ?> </a></li>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Receptionist')) { ?>
                            <?php if (in_array('appointment', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>appointment/calendar" >
                                        <i class="fa fa-calendar"></i>
                                        <span> <?php echo lang('calendar'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('finance', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-dollar"></i>
                                        <span><?php echo lang('financial_activities'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>finance/payment"><i class="fa fa-money"></i> <?php echo lang('payments'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                    </ul>
                                </li> 
                            <?php } ?>

                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('prescription', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>prescription/all" >
                                        <i class="fa fa-stethoscope"></i>
                                        <span> <?php echo lang('prescription'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php
                        if ($this->ion_auth->in_group(array('admin'))) {
                            ?>
                            <?php if (in_array('finance', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/UserActivityReport">
                                        <i class="fa fa-dashboard"></i>
                                        <span><?php echo lang('user_activity_report'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                        }
                        ?>

                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <?php if (in_array('prescription', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>prescription">
                                        <i class="fa fa-dashboard"></i>
                                        <span><?php echo lang('prescription'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('lab', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-flask"></i>
                                        <span><?php echo lang('labs'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>lab"><i class="fa fa-file"></i><?php echo lang('lab_reports'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>lab/addLabView"><i class="fa fa-plus-circle"></i><?php echo lang('add_lab_report'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('medicine', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-medkit"></i>
                                        <span><?php echo lang('medicine'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>medicine"><i class="fa fa-medkit"></i><?php echo lang('medicine_list'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>medicine/addMedicineView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>medicine/medicineCategory"><i class="fa fa-edit"></i><?php echo lang('medicine_category'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>medicine/addCategoryView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine_category'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>medicine/medicineStockAlert"><i class="fa fa-plus-circle"></i><?php echo lang('medicine_stock_alert'); ?></a></li>

                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Doctor'))) { ?>
                            <?php if (in_array('donor', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-user"></i>
                                        <span><?php echo lang('donor') ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>donor"><i class="fa fa-user"></i><?php echo lang('donor_list'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>donor/addDonorView"><i class="fa fa-plus-circle"></i><?php echo lang('add_donor'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>donor/bloodBank"><i class="fa fa-tint"></i><?php echo lang('blood_bank'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <?php if (in_array('bed', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-hdd-o"></i>
                                        <span><?php echo lang('bed'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>bed"><i class="fa fa-hdd-o"></i><?php echo lang('bed_list'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>bed/addBedView"><i class="fa fa-plus-circle"></i><?php echo lang('add_bed'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>bed/bedCategory"><i class="fa fa-edit"></i><?php echo lang('bed_category'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>bed/bedAllotment"><i class="fa fa-plus-square-o"></i><?php echo lang('bed_allotments'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>bed/addAllotmentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_allotment'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa  fa-hospital-o"></i>
                                    <span><?php echo lang('report'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $modules)) { ?>
                                            <li><a  href="<?php echo site_url(); ?>finance/financialReport"><i class="fa fa-book"></i><?php echo lang('financial_report'); ?></a></li>
                                            <li> <a href="<?php echo site_url(); ?>finance/AllUserActivityReport">  <i class="fa fa-dashboard"></i>   <span><?php echo lang('user_activity_report'); ?></span> </a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if (in_array('report', $modules)) { ?>
                                        <li><a  href="<?php echo site_url(); ?>report/birth"><i class="fa fa-smile-o"></i><?php echo lang('birth_report'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>report/operation"><i class="fa fa-wheelchair"></i><?php echo lang('operation_report'); ?></a></li>
                                        <!-- <li><a  href="<?php echo site_url(); ?>report/expire"><i class="fa fa-minus-square-o"></i><?php echo lang('expire_report'); ?></a></li> -->
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $modules)) { ?>
                                            <li><a  href="<?php echo site_url(); ?>finance/doctorsCommission"><i class="fa fa-edit"></i><?php echo lang('doctors_commission'); ?> </a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('sms', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-envelope-o"></i>
                                        <span><?php echo lang('sms'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="<?php echo site_url(); ?>sms/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('write_message'); ?></a></li>
                                        <li><a  href="<?php echo site_url(); ?>sms/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent_messages'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                            <li><a  href="<?php echo site_url(); ?>sms/settings"><i class="fa fa-gear"></i><?php echo lang('sms_settings'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-cogs"></i>
                                    <span><?php echo lang('settings'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="<?php echo site_url(); ?>settings"><i class="fa fa-gear"></i><?php echo lang('system_settings'); ?></a></li>
                                    <li><a href="<?php echo site_url(); ?>settings/language"><i class="fa fa-wrench"></i><?php echo lang('language'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Accountant')) { ?>

                            <?php if (in_array('finance', $modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-hospital-o"></i>
                                        <span><?php echo lang('payments'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/payment" >
                                                <i class="fa fa-money"></i>
                                                <span> <?php echo lang('payments'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/addPaymentView" >
                                                <i class="fa fa-plus-circle"></i>
                                                <span> <?php echo lang('add_payment'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url(); ?>finance/paymentCategory" >
                                                <i class="fa fa-edit"></i>
                                                <span> <?php echo lang('payment_procedures'); ?> </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/expense" >
                                        <i class="fa fa-money"></i>
                                        <span> <?php echo lang('expense'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/addExpenseView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_expense'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/expenseCategory" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('expense_categories'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/doctorsCommission" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('doctors_commission'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>finance/financialReport" >
                                        <i class="fa fa-book"></i>
                                        <span> <?php echo lang('financial_report'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                            <?php if (in_array('medicine', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>medicine" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('medicine_list'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>medicine/addMedicineView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_medicine'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>medicine/medicineCategory" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('medicine_category'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>medicine/addCategoryView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_medicine_category'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Nurse')) { ?>
                            <?php if (in_array('bed', $modules)) { ?>
                                <li>
                                    <a href="bed" >
                                        <i class="fa fa-hdd-o"></i>
                                        <span> <?php echo lang('bed_list'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>bed/bedCategory" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('bed_category'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>bed/bedAllotment" >
                                        <i class="fa fa-plus-square-o"></i>
                                        <span> <?php echo lang('bed_allotments'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('donor', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>donor" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('donor'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>donor/bloodBank" >
                                        <i class="fa fa-tint"></i>
                                        <span> <?php echo lang('blood_bank'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Patient')) { ?>
                            <?php if (in_array('donor', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>donor" >
                                        <i class="fa fa-user"></i>
                                        <span><?php echo lang('donor'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('report', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>report/myreports" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('my_report'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('appointment', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>patient/calendar" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (in_array('patient', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>patient/myCaseList" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('history'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (in_array('prescription', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>patient/myPrescription" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('prescription'); ?>  </span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (in_array('patient', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>patient/myDocuments" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('documents'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (in_array('finance', $modules)) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>patient/myPayment" >
                                        <i class="fa fa-user"></i>
                                        <span> <?php echo lang('payment'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>

                        <?php } ?>



                        <?php if ($this->ion_auth->in_group('superadmin')) { ?>

                            <li>
                                <a href="<?php echo site_url() ; ?>hospital">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('all_hospitals'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>hospital/addNewView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span><?php echo lang('create_new_hospital'); ?></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url(); ?>hospital/package">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('packages'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>hospital/package/addNewView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span><?php echo lang('add_new_package'); ?></span>
                                </a>
                            </li>
                        <?php } ?>


                        <li>
                            <a href="<?php echo site_url() ; ?>profile" >
                                <i class="fa fa-user"></i>
                                <span> <?php echo lang('profile'); ?> </span>
                            </a>
                        </li>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>

                            <li>
                                <a href="<?php echo site_url(); ?>settings/subscription" >
                                    <i class="fa fa-user"></i>
                                    <span> <?php echo lang('subscription'); ?> </span>
                                </a>
                            </li>

                        <?php } ?>

                        <!--multi level menu start-->

                        <!--multi level menu end-->

                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->




