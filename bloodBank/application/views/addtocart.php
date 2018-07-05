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
                user_id
                <input type="text" name="user_id" value=""><br>
                product_id
                 <input type="text" name="product_id" value=""><br>
                 quantity
                <input type="text" name="quantity" value=""><br>
                
                cart_id
                <input type="text" name="cart_id" value=""><br>
                 <input type="text" name="wishlist_id" value=""><br>
                
                                    
                   <input type="submit" name="asf" value="Send">
                
                
            </form>
            
	</div>

	
</div>

</body>


<script>
    var text = '{"employees":[''{"firstName":"John","lastName":"Doe" },''{"firstName":"Anna","lastName":"Smith" },' '{"firstName":"Peter","lastName":"Jones" }]}';</script>
</html>