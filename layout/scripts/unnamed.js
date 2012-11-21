/*
 * UNNAMED JS
 */

unnamed = {
	progress_goto: function(ext_id) {
		var top = $("#" + ext_id).offset().top;
		$("body").animate({scrollTop: top}, "slow");
		return false;
	}
}

/*
 * UCODE JS
 */

ucode = {
	toggler: function(self) {
		$(self).parent().toggleClass("toggled");
	},
	
	tabs: function(self, id) {
		var wrapper = $(self).closest(".tabs-wrapper");
		$(".tab, .tab-content", wrapper).removeClass("active");
		$(".tab-"+id+", .tab-content-"+id, wrapper).addClass("active");
	}
};
