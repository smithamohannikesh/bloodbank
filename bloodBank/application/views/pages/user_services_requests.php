
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
                        <table  class="table table-bordered table-responsive table-hover table-striped">
                            <thead>
                                <tr>





                                    <th>Sl no</th>
                                    <th>Customer Name</th>
                                    <th>Request Ref code</th>
                                    <th>Request Type</th>
                                    <th>Product Details</th>
                                    <th>Send Date </th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($lists as $val) {
                                    ?>
                               
                                    <tr id='row<?= $val['service_request_id']; ?>'>
                                        <td><?= $i; ?></td>
                                        <td><?= $val['full_name']; ?></td>
                                        <td><?= $val['referance_code']; ?></td>
                                        <td><?= $val['request_type']; ?></td>
                                          <td><?= $val['service_name']; ?></td>
                                        <td><?= $val['requset_made_time']; ?></td>
                                        <td>
                                         <?php if($val['status']==1){ ?>
                              <a class="btn btn-xs bg-olive">Open</a>
                            <?php }else if($val['status']==0){ ?>
                               <a class="btn btn-xs bg-yellow">Pending</a>
                                <?php } else if($val['status']==0){ ?>
                                 <a class="btn btn-xs bg-blue">Closed</a>
                                <?php }?>
                                           
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="viewmore('<?= $val['service_request_id']; ?>')" class="btn btn-xs  btn-success" ><i class="fa fa-list "></i> Details</a>

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
                            <h4 class="modal-title">Service Request Details</h4>
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
            url: "<?= base_url() ?>Settings/modal_requsts",
            type: 'POST',
            data: {id: id},
            success: function (data) {
                $('.modaldata').html(data);
                $('#myModal').modal('toggle');
            }
        });
    }
</script>
