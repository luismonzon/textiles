
$(function () {
		$('.pglinks').on({
			click: function (e) {
				ProcessPagination(this);
				return false;
			}
		}, '.pagination-css');
	});

	function ProcessPagination(obj) {
		var id = $(obj).attr('id');
		if (id != undefined) {
			var pid = null;
		if (id.indexOf("pl_") != -1) {
			pid = id.replace("pl_", "");
		}
		else if (id.indexOf("pn_") != -1) {
			pid = id.replace("pn_", "");
		}
		else if (id.indexOf("pg_") != -1) {
			pid = id.replace("pg_", "");
		}
		else if (id.indexOf("pp_") != -1) {
			pid = id.replace("pp_", "");
		}
		else if (id.indexOf("p_") != -1) {
			pid = id.replace("p_", "");
		}
			alert(pid + " linke selected");
		}
	}

/* activate sidebar */
$('#sidebar').affix({
  offset: {
    top: 235
  }
});

/* activate scrollspy menu */
var $body   = $(document.body);
var navHeight = $('.navbar').outerHeight(true) + 10;

$body.scrollspy({
	target: '#leftCol',
	offset: navHeight
});

/* smooth scrolling sections */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
});