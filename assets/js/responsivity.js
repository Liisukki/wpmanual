//jQuery to open menu on click

jQuery(document).ready(function($) {
    // Toggle menu items on click
    $('#top-nav > div > ul > li:first-child').on('click', function() {
        $('#top-nav > div > ul > li:not(:first-child)').slideToggle(400);
    });

    // Adjust menu display on window resize
    $(window).resize(function() {
        if ($(window).width() > 400) {
            $('#top-nav > div > ul > li:not(:first-child)').show();
        } else { 
            $('#top-nav > div > ul > li:not(:first-child)').hide();
        }
    }).resize(); // Trigger the resize event on load to set the initial state
});


jQuery(document).ready(function() {
    console.log('ÄLÄLÄLLÄ');

});
