(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });
  $('#intellisense-switch').change(function () {
      
    if ($(this).is(':checked')) {
            $.toast({
                    heading: 'Please Wait',
                    text: 'Initiating Analysis',
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#007bff',
                    position: 'top-right'
        });
        $('#intellisenseprogress-box').show();
        $('#analysis-box').show();
        var w = 0;
        var intellisenceProgress = setInterval(function () {
            if (w == 100) {
                $('#finishingup-done').show();
                $('#view-report').show();
                clearInterval(intellisenceProgress);
                $('#intellisenseprogress-box').hide();
                $.toast({
                    heading: 'Please Wait',
                    text: 'Analysis Complete',
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#007bff',
                    position: 'top-right'
                });
            }
            else{
                w = w % 100 + 20;
                $('#animate').width(w + '%').text(w + '%')
                if (w <= 20){
                $('#pendingtickets-box').show();
                }
                if(w <=40 && w >= 21){
                $('#pendingtickets-done').show();
                $('#setpriorities-box').show();
                }
                if(w <=60 && w >= 41){
                $('#setpriorities-done').show();
                $('#jobassignment-box').show();
                }
                if(w <=80 && w >= 61){
                $('#jobassignment-done').show();
                $('#generatereport-box').show();
                }
                if(w <=100 && w >= 81){
                $('#generatereport-done').show();
                $('#finishingup-box').show();

                }
            }
         
        }, 4000);
    }
    else{
        $.toast({
                    heading: 'Please Wait',
                    text: 'Turning Off',
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#007bff',
                    position: 'top-right'
        });
        $('#intellisenseprogress-box').hide();
        $('#analysis-box').hide();
    }
});

})(jQuery); // End of use strict
