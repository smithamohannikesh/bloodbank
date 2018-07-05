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
                    <form role="form" method="post">

                        <div class="box-body">

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Current Password</label>
                                    <input type="password" name="current_pass" class="form-control required" required="" placeholder="Enter Current Password" id="exampleInputEmail1">
                                    <div class="text-red"> <?= form_error('current_pass'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" name="new_pass" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter New Password">
                                    <div class="text-red">  <?= form_error('new_pass'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" name="confirm_pass" class="form-control required" required="" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                                    <div class="text-red"> <?= form_error('confirm_pass'); ?></div>
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