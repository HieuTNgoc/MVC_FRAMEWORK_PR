$(document).ready(function() {
    // Turn on over layout edit account
    $('.change-acc.btn').click(function() {
        $('.response-model.update-info').css("display", "flex");
    });

    // Turn off all over layout 
    $('.close-btn').click(function(event) {
        event.preventDefault();
        $('.response-model.update-info').css("display", "none");
    });
});

// Update user data with ajax jquery 
$(document).ready(function() {
    $('.response-model.update-info input').keypress(function(event) {
        var key_code = (event.keyCode ? event.keyCode : event.which);
        if (key_code == '13') {
            event.preventDefault();
            alert('You just click enter, form will submit now...');
            return $('#submit').click();
        }
    });
    $('#submit').click(function(event) {
        event.preventDefault();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var position = $('#position').val();
        var img_url = $('#img_url').val().split('\\').pop();
        var phone = $('#phone').val();
        var address = $('#address').val();
        // alert(address);
        $.ajax({
            url: "./account",
            type: "POST",
            data: { first_name: first_name, last_name: last_name, position: position, img_url: img_url, phone: phone, address: address },
            dataType: "json",
            success: function(data) {
                // alert(data);
                if (!data.success) {
                    return alert(data.msg);
                }
                alert(data.msg);
                location.reload();
            },
            error: function() {
                return alert('Nothing change! Please try again...');
            }
        });
    });
});

// Update img user when click on the avatar
$(document).ready(function() {
    $('#img-upload').click(function() {
        return $('#img_url_upload').click();
    });
    $('#img_url_upload').change(function(event) {
        event.preventDefault();
        var img_url = $('#img_url_upload').val().split('\\').pop();
        $.ajax({
            url: "./account/updateUserImg",
            type: "POST",
            data: { img_url: img_url },
            dataType: "json",
            success: function(data) {
                if (!data.success) {
                    return alert(data.msg);
                }
                alert(data.msg);
                location.reload();
            },
            error: function() {
                return alert('Nothing change! Please try again...');
            }
        });
    });
});

// Confirm logout btn
$(document).ready(function() {
    // Turn on over layout edit account
    $('.logout-btn').click(function() {
        $('#response-model').css("display", "flex");
    });

    // Turn off over layout edit account
    $('.close-btn').click(function(event) {
        event.preventDefault();
        $('#response-model').css("display", "none");
    });

    $('#yes-msg').click(function() {
        window.location.href = 'http://localhost/mvc_framework/logout';
    });
});

// change password btn
$(document).ready(function() {
    //Turn on over layout change password
    $('.change-pass.btn').click(function() {
        $('.response-model.change-password').css('display', 'flex');
    });

    // Turn off over layout change password
    $('.close-btn').click(function() {
        $('.response-model.change-password').css('display', 'none');
    });
});

// change password with ajax
$(document).ready(function() {
    $('.response-model.change-password').keypress(function(event) {
        var key_code = (event.keyCode ? event.keyCode : event.which);
        if (key_code == '13') {
            event.preventDefault();
            alert('You just click enter, form will submit now...');
            return $('#submit-pass').click();
        }
    });
    $('#submit-pass').click(function(event) {
        event.preventDefault();
        var old_pass = $('#old_pass').val();
        var new_pass = $('#new_pass').val();
        var confirm_pass = $('#confirm_pass').val();
        var option = $('#logout-selector').val();
        if (old_pass != '' && new_pass != '' && confirm_pass != '' && option != '') {
            if (new_pass != confirm_pass) {
                return alert('Confirm password does not match! Try again...');
            }
            $.ajax({
                url: "./account/changePassword",
                type: "POST",
                data: { old_pass: old_pass, new_pass: new_pass },
                dataType: "json",
                success: function(data) {
                    if (!data.success) {
                        return alert(data.msg);
                    }
                    alert(data.msg);
                    if (option == 'no') return location.reload();
                    alert('Your account will logout now!')
                    window.location.href = 'http://localhost/mvc_framework/logout';
                },
                error: function() {
                    return alert('Nothing change! Please try again...');
                }
            });
        } else {
            return alert('All the Fields are required! Please fill all.');
        }
    });
});