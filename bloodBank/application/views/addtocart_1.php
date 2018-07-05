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
                    <?= form_error(); ?>
                    buyers_name
                    <input type="text" name="buyers_name" value=""><br>
                    user_id
                    <input type="text" name="user_id" value=""><br>
                    buyers_phone
                    <input type="text" name="buyers_phone" value=""><br>
                    receivers_name
                    <input type="text" name="receivers_name" value=""><br>
                    email
                    <input type="text" name="email" value=""><br>
                    house_name
                    <input type="text" name="house_name" value=""><br>
                    street_name
                    <input type="text" name="street_name" value=""><br>
                    city
                    <input type="text" name="city" value=""><br>
                    message
                    <input type="text" name="message" value=""><br>
                    latitude
                    <input type="text" name="latitude" value=""><br>
                    longitude
                    <input type="text" name="longitude" value=""><br>
                    product_details
                    <input type="text" name="product_details" value=""><br>


                    <input type="submit" name="asf" value="Send">


                </form>

            </div>


        </div>

    </body>


    <script>
        var text = '{"employees":[''{"firstName":"John","lastName":"Doe" },''{"firstName":"Anna","lastName":"Smith" },' '{"firstName":"Peter","lastName":"Jones" }]}';</script>
</html>