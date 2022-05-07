// Register with ajax jquery 
$(document).ready(function() {
    $('#submit').click(function(e) {
        e.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        //var data = $('form#form_input').serialize();

        if (username != '' && email != '' && password != '' && confirm_password != '') {
            $.ajax({
                url: "./register",
                type: "POST",
                data: { username: username, email: email, password: password, confirm_password: confirm_password },
                dataType: "json",
                success: function(data) {
                    $('#response-model').css("display", "flex");
                    $('#response-model .detail').html(data.msg);
                    if (!data.success) {
                        return;
                    }
                    $('#response-model .material-icons').css("color", "rgb(66 205 32)");
                    $('#response-model .content-model .footer-content').css("color", "rgb(66 205 32)");
                    $('#response-model .content-model .footer-content:hover').css({ "background-color": "rgb(218 239 209)", "color": "rgb(66 205 32)" });
                    $('#response-model .content-model .footer-content').click(function() {
                        window.location.href = 'http://localhost/mvc_framework/login';
                    });
                }
            });
        } else {
            $('#response-model').css("display", "flex");
            $('#response-model .detail').html("All the Fields are required! Please fill all.");
        }
    });
});

// Register with ajax jquery 
$(document).ready(function() {
    $('.close-btn').click(function() {
        $('#response-model').css("display", "none");
    });
});