
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-money"></i>  <?php echo lang('lab_report'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix no-print">
                        <a href="<?php echo site_url(); ?>lab/addLabView">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_lab_report'); ?>
                                </button>
                            </div>
                        </a>
                        <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>     
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('report_id'); ?></th>
                                <th><?php echo lang('farm'); ?></th>
                                <th><?php echo lang('animal_identification'); ?></th>
                                <th><?php echo lang('report'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) { ?>
                                    <th class="option_th no-print"><?php echo lang('options'); ?></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }
                            .option_th{
                                width:18%;
                            }

                        </style>

                        <?php foreach ($labs as $lab) { ?>
                        <?php $lab_info = $this->db->get_where('patient', array('id' => $lab->name))->row(); ?>

                        <tr class="">

                            <td>
                                <?php
                                echo $lab->id;
                                ?>
                            </td>

                            <td>
                                <?php
                                echo $lab->patient_name;
                                ?>                              </td>

                            <td>
                                <?php
                                echo $lab->chip;
                                ?>                              </td>

                            <td>
                                <?php
                                echo $lab->report;
                                ?>                              </td>

                            <td>
                                <?php
                                echo $lab->doctor;
                                ?>                              </td>

                            <td>
                                <?php
                                echo $lab->date_string;
                                ?>                              </td>


                            <!--  <td class="no-print">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Doctor'))) { ?>
                                <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $lab->id; ?>"><i class="fa fa-edit"></i>  <?php echo lang('edit'); ?></button>

                            <?php } ?> --->

                            <td>
                                <a class="btn btn-xs invoicebutton" title="<?php echo lang('report'); ?>" style="color: #fff;" href="<?php  echo site_url();?>lab/invoice?id=<?php echo $lab->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('report'); ?></a>



                                <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                    <a class="btn btn-info btn-xs delete_button"  href="<?php  echo site_url();?>patient/delete?id=<?php echo $patient->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                                <?php } ?></td>


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



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
                            $(document).ready(function () {
                                $(".flashmessage").delay(3000).fadeOut(100);
                            });
</script>


<!--
<script>
    $(document).ready(function () {
        $('#editable-sample').DataTable({
            responsive: true,

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getLab",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },

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
                        columns: [0, 1, 2, 3],
                    }
                },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_ records per page",
            }


        });
    });
</script>
 -->