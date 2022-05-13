$(document).ready(function() {

    // Click to show or hide password    
    $('#show-pass-btn').click(function() {
        if ($('#password').attr('type') == "password") {
            $('#password').attr('type', 'text');
            $('#show-pass-btn .material-icons').css({ "font-size": "1em", "color": "#0073e7" });
        } else {
            $('#password').attr('type', 'password');
            $('#show-pass-btn .material-icons').css({ "font-size": "1.4em", "color": "#a9b3ab69" });
        }
    });

    // Click to show or hide confirm password    
    $('#show-pass1-btn').click(function() {
        if ($('#confirm_password').attr('type') == "password") {
            $('#confirm_password').attr('type', 'text');
            $('#show-pass1-btn .material-icons').css({ "font-size": "1em", "color": "#0073e7" });
        } else {
            $('#confirm_password').attr('type', 'password');
            $('#show-pass1-btn .material-icons').css({ "font-size": "1.4em", "color": "#a9b3ab69" });
        }
    });

    // Click to logo and redirect to home page
    $('.logo-login').click(function() {
        window.location.href = 'http://localhost/mvc_framework/home';
    });
});