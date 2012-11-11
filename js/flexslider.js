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

<!--Start of Zopim Live Chat Script-->
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//cdn.zopim.com/?m184gig5MLQFJtIJolmRJ4FB8HEPhPJi';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
<!--End of Zopim Live Chat Script-->