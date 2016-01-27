// jQuery for page scrolling feature - requires jQuery Easing plugin

// click event for scroll button
$('.scrollToDiv').click(function(event) {
    event.preventDefault();
 
    // get the href attribute of the target div
    var scrollDiv = $(this).attr('href');
 
    // find the top position of the target div
    var position = $('' + scrollDiv + '').position();
    var positionTop = position.top;
 
    // scroll to the correct position
    $('html, body').stop().animate({
        scrollTop: positionTop
    }, 900, 'easeInOutExpo');
});