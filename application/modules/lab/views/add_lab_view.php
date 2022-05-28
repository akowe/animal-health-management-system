<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php
                if (!empty($lab->id))
                    echo '<i class="fa fa-edit"></i> ' . lang('edit_lab_report');
                else
                    echo '<i class="fa fa-plus-circle"></i> ' . lang('add_lab_report');
                ?>
            </header>
            <div class="">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <!--  <div class="col-lg-12"> -->
                        <div class="">
                           <!--   <section class="panel"> -->
                            <section class="">
                                <!--   <div class="panel-body"> -->
                                <div class="">
                                    <style> 
                                        .lab{
                                            padding-top:
                                            padding-bottom: 20px;
                                            border: none;

                                        }
                                        .pad_bot{
                                            padding-bottom: 5px;
                                        }  

                                        form{
                                            background: #f1f1f1;
                                            padding: 21px;
                                        }

                                        .modal-body form{
                                            background: #fff;
                                            padding: 21px;
                                        }

                                        .remove{
                                            float: right;
                                            margin-top: -45px;
                                            margin-right: 42%;
                                            margin-bottom: 41px;
                                            width: 94px;
                                            height: 29px;
                                        }

                                        .remove1 span{
                                            width: 33%;
                                            height: 50px !important;
                                            padding: 10px

                                        }

                                        .qfloww {
                                            padding: 10px 0px;
                                            height: 370px;
                                            background: #f1f2f9;
                                            overflow: auto;
                                        }

                                        .remove1 {
                                            background: #5A9599;
                                            color: #fff;
                                            padding: 5px;
                                        }


                                        .span2{
                                            padding: 6px 12px;
                                            font-size: 14px;
                                            font-weight: 400;
                                            line-height: 1;
                                            color: #555;
                                            text-align: center;
                                            background-color: #eee;
                                            border: 1px solid #ccc
                                        }

                                    </style>

                                    <form role="form"   action="<?php echo site_url() . 'lab/addLab';?>" method="post" enctype="multipart/form-data">

                                        <div class="col-md-6">
                                            <!--
                                            <div class="pull-right">
                                                <a data-toggle="modal" href="#myModal">
                                                    <div class="btn-group">
                                                        <button id="" class="btn green">
                                                            <i class="fa fa-plus-circle"></i> <?php echo lang('register_new_patient'); ?>
                                                        </button>
                                                    </div>
                                                </a>
                                            </div>
                                            -->

                                            <div class="col-md-8 lab pad_bot">
                                                <div class="col-md-3 lab_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                                </div>
                                                <div class="col-md-9"> 
                                                    <input type="text" class="form-control pay_in default-date-picker" name="date" value='<?php
                                                    if (!empty($lab->date)) {
                                                        echo date('d-m-Y', $lab->date);
                                                    } else {
                                                        echo date('d-m-Y');
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-8 lab pad_bot">
                                                <div class="col-md-3 lab_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('farm'); ?></label>
                                                </div>
                                                <div class="col-md-9"> 
                                                    <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="patient" value=''> 
                                                        <option value="">Select .....</option>
                                                        <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>
                                                        <?php foreach ($patients as $patient) { ?>
                                                            <option value="<?php echo $patient->id; ?>" <?php
                                                            if (!empty($lab->patient)) {
                                                                if ($lab->patient == $patient->id) {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> ><?php echo $patient->name; ?> </option>
                                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div> 

                                            <div class="col-md-8 panel"> 
                                            </div>

                                            <div class="pos_client">
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                                        if (!empty($lab->p_name)) {
                                                            echo $lab->p_name;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                                        if (!empty($lab->p_email)) {
                                                            echo $lab->p_email;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                                        if (!empty($lab->p_phone)) {
                                                            echo $lab->p_phone;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                                        if (!empty($lab->p_age)) {
                                                            echo $lab->p_age;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div> 
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <select class="form-control m-bot15" name="p_gender" value=''>

                                                            <option value="Male" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Male') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Male </option>   
                                                            <option value="Female" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Female') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Female </option>
                                                            <option value="Others" <?php
                                                            if (!empty($patient->sex)) {
                                                                if ($patient->sex == 'Others') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?> > Others </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 lab pad_bot">
                                                <div class="col-md-3 lab_label">
                                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="doctor" id="exampleInputEmail1" value=" <?php echo $this->ion_auth->user()->row()->username; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-8 lab pad_bot">
                                                <div class="col-md-3 lab_label">
                                                    <label for="exampleInputEmail1">Animal Identification Number</label>
                                                </div>

                                                <div class="col-md-9">

                                                <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="chip" value=''>
                                                    <option value="">Select .....</option>

                                                    <?php foreach ($patients as $patient) { ?>
                                                        <option value="<?php echo $patient->chip; ?>" <?php
                                                        if (!empty($payment->patient)) {
                                                            if ($payment->patient == $patient->id) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> ><?php echo $patient->chip; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="pos_doctor">
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_name" value='<?php
                                                        if (!empty($lab->p_name)) {
                                                            echo $lab->p_name;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_email" value='<?php
                                                        if (!empty($lab->p_email)) {
                                                            echo $lab->p_email;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 lab pad_bot">
                                                    <div class="col-md-3 lab_label"> 
                                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                        <input type="text" class="form-control pay_in" name="d_phone" value='<?php
                                                        if (!empty($lab->p_phone)) {
                                                            echo $lab->p_phone;
                                                        }
                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 panel">
                                            </div>



                                        </div>


                                        <div class="col-md-12 lab pad_bot">
                                            <div class="col-md-1"> 
                                                <label for="exampleInputEmail1"> <?php echo lang('report'); ?></label>
                                            </div>
                                            <div class="col-md-10"> 
                                                <textarea class="ckeditor form-control" name="report" value="" rows="10"><?php
                                                    if (!empty($setval)) {
                                                        echo set_value('report');
                                                    }
                                                    if (!empty($lab->report)) {
                                                        echo $lab->report;
                                                    }
                                                    ?>
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4 panel-body">

                                            <div class="col-md-12 lab">
                                                <div class="col-md-12">
                                                    <div class="col-md-3"> 
                                                    </div>  
                                                    <div class="col-md-6"> 
                                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                                    </div>
                                                    <div class="col-md-3"> 
                                                    </div> 
                                                </div>
                                            </div>


                                            <input type="hidden" name="id" value='<?php
                                            if (!empty($lab->id)) {
                                                echo $lab->id;
                                            }
                                            ?>'>
                                            <div class="row">
                                            </div>
                                            <div class="form-group">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>



<script>
    $(document).ready(function () {
        var tot = 0;
        $(".ms-selected").click(function () {
            var id = $(this).data('idd');
            $('#id-div' + id).remove();
            $('#idinput-' + id).remove();
            $('#mediidinput-' + id).remove();

        });
        $.each($('select.multi-select option:selected'), function () {
            var id = $(this).data('idd');
            if ($('#idinput-' + id).length)
            {

            } else {
                if ($('#id-div' + id).length)
                {

                } else {

                    $("#editLabForm .qfloww").append('<div class="remove1 col-md-12" id="id-div' + id + '"> <span class="col-md-3 span1">  ' + $(this).data("cat_name") + '</span><span class="col-md-4 span2">Value: </span><span class="col-md-4 span3">Reference Value:<br> ' + $(this).data('id') + '</span></div>')
                }
                var input2 = $('<input>').attr({
                    type: 'text',
                    class: "remove col-md-3",
                    id: 'idinput-' + id,
                    name: 'valuee[]',
                    value: '1',
                }).appendTo('#editLabForm .qfloww');

                $('<input>').attr({
                    type: 'hidden',
                    class: "remove",
                    id: 'mediidinput-' + id,
                    name: 'lab_test_id[]',
                    value: id,
                }).appendTo('#editLabForm .qfloww');
            }


        });
    });


</script>



<script>
    $(document).ready(function () {
        $('.multi-select').change(function () {
            var tot = 0;
            $(".ms-selected").click(function () {
                var id = $(this).data('idd');
                $('#id-div' + id).remove();
                $('#idinput-' + id).remove();
                $('#mediidinput-' + id).remove();

            });
            $.each($('select.multi-select option:selected'), function () {
                var id = $(this).data('idd');
                if ($('#idinput-' + id).length)
                {

                } else {
                    if ($('#id-div' + id).length)
                    {

                    } else {

                        $("#editLabForm .qfloww").append('<div class="remove1 col-md-12" id="id-div' + id + '"> <span class="col-md-3 span1">  ' + $(this).data("cat_name") + '</span><span class="col-md-4 span2">Value: </span><span class="col-md-4 span3">Reference Value:<br> ' + $(this).data('id') + '</span></div>')
                    }
                    var input2 = $('<input>').attr({
                        type: 'text',
                        class: "remove col-md-3",
                        id: 'idinput-' + id,
                        name: 'valuee[]',
                        value: '1',
                    }).appendTo('#editLabForm .qfloww');

                    $('<input>').attr({
                        type: 'hidden',
                        class: "remove",
                        id: 'mediidinput-' + id,
                        name: 'lab_test_id[]',
                        value: id,
                    }).appendTo('#editLabForm .qfloww');
                }


            });

        });
    });


</script>







<!-- Add Patient Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Patient Registration</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNew?redirect=lab" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->



<script>
    $(document).ready(function () {
        $('.pos_client').hide();
        $(document.body).on('change', '#pos_select', function () {

            var v = $("select.pos_select option:selected").val()
            if (v == 'add_new') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });


</script>

<script>
    $(document).ready(function () {
        $('.pos_doctor').hide();
        $(document.body).on('change', '#add_doctor', function () {

            var v = $("select.add_doctor option:selected").val()
            if (v == 'add_new') {
                $('.pos_doctor').show();
            } else {
                $('.pos_doctor').hide();
            }
        });

    });


</script>