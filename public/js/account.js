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
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var position = $('#position').val();
        var img_url = $('#img_url').val().split('\\').pop();
        var phone = $('#phone').val();
        var address = $('#address');
        alert(url_img);
        $.ajax({
            url: "./account",
            type: "POST",
            data: { first_name: first_name, last_name: last_name, position: position, img_url: img_url, phone: phone },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
});