var FormValidator = function () {
    
    var runValidator1 = function () {
        var form1 = $('#form');
        var errorHandler1 = $('.errorHandler', form1);
        var successHandler1 = $('.successHandler', form1);
        $.validator.addMethod("FullDate", function () {
            
            if ($("#dd").val() != "" && $("#mm").val() != "" && $("#yyyy").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Please select a day, month, and year');
        $('#form').validate({
            errorElement: "span", 
            errorClass: 'help-block',
            errorPlacement: function (error, element) { 
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element); 
                }
            },
            ignore: "",
            rules: {
                firstname: {
                    minlength: 2,
                    required: true
                },
                lastname: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                yyyy: "FullDate",
                gender: {
                    required: true
                },
                zipcode: {
                    required: true,
                    number: true,
                    minlength: 5,
                    minlength: 5
                },
                city: {
                    required: true
                },
                newsletter: {
                    required: true
                }
            },
            messages: {
                firstname: "Please specify your first name",
                lastname: "Please specify your last name",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                gender: "Please check a gender!"
            },
            groups: {
                DateofBirth: "dd mm yyyy",
            },
            invalidHandler: function (event, validator) { 
                successHandler1.hide();
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
             
            },
            unhighlight: function (element) {  
                $(element).closest('.form-group').removeClass('has-error');
             
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                 
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                successHandler1.show();
                errorHandler1.hide();
                 
            }
        });
    };
 
    var runValidator2 = function () {
        var form2 = $('#form2');
        var errorHandler2 = $('.errorHandler', form2);
        var successHandler2 = $('.successHandler', form2);
        $.validator.addMethod("getEditorValue", function () {
            $("#editor1").val($('.summernote').code());
            if ($("#editor1").val() != "" && $("#editor1").val() != "<br>") {
                $('#editor1').val('');
                return true;
            } else {
                return false;
            }
        }, 'This field is required.');
        form2.validate({
            errorElement: "span",  
            errorClass: 'help-block',
            errorPlacement: function (error, element) {  
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {  
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.hasClass("ckeditor")) {
                    error.appendTo($(element).closest('.form-group'));
                } else {
                    error.insertAfter(element);
                    
                }
            },
            ignore: "",
            rules: {
                firstname2: {
                    minlength: 2,
                    required: true
                },
                lastname2: {
                    minlength: 2,
                    required: true
                },
                email2: {
                    required: true,
                    email: true
                },
                occupation: {
                    required: true
                },
                dropdown: {
                    required: true
                },
                services: {
                    required: true,
                    minlength: 2
                },
                creditcard: {
                    required: true,
                    creditcard: true
                },
                url: {
                    required: true,
                    url: true
                },
                zipcode2: {
                    required: true,
                    number: true,
                    minlength: 5,
                    minlength: 5
                },
                city2: {
                    required: true
                },
                editor1: "getEditorValue",
                editor2: {
                    required: true
                }
            },
            messages: {
                firstname: "Please specify your first name",
                lastname: "Please specify your last name",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                services: {
                    minlength: jQuery.format("Please select  at least {0} types of Service")
                }
            },
            invalidHandler: function (event, validator) {  
                errorHandler2.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
 
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
              
            unhighlight: function (element) {  
                $(element).closest('.form-group').removeClass('has-error');
             
            },
            success: function (label, element) {
                label.addClass('help-block valid');
            
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                successHandler2.show();
                errorHandler2.hide();
            
            }
        });
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });
        CKEDITOR.disableAutoInline = true;
        $('textarea.ckeditor').ckeditor();
    };
    return {
    
        init: function () {
            runValidator1();
            runValidator2();
        }
    };
}();