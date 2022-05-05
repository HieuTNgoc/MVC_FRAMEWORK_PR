// Login with ajax jquery 
$(document).ready(function() {
    $('#submit').click(function() {
        var email = $('#email').val();
        var password = $('#password').val();

        //var data = $('form#form_input').serialize();

        if (email != '' && password != '') {
            $.ajax({
                url: "./login",
                type: "POST",
                data: { email: email, password: password },
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