<?php if($st=='1'){?>
<div class="alert alert-success disabled alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success !</h4>
    <?= $msg; ?>
</div>
<?php } else if($st=='0'){?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
    <?= $msg; ?>
</div>
<?php }?>

