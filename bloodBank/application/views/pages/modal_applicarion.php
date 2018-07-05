
<div class="box-body box-profile">
    <center>

        <?php
        if ($edit_data[0]['photo'] != "") {
            $file = FCPATH . 'uploads/career/photo/' . $edit_data[0]['photo'];
            if (!file_exists($file)) {
                $path = base_url() . 'uploads/career/photo/dummy_user.png';
            } else {
                $path = base_url() . 'uploads/career/photo/' . $edit_data[0]['photo'];
            }
        } else {
            $path = base_url() . 'uploads/career/photo/dummy_user.png';
        }
        ?>
        <img width="200" height="200" class="img-responsive" src="<?= $path ?>" alt="Photo">

    </center>
  
    <h3 class="profile-username text-center"><?= $edit_data[0]['first_name']." ". $edit_data[0]['last_name']; ?></h3>
    <p class="text-muted text-center"><?= $edit_data[0]['created_time']; ?></p>

    <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
            <b>Job Applied</b> 
            <div class="pull-right"><?= $edit_data[0]['job_title']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Phone</b> <div class="pull-right"><?= $edit_data[0]['phone']; ?></div>
        </li>

        <li class="list-group-item">
            <b>Email</b> <div class="pull-right"><?= $edit_data[0]['email']; ?></div>
        </li>
        <li class="list-group-item">

            <b>Date of birth</b> <div class="pull-right"><?= $edit_data[0]['date_of_birth']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Qualification</b> <div class="pull-right"><?= $edit_data[0]['qualification']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Address</b> <div class="pull-right"><?= $edit_data[0]['address']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Experience</b> <div class="pull-right"><?= $edit_data[0]['experiance']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Resume</b> <div class="pull-right"><?= $edit_data[0]['resume']; ?></div>
        </li>
        <li class="list-group-item">
            <b>Status</b> <div class="pull-right">

                <?php if ($edit_data[0]['status'] == 1) { ?>
                    <a class="btn btn-xs bg-olive">Enabled</a>
                <?php } else { ?>
                    <a class="btn btn-xs bg-yellow">Disabled</a>
                <?php } ?>
            </div>
        </li>

    </ul>

    <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
</div>