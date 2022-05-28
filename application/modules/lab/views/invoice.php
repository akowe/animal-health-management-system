<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- invoice start-->
        <section>


            <header class="panel-heading no-print">
                <i class="fa fa-money"></i>  <?php echo lang('lab_report'); ?>
            </header>



            <style>

                th{
                    text-align: center;
                }

                td{
                    text-align: center;
                }

                tr.total{
                    color: green;
                }



                .control-label{
                    width: 100px;
                }



                h1{
                    margin-top: 5px;
                }


                .print_width{
                    width: 50%;
                    float: left;
                } 

                ul.amounts li {
                    padding: 0px !important;
                }

                .invoice-list {
                    margin-bottom: 10px;
                }




                .panel{
                    border: 0px solid #5c5c47;
                    background: #fff !important;
                    height: 100%;
                    margin: 20px 5px 5px 5px;
                    border-radius: 0px !important;

                }



                .table.main{
                    margin-top: -50px;
                }



                .control-label{
                    margin-bottom: 0px;
                }

                tr.total td{
                    color: green !important;
                }

                .theadd th{
                    background: #edfafa !important;
                }

                td{
                    font-size: 12px;
                    padding: 5px;
                    font-weight: bold;
                }

                .details{
                    font-weight: bold;
                }

                hr{
                    border-bottom: 2px solid green !important;
                }

                .corporate-id {
                    margin-bottom: 5px;
                }

                .adv-table table tr td {
                    padding: 5px 10px;
                }



                .btn{
                    margin: 10px 10px 10px 0px;
                }












                @media print {

                    h1{
                        margin-top: 5px;
                    }

                    #main-content{
                        padding-top: 0px;
                    }

                    .print_width{
                        width: 50%;
                        float: left;
                    } 

                    ul.amounts li {
                        padding: 0px !important;
                    }

                    .invoice-list {
                        margin-bottom: 10px;
                    }

                    .wrapper{
                        margin-top: 0px;
                    }

                    .wrapper{
                        padding: 0px 0px !important;
                        background: #fff !important;

                    }



                    .wrapper{
                        border: 2px solid #802f00;
                    }

                    .panel{
                        border: 0px solid #5c5c47;
                        background: #fff !important;
                        padding: 0px 0px;
                        height: 100%;
                        margin: 5px 5px 5px 5px;
                        border-radius: 0px !important;
                        min-height: 1010px;

                    }



                    .table.main{
                        margin-top: -50px;
                    }



                    .control-label{
                        margin-bottom: 0px;
                    }

                    tr.total td{
                        color: green !important;
                    }

                    .theadd th{
                        background: #edfafa !important;
                    }

                    td{
                        font-size: 12px;
                        padding: 5px;
                        font-weight: bold;
                    }

                    .details{
                        font-weight: bold;
                    }

                    hr{
                        border-bottom: 2px solid green !important;
                    }

                    .corporate-id {
                        margin-bottom: 5px;
                    }

                    .adv-table table tr td {
                        padding: 5px 10px;
                    }




                }

            </style>








            <div class="panel panel-primary col-md-6">
                <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                <div class="panel-body" style="font-size: 10px;">
                    <div class="row invoice-list">

                        <div class="text-center corporate-id">


                            <h3>
                                <?php echo $settings->title ?>
                            </h3>
                            <br>

                            <h6>
                                <?php echo $settings->address ?>
                            </h6>
                            <h6>
                                Tel: <?php echo $settings->phone ?>
                            </h6>
                            <img alt="" src="<?php echo $this->settings_model->getSettings()->logo; ?>" width="200" height="100">

                          <!--  <h4 style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
                                <?php echo lang('lab') ?> <?php echo lang('lab_report') ?>
                                <hr style="width: 200px; border-bottom: 1px solid #000; margin-top: 5px; margin-bottom: 5px;">
                            </h4> -->

                        </div>





                        <div class="col-md-12">
                            <div class="col-md-6 pull-left row" style="text-align: left;">
                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <?php $patient_info = $this->db->get_where('patient', array('id' => $lab->patient))->row(); ?>
                                        <label class="control-label"><?php echo lang('patient'); ?> <?php echo lang('name'); ?> </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->name . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <label class="control-label"><?php echo lang('patient_id'); ?>  </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->id . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <label class="control-label"> <?php echo lang('animal_identification'); ?> </label>
                                        <span style="text-transform: uppercase;"> :
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $lab->chip . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <label class="control-label"> <?php echo lang('address'); ?> </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $lab->patient_address . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <label class="control-label"><?php echo lang('phone'); ?>  </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->phone . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>


                            </div>

                            <div class="col-md-6 pull-right" style="text-align: left;">

                                <div class="col-md-12 row details" style="">
                                    <p>
                                        <label class="control-label"><?php echo lang('lab'); ?> <?php echo lang('report'); ?> <?php echo lang('id'); ?>  </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($lab->id)) {
                                                echo $lab->id;
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>


                                <div class="col-md-12 row details">
                                    <p>
                                        <label class="control-label"><?php echo lang('date'); ?>  </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($lab->date)) {
                                                echo date('d-m-Y', $lab->date) . ' <br>';
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-12 row details">
                                    <p>
                                        <label class="control-label"><?php echo lang('doctor'); ?>  </label>
                                        <span style="text-transform: uppercase;"> : 
                                            <?php
                                            if (!empty($lab->doctor)) {
                                                echo $lab->doctor. ' <br>';

                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div> 

                <!-- Report here -->
                    <div class="col-md-12 panel-body">
                        <br>
                        <h4 style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
                            <?php echo lang('lab') ?> <?php echo lang('lab_report') ?>
                            <hr style="border-bottom: 1px solid #000; ">
                        </h4>

                        <?php
                        if (!empty($lab->report)) {
                            echo $lab->report;
                        }
                        ?>
                    </div>
                    
                    <!--

                    <table class="table table-striped table-hover">
                        <thead class="theadd">
                            <tr>
                                <th><?php echo lang('test_name'); ?></th>
                                <th><?php echo lang('result'); ?></th>
                                <th><?php echo lang('reference_value'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($lab->category_name)) {
                                $category_name = $lab->category_name;
                                $category_name1 = explode(',', $category_name);
                                if (empty($lab->x_ray)) {
                                    $i = 0;
                                }
                                foreach ($category_name1 as $category_name2) {
                                    $category_name3 = explode('*', $category_name2);
                                    ?>                
                                    <tr>
                                        <td><?php echo $this->lab_model->getLabCategoryById($category_name3[0])->category; ?> </td>
                                        <td class=""> <?php echo $category_name3[1]; ?> </td>
                                        <td><?php echo $this->lab_model->getLabCategoryById($category_name3[0])->reference_value; ?> </td>
                                    </tr> 
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    -->
                </div>
            </div>








            <div class="panel col-md-5 no-print" style="margin-top: 20px;">
                <div class="text-center invoice-btn col-md-12 row">
                    <a class="btn btn-info btn-lg invoice_button pull-left" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                    <!--
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                             <a href="lab/editLab?id=<?php echo $lab->id; ?>" class="btn btn-info btn-lg invoice_button pull-left"><i class="fa fa-edit"></i> Edit Invoice </a>
<?php } ?>
                    -->

                </div>


                <div class="no-print">


                    <a href="<?php echo site_url();?>lab/addLabView" class="pull-left">
                        <div class="btn-group">
                            <button id="" class="btn green">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_a_new_report'); ?>
                            </button>
                        </div>
                    </a>
                </div>

            </div>











        </section>
        <!-- invoice end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
                           $(document).ready(function () {
                               $(".flashmessage").delay(3000).fadeOut(100);
                           });
</script>
