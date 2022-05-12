$(document).ready(function() {

    // Layout edit account----------------------------------------------------
    // Turn on over layout edit account
    $('.change-acc.btn').click(function() {
        $('.response-model.update-info').css("display", "flex");
    });

    // Turn off all over layout 
    $('.close-btn').click(function(event) {
        event.preventDefault();
        $('.response-model.update-info').css("display", "none");
    });


    // Update user data with ajax jquery ------------------------------------
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
        var phone = $('#phone').val();
        var address = $('#address').val();

        var form_data = new FormData();
        var file = $('#img_url').get(0).files[0];

        form_data.append('file', file);

        form_data.append('first_name', first_name);
        form_data.append('last_name', last_name);
        form_data.append('position', position);
        form_data.append('phone', phone);
        form_data.append('address', address);

        $.ajax({
            url: "./account/updateUser",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(data) {
                alert(data.msg);
                if (data.success) {
                    location.reload();
                }
            },
            error: function() {
                return alert('Nothing change! Please try again...');
            }
        });
    });


    // Update img user when click on the avatar--------------------------------
    $('#img-upload').click(function() {
        return $('#img_url_upload').click();
    });
    $('#img_url_upload').change(function(event) {
        event.preventDefault();
        var file = this.files[0];
        var form_data = new FormData();
        form_data.append('file', file);
        // alert(file.name);
        $.ajax({
            url: './account/updateUserImg',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(data) {
                alert(data.msg);
                if (data.success) {
                    location.reload();
                }
            },
            error: function() {
                return alert('Nothing change! Please try again...');
            }
        });
    });


    // Confirm logout btn--------------------------------------------------------
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
        window.location.href = 'http://localhost/mvc_framework/logout/executeLogout';
    });


    // change password btn----------------------------------------------------------

    //Turn on over layout change password
    $('.change-pass.btn').click(function() {
        $('.response-model.change-password').css('display', 'flex');
    });

    // Turn off over layout change password
    $('.close-btn').click(function() {
        $('.response-model.change-password').css('display', 'none');
    });


    // change password with ajax-----------------------------------------------------

    // Update img not affect by cookie 
    var src = $('#img-upload').attr('src') + '?v=' + Math.random();
    $('#img-upload').attr('src', src);
    $('#avt').attr('src', src);

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
                    window.location.href = 'http://localhost/mvc_framework/logout/executeLogout';
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