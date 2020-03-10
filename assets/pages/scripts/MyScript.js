function flash(type, message, title) {
    Command: toastr[type](message, title);
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "progressBar": true,
    };
}

/* login-form => admin_1/page_general_blog_post.php */

$("input[name='login']").on("click", function (e) {
    e.preventDefault();
    let email = $(".emailValueLogin").val();
    let password = $(".passwordValueLogin").val();
    let errorSpan = $(".errorLogin");

    if (email !== "" || password !== "") {
        $.ajax({
            url: `${window.location.origin}/PHPProject/controllers/loginControllers.php`,
            method: "post",
            data: {"email": email, "password": password},
            dataType: "json",
            success: function (result) {
                if (result.error === "error") {
                    errorSpan.text(result.message);
                    errorSpan.parent().removeClass("display-hide");
                    errorSpan.parent().css("display", "block");
                } else if (result.error === "not found") {
                    errorSpan.text(result.message);
                    errorSpan.parent().removeClass("display-hide");
                    errorSpan.parent().css("display", "block");
                } else {
                    window.location = `${window.location.origin}/PHPProject/admin_1/index.php`;
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    } else {
        errorSpan.text("You should enter email and password");
        errorSpan.parent().removeClass("display-hide");
        errorSpan.parent().css("display", "block");
    }
    setTimeout(function () {
        errorSpan.parent().addClass("display-hide");
        errorSpan.parent().css("display", "none");
    }, 5000);
});

// $(".deleteProduct").on("click",function (e) {
//     let user_id = $(e.target).parent().find(".userID").val();
//     let comment_id = $(e.target).parent().find(".idComment").val();
//     $.ajax({
//         url:`${window.location.origin}/PHPProject/controllers/addPostController.php`,
//         method: "post",
//         data: {"id":comment_id,"user_id":user_id,"deleteComment":"deleteComment"},
//         dataType:"json",
//         success:function(result){
//             if(result.error === "userError"){
//                 flash("error","You are not allowed to delete this comment","Error");
//             }else if(result === true){
//                 $(e.target).parent().parent().remove();
//                 flash("success","The comment is deleted successfully","Success");
//             }else{
//                 flash("error","There is some thing wrong with delete","Error");
//             }
//         },
//         error:function(error){
//             console.log(error)
//         }
//     })
// });

var TableDatatablesButtons = function () {

    var initTable1 = function () {
        var table = $('#sample_1');

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},


            buttons: [
                {
                    extend: 'print', className: 'btn dark btn-outline',
                    footer: false,
                    autoPrint: true,
                    title: $('h3.page-title').text(),
                    exportOptions: {
                        columns: ':not(.no-print)'
                    }
                },
                {extend: 'copy', className: 'btn red btn-outline'},
                {
                    extend: 'pdf',
                    className: 'btn green btn-outline',
                    title: $('h3.page-title').text(),
                    exportOptions: {
                        columns: ':not(.no-print)'
                    }
                },
                {
                    extend: 'excel', className: 'btn yellow btn-outline ',
                    title: $('h3.page-title').text(),
                    exportOptions: {
                        columns: ':not(.no-print)'
                    }
                },
                {
                    extend: 'csv', className: 'btn purple btn-outline ',
                    title: $('h3.page-title').text(),
                    exportOptions: {
                        columns: ':not(.no-print)'
                    }
                },
                {extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            //"ordering": false, disable column ordering
            //"paging": false, disable pagination

            "order": [
                [0, 'asc']
            ],

            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();

jQuery(document).ready(function () {
    TableDatatablesButtons.init();
});


$('.deleteProduct').click(function(){
    let that = this;
    bootbox.dialog({
        message: "Are you sure to delete this product ?",
        title: "Product",
        buttons: {
            success: {
                label: "Delete",
                className: "red",
                callback: function() {
                    let idProduct = $(that)[0].id;
                    let target = $(that).parent().parent();
                    $.ajax({
                        url:`${window.location.origin}/PHPProject/controllers/productsController.php`,
                        method: "post",
                        data: {"id":idProduct,"deleteProduct":"deleteProduct"},
                        dataType:"json",
                        success:function(result){
                            if(result === true){
                                target.remove();
                                flash("success","The product is deleted successfully","Success");
                            }else{
                                flash("error","There is some thing wrong with delete","Error");
                            }
                        },
                        error:function(error){
                            console.log(error)
                        }
                    })
                }
            },
            // danger: {
            //     label: "Danger!",
            //     className: "red",
            //     callback: function() {
            //         alert("uh oh, look out!");
            //     }
            // },
            main: {
                label: "Cancel",
                className: "blue",
                callback: function() {
                    flash("info","The delete is canceled","Info");
                }
            }
        }
    });
});

$('.deleteUser').click(function(){
    let that = this;
    bootbox.dialog({
        message: "Are you sure to delete this user ?",
        title: "Product",
        buttons: {
            success: {
                label: "Delete",
                className: "red",
                callback: function() {
                    let idUser = $(that)[0].id;
                    let target = $(that).parent().parent();
                    $.ajax({
                        url:`${window.location.origin}/PHPProject/controllers/usersController.php`,
                        method: "post",
                        data: {"id":idUser,"deleteUser":"deleteUser"},
                        dataType:"json",
                        success:function(result){
                            console.log(result);
                            if(result === true){
                                target.remove();
                                flash("success","The user is deleted successfully","Success");
                            }else{
                                flash("error","There is some thing wrong with delete","Error");
                            }
                        },
                        error:function(error){
                            console.log(error)
                        }
                    })
                }
            },
            main: {
                label: "Cancel",
                className: "blue",
                callback: function() {
                    flash("info","The delete is canceled","Info");
                }
            }
        }
    });
});

var FormValidationMd = function() {
    var handleValidation2 = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        var form1 = $('.validateProduct');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            messages: {
                product_img: {
                    accept: "The file should be Image with Ext: .png, .jpg, .jpeg",
                    filesize:"The file should be less than 1M"
                }
            },// validate all fields including form hidden input
            rules: {
                product_name: {
                    minlength: 2,
                    required: true
                },
                price: {
                    required: true,
                    digits: true
                },
                category_id: {
                    required: true
                },
                status: {
                    required: true
                },
                product_img: {
                    required: false,
                    accept: "image/jpeg, image/jpg, image/png",
                    extension: "png|jpeg|jpg",
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            // submitHandler: function(form) {
            //     success1.show();
            //     error1.hide();
            // }
        });
    };

    var handleValidation3 = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        var form1 = $('.validateUser');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            messages: {
                product_img: {
                    accept: "The file should be Image with Ext: .png, .jpg, .jpeg",
                    filesize:"The file should be less than 1M"
                }
            },// validate all fields including form hidden input
            rules: {
                user_name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                ext: {
                    required: true
                },
                room_id: {
                    required: true
                },
                user_img: {
                    required: false,
                    accept: "image/jpeg, image/jpg, image/png",
                    extension: "png|jpeg|jpg",
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            // submitHandler: function(form) {
            //     success1.show();
            //     error1.hide();
            // }
        });
    };

    return {
        //main function to initiate the module
        init: function() {
            handleValidation2();
            handleValidation3();
        }
    };
}();

jQuery(document).ready(function() {
    FormValidationMd.init();
});


