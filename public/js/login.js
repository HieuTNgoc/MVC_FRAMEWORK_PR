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
                success: function(data) {
                    // alert(data);
                    if (data == 'success') {
                        window.location.href = 'http://localhost/mvc_framework/login/account';
                    } else {
                        $('#response-model').css("display", "flex");
                        $('#response-model .detail').html(data);
                    }
                }
            });
        } else {
            $('#response-model').css("display", "flex");
            $('#response-model .detail').html("All the Fields are required! Please fill all.");
        }
    });
});

// Login with ajax jquery 
$(document).ready(function() {
    $('.close-btn').click(function() {
        $('#response-model').css("display", "none");
    });
});