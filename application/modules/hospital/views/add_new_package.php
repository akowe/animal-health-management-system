
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($package->id)) {
                    echo '<i class="fa fa-edit"></i> ' . lang('edit_package');
                } else {
                    echo '<i class="fa fa-plus-circle"></i> ' . lang('add_new_package');
                }
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <?php echo validation_errors(); ?>
                                            <?php echo $this->session->flashdata('feedback'); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="<?php echo site_url(); ?>hospital/package/addNew" method="post" enctype="multipart/form-data">
                                        <div class="form-group">


                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($package->name)) {
                                                echo $package->name;
                                            }
                                            ?>' placeholder="">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="p_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($package->p_limit)) {
                                                echo $package->p_limit;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></label>
                                            <input type="text" class="form-control" name="d_limit" id="exampleInputEmail1" value='<?php
                                            if (!empty($package->d_limit)) {
                                                echo $package->d_limit;
                                            }
                                            ?>' placeholder="">
                                        </div>



                                        <div class="form-group"> 
                                            <label for="exampleInputEmail1"> <?php echo lang('module_permission'); ?></label>
                                            <br>
                                            <input type='checkbox' value = "accountant" name="module[]"

                                                   <?php
                                                   if (!empty($package->id)) {
                                                       $modules = $this->package_model->getPackageById($package->id)->module;
                                                       $modules1 = explode(',', $modules);
                                                       if (in_array('accountant', $modules1)) {
                                                           echo 'checked';
                                                       }
                                                   } else {
                                                       echo 'checked';
                                                   }
                                                   ?>
                                                   > <?php echo lang('accountant'); ?>

                                            <br>
                                            <input type='checkbox' value = "appointment" name="module[]"  <?php
                                            if (!empty($package->id)) {
                                                if (in_array('appointment', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('appointment'); ?>
                                            <br>
                                            <input type='checkbox' value = "lab" name="module[]"  <?php
                                            if (!empty($package->id)) {
                                                if (in_array('lab', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('lab_tests'); ?>
                                            <br>
                                            <input type='checkbox' value = "bed" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('bed', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('bed'); ?>

                                            <br>
                                            <input type='checkbox' value = "department" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('department', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('department'); ?>

                                            <br>
                                            <input type='checkbox' value = "doctor" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('doctor', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> Farm

                                            <br>
                                            <input type='checkbox' value = "farm" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('farm', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('doctor'); ?>



                                            <br>
                                            <input type='checkbox' value = "donor" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('donor', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('donor'); ?>

                                            <br>
                                            <input type='checkbox' value = "finance" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('finance', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('financial_activities'); ?>

                                            <br>
                                            <input type='checkbox' value = "pharmacy" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('pharmacy', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('pharmacy'); ?>

                                            <br>
                                            <input type='checkbox' value = "laboratorist" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('laboratorist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('laboratorist'); ?>

                                            <br>
                                            <input type='checkbox' value = "medicine" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('medicine', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('medicine'); ?>

                                            <br>
                                            <input type='checkbox' value = "nurse" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('nurse', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('nurse'); ?>

                                            <br>
                                            <input type='checkbox' value = "patient" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('patient', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?> required=""> <?php echo lang('patient'); ?>

                                            <br>
                                            <input type='checkbox' value = "pharmacist" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('pharmacist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('pharmacist'); ?>

                                            <br>
                                            <input type='checkbox' value = "prescription" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('prescription', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('prescription'); ?>

                                            <br>
                                            <input type='checkbox' value = "receptionist" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('receptionist', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('receptionist'); ?>

                                            <br>
                                            <input type='checkbox' value = "report" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('report', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('report'); ?>

                                            <br>
                                            <input type='checkbox' value = "sms" name="module[]" <?php
                                            if (!empty($package->id)) {
                                                if (in_array('sms', $modules1)) {
                                                    echo 'checked';
                                                }
                                            } else {
                                                echo 'checked';
                                            }
                                            ?>> <?php echo lang('sms'); ?>




                                        </div>


                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($package->id)) {
                                            echo $package->id;
                                        }
                                        ?>'>

                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                    </form>

                                </div>
                            </section>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
