// Login with ajax jquery 
$(document).ready(function() {
    $('#submit').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        // alert(email + " " + password);
        // var data = $('form#form_input').serialize();

        if (email != '' && password != '') {
            $.ajax({
                url: "./login",
                type: "POST",
                data: { email: email, password: password },
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
                    $('#response-model .content-model .close-btn').click(function() {
                        window.location.href = 'http://localhost/mvc_framework/account';
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