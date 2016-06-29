//easing 1.3
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});



//lavaLamp 1.3.4
(function($) {
jQuery.fn.lavaLamp = function(o) {
	o = $.extend({
				'target': 'li', 
				'fx': 'easeOutQuint',
				'speed': 500, 
				'click': function(){return true}, 
				'startItem': '',
				'autoReturn': true,
				'returnDelay': 0,
				'setOnClick': true,
				'homeTop':0,
				'homeLeft':0,
				'homeWidth':0,
				'homeHeight':0,
				'returnHome':false,
				'autoResize':false
				}, 
			o || {});

	function getInt(arg) {
		var myint = parseInt(arg);
		return (isNaN(myint)? 0: myint);
	}

	if (o.autoResize)
		$(window).resize(function(){
			$(o.target+'.current-menu-item').trigger('mouseenter');
		});

	return this.each(function() {
		if ($(this).css('position')=='static')
			

		if (o.homeTop || o.homeLeft) { 
			var $home = $('<'+o.target+' class="homeLava"></'+o.target+'>').css({ 'left':o.homeLeft, 'top':o.homeTop, 'width':o.homeWidth, 'height':o.homeHeight, 'position':'absolute','display':'block' });
			$(this).prepend($home);
		}

		var path = location.pathname + location.search + location.hash, $selected, $back, $lt = $(o.target+'[class!=noLava]', this), delayTimer, bx=0, by=0;

		$selected = $(o.target+'.current-menu-item', this);
		
		if (o.startItem != '')
			$selected = $lt.eq(o.startItem);

	
		if ((o.homeTop || o.homeLeft) && $selected.length<1)
			$selected = $home;

	
		if ($selected.length<1) {
			var pathmatch_len=0, $pathel;
	
			$lt.each(function(){ 
				var thishref = $('a:first',this).attr('href');
	
				if (path.indexOf(thishref)>-1 && thishref.length > pathmatch_len )
				{
					$pathel = $(this);
					pathmatch_len = thishref.length;
				}
	
			});
			if (pathmatch_len>0) {

				$selected = $pathel;
			}

		}

		if ( $selected.length<1 )
			$selected = $lt.eq(0);
		$selected = $($selected.eq(0).addClass('current-menu-item'));
			
		$lt.bind('mouseenter', function() {

			if(delayTimer) {clearTimeout(delayTimer);delayTimer=null;}
			move($(this));
		}).click(function(e) {
			if (o.setOnClick) {
				$selected.removeClass('current-menu-item');
				$selected = $(this).addClass('current-menu-item');
			}
			return o.click.apply(this, [e, this]);
		});
		
		$back = $('<'+o.target+' class="backLava"><div class="leftLava"></div><div class="bottomLava"></div><div class="cornerLava"></div></'+o.target+'>').css({'position':'absolute','display':'block'}).prependTo(this);

		bx = getInt($back.css('borderLeftWidth'))+getInt($back.css('borderRightWidth'))+getInt($back.css('paddingLeft'))+getInt($back.css('paddingRight'));
		by = getInt($back.css('borderTopWidth'))+getInt($back.css('borderBottomWidth'))+getInt($back.css('paddingTop'))+getInt($back.css('paddingBottom'));


		if (o.homeTop || o.homeLeft)
			$back.css({ 'left':o.homeLeft, 'top':o.homeTop, 'width':o.homeWidth, 'height':o.homeHeight });
		else
		{
			$back.css({ 'left': $selected.position().left, 'top': $selected.position().top, 'width': $selected.outerWidth()-bx, 'height': $selected.outerHeight()-by }); 
		}

		$(this).bind('mouseleave', function() {
			var $returnEl = null;
			if (o.returnHome)
				$returnEl = $home;
			else if (!o.autoReturn)
				return true;
		
			if (o.returnDelay) {
				if(delayTimer) clearTimeout(delayTimer);
				delayTimer = setTimeout(function(){move($returnEl);},o.returnDelay);
			}
			else {
				move($returnEl);
			}
			return true;
		});

		function move($el) {
			if (!$el) $el = $selected;

			$back.stop()
			.animate({
				'left': $el.position().left,
				'top': $el.position().top,
				'width': $el.outerWidth()-bx,
				'height': $el.outerHeight()-by
			}, o.speed, o.fx);
		};
	});
	
};
})(jQuery);

$(function() {  
	var $jq=jQuery.noConflict();
	$jq('ul.menu').lavaLamp();
	});