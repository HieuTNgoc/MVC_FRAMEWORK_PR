// Login with ajax jquery 
$(document).ready(function() {

    // Close over layout login announcement 
    $('.close-btn').click(function() {
        $('#response-model').css("display", "none");
    });

    $('#submit').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var saved = $('#saved').is(':checked');

        if (email == '' || password == '') {
            $('#response-model').css("display", "flex");
            $('#response-model .detail').html("All the Fields are required! Please fill all.");
            return;
        }
        $.ajax({
            url: "./login/executeLogin",
            type: "POST",
            data: { email: email, password: password, saved: saved },
            dataType: "json",
            success: function(data) {
                $('#response-model').css("display", "flex");
                $('#response-model .detail').html(data.msg);
                if (!data.success) {
                    return;
                }
                $('#response-model .material-icons').css("color", "rgb(66 205 32)");
                $('.header-content i.material-icons').html("check");
                $('#response-model .content-model .footer-content').css("color", "rgb(66 205 32)");
                $('#response-model .content-model .footer-content:hover').css({ "background-color": "rgb(218 239 209)", "color": "rgb(66 205 32)" });
                $('#response-model .content-model .close-btn').click(function() {
                    window.location.href = 'http://localhost/mvc_framework/account';
                });
            }
        });

    });
});