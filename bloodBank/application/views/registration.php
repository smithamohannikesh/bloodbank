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
            <form method="post" enctype="multipart/form-data">
                <?php echo validation_errors(); ?>
                <?= form_error();?>
                <input type="text" name="full_name" value=""><br>
                 <input type="text" name="email_id" value=""><br>
                <input type="text" name="phone" value=""><br>
                <input type="file" name="photo" value=""><br>
                 <input type="text" name="password" value=""><br>
                
                                    
                   <input type="submit" name="asf" value="Send">
                
                
            </form>
            
	</div>

	
</div>

</body>


<script>
    var text = '{"employees":[''{"firstName":"John","lastName":"Doe" },''{"firstName":"Anna","lastName":"Smith" },' '{"firstName":"Peter","lastName":"Jones" }]}';</script>
</html>