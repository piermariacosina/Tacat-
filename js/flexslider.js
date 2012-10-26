(function($){
	$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
	animation: "slide",
	controlNav: false,
	animationLoop: true,
	slideshow: false,
	itemWidth: 210,
	itemMargin: 5,
	asNavFor: '#slider'
  });

  $('#slider').flexslider({
	animation: "slide",
	controlNav: false,
	animationLoop: false,
	slideshow: false,
	smoothHeight: true,
	mousewheel: false,
	multipleKeyboard: true,
	sync: "#carousel"
  });
});
})(jQuery);

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));