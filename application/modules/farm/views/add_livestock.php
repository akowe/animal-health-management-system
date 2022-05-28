<!--sidebar end-->
<!--main content start-->
<style>
    .add-livestock {
        border: 1px solid #092;
        box-shadow: none;
        border: 1px solid #e2e2e4;
        color: #068;
        background: #cccccc !important;
        width: 100%;
        color: #000;
        height: 38px !important;
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c !important;
        border-color: #4cae4c;
    }

</style>

<script>

    function getAmount() {
        var cat = Number(document.getElementById("cattle").value) * 5000;
        document.getElementById("amount").value = cat;

        //show discounted price;
        var hasValue = document.getElementById('referral').value;
        if (!!hasValue) {
            document.getElementById('customer_discount').style.display = 'inline';
            document.getElementById('amount_1').style.display = 'none';
        } else {
            document.getElementById('customer_discount').style.display = 'none';
        };

    }

    function getprice(){

        var a = Number(document.getElementById("cattle").value) * 5000;
        document.getElementById("amount2").value = a;
    }

</script>
<?php
if(validation_errors()){
    ?>
    <div class="alert alert-info text-center">
        <?php echo validation_errors(); ?>
    </div>
    <?php
}
if($this->session->flashdata('error')){
    ?>
    <div class="alert alert-info text-center">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-book"></i>Animal  Health <?php echo lang('history'); ?>
            </header>
            <div class="panel-body">

                <div class="adv-table editable-table">

                    <form method="post" action=""  name="hoina_btn">
                        <div class="form-group">

                            <input type="text" name="name" class="form-control add-livestock" value="<?php echo $this->ion_auth->user()->row()->username;  ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control add-livestock" id="email" value="<?php echo $this->ion_auth->user()->row()->email;  ?>" readonly>
                        </div>

<!--                        <div class="form-group">-->
<!---->
<!--                            <input type="hidden" name="phone" class="form-control add-livestock" value="--><?php //echo $this->ion_auth->hoina_urban()->row()->phone; ?><!--" readonly>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!---->
<!--                            <input type="hidden" name="farm_name" class="form-control add-livestock" value="--><?php //echo $this->ion_auth->hoina_urban()->row()->farm_name; ?><!--" readonly>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                          -->
<!--                            <input type="hidden" name="location" class="form-control add-livestock" value="--><?php //echo $this->ion_auth->hoina_urban()->row()->location; ?><!--" readonly>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label>Number of cattle to be registered</label>
                            <input type="number" name="no_of_livestock" class="form-control" value="0" id="cattle" oninput="getAmount()">
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount" value="0" oninput="getAmount()" readonly >
                            <input class="form-control"  type="hidden" id="ref" name="reference" value="LS247<?php echo rand() ;?>">
                        </div>

                        <div class="form-group">
                            <span>Clicking pay implies accepting our <a href="https://livestock247.com/terms-and-condition.html">terms and condition</a></span><br><br>

                            <input type="submit" name="hoina_btn" class="btn btn-success btn-block" value="Pay "  >
                        </div>


                    </form>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


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
