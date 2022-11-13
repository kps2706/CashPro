// info animation initialize
AOS.init({
    duration: 1000
});


$(document).ready(function () {

    $("#myform").submit(function (e) {
        e.preventDefault();
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $("#btn_submit").click(function () {
        // alert($("#exampleInputEmail1").val());

        if ($("#exampleInputEmail1").val() == "") {
            alert("Fill the form");
        } else {
            alert($("#exampleInputEmail1").val());
        }
    });


    //info Date picker

    $('#inflowdate').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#outflowdate').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    // info select 2 initialize 

    $('.select2').select2();

    // Info Login form Validation

    $('#login_form').validate({
        rules: {
            txt_username: {
                required: true
            },
            txt_userpassword: {
                required: true
            },
        },
        messages: {
            txt_username: {
                required: "Please enter a username"
            },
            txt_userpassword: {
                required: "Please provide a password"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    //Info  forget password validation form

    $('#forget_pass_form').validate({
        rules: {
            useremail: {
                required: true,
                email: true
            },
        },
        messages: {
            useremail: {
                required: "Register Email is mandatory for password reset.",
                email: "Please enter a valid email address"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    //Info Registration form validation

    $('#registration_form').validate({
        rules: {
            fname_txt: {
                required: true
            },
            email_txt: {
                required: true,
                email: true
            },
            username_txt: {
                required: true
            },
            password_txt: {
                required: true,
                minlength: 5
            },
            terms: {
                required: true
            },
        },
        messages: {
            fname_txt: {
                required: "Please enter your full name"
            },
            email_txt: {
                required: "Please enter your email address",
                email: "Please enter a validate email address"
            },
            username_txt: {
                required: "Please enter your user name",
                minlength: "Your username must be at least 5 characters long"
            },
            email_txt: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            terms: "Please accept our terms & conditions"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});






