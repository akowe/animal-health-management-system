<!--sidebar end-->
<style>
    .myDiv{
        display:none;
        padding:10px;
    }
    #showOne{
        border:1px solid red;
    }
    #showTwo{
        border:1px solid green;
    }
    #showThree{
        border:1px solid blue;
    }
    </style>
    <!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <header class="panel-heading">
            <?php
                echo '<i class="fa fa-plus-circle"></i>  CLICK A PROJECT' ;
            ?>
        </header>
<br>
            <div class="row">
                <div class="col-md-3 " >
                    <div class="copen  btn btn-success" data-c="c0" style="width: 100%; height: 45px; padding: 10px 10px;">HOINA RURAL</div>

                </div>

                <div class="col-md-3 " >
                    <div class="copen  btn btn-danger" data-c="c1" style="width: 100%; height: 45px; padding: 10px 10px;">HOINA URBAN</div>

                </div>

                <div class="col-md-3" >
                    <div class="copen btn btn-info" data-c="c2" style="width: 100%; height: 45px; padding: 10px 10px;">SEBI</div>
                </div>

                <div class="col-md-3" >
                    <div class="copen btn btn-warning" data-c="c3" style="width: 100%; height: 45px; padding: 10px 10px;">ALDDN</div>
                </div>

            </div>
        <br><br>


        <section class="panel">

           <!--Hoina rural-->
            <div class="col-md-2"></div>
            <div class="panel-body col-md-8 c"  id="c0" style="display:none">
                <header class="panel-heading">
                    <?php
                    if (!empty($patient->id))
                        echo '<i class="fa fa-edit"></i> ' . lang('edit_patient');
                    else
                        echo '<i class="fa fa-plus-circle"></i>  New Hoina Rural Patient' ;
                    ?>
                </header>

                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <form role="form" action="<?php echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                                    <input type="text" class="form-control" name="doctor" id="exampleInputEmail1" value=" <?php echo $this->ion_auth->user()->row()->username; ?>" readonly style="background-color: #a0a0a0 !important; color:#000000;">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's Email</label>
                                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's <?php echo lang('phone'); ?></label>
                                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">

                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('address'); ?></label>
                                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                                                </div>


                                                <div class="form-group " id="hoina" >
                                                    <label for="exampleInputEmail1">Chip Number</label>

                                                    <input type="text" name="chip" class="form-control" id="chip" placeholder="Select Chip Number" >
                                                    <select class="form-control" style="width:500px" name="itemName">

                                                    </select>
<!--                                                    <select class="form-control m-bot15" name="chip" >-->
<!--                                                        <option>Select chip number</option>-->
<!--                                                        --><?php //foreach ($r->result() as $row) {?>
<!--                                                            <option class="form-control"  value="--><?php //echo $row->chip;?><!--"-->
<!---->
<!--                                                            >--><?php //echo $row->chip;?><!--</option>-->
<!--                                                        --><?php //} ?>
<!---->
<!--                                                    </select>-->

                                                </div>
                                                <br><br>


                                            </div><!--col-6-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Project</label>
                                                    <input type="text" class="form-control" name="" id="exampleInputEmail1" value="Hoina Rural" placeholder="" readonly style="background-color: #a0a0a0 !important; color:#000000;">
                                                    <input type="hidden" class="form-control" name="project" id="exampleInputEmail1" value="Hoina_Rural" placeholder="" readonly style="background-color: #a0a0a0 !important; color:#000000;">

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                                    <select class="form-control m-bot15" name="sex" value=''>
                                                        <option value="Male" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Male </option>
                                                        <option value="Female" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Female </option>
                                                        <option value="Others" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Others </option>
                                                    </select>
                                                </div>


                                                <!--                                                <div class="form-group">-->
                                                <!--                                                    <label for="exampleInputEmail1">Blood Group</label>-->
                                                <!--                                                    <select class="form-control m-bot15" name="bloodgroup" value=''>-->
                                                <!--                                                        --><?php //foreach ($groups as $group) { ?>
                                                <!--                                                            <option value="--><?php //echo $group->group; ?><!--" --><?php
                                                //                                                            if (!empty($setval)) {
                                                //                                                                if ($group->group == set_value('bloodgroup')) {
                                                //                                                                    echo 'selected';
                                                //                                                                }
                                                //                                                            }
                                                //                                                            if (!empty($patient->bloodgroup)) {
                                                //                                                                if ($group->group == $patient->bloodgroup) {
                                                //                                                                    echo 'selected';
                                                //                                                                }
                                                //                                                            }
                                                //                                                            ?><!-- > --><?php //echo $group->group; ?><!-- </option>-->
                                                <!--                                                        --><?php //} ?>
                                                <!--                                                    </select>-->
                                                <!--                                                </div>-->

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->color)) {
                                                        echo $patient->color;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Breed</label>
                                                    <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->breed)) {
                                                        echo $patient->breed;
                                                    }
                                                    ?>' placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('birthdate');
                                                    }
                                                    if (!empty($patient->birthdate)) {
                                                        echo $patient->birthdate;
                                                    }
                                                    ?>" placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                                    <?php echo form_open_multipart('patient/do_upload');?>
                                                    <input type="file" name="img_url">
                                                </div>

                                                <!--                                                --><?php //if (empty($id)) { ?>
                                                <!---->
                                                <!--                                                    <div class="form-group" style="background-color: transparent;">-->
                                                <!--                                                        <div class="payment_label">-->
                                                <!--                                                        </div>-->
                                                <!--                                                        <div class="">-->
                                                <!--                                                            <input type="checkbox" name="sms" value="sms"> --><?php //echo lang('send_sms') ?><!--<br>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!---->
                                                <!--                                                --><?php //} ?>

                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($patient->id)) {
                                                    echo $patient->id;
                                                }
                                                ?>'>
                                                <input type="hidden" name="p_id" value='<?php
                                                if (!empty($patient->patient_id)) {
                                                    echo $patient->patient_id;
                                                }
                                                ?>'>
                                            </div><!--col-6-->
                                        </div><!--row in form-->

                                        <section class="">
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!--Hoina rural end-->

            <!--Hoina Urban-->
            <div class="panel-body col-md-8 c"  id="c1" style="display:none">

                <header class="panel-heading">
                    <?php
                    if (!empty($patient->id))
                        echo '<i class="fa fa-edit"></i> ' . lang('edit_patient');
                    else
                        echo '<i class="fa fa-plus-circle"></i>  New Hoina Patient' ;
                    ?>
                </header>

                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <form role="form" action="<?php echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                                    <input type="text" class="form-control" name="doctor" id="exampleInputEmail1" value=" <?php echo $this->ion_auth->user()->row()->username; ?>" readonly style="background-color: #a0a0a0 !important; color:#000000;">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('name'); ?></label>
                                                    <!--                                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='--><?php
                                                    //                                                    if (!empty($setval)) {
                                                    //                                                        echo set_value('name');
                                                    //                                                    }
                                                    //                                                    if (!empty($patient->name)) {
                                                    //                                                        echo $patient->name;
                                                    //                                                    }
                                                    //                                                    ?><!--' placeholder="">-->

                                                    <select class="form-control m-bot15" name="name" >
                                                        <option>Farm Name</option>
                                                        <?php foreach ($f->result() as $row) {?>
                                                            <option class="form-control"  value="<?php echo $row->name;?>"

                                                            ><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's Email</label>
                                                    <!--                                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='--><?php
                                                    //                                                    if (!empty($patient->email)) {
                                                    //                                                        echo $patient->email;
                                                    //                                                    }
                                                    //                                                    ?><!--' placeholder="">-->
                                                    <select class="form-control m-bot15" name="email" >
                                                        <option>Select</option>
                                                        <?php foreach ($f->result() as $row) {?>
                                                            <option class="form-control"  value="<?php echo $row->email;?>"

                                                            ><?php echo $row->email;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's <?php echo lang('phone'); ?></label>
                                                    <!--                                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='--><?php
                                                    //                                                    if (!empty($setval)) {
                                                    //                                                        echo set_value('phone');
                                                    //                                                    }
                                                    //                                                    if (!empty($patient->phone)) {
                                                    //                                                        echo $patient->phone;
                                                    //                                                    }
                                                    //                                                    ?><!--' placeholder="">-->

                                                    <select class="form-control m-bot15" name="phone" >
                                                        <option>Select</option>
                                                        <?php foreach ($f->result() as $row) {?>
                                                            <option class="form-control"  value="<?php echo $row->phone;?>"

                                                            ><?php echo $row->phone;?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('address'); ?></label>
                                                    <!--                                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='--><?php
                                                    //                                                    if (!empty($setval)) {
                                                    //                                                        echo set_value('address');
                                                    //                                                    }
                                                    //                                                    if (!empty($patient->address)) {
                                                    //                                                        echo $patient->address;
                                                    //                                                    }
                                                    //                                                    ?><!--' placeholder="">-->
                                                    <select class="form-control m-bot15" name="phone" >
                                                        <option>Select</option>
                                                        <?php foreach ($f->result() as $row) {?>
                                                            <option class="form-control"  value="<?php echo $row->location;?>"

                                                            ><?php echo $row->location;?></option>
                                                        <?php } ?>
                                                    </select>


                                                </div>


                                                <div class="form-group " id="hoina" >
                                                    <label for="exampleInputEmail1">Chip Number</label>
                                                    <select class="form-control m-bot15" name="chip" >
                                                        <option>Select chip number</option>
                                                        <?php foreach ($u->result() as $row) {?>
                                                            <option class="form-control"  value="<?php echo $row->chip;?>"

                                                            ><?php echo $row->chip;?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>

                                            </div><!--col-6-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Project</label>
                                                    <input type="text" class="form-control" name="" id="exampleInputEmail1" value="Hoina Urban" placeholder="" readonly style="background-color: #a0a0a0 !important; color:#000000;">
                                                    <input type="hidden" class="form-control" name="project" id="exampleInputEmail1" value="Hoina_Urban" placeholder="" readonly style="background-color: #a0a0a0 !important; color:#000000;">

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                                    <select class="form-control m-bot15" name="sex" value=''>
                                                        <option value="Male" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Male </option>
                                                        <option value="Female" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Female </option>
                                                        <option value="Others" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Others </option>
                                                    </select>
                                                </div>


<!--                                                <div class="form-group">-->
<!--                                                    <label for="exampleInputEmail1">Blood Group</label>-->
<!--                                                    <select class="form-control m-bot15" name="bloodgroup" value=''>-->
<!--                                                        --><?php //foreach ($groups as $group) { ?>
<!--                                                            <option value="--><?php //echo $group->group; ?><!--" --><?php
//                                                            if (!empty($setval)) {
//                                                                if ($group->group == set_value('bloodgroup')) {
//                                                                    echo 'selected';
//                                                                }
//                                                            }
//                                                            if (!empty($patient->bloodgroup)) {
//                                                                if ($group->group == $patient->bloodgroup) {
//                                                                    echo 'selected';
//                                                                }
//                                                            }
//                                                            ?><!-- > --><?php //echo $group->group; ?><!-- </option>-->
<!--                                                        --><?php //} ?>
<!--                                                    </select>-->
<!--                                                </div>-->

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->color)) {
                                                        echo $patient->color;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Breed</label>
                                                    <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->breed)) {
                                                        echo $patient->breed;
                                                    }
                                                    ?>' placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('birthdate');
                                                    }
                                                    if (!empty($patient->birthdate)) {
                                                        echo $patient->birthdate;
                                                    }
                                                    ?>" placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                                    <?php echo form_open_multipart('patient/do_upload');?>
                                                    <input type="file" name="img_url">
                                                </div>

<!--                                                --><?php //if (empty($id)) { ?>
<!---->
<!--                                                    <div class="form-group" style="background-color: transparent;">-->
<!--                                                        <div class="payment_label">-->
<!--                                                        </div>-->
<!--                                                        <div class="">-->
<!--                                                            <input type="checkbox" name="sms" value="sms"> --><?php //echo lang('send_sms') ?><!--<br>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!--                                                --><?php //} ?>

                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($patient->id)) {
                                                    echo $patient->id;
                                                }
                                                ?>'>
                                                <input type="hidden" name="p_id" value='<?php
                                                if (!empty($patient->patient_id)) {
                                                    echo $patient->patient_id;
                                                }
                                                ?>'>
                                            </div><!--col-6-->
                                        </div><!--row in form-->

                                        <section class="">
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

            <!--SEBI FORM-->
            <div class="panel-body col-md-8 c"  id="c2" style="display:none">
                <header class="panel-heading">
                    <?php
                    if (!empty($patient->id))
                        echo '<i class="fa fa-edit"></i> ' . lang('edit_patient');
                    else
                        echo '<i class="fa fa-plus-circle"></i>  New Sebi Patient' ;
                    ?>
                </header>
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <form role="form" action="<?php echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                                    <input type="text" class="form-control" name="doctor" id="exampleInputEmail1" value=" <?php echo $this->ion_auth->user()->row()->username; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('address');
                                                    }
                                                    if (!empty($patient->address)) {
                                                        echo $patient->address;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <label for="exampleInputEmail1">Project</label>
                                                <select class="form-control m-bot15"  id="hoinaGroup" name="project">
                                                    <option value="Sebi">SEBI</option>
                                                </select>


                                                <div class="form-group" id="sebi" >
                                                    <label for="exampleInputEmail1">Chip Number</label>
                                                    <input type="text" name="chip" placeholder="Enter chip" class="form-control">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Breed</label>
                                                    <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->breed)) {
                                                        echo $patient->breed;
                                                    }
                                                    ?>' placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('birthdate');
                                                    }
                                                    if (!empty($patient->birthdate)) {
                                                        echo $patient->birthdate;
                                                    }
                                                    ?>" placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                                    <?php echo form_open_multipart('patient/do_upload');?>
                                                    <input type="file" name="img_url">
                                                </div>

                                                <?php if (empty($id)) { ?>

                                                    <div class="form-group" style="background-color: transparent;">
                                                        <div class="payment_label">
                                                        </div>
                                                        <div class="">
                                                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($patient->id)) {
                                                    echo $patient->id;
                                                }
                                                ?>'>
                                                <input type="hidden" name="p_id" value='<?php
                                                if (!empty($patient->patient_id)) {
                                                    echo $patient->patient_id;
                                                }
                                                ?>'>

                                            </div><!--col-6-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('name');
                                                    }
                                                    if (!empty($patient->name)) {
                                                        echo $patient->name;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('phone');
                                                    }
                                                    if (!empty($patient->phone)) {
                                                        echo $patient->phone;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's Email</label>
                                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->email)) {
                                                        echo $patient->email;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                                    <select class="form-control m-bot15" name="sex" value=''>
                                                        <option value="Male" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Male </option>
                                                        <option value="Female" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Female </option>
                                                        <option value="Others" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Others </option>
                                                    </select>
                                                </div>


                                                <!--  <div class="form-group">-->
                                                <!--  <label for="exampleInputEmail1">Blood Group</label>-->
                                                <!--  <select class="form-control m-bot15" name="bloodgroup" value=''>-->
                                                <!--  --><?php //foreach ($groups as $group) { ?>
                                                <!--   <option value="--><?php //echo $group->group; ?><!--" --><?php
                                                //    if (!empty($setval)) {
                                                //    if ($group->group == set_value('bloodgroup')) {
                                                //    echo 'selected';
                                                //    }
                                                //   }
                                                //   if (!empty($patient->bloodgroup)) {
                                                //   if ($group->group == $patient->bloodgroup) {
                                                //   echo 'selected';
                                                //   }
                                                //   }
                                                //    ?><!-- > --><?php //echo $group->group; ?><!-- </option>-->
                                                <!--   --><?php //} ?>
                                                <!--    </select>-->
                                                <!--     </div>-->

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->color)) {
                                                        echo $patient->color;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                            </div><!--col-6-->

                                        </div><!--row in form-->

                                        <section class="">
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEBI FORM-->

            <!--ALLDN FORM--->
            <div class="panel-body col-md-8 c"  id="c3" style="display:none">
                <header class="panel-heading">
                    <?php
                    if (!empty($patient->id))
                        echo '<i class="fa fa-edit"></i> ' . lang('edit_patient');
                    else
                        echo '<i class="fa fa-plus-circle"></i>  New Alddn Patient' ;
                    ?>
                </header>
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">

                                    <form role="form" action="<?php echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                                    <input type="text" class="form-control" name="doctor" id="exampleInputEmail1" value=" <?php echo $this->ion_auth->user()->row()->username; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('address');
                                                    }
                                                    if (!empty($patient->address)) {
                                                        echo $patient->address;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <label for="exampleInputEmail1">Project</label>
                                                <select class="form-control m-bot15"  id="hoinaGroup" name="project">
                                                    <option value="Alddn" >ALDDN</option>
                                                </select>

                                                <div class="form-group" id="alldn" >
                                                    <label for="exampleInputEmail1">Chip Number</label>
                                                    <input type="text" name="chip" placeholder="Enter chip" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Breed</label>
                                                    <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->breed)) {
                                                        echo $patient->breed;
                                                    }
                                                    ?>' placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('birthdate');
                                                    }
                                                    if (!empty($patient->birthdate)) {
                                                        echo $patient->birthdate;
                                                    }
                                                    ?>" placeholder="">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                                    <?php echo form_open_multipart('patient/do_upload');?>
                                                    <input type="file" name="img_url">
                                                </div>

                                                <?php if (empty($id)) { ?>

                                                    <div class="form-group" style="background-color: transparent;">
                                                        <div class="payment_label">
                                                        </div>
                                                        <div class="">
                                                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                                <input type="hidden" name="id" value='<?php
                                                if (!empty($patient->id)) {
                                                    echo $patient->id;
                                                }
                                                ?>'>
                                                <input type="hidden" name="p_id" value='<?php
                                                if (!empty($patient->patient_id)) {
                                                    echo $patient->patient_id;
                                                }
                                                ?>'>

                                            </div><!--col-6-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farm <?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('name');
                                                    }
                                                    if (!empty($patient->name)) {
                                                        echo $patient->name;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('phone');
                                                    }
                                                    if (!empty($patient->phone)) {
                                                        echo $patient->phone;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Farmer's Email</label>
                                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->email)) {
                                                        echo $patient->email;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                                    <select class="form-control m-bot15" name="sex" value=''>
                                                        <option value="Male" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Male </option>
                                                        <option value="Female" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Female </option>
                                                        <option value="Others" <?php
                                                        if (!empty($setval)) {
                                                            if (set_value('sex') == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Others') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> > Others </option>
                                                    </select>
                                                </div>


                                                <!--  <div class="form-group">-->
                                                <!--  <label for="exampleInputEmail1">Blood Group</label>-->
                                                <!--  <select class="form-control m-bot15" name="bloodgroup" value=''>-->
                                                <!--  --><?php //foreach ($groups as $group) { ?>
                                                <!--   <option value="--><?php //echo $group->group; ?><!--" --><?php
                                                //    if (!empty($setval)) {
                                                //    if ($group->group == set_value('bloodgroup')) {
                                                //    echo 'selected';
                                                //    }
                                                //   }
                                                //   if (!empty($patient->bloodgroup)) {
                                                //   if ($group->group == $patient->bloodgroup) {
                                                //   echo 'selected';
                                                //   }
                                                //   }
                                                //    ?><!-- > --><?php //echo $group->group; ?><!-- </option>-->
                                                <!--   --><?php //} ?>
                                                <!--    </select>-->
                                                <!--     </div>-->

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='<?php
                                                    if (!empty($patient->color)) {
                                                        echo $patient->color;
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                            </div><!--col-6-->
                                        </div><!--row in form-->

                                        <section class="">
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ALLDN FORM-->

            <div class="col-md-2"></div>
        </section>
        <!-- page end-->

    </section>
</section>
<!--main content end-->
<!--footer start-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script src="common/ajax/jquery-1.8.3.js"></script>
<script type="text/javascript">
    $(function () {
        $("#hoinaGroup").change(function () {
            // hoina rural
            if ($(this).val() == "Hoina_rural") {
                $("#hoina_rural").show();
            } else {
                $("#hoina_rural").hide();
            }

            //hoina urban
            if ($(this).val() == "Hoina") {
                $("#hoina").show();
            } else {
                $("#hoina").hide();
            }

            // sebi
            if ($(this).val() == "Sebi") {
                $("#sebi").show();
            } else {
                $("#sebi").hide();
            }

            // alldn
            if ($(this).val() == "Alldn") {
                $("#alldn").show();
            } else {
                $("#alldn").hide();
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $(".copen").click(function() {

            $(".c").hide();

            var cid = $(this).data("c");
            $("#"+cid).show();

        });

    });
</script>
