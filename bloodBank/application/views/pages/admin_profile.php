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
                        <h3 class="box-title"><?= $head ?>
                        </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data">

                        <div class="box-body">


                            <div class="col-md-6">
                                <?php $edit_data = $edit_data[0] ?>
                                <!--`admin_user_id`, ``, `password`, `photo`, ``, `email_id`, `phone`, `designstion`, `created_date`, `status`-->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username" value="<?php
                                    if (set_value('username'))
                                        echo set_value('username');
                                    else if (isset($edit_data['username']))
                                        echo $edit_data['username'];
                                    ?>"  class="form-control required" id="exampleInputEmail1">
                                    <div class="text-red"> <?= form_error('username'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="name" value="<?php
                                    if (set_value('name'))
                                        echo set_value('name');
                                    else if (isset($edit_data['name']))
                                        echo $edit_data['name'];
                                    ?>" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Name">
                                    <div class="text-red"> <?= form_error('name'); ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" required="" name="email_id" value="<?php
                                    if (set_value('email_id'))
                                        echo set_value('email_id');
                                    else if (isset($edit_data['email_id']))
                                        echo $edit_data['email_id'];
                                    ?>" class="form-control required" id="exampleInputPassword1" placeholder="Enter Email">
                                    <div class="text-red"> <?= form_error('email_id'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="tel" name="phone" value="<?php
                                    if (set_value('phone'))
                                        echo set_value('phone');
                                    else if (isset($edit_data['phone']))
                                        echo $edit_data['phone'];
                                    ?>" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Phone">
                                    <div class="text-red"> <?= form_error('phone'); ?></div>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Photo</label>
                                    <input type="file" name="photo" required=""  id="exampleInputFile">
                                    <p class="help-block">Attach jpeg,png images here(125x50).</p>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <center>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </center>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->