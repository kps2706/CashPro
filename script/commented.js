

// let menucontainer = document.getElementById('myMenu');
// var menu = menucontainer.getElementsByClassName("nav-link");

// for (var i = 0; i < menu.length; i++) {

//     menu[i].addEventListener("click", function () {
//         var current = document.getElementsByClassName("active");
//         alert(current[0].className);
//         current[0].classList.remove("active");
//         alert(current[0].className);

//         alert(this.className);

//         this.classList.add(" active");

//     });


// }



// $(document).ready(function (e) {

//     $('.nav-link').removeClass('active');//or $('.active').removeClass('active');
// });

// $(document).on("click", function () {
//     $('.nav-link').addclass('active');
// })



// highlight form validation class and remove "is-valid"

// $("#exampleInputEmail1").blur(function () {
//     // alert($("#exampleInputEmail1").val());

//     if ($("#exampleInputEmail1").val() == "") {
//         $("#exampleInputEmail1").addClass("is-invalid");
//         $("#exampleInputEmail1").removeClass("is-valid");
//     } else {
//         $("#exampleInputEmail1").addClass("is-valid");
//         $("#exampleInputEmail1").removeClass("is-invalid");
//     }

// });

// INFO Add and Remove classes on Focus and Blur

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

// INFO toster event mention

// $('.toastrDefaultSuccess').click(function () {
//     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
// });


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