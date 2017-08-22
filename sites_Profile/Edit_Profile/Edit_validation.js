$(function() {

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function(element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    // my method for validate username
    $.validator.addMethod("username_regex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\.\-_]{3,30}$/i.test(value);
    }, "Please choise a username with only a-z 0-9.");

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element)
            || value.length >= 6
            && /\d/.test(value)
            && /[a-z]/i.test(value);
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

    $("#Edit-Profile-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                strongPassword: true
            },
            password2: {
                required: true,
                equalTo: '#password'
            },
            firstName: {
                required: true,
                nowhitespace: true,
                lettersonly: true,
                minlength: 2
            },
            secondName: {
                required: true,
                nowhitespace: true,
                lettersonly: true,
                minlength: 2
            },
            username: {
                required: true,
                minlength: 4,
                username_regex: true,

            },
            phone: {
                digits: true,
                minlength: 9,
            },
            terms: {
                required: true
            }
        },
        messages: {
            firstName:{
                required: "The First name field is mandatory!",
                minlength: "Choose a username of at least 2 letters!",
            },

            secondName:{
                required: "The second name field is mandatory!",
                minlength: "Choose a username of at least 2 letters!",
            },

            email: {
                required: 'Please enter an email address.',
                email: 'Please enter a <em>valid</em> email address.',
                remote: $.validator.format("{0} is already associated with an account.")
            },
            username:{
                required: "The username field is mandatory!",
                minlength: "Choose a username of at least 4 letters!",
                username_regex: "You have used invalid characters. Are permitted only letters numbers!",
                remote: "The username is already in use by another user!"
            },

            phone:{
                minlength: "At least 10 numbers!"
            },

            password:{
                required: "The password field is mandatory!",
                minlength: "Please enter a password at least 8 characters!"
            },
            password2:{
                equalTo: "The two passwords do not match!"
            },
        }
    });

});