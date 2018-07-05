<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>API TESTING</title>

	
</head>
<body>

<div id="container">
	<h3>API Testing</h3>

	<div id="body">
            <form method="post">
                <?php echo validation_errors(); ?>
                <?= form_error();?>
                <input type="text" name="username" value="">
                 <input type="text" name="password" value="">
                                    
                   <input type="submit" name="asf" value="Send">
                
                
            </form>
            
	</div>

	
</div>

</body>


<script>
    var text = '{"employees":[''{"firstName":"John","lastName":"Doe" },''{"firstName":"Anna","lastName":"Smith" },' '{"firstName":"Peter","lastName":"Jones" }]}';</script>
</html>