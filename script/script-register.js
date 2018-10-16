// JavaScript Document
$('document').ready(function() {
    /* validation page register*/
    $("#register-form").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 3
            },

            user_email: {
                required: true,
                email: true
            },
            gender: {
                required: true
            },

            job: {
                required: true
            },
            dob: {
                required: true,
                date: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            }


        },
        messages: {
            user_name: "please enter user name",
            password: {
                required: "please provide a password",
                minlength: "password must be at least have 8 characters"
            },
            user_email: "please enter a valid email address",
            cpassword: {
                required: "please retype your password",
                equalTo: "password doesn't match !"
            },
            gender: "Gender incoming",
            job: "What is your job",
            dob: {
                required: "Entre your naissance date",
                date: "Enter a valid date please"
            }
        },

        submitHandler: submitForm

    });
    /* validation */

    /* form submit */
    function submitForm() {
        var data = $("#register-form").serialize();
        $.ajax({

            type: 'POST',
            url: 'data/data-register.php',
            data: data,
            beforeSend: function() {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success: function(data) {
                if (data == 1) {

                    $("#error").fadeIn(1000, function() {


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                } else if (data == "registered") {

                    $("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up ...');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".register-form").load("index.php"); }); ', 5000);

                } else {

                    $("#error").fadeIn(2000, function() {

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});