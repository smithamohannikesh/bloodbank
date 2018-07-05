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
                        <div class="box-header with-border">
                            
                            <ul class="nav nav-tabs" role="tablist">
                              <?php
                              if (isset($edit_data['reg_id'])){$rid=$edit_data['reg_id'];
                              }
                              else $rid="";
                              
                              ?>
                                <li role="presentation" class="<?php if(!$rid)echo 'active';?>" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?= $head ?></a></li>
                                <li role="presentation" class="<?php if($rid)echo 'active';?>" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">New Registration</a></li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane <?php if($rid)echo 'active';?>" id="home">


                                <form role="form" method="post" id="formid" enctype="multipart/form-data">

                                    <div class="box-body">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name </label>
                                                <input type="text" name="name" value="<?php
                                                if (set_value('name'))
                                                    echo set_value('name');
                                                else if (isset($edit_data['name']))
                                                    echo $edit_data['name'];
                                                ?>" class="form-control required" required="" placeholder="Enter name" id="exampleInputEmail1">
                                                <div class="text-red"><?= form_error('name'); ?></div>
                                            </div>
											<div class="form-group">
                                                <!--<label for="exampleInputEmail1">Age</label>-->
                                                <input type="hidden"  name="age"  value="" />
                                             
                                               
                                            </div>
                                             <div class="form-group">
                                                 
                                                     
                                                <label>
                                                <?php
                                                if(isset($rdata['error'])){
                                                    var_dump($rdata['error']);
                                                }
                                                ?>                                                </label>
                                                  
                                                <label for="exampleInputPassword1">Date Of Birth</label>
                                                
                                                   
                                                <div class="input-group">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                  
                                                    <input type="text" name="dob" value="<?php
                                               if (set_value('dob'))
                                                    echo set_value('dob');
                                                else if (isset($edit_data['dob'])){
						echo $edit_data['dob'] = date('d-m-Y', strtotime($edit_data['dob']));
                                                    }
                                                ?>" name = "dob" class="form-control datepicker bg-calendar date-p" onclick="blur()">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Gender</label><br />
                                                 	<input type="radio" name="gender" value="male" checked> Male<br>
  							<input type="radio" name="gender" value="female"> Female<br>
  							<input type="radio" name="gender" value="other"> Other 
                                                    <div class="text-red"><?= form_error('age'); ?></div> 
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <textarea type="text" name="address" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter address"><?php
                                                    if (set_value('address'))
                                                        echo set_value('address');
                                                    else if (isset($edit_data['address']))
                                                        echo $edit_data['address'];
                                                    ?></textarea>
                                                <div class="text-red"><?= form_error('address'); ?></div>
                                            </div>
                                             <div class="form-group">
                                             <label> enter area
                                             <input id="searchTextField" type="text" size="50">
                                             </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                

                                                <input type="tel" name="phone"  pattern= ^[789]\d{9}$ maxlength="14" required
                                                 
                                                 value="<?php
                                                if (set_value('phone'))
                                                    echo set_value('phone');
                                                else if (isset($edit_data['phone']))
                                                    echo $edit_data['phone'];
                                                ?>"  class="form-control required"  id="inputError" placeholder="mobil no">
                                                <div class="text-red"><?= form_error('phone'); ?></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Blood Group</label><br/>
                                                    <select class="form-control" name="blood_grp">
                                                    <?php
                                                       if(set_value('blood_grp'))
                                                      
                                                           $val=set_value('blood_grp');
                                                       else if(isset($edit_data['blood_grp']))
                                                        $val=$edit_data['blood_grp'];
                                                    else {
                                                        
                                                    $val="select";
                                                            
                                                    }
                                                     echo '<option selected="" value="'.$val.'">'. $val.'</option>';  
                                                       ?>
                                                                                                   
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
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Are you interested to donate blood?<br/> </label><br/>
                                               
                                                 	<input type="radio" name="interested" value="yes" checked>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
  													<input type="radio" name="interested" value="no">&nbsp; No<br>
  													
                                                    <div class="text-red"><?= form_error('interested'); ?></div> 
                                               
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Are you donated before? </label><br/>
                                                 	<input type="radio" name="donate" value="yes" onclick="show()"checked>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
  													<input type="radio" name="donate" value="no" onclick="hide()">&nbsp; No<br>
  													
                                                    <div class="text-red"><?= form_error('donate'); ?></div> 
                                               
                                            </div>
											
                                            <div  id="predate" class="form-group ">
                                                <label for="exampleInputPassword1">Previous donated date</label>

                                                <div class="input-group">
													
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <div class="date">
                                                    <input type="text" name="previous_date" value="<?php
                                               if (set_value('previous_date'))
                                                    echo set_value('previous_date');
                                                else if (isset($edit_data['previous_date'])){
						echo $edit_data['previous_date'] = date('d/m/Y', strtotime($edit_data['previous_date']));
                                                    }
                                                ?>"class="form-control datepicker  " onclick="blur()" >
                                                </div>
                                                </div>
                                            </div>

                                        </div>




                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <center>
                                            <center>
                                                <button type="reset" class="btn btn-warning">Cancel</button> &nbsp;
                                                <?php
                                                echo ' <button type="submit"';
                                                if (isset($edit_data))
                                                    echo "class='btn btn-primary' >Update</button>";
                                                else
                                                    echo "class='btn btn-success' >Submit</button>";
                                                ?>
                                            </center>

                                        </center>
                                    </div>
                                </form>



                            </div>
                            <div role="tabpanel" class="tab-pane <?php if(!$rid)echo 'active';?>" id="profile">


                                <div class="box-body" >
                                    <div class="box-body " >
                                    <form role="form" method="post" id="report">
                                       <div class="form-group">
                                        <label> </label>
                                        <a href="<?= base_url() ?>Settings/export" class="btn btn-success">Excel Sheet Report </a> 
                                        </td> 
                                    </form>
                                    <div class="box-body" >
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Sl no</th>
                                                <th>Name</th>
                                                <th>Age </th>
                                                <th>Gender </th>
                                                <th>Phone</th>
                                                <th>Blood Group</th>                                             
                                                <th>Before donated</th>
                                                <th>Donated date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            foreach ($lists as $val) {
                                                ?>
                                                <tr id='row<?= $val['reg_id']; ?>'>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['name']; ?></td>
                                                    <td><?= $val['age']; ?></td>
                                                   <!-- <td><?= $val['dob']; ?></td>-->
                                                     <td><?= $val['gender']; ?></td>
                                                   <!--  <td><?= $val['address']; ?></td>-->
                                                    <td><?= $val['phone']; ?></td>
                                                     <td><?= $val['blood_grp']; ?></td>
                                                       <!--  <td><?= $val['interested']; ?></td>-->
                                                       <td><?= $val['donate']; ?></td>
                                                        <td><?= $val['previous_date']; ?></td>
                                                        <td> <a href="<?= base_url() ?>settings/registration_details/<?= $val['reg_id']; ?>"  class="btn btn-xs btn-social-icon btn-twitter"><i class="fa fa-pencil"></i></a></td>
                                                        <td>
                                                        <a class="btn btn-xs btn-social-icon btn-google delete" onclick="deletethis('<?= $val['reg_id']; ?>')"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                        <td><span id="sts<?= $val['reg_id']; ?>">
                                                            <?php if ($val['status'] == 1) { ?>
                                                                <a class="btn btn-xs bg-olive" onclick="deactivate('<?= $val['reg_id']; ?>')">Enabled</a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-xs bg-yellow" onclick="activate('<?= $val['reg_id']; ?>')">Disabled</a>
                                                            <?php } ?>
                                                        </span></td>  

                                                    
                                                </tr>

                                                <?php
                                                $i++;
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

                            </div>
                        </div>
                        <!-- form start -->

                    </div><!-- /.box -->
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
      var newJQuery = jQuery.noConflict(true),
            oldJQuery = jQuery;

      (function ($) {
            var autocomplete = new google.maps.places.Autocomplete(pac_input);
       }(newJQuery));

      (function ($) {
            // code that needs 1.2.6 goes here
       }(oldJQuery));
 
      // code that needs oldJQuery and newJQuery can go here



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
                                                                e.preventDefault()
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