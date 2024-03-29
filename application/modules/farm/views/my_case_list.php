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
                </div>

                <div class="adv-table editable-table">
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th style="width: 10%"><?php echo lang('date'); ?></th>
                                <th style="width: 15%"><?php echo lang('patient'); ?></th>
                                <th style="width: 60%"><?php echo lang('case'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($medical_histories as $medical_history) { ?>
                                <?php $patient_info = $this->db->get_where('patient', array('id' => $medical_history->patient_id))->row(); ?>

                                <tr class="">

                                    <td>
                                        <?php
                                        echo $medical_history->id;
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if (!empty($patient_info)) {
                                            echo $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone;
                                        }
                                        ?>
                                    </td>
                                    <td><?php
                                        if (!empty($medical_history->description)) {
                                            echo $medical_history->description;
                                        }
                                        ?></td>

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
                <form role="form" action="<?php  echo site_url() . 'patient/addMedicalHistory';?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" name="patient_id" value=''>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option> 
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
                <form role="form" id="medical_historyEditForm" action="<?php Echo site_url() . 'patient/addMedicalHistory'; ?>" method="post" enctype="multipart/form-data">
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
            CKEDITOR.instances['editor'].setData(response.medical_history.description)

            $('.js-example-basic-single.patient').val(response.medical_history.patient_id).trigger('change');
    });
    });
    });</script>


<script>
    $(document).ready(function () {
        $('#editable-sample').DataTable({
            responsive: true,
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
                        columns: [0, 1, 2, 3, 4, 5],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

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
