//
// CSS Transitions as JS
//
$(function() {
	$("#menu ul ul").each(function() {
		$(this).css({height: "0px"});
	});
	
	$("#menu li").hover(function() {
		$("ul", this).stop().animate({height: "60px"}, 250);
	}, function() {
		$("ul", this).stop().animate({height: "0px"}, 250);
	});
});
