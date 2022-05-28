<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-book"></i>  <?php echo lang('case'); ?> <?php echo lang('history'); ?> 
            </header> 
            <div class="panel-body"> 
                <div class="no-print">
                    <a class="btn green" data-toggle="modal" href="#myModal">
                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                    </a>
                    <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>
                </div>

                <div class="adv-table editable-table">
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="width: 10%"><?php echo lang('date'); ?></th>
                                <th style="width: 15%"><?php echo lang('farm'); ?></th>
                                <th  style="width: 15%">Project</th>
                                <th style="width: 60%"><?php echo lang('animal_identification'); ?></th>
                                <th style="width: 60%"><?php echo lang('case'); ?></th>



                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($medical_histories as $medical_history) { ?>
                            <?php $info = $this->db->get_where('medical_history', array('hospital_id' => $this->chip))->row(); ?>


                            <tr class="">

                                <td>
                                    <?php
                                    echo $medical_history->date;
                                    ?>
                                </td>

                                <td> <?php  echo $medical_history->patient_name;?></td>
                                <td> <?php  echo $medical_history->project;?></td>
                                <td>
                                    <?php
                                    echo $medical_history->chip;?>  </td>



                                <td>
                                    <?php
                                    echo $medical_history->description;
                                    ?>                              </td>




                                <!--  <td class="no-print">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Doctor'))) { ?>
                                <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"></i>  <?php echo lang('edit'); ?></button>

                            <?php } ?> --->

                               <!-- <td>    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <a class="btn btn-info btn-xs delete_button"  href="<?php  echo site_url();?>patient/delete?id=<?php echo $patient->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                                    <?php } ?></td> -->


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->






<!-- Add Department Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_medical_history'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="<?php echo site_url() . 'patient/addMedicalHistory' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('farm');?> </label>
                        <select class="form-control m-bot15 js-example-basic-single" name="patient_id" value=''>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option> 
                                    <?php } ?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Animal Identification Number</label>

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

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>



                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="redirect" value='patient/caseList'>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang('edit_medical_history'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="medical_historyEditForm" action="<?php echo site_url() . 'patient/addMedicalHistory' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single patient" name="patient_id" value=''>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($medical_history->patient_id)) {
                                    if ($patient->id == $medical_history->patient_id) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $patient->name; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>



                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="redirect" value='patient/caseList'>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>




<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".editbutton").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#myModal2').modal('show');
                                                $.ajax({
                                                    url: 'patient/editMedicalHistoryByJason?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).success(function (response) {
                                                    // Populate the form fields with the data returned from server
                                                    $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                                                    $('#medical_historyEditForm').find('[name="date"]').val(response.medical_history.date).end()
                                                    $('#medical_historyEditForm').find('[name="patient"]').val(response.medical_history.patient_id).end()

                                                    $('#medical_historyEditForm').find('[name="chip_history"]').val(response.medical_history.chip_history).end()
                                                    CKEDITOR.instances['editor'].setData(response.medical_history.description)
                                                    
                                                     $('.js-example-basic-single.patient').val(response.medical_history.patient_id).trigger('change');
                                                });
                                            });
                                        });
</script>


<script>

    $(document).ready(function () {
    $('#editable-sample').DataTable({
    responsive: true,
            //   dom: 'lfrBtip',

            //"processing": true,
            //"serverSide": true,
            //"searchable": true,
           // "ajax": {
           // url : "patient/getCaseList",
                    type : 'POST',
           // },
           // scroller: {
          //  loadingIndicator: true
           // },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1,2,3],
                    }
                },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, - 1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 10,
            "order": [[ 0, "desc" ]],
<?php if ($this->router->fetch_method() == 'sent') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>
<?php if ($this->router->fetch_method() == 'upcoming') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>

    "language": {
    "lengthMenu": "_MENU_ records per page",
    }


    });
    });
        

</script>


<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
