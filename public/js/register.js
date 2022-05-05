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
                success: function(data) {
                    //alert(data);
                    if (data == 'success') window.location.href = './login';
                    $('#response-model').css("display", "flex");
                    $('#response-model .detail').html(data);
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