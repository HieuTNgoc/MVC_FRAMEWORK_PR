$(document).ready(function() {
    // Turn on over layout edit account
    $('.change-acc.btn').click(function() {
        $('#response-model').css("display", "flex");
    });

    // Turn off over layout edit account
    $('.close-btn').click(function() {
        $('#response-model').css("display", "none");
    });
});

// Update user data with ajax jquery 
$(document).ready(function() {
    $('#submit').click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        // alert(email + " " + password);
        // var data = $('form#form_input').serialize();

        if (email != '' && password != '') {
            $.ajax({
                url: "./account",
                type: "POST",
                data: { email: email, password: password },
                success: function(data) {

                }
            });
        }
    });
});