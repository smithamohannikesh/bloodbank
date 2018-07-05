$(document).ready(function () {
    $('#formid').submit(function () {
        var $val = 0;
        //check text fields
        $("input.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("textarea.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("input.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });

        $("select.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("select.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("input.validmail").each(function () {

            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expr.test($(this).val())) {
                $(this).removeClass("error-hilt");
            } else {
                $(this).addClass("error-hilt");
                $val = 1
            }
        });
        // if you want to check select fields  
        if ($val > 0) {
            var msg = 'Please enter the hightlighted values';
            alert(msg);
            return false;
        } else {

            return true;

        }
    });

    $('#passwordupdate').submit(function () {

        //check text fields
        $("#passwordupdate input.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#passwordupdate textarea.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#passwordupdate input.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });

        $("#passwordupdate select.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#passwordupdate select.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#passwordupdate input.validmail").each(function () {

            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expr.test($(this).val())) {
                $(this).removeClass("error-hilt");
            } else {
                $(this).addClass("error-hilt");
                $val = 1
            }
        });
        // if you want to check select fields  
        if ($val > 0) {
            var msg = 'Please enter the hightlighted values';
            $('.error-msgs').html(msg);
            return false;
        } else {

            return true;

        }
    });

    $('#careerform').submit(function () {

        var $val = 0;
        //check text fields
        $("#careerform input.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#careerform textarea.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#careerform input.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });

        $("#careerform select.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#careerform select.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#careerform input.validmail").each(function () {

            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expr.test($(this).val())) {
                $(this).removeClass("error-hilt");
            } else {
                $(this).addClass("error-hilt");
                $val = 1
            }
        });
        // if you want to check select fields  
        if ($val > 0) {
            var msg = 'Please enter the hightlighted values';
            $('.error-msgs').html(msg);
            return false;
        } else {

            return true;

        }
    });

    $('#profileupdate').submit(function () {
        var $val = 0;
        //check text fields
        $("#profileupdate input.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#profileupdate textarea.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#profileupdate input.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });

        $("#profileupdate select.required").each(function () {
            if (($(this).val()) == "") {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("profileupdate select.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).addClass("error-hilt");
                $val = 1
            } else {
                $(this).removeClass("error-hilt");
            }
        });
        $("#profileupdate input.validmail").each(function () {

            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expr.test($(this).val())) {
                $(this).removeClass("error-hilt");
            } else {
                $(this).addClass("error-hilt");
                $val = 1
            }
        });
        // if you want to check select fields  
        if ($val > 0) {
            var msg = 'Please enter the hightlighted values';
            $('.error-msgs').html(msg);
            return false;
        } else {

            return true;

        }
    });

    $('#profileupdate2').submit(function () {
        var $val = 0;
        //check text fields
        $("#profileupdate2 input.required").each(function () {
            if (($(this).val()) == "") {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            } else {
                $(this).parent().removeClass("error-hiltsd");
            }
        });
        $("#profileupdate2 textarea.required").each(function () {
            if (($(this).val()) == "") {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            } else {
                $(this).parent().removeClass("error-hiltsd");
            }
        });
        $("#profileupdate2 input.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            } else {
                $(this).parent().removeClass("error-hiltsd");
            }
        });

        $("#profileupdate2 select.required").each(function () {
            if (($(this).val()) == "") {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            } else {
                $(this).parent().removeClass("error-hiltsd");
            }
        });
        $("profileupdate2 select.nonzero").each(function () {
            if (($(this).val()) == '0') {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            } else {
                $(this).parent().removeClass("error-hiltsd");
            }
        });
        $("#profileupdate2 input.validmail").each(function () {

            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expr.test($(this).val())) {
                $(this).parent().removeClass("error-hiltsd");
            } else {
                $(this).parent().addClass("error-hiltsd");
                $val = 1
            }
        });
        // if you want to check select fields  
        if ($val > 0) {
            var msg = 'Please enter the hightlighted values';
            $('.error-msgs').html(msg);
            return false;
        } else {

            return true;

        }
    });
    
//    
//    $('#formdd').submit(function () {
//        var $val = 0;
//        //check text fields
//        $("#formdd input.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formdd textarea.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formdd input.nonzero").each(function () {
//            if (($(this).val()) == '0') {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//
//        $("#formdd select.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("profileupdate2 select.nonzero").each(function () {
//            if (($(this).val()) == '0') {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formdd input.validmail").each(function () {
//
//            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
//            if (expr.test($(this).val())) {
//                $(this).removeClass("error-hilt");
//            } else {
//                $(this).addClass("error-hilt");
//                $val = 1
//            }
//        });
//        // if you want to check select fields  
//        if ($val > 0) {
//            var msg = 'Please enter the hightlighted values';
//            $('.error-msgs').html(msg);
//            return false;
//        } else {
//
//            return true;
//
//        }
//    });
//    $('#formddfp').submit(function () {
//        var $val = 0;
//        //check text fields
//        $("#formddfp input.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formddfp textarea.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formddfp input.nonzero").each(function () {
//            if (($(this).val()) == '0') {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//
//        $("#formddfp select.required").each(function () {
//            if (($(this).val()) == "") {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("profileupdate2 select.nonzero").each(function () {
//            if (($(this).val()) == '0') {
//                $(this).addClass("error-hilt");
//                $val = 1
//            } else {
//                $(this).removeClass("error-hilt");
//            }
//        });
//        $("#formddfp input.validmail").each(function () {
//
//            var expr = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
//            if (expr.test($(this).val())) {
//                $(this).removeClass("error-hilt");
//            } else {
//                $(this).addClass("error-hilt");
//                $val = 1
//            }
//        });
//        // if you want to check select fields  
//        if ($val > 0) {
//            var msg = 'Please enter the hightlighted values';
//            $('.error-msgs').html(msg);
//            return false;
//        } else {
//
//            return true;
//
//        }
//    });

});
