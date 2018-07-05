
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
                        <div class="pull-right"> </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <!--<th>Phone</th>-->
                                    <th>Email Id</th>
                                    <!--<th>Web</th>-->
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th></th>

                                </tr>
                                <?php
                                $k = 1;
                                foreach ($lists as $value) {
                                    ?>

                                    <tr>
                                        <td><?= $k; ?></td>
                                        <td><?= $value['title']; ?></td>
                                        <td>
                                            <?= $value['address1']; ?><br>
                                            <?= $value['address2']; ?><br>
                                            <?= $value['address3']; ?><br>
                                            <?= $value['address4']; ?><br>

                                        </td>
                                        <td><?= $value['phone']; ?></td>
                                        <!--<td><?= $value['phone2']; ?></td>-->
                                        <td><?= $value['email_id']; ?></td>
                                        <!--<td><?= $value['web']; ?></td>-->
                                        <td><?= $value['latitude']; ?></td>
                                        <td><?= $value['longitude']; ?></td>
                                        <td><a onclick="editthis('<?= $value['id'] ?>')" class="btn btn-sm  btn-twitter"><i class="fa fa-pencil"> </i> Edit </a></td>

                                    </tr>
                                    <?php
                                    $k++;
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
                <div class="modal-dialog modal-lg">
                    <form method="post">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Contact Us</h4>
                            </div>
                            <div class="box box-primary">
                                <div class="modal-body modaldata">


                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ">Save changes</button>
                            </div>
                        </div>
                    </form>

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
    function editthis(id) {
        $.ajax({
            url: "<?= base_url() ?>Settings/edit_contact_us2",
            type: 'POST',
            data: {id: id},
            success: function (data) {
                $('.modaldata').html(data);
                $('#myModal').modal('toggle');
            }
        });
    }
</script>

