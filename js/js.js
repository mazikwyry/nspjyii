
/*
 * jQuery Color Animations
 * Copyright 2007 John Resig
 * Released under the MIT and GPL licenses.
 *
 * RGBA support by Mehdi Kabab <http://pioupioum.fr>
 */

(function(jQuery){
    jQuery.extend(jQuery.support, {
        "rgba": supportsRGBA()
    });

    // We override the animation for all of these color styles
    jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i,attr){
        jQuery.fx.step[attr] = function(fx){
            var tuples = [];
            if ( !fx.colorInit ) {
                fx.start = getColor( fx.elem, attr );
                fx.end = getRGB( fx.end );
                fx.alphavalue = {
                    start: 4 === fx.start.length,
                    end:   4 === fx.end.length
                };
                if ( !fx.alphavalue.start ) {
                    fx.start.push( 1 );
                }
                if ( !fx.alphavalue.end ) {
                    fx.end.push( 1 );
                }
                if ( jQuery.support.rgba &&
                     (!fx.alphavalue.start && fx.alphavalue.end) || // RGB => RGBA
                     (fx.alphavalue.start && fx.alphavalue.end)  || // RGBA => RGBA
                     (fx.alphavalue.start && !fx.alphavalue.end)    // RGBA => RGB
                ) {
                    fx.colorModel = 'rgba';
                } else {
                    fx.colorModel = 'rgb';
                }
                fx.colorInit = true;
            }

            tuples.push( Math.max(Math.min( parseInt( (fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0) ); // R
            tuples.push( Math.max(Math.min( parseInt( (fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0) ); // G
            tuples.push( Math.max(Math.min( parseInt( (fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0) ); // B

            if ( fx.colorModel == 'rgba' ) {
                // Alpha
                tuples.push( Math.max(Math.min( parseFloat((fx.pos * (fx.end[3] - fx.start[3])) + fx.start[3]), 1), 0).toFixed(2) );
            }

            fx.elem.style[attr] = fx.colorModel + "(" + tuples.join(",") + ")";
        };
    });

    // Color Conversion functions from highlightFade
    // By Blair Mitchelmore
    // http://jquery.offput.ca/highlightFade/

    // Parse strings looking for color tuples [255,255,255[,1]]
    function getRGB(color) {
        var result, ret,
            ralpha = '(?:,\\s*((?:1|0)(?:\\.0+)?|(?:0?\\.[0-9]+))\\s*)?\\)',
            rrgbdecimal = new RegExp( 'rgb(a)?\\(\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*' + ralpha ),
            rrgbpercent = new RegExp( 'rgb(a)?\\(\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*' + ralpha );

        // Check if we're already dealing with an array of colors
        if ( color && color.constructor == Array && color.length >= 3 && color.length <= 4 ) {
            return color;
        }

        // Look for #a0b1c2
        if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color)) {
            return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];
        }

        // Look for #fff
        if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color)) {
            return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];
        }

        // Look for rgb[a](num,num,num[,num])
        if (result = rrgbdecimal.exec(color)) {
            ret = [parseInt(result[2]), parseInt(result[3]), parseInt(result[4])];
            // is rgba?
            if (result[1] && result[5]) {
                ret.push(parseFloat(result[5]));
            }

            return ret;
        }

        // Look for rgb[a](num%,num%,num%[,num])
        if (result = rrgbpercent.exec(color)) {
            ret = [parseFloat(result[2]) * 2.55, parseFloat(result[3]) * 2.55, parseFloat(result[4]) * 2.55];
            // is rgba?
            if (result[1] && result[5]) {
                ret.push(parseFloat(result[5]));
            }

            return ret;
        }

        // Otherwise, we're most likely dealing with a named color
        return colors[jQuery.trim(color).toLowerCase()];
    }

    function getColor(elem, attr) {
        var color;

        do {
            color = jQuery.curCSS(elem, attr);

            // Keep going until we find an element that has color, or we hit the body
            if ( color != '' && color != 'transparent' || jQuery.nodeName(elem, "body") )
                break;

            attr = "backgroundColor";
        } while ( elem = elem.parentNode );

        return getRGB(color);
    };

    function supportsRGBA() {
        var $script = jQuery('script:first'),
            color = $script.css('color'),
            result = false;
        if (/^rgba/.test(color)) {
                result = true;
        } else {
            try {
                result = ( color != $script.css('color', 'rgba(0, 0, 0, 0.5)').css('color') );
                $script.css('color', color);
            } catch (e) {};
        }

        return result;
    };

    // Some named colors to work with
    // From Interface by Stefan Petre
    // http://interface.eyecon.ro/

    var colors = {
        aqua:[0,255,255],
        azure:[240,255,255],
        beige:[245,245,220],
        black:[0,0,0],
        blue:[0,0,255],
        brown:[165,42,42],
        cyan:[0,255,255],
        darkblue:[0,0,139],
        darkcyan:[0,139,139],
        darkgrey:[169,169,169],
        darkgreen:[0,100,0],
        darkkhaki:[189,183,107],
        darkmagenta:[139,0,139],
        darkolivegreen:[85,107,47],
        darkorange:[255,140,0],
        darkorchid:[153,50,204],
        darkred:[139,0,0],
        darksalmon:[233,150,122],
        darkviolet:[148,0,211],
        fuchsia:[255,0,255],
        gold:[255,215,0],
        green:[0,128,0],
        indigo:[75,0,130],
        khaki:[240,230,140],
        lightblue:[173,216,230],
        lightcyan:[224,255,255],
        lightgreen:[144,238,144],
        lightgrey:[211,211,211],
        lightpink:[255,182,193],
        lightyellow:[255,255,224],
        lime:[0,255,0],
        magenta:[255,0,255],
        maroon:[128,0,0],
        navy:[0,0,128],
        olive:[128,128,0],
        orange:[255,165,0],
        pink:[255,192,203],
        purple:[128,0,128],
        violet:[128,0,128],
        red:[255,0,0],
        silver:[192,192,192],
        white:[255,255,255],
        yellow:[255,255,0],
        transparent: ( jQuery.support.rgba ) ? [0,0,0,0] : [255,255,255]
    };

})(jQuery);


var counter = 1; 

function toggleMenu(){
  $('.left').toggleClass('mobile_menu_open');
  $('#hamburger_icon').toggleClass('as_close');
}

$(document).ready(function(){

    if(max>1)	
        setInterval(function(){
        if(counter==max){
            $(".rotator_wrapper").animate({left:"60px"},300).animate({left:"0px"},300);
            counter=1;
        }else{
            $(".rotator_wrapper").animate({left:"-=105%"},500).animate({left:"+=5%"},300);
            counter++;
        }

        },8000);

    $('#hamburger').click(function(event) {
      toggleMenu();
    });
	
	$(".menu_items li").hover(function(){
		$(this).stop(true, true).animate({'backgroundColor': 'rgba(0,0,0, .05)'}, 100);
	},function(){
		$(this).stop(true, true).animate({'backgroundColor': 'rgba(255,255,255, 0.0)'}, 500);
	});
	
	$("article").hover(function(){
		$(this).css("border","1px solid #888");
	},function(){
		$(this).css("border","1px solid #CCC");
	});
	
	$(".counter").hover(function(){
		$(this).stop(true, true).animate({'height': '+=5px'}, 500);
	},function(){
		$(this).stop(true, true).animate({'height': '-=5px'}, 100);
	});
	
	$("#bfs").hover(function(){
		$(this).attr("src","../images/gfx/bfs2.png")
	},function(){
		$(this).attr("src","../images/gfx/bfs.png")
	});
	
	$(".counter").click(function(){
		$(this).parent().children(".comments_list").slideToggle();
	});

    $(".sub_menu h1").click(function(){
      if ($(".active").attr("id")!=$(this).attr("id")){
            $(".sub_page").hide("slow");
            $("#sub"+$(this).attr('id')).show("slow");
            $(".sub_menu h1").removeClass("active");
            $(this).addClass("active");
        }
    });
	
	
	
});