$(document).ready(function() {
    // Turn on over layout edit account
    $('.change-acc.btn').click(function() {
        $('.response-model.update-info').css("display", "flex");
    });

    // Turn off over layout edit account
    $('.close-btn').click(function(event) {
        event.preventDefault();
        $('.response-model.update-info').css("display", "none");
    });
});

// Update user data with ajax jquery 
$(document).ready(function() {
    $('input').keypress(function(event) {
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