
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
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $head ?>
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-responsive table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email id</th>
                                    <th>Phone</th>
                                    <th>Photo </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($lists as $val) {
                                    ?>
                                    <tr id='row<?= $val['user_id']; ?>'>
                                        <td><?= $i; ?></td>
                                        <td><?= $val['full_name']; ?></td>
                                        <td><?= $val['email_id']; ?></td>
                                        <td><?= $val['phone']; ?></td>
                                        <td>

                                            <?php
                                            if ($val['photo'] != "") {
                                                $file = FCPATH . 'uploads/userpics/' . $val['photo'];
                                                if (!file_exists($file)) {
                                                    $path = base_url() . 'uploads/userpics/dummy_user.png';
                                                } else {
                                                    $path = base_url() . 'uploads/userpics/' . $val['photo'];
                                                }
                                            } else {
                                                $path = base_url() . 'uploads/userpics/dummy_user.png';
                                            }
                                            ?>
                                            <img width="40" height="40" class="img-responsive" src="<?= $path ?>" alt="Photo">
                                           

                                        </td>
                                        <td>
                                            <a href="<?= base_url()?>settings/user_services_requests/<?= $val['user_id']; ?>" class="btn btn-xs  btn-success" ><i class="fa fa-link "></i> Service Requests</a>
                                        
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




        </div>
 <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="example-modal">
                <div class="modal-dialog  modal-lg">
                    
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Order Details</h4>
                        </div>

                        <div class="modal-body modaldata">


                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary ">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--</section> /.content -->


</div><!-- /.content-wrapper -->

<script>
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

</script>
<script>
   function viewmore(id) {
        $.ajax({
            url: "<?= base_url() ?>Settings/modal_order",
            type: 'POST',
            data: {id: id},
            success: function (data) {
                $('.modaldata').html(data);
                $('#myModal').modal('toggle');
            }
        });
    }
</script>
