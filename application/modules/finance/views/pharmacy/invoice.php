<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- invoice start-->
        <header class="panel-heading no-print">
            <i class="fa fa-money"></i>  <?php echo lang('invoice'); ?>
        </header>
        <section>
            <div class="panel panel-primary">
                <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                <br>
                <div class="panel-body col-md-5 panel-moree canvas_div_pdf" style="font-size: 10px; width: 60%;">
                    <div class="row invoice-list">

                        <div class="text-center corporate-id">
                            <img alt="" src="<?php echo $this->settings_model->getSettings()->logo; ?>" width="200" height="100">
                             <br><br>
                            <h5>
                                <?php echo $settings->title ?>
                            </h5>
                            <h6>
                                <?php echo $settings->address ?>
                            </h6>
                            <h6>
                                Tel: <?php echo $settings->phone ?>
                            </h6>
                        </div>

                        <div class="col-lg-4 col-sm-4">
                            <h4> <?php echo lang('payment_to'); ?> :</h4>
                            <p>
                                <?php echo $settings->title; ?> <br>
                                <?php echo $settings->address; ?><br>
                                Tel:  <?php echo $settings->phone; ?>
                            </p>
                        </div>
                        <?php if (!empty($payment->patient)) { ?>
                            <div class="col-lg-4 col-sm-4">
<!--                                <h4> --><?php //echo lang('bill_to'); ?><!-- :</h4>-->
                                <p>
                                    <?php
                                    $patient_info = $this->db->get_where('patient', array('chip' => $payment->chip))->row();
                                    echo $patient_info->name . ' <br>';
                                    echo $patient_info->address . '  <br/>';
                                     echo $patient_info->phone
                                    ?>
                                </p>
                            </div>
                        <?php } ?>
                        <div class="col-lg-4 col-sm-4">
                            <h4> <?php echo lang('invoice_info'); ?> </h4>
                            <ul class="unstyled">
                                <li> <?php echo lang('invoice_number'); ?> 		: <strong>00<?php echo $payment->id; ?></strong></li>
                                <!--
                                <li> <?php echo lang('status'); ?> 		:
                                    <?php
                                    if ($payment->gross_total <= $payment->amount_received) {
                                        echo '<strong>' . lang('paid') . '</strong>';
                                    } else {
                                        if ($payment->amount_received == 0) {
                                            echo '<strong>' . lang('unpaid') . '</strong>';
                                        } else {
                                            echo '<strong>' . lang('paid_partially') . '</strong>';
                                        }
                                    }
                                    ?> 
                                </li>
                                -->
                                <li><?php echo lang('doctor'); ?>: <strong><?php echo $payment->doctor; ?></strong></li>
                                <li><?php echo lang('date'); ?>: <?php echo date('m/d/Y', $payment->date); ?> </li>
                            </ul>
                            <br>



                        </div>

                        <div class="col-lg-4 col-sm-4">

                            <ul class="unstyled"> 
                                <li></li>
                            </ul>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> <?php echo lang('patient'); ?> </th>
                                <th> <?php echo lang('medicine'); ?> </th>
<!--                                <th> --><?php //echo lang('company'); ?><!-- </th>-->
                                <th> <?php echo lang('quantity'); ?> </th>
                                <th> <?php echo lang('unit_price'); ?></th>

                                <th> <?php echo lang('total_per_item'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($payment->x_ray)) { ?>
                                <tr>
                                    <td><?php echo $i = 1 ?></td>
                                    <td>X Ray</td>
                                    <td class=""><?php echo $settings->currency; ?> <?php echo $payment->x_ray; ?> </td>
                                </tr>
                            <?php } ?>
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
                                            <td class=""> <?php echo $payment->patient; ?> </td>
                                            <td><?php
                                                $current_medicine = $this->db->get_where('medicine', array('id' => $category_name3[0]))->row();
                                                echo $current_medicine->name;
                                                ?>
                                            </td>
<!--                                            <td class=""> --><?php //echo $current_medicine->company; ?><!-- </td>-->

                                            <td class=""> <?php echo $category_name3[2]; ?> </td>

                                            <td class="">
                                                <!-- hide unit price for purpose of sebi and alldn-->
                                                <?php echo $category_name3[1]; ?>
                                                <?php echo $settings->currency; ?>
                                            </td>

                                            <!-- hide total amount for purpose of sebi and alldn-->
                                            <td class=""><?php echo $settings->currency; ?>
                                                <?php echo $category_name3[1] * $category_name3[2]; ?>
                                            </td>
                                        </tr> 
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-6 invoice-block pull-right">
                            <ul class="unstyled amounts">
                                <li><strong> <?php echo lang('sub_total'); ?>   <?php echo lang('amount'); ?>  : </strong>
                                    <!-- hide subtotal total amount for purpose of sebi and alldn-->
                                    <?php echo $settings->currency; ?>
                                    <?php echo $payment->amount; ?>
                                </li>

                                <?php if (!empty($payment->discount)) { ?>
                                    <li><strong>Discount</strong> <?php
                                        if ($discount_type == 'percentage') {
                                            echo '(%) : ';
                                        } else {
                                            echo ': ' . $settings->currency;
                                        }
                                        ?>
                                        <?php
                                        $discount = explode('*', $payment->discount);
                                        if (!empty($discount[1])) {
                                            echo $discount[0] . ' %  =  ' . $settings->currency . ' ' . $discount[1];
                                        } else {
                                            echo $discount[0];
                                        }
                                        ?>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($payment->vat)) { ?>
                                    <li><strong> <?php echo lang('vat'); ?>  :</strong>   <?php
                                        if (!empty($payment->vat)) {
                                            echo $payment->vat;
                                        } else {
                                            echo '0';
                                        }
                                        ?> % = <?php echo $settings->currency . ' ' . $payment->flat_vat; ?></li>
                                <?php } ?>
                                <li><strong> <?php echo lang('grand_total'); ?>  : </strong>
                                    <!-- hide grand total amount for purpose of sebi and alldn-->
                                    <?php echo $settings->currency; ?>
                                    <?php echo $payment->gross_total; ?>
                                </li>
                                <!--
                                <li><strong> <?php echo lang('amount_received'); ?>  : </strong><?php echo $settings->currency; ?> <?php echo $payment->amount_received; ?></li>
                                <li><strong> <?php echo lang('amount_to_be_paid'); ?>  : </strong><?php echo $settings->currency; ?> <?php echo $payment->gross_total - $payment->amount_received; ?></li>
                                -->
                            </ul>
                        </div>
                    </div>


                  


                </div>

                  <div class="text-center invoice-btn">
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <a href="<?php echo site_url();?>finance/pharmacy/editPayment?id=<?php echo $payment->id; ?>" class="btn btn-info btn-lg invoice_button"><i class="fa fa-edit"></i> <?php echo lang('edit_invoice'); ?> </a>
                        <?php } ?>

                         <a class="btn btn-info btn-lg invoice_button" onclick="getPDF();"><i class="fa fa-down"></i>Download</a>
                        <a class="btn btn-info btn-lg invoice_button" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                    </div>

                <!--
                <div class="panel-body col-md-6 add_deposit" style="font-size: 10px; float: right;">

                    <form role="form" action="finance/pharmacy/amountReceived" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                            <label for="exampleInputEmail1"></label>
                <?php echo lang('amount_to_be_paid'); ?> : <?php echo $settings->currency; ?>  <?php echo $payment->gross_total - $payment->amount_received; ?> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> <?php echo lang('add_deposit'); ?> </label>
                            <input type="text" class="form-control" name="amount_received" id="exampleInputEmail1" value='<?php
                if (!empty($category->description)) {
                    echo $category->description;
                }
                ?>' placeholder="<?php echo $settings->currency; ?> ">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $payment->id; ?>">

                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                    </form>
                </div>
                
                
                -->
            </div>
        </section>
        <!-- invoice end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
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
 
     pdf.save("pharmacy_invoice.pdf");
        });
 };
</script>

    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
