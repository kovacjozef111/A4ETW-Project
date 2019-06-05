$(document).ready(function () {

    $('#createUserForm').validate({
        rules: {
            nick: {
                required: true,
                minlength: 6,
                maxlength: 64
            },
            email: {
                required: true,
                email: true,
                maxlength: 256
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                equalTo: "#password"
            }
        }
    });

    $('#createThreadForm').validate({
        rules: {
            title: {
                required: true,
                minlength: 4,
                maxlength: 256
            },
            threadText: {
                required: true,
                minlength: 16
            }
        }
    });

    $('#formRegister').validate({
        rules: {
            name: {
                required: true,
                minlength: 6,
                maxlength: 64
            },
            email: {
                required: true,
                email: true,
                maxlength: 256
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                equalTo: "#password"
            }
        }
    });

    $('#formLogin').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 256
            },
            password: {
                required: true,
                minlength: 6
            }
        }
    });

    $('#createReplyForm').validate({
        rules: {
            replyText: {
                required: true,
                minlength: 16
            }
        }
    });

    $('#passwordResetForm1').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });

    $('#passwordResetForm2').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });
});