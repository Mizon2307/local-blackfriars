(function($) {
  "use strict";

  //Opens/Closes burger menu on click.

 $('#hamburger').click(function() {
   $(this).toggleClass('animate');
   $('.menu').toggleClass('active-nav');
   // $('body, html').toggleClass('show');
 });

 $('.menu a').on('click',function(){
   $('.menu').removeClass('active-nav');
   $('#hamburger').removeClass('animate');
   // $('body, html').removeClass('show');
 });


  // Smooth scroll (anchor links)

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });




  // Timeout functions for success/error messages on contact form 7

  $(".wpcf7-submit").click(function() {
    setTimeout(function(){
        $(".wpcf7-display-none").removeClass("wpcf7-validation-errors");
    }, 5000);
  });

  $(".wpcf7-submit").click(function() {
    setTimeout(function(){
        $(".wpcf7-display-none").removeClass("wpcf7-mail-sent-ok");
    }, 5000);
  });


  if ( $( ".mc4wp-alert" ).hasClass( "mc4wp-notice" ) ) {
    setTimeout(function(){
        $('.mc4wp-alert').removeClass("mc4wp-notice");
    }, 6000);
  }

  if ( $( ".mc4wp-alert" ).hasClass( "mc4wp-success" ) ) {
    setTimeout(function(){
        $('.mc4wp-alert').removeClass("mc4wp-success");
    }, 6000);
  }


  //Slick slider options setup

  $('.slider').each(function() {
    var arrows = $(this).data('arrows'),
      dots = $(this).data('dots'),
      autoplay = $(this).data('autoplay'),
      fade = $(this).data('fade'),
      infinite = $(this).data('infinite');

    $(this).slick({
      arrows: arrows || false,
      dots: dots || false,
      autoplay: autoplay || false,
      fade: fade || false,
      infinite: infinite || false,

      slidesToShow: 1,
      'prevArrow': '<i class="icon i-ios-play-outline text-white"></i>',
      'nextArrow': '<i class="icon i-ios-play-outline slick-next text-white"></i>',
      autoplaySpeed:4500,
      speed:1000,
      mobileFirst: true
    });
  });

  $('.tab-slider').each(function() {
    var arrows = $(this).data('arrows'),
      dots = $(this).data('dots'),
      autoplay = $(this).data('autoplay'),
      fade = $(this).data('fade'),
      infinite = $(this).data('infinite');

    $(this).slick({
      arrows: arrows || false,
      dots: dots || false,
      autoplay: autoplay || false,
      fade: fade || false,
      infinite: infinite || false,

      slidesToShow: 1,
      'prevArrow': '<i class="icon i-play text-black"><p class="slick-text prev-text">Plan</p></i>',
      'nextArrow': '<i class="icon i-play slick-next text-black"><p class="slick-text">Specification</p></i>',
      autoplaySpeed:4500,
      speed:1000,
      mobileFirst: true,
      reInit: true
    });
  });


  // Make first tab checked in while loop
  $('#tab-1').attr('checked',true);


  // google maps

      function new_map( $el ) {

        // var
        var $markers = $el.find('.marker');


        // vars
        var args = {
          zoom		: 15,
          center		: new google.maps.LatLng(0, 0),
          mapTypeId	: google.maps.MapTypeId.ROADMAP
        };


        // create map
        var map = new google.maps.Map( $el[0], args);


        // add a markers reference
        map.markers = [];


        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

      // center map
        center_map( map );


        // return
        return map;

      }


      function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        var customMarker = "/wp-content/themes/local-blackfriars/assets/img/map-marker.svg";

        // create marker
        var marker = new google.maps.Marker({
          position	: latlng,
          map			  : map,
          icon      : customMarker
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
          // create info window
          var infowindow = new google.maps.InfoWindow({
            content		: $marker.html()
          });

          // show info window when marker is clicked
          google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

          });
        }

      }

      function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

          var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

          bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
          // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 15 );
        }
        else
        {
          // fit to bounds
          map.fitBounds( bounds );
        }

      }

      $('.acf-map').each(function(){

        // create map
        map = new_map( $(this) );

      });



  })(jQuery);
