$(document).ready(function () {
    // Add smooth scrolling to add and search
    $("#addSlide, #searchSlide").on('click', function (event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // animate() to add smooth page scroll
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function () { //milliseconds to scroll

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    });
});