jQuery(document).ready(function($) {
  $('.group').each(function(){
    var backgroundStyle = "url("+$(this).attr('data-background')+")";
    console.log('backgroundStyle', backgroundStyle, $(this));
    $(this).css("background-image", backgroundStyle);
  });
  
  $('.groupbackground').each(function(){
    $(this).css("display","none");
  });

  $('.group1').parallax("50%", 0, 0.1, true);
  $('.group2').parallax("50%", 864, 0.1, true);
  $('.group3').parallax("50%", 1600, 0.1, true);
  $('.group4').parallax("50%", 2400, 0.1, true);
  $('.group5').parallax("50%", 3200, 0.1, true);
    
});