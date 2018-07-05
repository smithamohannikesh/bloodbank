<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <!--<li class="header">MAIN NAVIGATION</li>-->
            <li class="treeview <?php if ($active_open == '1') echo "active open"; ?>">
                <a href="#" >
                    <i class="fa fa-dashboard"></i> <span>Administrator</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($active == '100') echo "active"; ?>" ><a href="<?= base_url() ?>settings/admin-profile"><i class="fa fa-plus"></i> Admin Profile</a></li>
                    <li class="<?php if ($active == '101') echo "active"; ?>"><a href="<?= base_url() ?>settings/change-password"><i class="fa fa-plus"></i> Manage Password</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php if ($active_open == '3') echo "active open"; ?>">
                <a href="#">
                    <i class="fa fa-check"></i>
                    <span>Register</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($active == '104') echo "active"; ?>"><a href="<?= base_url() ?>settings/registration_details"><i class="fa fa-plus"></i>Registration Details</a></li>
                  <li class="<?php if ($active == '105') echo "active"; ?>"><a href="<?= base_url() ?>settings/selectreport"><i class="fa fa-plus"></i>Report</a></li>
                
                </ul>
            </li>
            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>