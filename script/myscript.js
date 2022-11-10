$('.toastrDefaultSuccess').click(function () {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});

AOS.init({
    duration: 1000
});


$(document).ready(function () {

    $("#myform").submit(function (e) {
        e.preventDefault();
    });


    $("#btn_submit").click(function () {
        // alert($("#exampleInputEmail1").val());

        if ($("#exampleInputEmail1").val() == "") {
            alert("Fill the form");
        } else {
            alert($("#exampleInputEmail1").val());
        }
    });

    // $(".form-control").blur(function () {
    //     // alert($(this).val());

    //     if ($(this).val() == "") {
    //         $(this).addClass("is-invalid");
    //         $(this).removeClass("is-valid");
    //     } else {
    //         $(this).addClass("is-valid");
    //         $(this).removeClass("is-invalid");
    //     }

    // });

    // $(".small-box").mouseover(function () {
    //     $(this).addClass("elevation-5");
    //     $(this).removeClass("elevation-2");
    // })
    // $(".small-box").mouseout(function () {
    //     $(this).addClass("elevation-2");
    //     $(this).removeClass("elevation-5");
    // })

    //Date picker
    $('#inflowdate').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#outflowdate').datetimepicker({
        format: 'DD-MM-YYYY'
    });




    $('.select2').select2();

    // Login form Validation

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


    // forget password validation form
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


    // Registration form validation

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






// $(document).ready(function () {
//     var Toast = Swal.mixin({
//         toast: false,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 30000
//     });

//     Toast.fire({
//         'Good job!',
//         'You clicked the button!',
//         'success'
//     })
// });