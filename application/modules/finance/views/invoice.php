<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- invoice start-->
        <section>

            <header class="panel-heading no-print">
                <i class="fa fa-money"></i>  <?php echo lang('invoice'); ?>
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
                <div class="panel-body canvas_div_pdf" style="font-size: 10px;" >
                    <div class="row invoice-list">

                        <div class="text-center corporate-id">
                             <img alt="" src="<?php echo $this->settings_model->getSettings()->logo; ?>" width="200" height="100">
                             <br><br>
                            <h6>
                                <?php echo $settings->address ?>
                            </h6>
                            <h6>
                                Tel: <?php echo $settings->phone ?>
                            </h6>

                            <h3 style="font-weight: bold; margin-top: 20px; ">
                                <?php echo $settings->title ?>
                            </h3>
                            <br>
                           
                            <h4 style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
                                <?php echo lang('payment') ?> <?php echo lang('invoice') ?>
                                <hr style="width: 200px; border-bottom: 1px solid #000; margin-top: 5px; margin-bottom: 5px;">
                            </h4>
                        </div>



                        <div class="col-md-12">
                            <div class="col-md-6 pull-left row" style="text-align: left;">
                                <div class="col-md-12 row  style="">
                                    <p>Bill to:</p>

                                        <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                                        <span style="text-transform: capitalize;">
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->name . '<br>';
                                            }
                                            ?>
                                        </span>

                                </div>
<!--                                <div class="col-md-12 row details" style="">-->
<!--                                    <p>-->
<!--                                        <label class="control-label">--><?php //echo lang('patient_id'); ?><!--  </label>-->
<!--                                        <span style="text-transform: uppercase;"> : -->
<!--                                            --><?php
//                                            if (!empty($patient_info)) {
//                                                echo $patient_info->id . ' <br>';
//                                            }
//                                            ?>
<!--                                        </span>-->
<!--                                    </p>-->
<!--                                </div>-->

                                 <div class="col-md-12 row " style="">
                                        <span style="text-transform: capitalize;">
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo 'Chip: ', $patient_info->chip . ' <br>';
                                            }
                                            ?>
                                        </span>

                                </div>

                                <div class="col-md-12 row " style="">
                                      <span style="text-transform: capitalize;">
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->address . ' <br>';
                                            }
                                            ?>
                                        </span>

                                </div>
                                <div class="col-md-12 row " style="">
                                         <span style="text-transform: capitalize;">
                                            <?php
                                            if (!empty($patient_info)) {
                                                echo $patient_info->phone . ' <br>';
                                            }
                                            ?>
                                        </span>

                                </div>


                            </div>

                            <div class="col-md-6 pull-right" style="text-align: left;">

                                <div class="col-md-12 " style="">
                                        <label class=""><?php echo lang('invoice'); ?>:  </label>
                                        <span style="text-transform: capitalize; font-weight: bold;">
                                            <?php
                                            if (!empty($payment->id)) {
                                                echo $payment->id;
                                            }
                                            ?>
                                        </span>

                                </div>


                                <div class="col-md-12">

                                        <label class=""><?php echo lang('date'); ?>  </label>
                                        <span style="text-transform: capitalize;"> :
                                            <?php
                                            if (!empty($payment->date)) {
                                                echo date('d-m-Y', $payment->date) . ' <br>';
                                            }
                                            ?>
                                        </span>

                                </div>

                                <div class="col-md-12">
                                    <p>
                                        <label class=""><?php echo lang('doctor'); ?>  </label>
                                        <span style="text-transform: capitalize;"> :
                                            <?php
                                            if (!empty($payment->doctor)) {
                                                $doc_details = $this->doctor_model->getDoctorById($payment->doctor);
                                                if (!empty($doc_details)) {
                                                    echo $doc_details->name . ' <br>';
                                                } else {
                                                    echo $payment->doctor . ' <br>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>



                            </div>

                        </div>




                        <br>

                    </div> 




                    <table class="table table-striped table-hover">

                        <thead class="theadd">
                            <tr>
                                <th>#</th>
                                <th><?php echo lang('description'); ?></th>
                                <th><?php echo lang('amount'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
<?php
if (!empty($payment->category_name)) {
    $category_name = $payment->category_name;
    $category_name1 = explode(',', $category_name);
    if (empty($payment->x_ray)) {
        $i = 0;
    }
    foreach ($category_name1 as $category_name2) {
        $category_name3 = explode('*', $category_name2);
        if ($category_name3[1] > 0) {
            ?>                
                                        <tr>
                                            <td><?php echo $i = $i + 1; ?></td>
                                            <td><?php echo $category_name3[0]; ?> </td>
                                            <td class=""><?php echo $settings->currency; ?> <?php echo $category_name3[1]; ?> </td>
                                        </tr> 
            <?php
        }
    }
}
?>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-4 invoice-block pull-right">
                            <ul class="unstyled amounts">
                                <li><strong><?php echo lang('sub_total'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $payment->amount; ?></li>
<?php if (!empty($payment->discount)) { ?>
                                    <li><strong><?php echo lang('discount'); ?></strong> <?php
                                    if ($discount_type == 'percentage') {
                                        echo '(%) : ';
                                    } else {
                                        echo ': ' . $settings->currency;
                                    }
                                    ?> <?php
                                        $discount = explode('*', $payment->discount);
                                        if (!empty($discount[1])) {
                                            echo $discount[0] . ' %  =  ' . $settings->currency . ' ' . $discount[1];
                                        } else {
                                            echo $discount[0];
                                        }
                                        ?></li>
                                    <?php } ?>
                                        <?php if (!empty($payment->vat)) { ?>
                                    <li><strong>VAT :</strong>   <?php
                                        if (!empty($payment->vat)) {
                                            echo $payment->vat;
                                        } else {
                                            echo '0';
                                        }
                                        ?> % = <?php echo $settings->currency . ' ' . $payment->flat_vat; ?></li>
                                    <?php } ?>
                                <li><strong><?php echo lang('grand_total'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $g = $payment->gross_total; ?></li>
                                <li><strong><?php echo lang('amount_received'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $r = $this->finance_model->getDepositAmountByPaymentId($payment->id); ?></li>
                                <li><strong><?php echo lang('amount_to_be_paid'); ?> : </strong><?php echo $settings->currency; ?> <?php echo $g - $r; ?></li>
                            </ul>
                        </div>
                    </div>





                </div>










            </div>








            <div class="panel col-md-5 no-print" style="margin-top: 20px;">

                <div class="text-center invoice-btn col-md-12 row">
                    <a class="btn btn-info btn-lg invoice_button pull-left" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
                      
                          <a class="btn btn-info btn-lg invoice_button pull-left" onclick="getPDF();"><i class="fa fa-down"></i>Download</a>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <a href="<?php echo site_url();?>finance/editPayment?id=<?php echo $payment->id; ?>" class="btn btn-info btn-lg invoice_button pull-left"><i class="fa fa-edit"></i> Edit Invoice </a>
                    <?php } ?>

                </div>

                <!--
                <form role="form" action="finance/amountReceived" method="post" enctype="multipart/form-data">
                    <div class="form-group"> 
                        <label for="exampleInputEmail1"></label>
                        Due Amount: <?php echo $settings->currency; ?>  <?php echo $payment->gross_total - $payment->amount_received; ?> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Deposit</label>
                        <input type="text" class="form-control" name="amount_received" id="exampleInputEmail1" value='<?php
                    if (!empty($category->description)) {
                        echo $category->description;
                    }
                    ?>' placeholder="<?php echo $settings->currency; ?> ">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $payment->id; ?>">

                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </form>
                -->
                <div class="no-print">


                    <a href="<?php echo site_url();?>finance/addPaymentView" class="pull-left">
                        <div class="btn-group">
                            <button id="" class="btn green">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_another_payment'); ?>
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



<script >
function getPDF(){
 
 var HTML_Width = $(".canvas_div_pdf").width();
 var HTML_Height = $(".canvas_div_pdf").height();
 var top_left_margin = 15;
 var PDF_Width = HTML_Width+(top_left_margin*2);
 var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
 var canvas_image_width = HTML_Width;
 var canvas_image_height = HTML_Height;
 
 var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
 
 
 html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
 canvas.getContext('2d');
 
 console.log(canvas.height+"  "+canvas.width);
 
 
 var imgData = canvas.toDataURL("image/jpeg", 1.0);
 var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
 
 
 for (var i = 1; i <= totalPDFPages; i++) { 
 pdf.addPage(PDF_Width, PDF_Height);
 pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
 }
 
     pdf.save("clinic_invoice.pdf");
        });
 };
</script>

    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>