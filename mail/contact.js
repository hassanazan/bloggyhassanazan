jQuery(document).ready(function($) {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: contactFormParams.ajaxurl, // This is the correct URL for WordPress AJAX
            data: formData + '&action=contact_form',
            success: function(response) {
                if (response.success) {
                    alert(contactFormParams.successMessage);
                    $('#contactForm')[0].reset();
                } else {
                    alert(contactFormParams.errorMessage);
                }
            },
            error: function(response) {
                alert(contactFormParams.errorMessage);
            }
        });
    });
});
