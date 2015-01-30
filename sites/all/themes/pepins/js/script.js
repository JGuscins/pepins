(function($){
  $( document ).ready(function() {
    // COLLAPSE MENU
    $('#optional_options_inner').on('hidden.bs.collapse', function () {
      $('h3.optional_options').removeClass('collapsed');
    });

    $('#optional_options_inner').on('show.bs.collapse', function () {
      $('h3.optional_options').addClass('collapsed');
    });

    // LOGIN BUTTOn
    $('#login-button').hover(function(e) {
      $('#forgot-password-box').hide();
    });

    // FORGOT PASSWORD
    $('#forgot-password').hover(function(e) {
      $('#forgot-password-box').fadeIn(300);
    });

    if ( $(".field-name-field-campaign-video-images .field-item").length > 1 ) {

      thumbs = '';
      counter = 0;
      $(".field-name-field-campaign-video-images .field-item").each(function( index ) {
         counter++;
         imgurl = '';

         if ( $(this).find('.media-youtube-video').length > 0  ) {
          /** youtube **/
          imgurl  = 'http://img.youtube.com/vi/' + $(this).find('iframe').attr('title') + '/1.jpg';

         } else if (  $(this).find('.media-vimeo-video').length > 0     ) {
          /** Vimeo **/
           $.ajax({
            type:'GET',
            url: 'http://vimeo.com/api/v2/video/' + $(this).find('iframe').attr('title') + '.json',
            jsonp: 'callback',
            dataType: 'jsonp',
            success: function(data){
              var thumbnail_src = data[0].thumbnail_small;
              $('.slide_thumb_'+counter).attr('src',thumbnail_src);
            }
          });
         } else {
          /** Image **/
          imgurl  =  $(this).find('img').attr('src');
          imgurl  = imgurl.replace("/gallery/", "/gallery_thumb/");
         }

         $(this).addClass('slide'+counter);
         if (counter > 1 ) {
          $(this).hide();
         }
        thumbs  += '<img src="'+imgurl+'" alt="" class="slide_thumb  slide_thumb_'+counter+'" data-class="slide'+counter + '"  /> ';
      });
      $(".field-name-field-campaign-video-images").append(thumbs);

      $('.slide_thumb').click(function() {
        $(".field-name-field-campaign-video-images .field-item").hide();
        $(".field-name-field-campaign-video-images ." + $(this).attr('data-class') ).show();
      });
    }

    $('.node-texter.node-teaser h2').click(function() {
      $(this).closest('.node-texter.node-teaser').toggleClass('active');
      return false;
    })
      .eq(0).click();

    if($('body').hasClass('front'))
    {
      $('body.front').eq(0).each(fixedNavbarColor);
      $(window).on('scroll', fixedNavbarColor);
    }

    $(window)
      .on('resize', resizeSubmenu)
      .on('resize', resizeFooter); // retain sticky footer
    resizeSubmenu();

    $('#navbar .region-navigation').on('tap click', toggleSubmenu);
    if(typeof $.tap === 'undefined')
    {
      $('#block-menu-menu-info-menu').on('click', toggleSubmenu);
    }
    else
    {
      $('#block-menu-menu-info-menu').on('tap', toggleSubmenu);
    }
  });

 })(jQuery);

function fixedNavbarColor(){
  if(jQuery(document).scrollTop() === 0)
  {
    jQuery('#navbar')
      .removeClass('fixed');
  }
  else
  {
    jQuery('#navbar')
      .addClass('fixed');
  }
}

function resizeSubmenu(){
  jQuery('#block-menu-menu-info-menu').height(jQuery(window).height());
}

function resizeFooter(){
  var newHeight = jQuery('.footer').outerHeight();
  jQuery('.push').height(newHeight + 64);
  jQuery('.wrapper').css('margin-bottom', -newHeight);
}

function toggleSubmenu(e){
  jQuery('#block-menu-menu-info-menu').toggleClass('open');
}