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
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $head ?></a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Supplier List</a></li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">


                                <form role="form" method="post" id="formid">

                                    <div class="box-body">

                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier Name</label>
                                                <input type="text" name="supplier_name" value="<?php
                                                if (set_value('supplier_name'))
                                                    echo set_value('supplier_name');
                                                else if (isset($edit_data['supplier_name']))
                                                    echo $edit_data['supplier_name'];
                                                ?>" class="form-control required" required="" placeholder="Enter " id="exampleInputEmail1">
                                                <div class="text-red"><?= form_error('supplier_name'); ?></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier Address</label>
                                                <textarea type="text" name="address" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Supplier Address"><?php
                                                    if (set_value('address'))
                                                        echo set_value('address');
                                                    else if (isset($edit_data['address']))
                                                        echo $edit_data['address'];
                                                    ?></textarea>
                                                <div class="text-red"><?= form_error('address'); ?></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="text" name="email" value="<?php
                                                if (set_value('email'))
                                                    echo set_value('email');
                                                else if (isset($edit_data['email']))
                                                    echo $edit_data['email'];
                                                ?>"   class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Email id">
                                                <div class="text-red"><?= form_error('email'); ?></div>

                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Mobile</label>
                                                <input type="text" name="mobile" value="<?php
                                                if (set_value('mobile'))
                                                    echo set_value('mobile');
                                                else if (isset($edit_data['mobile']))
                                                    echo $edit_data['mobile'];
                                                ?>"  class="form-control required" required="" id="inputError" placeholder="Enter Mobiile Number">
                                                <div class="text-red"><?= form_error('mobile'); ?></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" name="phone" value="<?php
                                                if (set_value('phone'))
                                                    echo set_value('phone');
                                                else if (isset($edit_data['phone']))
                                                    echo $edit_data['phone'];
                                                ?>"  class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Phone Number">
                                                <div class="text-red"><?= form_error('phone'); ?></div>
                                            </div>

                                        </div>




                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <center>
                                            <center>
                                                <button type="submit" class="btn btn-warning">Cancel</button> &nbsp;
                                                <?php
                                                echo ' <button type="submit"';
                                                if (isset($edit_data['supplier_name']))
                                                    echo "class='btn btn-primary' >Update</button>";
                                                else
                                                    echo "class='btn btn-success' >Submit</button>";
                                                ?>
                                            </center>

                                        </center>
                                    </div>
                                </form>



                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">


                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl no</th>
                                                <th>Supplier Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Phone </th>
                                                <th>Mobile</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            foreach ($lists as $val) {
                                                ?>
                                                <tr id='row<?= $val['supplier_id']; ?>'>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $val['supplier_name']; ?></td>
                                                    <td><?= $val['address']; ?></td>
                                                    <td><?= $val['email']; ?></td>
                                                    <td><?= $val['phone']; ?></td>
                                                    <td><?= $val['mobile']; ?></td>

                                                    <td>

                                                        <a href="<?= base_url() ?>settings/supplier/<?= $val['supplier_id']; ?>" onclick="return confirm('Want to edit this?')" class="btn btn-xs btn-social-icon btn-twitter"><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-xs btn-social-icon btn-google delete" onclick="deletethis('<?= $val['supplier_id']; ?>')"><i class="fa fa-trash"></i></a>
                                                        <span id="sts<?= $val['supplier_id']; ?>">
                                                            <?php if ($val['status'] == 1) { ?>
                                                                <a class="btn btn-xs bg-olive" onclick="deactivate('<?= $val['supplier_id']; ?>')">Enabled</a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-xs bg-yellow" onclick="activate('<?= $val['supplier_id']; ?>')">Disabled</a>
                                                            <?php } ?>
                                                        </span>
                                                    </td>
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


</div><!-- /.content-wrapper -->

<script>
    function deletethis(id) {
        var result = confirm("Want to delete this?");
        if (result) {
            $.ajax({
                url: "<?= base_url() ?>/Settings/delete_suplier",
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
                url: "<?= base_url() ?>Settings/activate_suplier",
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
                url: "<?= base_url() ?>Settings/deactivate_suplier",
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



</script>