<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?= $breadcrumb1; ?></a></li>
            <li class="active"><?= $breadcrumb2; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- left column -->


            <div class="tab-content">
                <div class="col-md-12">
                    <div class="box-body">
                        <?php if ($this->session->flashdata('successmsg')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4>	<i class="icon fa fa-check"></i> Success !</h4>
                                <?= $this->session->flashdata('successmsg'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('errormsg')) {
                            ?>

                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                <?= $this->session->flashdata('errormsg'); ?>
                            </div>

                        <?php } ?>
                        <div class="errormessage"></div>
                    </div>
                    <div class="box box-primary">
                     </div>
                        <!-- form start -->
                         <form role="form" class="form-inline"method="post" id="formid" enctype="multipart/form-data">
                         <div class="form-group">
                                             <label> Area</label>&nbsp; &nbsp; 
                                             <input id="searchTextField" value=""
                                                class="form-control "   name="area" type="text" size="50">
                                             </div>
                          <div class="form-group">
                                               &nbsp; &nbsp;  <label for="exampleInputPassword1">Blood Group</label>&nbsp; &nbsp; 
                                                    <select class="form-control" name="blood_grp">
                                                    <option value="select">select blood group</option>                                         
                                                    <option value="A+">A+</option> 
                                                    <option value="O+">O+</option> 
                                                    <option value="B+">B+</option> 
                                                    <option value="AB+">AB+</option> 
                                                    <option value="A-">A-</option> 
                                                    <option value="O-">O-</option> 
                                                    <option value="B-">B-</option> 
                                                    <option value="AB-">AB-</option> 
                                                </select>
                                                
                                                <div class="text-red"><?= form_error('blood_grp'); ?></div>
                                            </div>

                         &nbsp; &nbsp;  <button type="submit" class="btn btn-success">Search</button> 
                         </form>


                    </div><!-- /.box -->
                    <div class="box-body" >
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Sl no</th>
                                                <th>Name</th>
                                                <th>Age </th>
                                                <th>DOB </th>
                                                <th>Gender </th>
                                                <th>Address </th>
                                                <th>Area</th>
                                                <th>Phone</th>
                                                <th>Blood Group</th> 
                                                <th>Interested</th>                                            
                                                <th>Before donated</th>
                                                <th>Donated date</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            if(isset($report)){
                                            foreach ($report as $val) {
                                                ?>
                                                <tr id='row<?= $val['reg_id']; ?>'>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['name']; ?></td>
                                                    <td><?= $val['age']; ?></td>
                                                <td><?= $val['dob']; ?></td>
                                                     <td><?= $val['gender']; ?></td>
                                                    <td><?= $val['address']; ?></td>
                                                    <td><?= $val['area']; ?></td>
                                                    <td><?= $val['phone']; ?></td>
                                                     <td><?= $val['blood_grp']; ?></td>
                                                      <td><?= $val['interested']; ?></td>
                                                       <td><?= $val['donate']; ?></td>
                                                        <td><?= $val['previous_date']; ?></td>
                                                        
                                                        
                                                        

                                                    
                                                </tr>

                                                <?php
                                                $i++;
                                            }
                                          }
                                            ?>




                                        </tbody>
<!--                                        <tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-body " >
                                    <form role="form" method="post" id="report">
                                       <div class="form-group">
                                        <label> </label>
                                        <a href="<?= base_url() ?>Settings/export" class="btn btn-success">Download Report</a> 
                                        </td> 
                                        </div>
                                    </form>
                                    </div>
                </div>
            </div>


        </div>


</div>

</section><!-- /.content -->
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

</div><!-- /.content-wrapper -->


<script type="text/javascript">
     /* var newJQuery = jQuery.noConflict(true),
            oldJQuery = jQuery;

      (function ($) {
            var autocomplete = new google.maps.places.Autocomplete(pac_input);
       }(newJQuery));

      (function ($) {
            // code that needs 1.2.6 goes here
       }(oldJQuery));
 
      // code that needs oldJQuery and newJQuery can go here

*/

                                                            $(function () {
                                                                //Initialize Select2 Elements
                                                                $(".select2").select2();

                                                                //Datemask dd/mm/yyyy
                                                                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                                                                //Datemask2 mm/dd/yyyy
                                                                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                                                                //Money Euro
                                                                $("[data-mask]").inputmask();
                                                            }
                                                            );
                                                            function deletethis(id) {
                                                                var result = confirm("Want to delete this?");
                                                                if (result) {
                                                                    $.ajax({
                                                                        url: "<?= base_url() ?>/Settings/delete_register",
                                                                        type: 'POST',
                                                                        data: {id: id},
                                                                        success: function (data) {
                                                                            $('#row' + id).remove();
                                                                            $('.errormessage').html(data);
                                                                        }
                                                                    });
                                                                }
                                                            }
                                                            function activate(id) {
                                                                var result = confirm("Want to activate this?");
                                                                if (result) {
                                                                    $.ajax({
                                                                        url: "<?= base_url() ?>Settings/activate_register",
                                                                        type: 'POST',
                                                                        data: {id: id},
                                                                        success: function (data) {
                                                                            $('#sts' + id).html('<a class="btn btn-xs bg-olive" onclick="deactivate(' + id + ')">Enabled</a>');
                                                                            $('.errormessage').html(data);
                                                                        }
                                                                    });
                                                                }
                                                            }

                                                            function deactivate(id) {
                                                                var result = confirm("Want to deactivate this?");
                                                                if (result) {
                                                                    $.ajax({
                                                                        url: "<?= base_url() ?>Settings/deactivate_register",
                                                                        type: 'POST',
                                                                        data: {id: id},
                                                                        success: function (data) {
                                                                            $('#sts' + id).html('<a class="btn btn-xs bg-yellow" onclick="activate(' + id + ')">Disabled</a>');
                                                                            $('.errormessage').html(data);
                                                                        }
                                                                    });
                                                                }

                                                            }
                                                            $('#myTabs a').click(function (e) {
                                                                e.defaultPrevented()
                                                                $(this).tab('show')
                                                            });


</script>
<script>

function hide() {
    document.getElementById("predate").style.display = "none";
}

function show() {
    document.getElementById("predate").style.display = "block";
}

</script>
<!--..... DATE PICKER .....--> 
<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script> 
<script type="text/javascript">
 $(function() {
    $( ".datepicker" ).datepicker({
		format: 'dd/mm/yyyy', 
         endDate: '+0d'      
	  
	});
  });
/*  $(function() {
    $( ".datepicker2" ).datepicker({
    minDate: 0  
	});
  });
  */
 
</script> 

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNno5M7quymPOJY7u9XRG5cYL32fBdEII&sensor=false&libraries=places"></script>
     <script src="<?= base_url() ?>assets/bootstrap/js/googlearea.js"></script>
    