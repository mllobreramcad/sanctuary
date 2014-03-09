jQuery(document).ready(function($) {
  $('.group').each(function(){
    var backgroundStyle = "url("+$(this).attr('data-background')+")";
    console.log('backgroundStyle', backgroundStyle, $(this));
    $(this).css("background-image", backgroundStyle);
  });

});