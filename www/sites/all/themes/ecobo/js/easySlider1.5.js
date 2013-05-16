/*
s * 	Easy Slider 1.5 - jQuery plugin
 *	written by Alen Grakalic	
 *	http://cssglobe.com/post/4004/easy-slider-15-the-easiest-jquery-plugin-for-sliding
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
/*
 *	markup example for $("#slider").easySlider();
 *	
 * 	<div id="slider">
 *		<ul>
 *			<li><img src="images/01.jpg" alt="" /></li>
 *			<li><img src="images/02.jpg" alt="" /></li>
 *			<li><img src="images/03.jpg" alt="" /></li>
 *			<li><img src="images/04.jpg" alt="" /></li>
 *			<li><img src="images/05.jpg" alt="" /></li>
 *		</ul>
 *	</div>
 *
 */

(function($) {

	$.fn.easySlider = function(options){
	  
		// default configuration properties
		var defaults = {			
			prevId: 		'prevBtn',
			prevText: 		'Previous',
			nextId: 		'nextBtn',	
			nextText: 		'Next',
			controlsShow:	true,
			controlsBefore:	'',
			controlsAfter:	'',	
			controlsFade:	true,
			firstId: 		'firstBtn',
			firstText: 		'First',
			firstShow:		false,
			lastId: 		'lastBtn',	
			lastText: 		'Last',
			lastShow:		false,				
			vertical:		false,
			speed: 			800,
			auto:			false,
			pause:			2000,
			continuous:		false,
			sliderId:		'1'
		}; 
		
		var options = $.extend(defaults, options);  
		var sId = options.sliderId;
		
		this.each(function() {  
			var obj = $(this); 				
			var s = $("li", obj).length;
			var w = $("li", obj).width(); 
			var h = $("li", obj).height(); 
			obj.width(w); 
			obj.height(h); 
			obj.css("overflow","hidden");
			var ts = s-1;
			var t = 0;
			$("ul", obj).css('width',s*w);			
			if(!options.vertical) $("li", obj).css('float','left');
			
			if(options.controlsShow)
			{
				var html = options.controlsBefore;
				if(options.firstShow) html += '<span id="'+ options.firstId +'"><a href=\"javascript:void(0);\">'+ options.firstText +'</a></span>';
				html += ' <span id="'+ options.prevId +'"><a href=\"javascript:void(0);\">'+ options.prevText +'</a></span>';
				html += ' <span id="'+ options.nextId +'"><a href=\"javascript:void(0);\">'+ options.nextText +'</a></span>';
				if(options.lastShow) html += ' <span id="'+ options.lastId +'"><a href=\"javascript:void(0);\">'+ options.lastText +'</a></span>';
				html += options.controlsAfter;						
				$(obj).after(html);
				
				/* DISABLE NEXT BUTTON IF ONLY 1 ITEM */
				/*
				if( s == 1)
				{
					$("span#"+options.nextId).hide();
				}
				*/
				
			};
	
			$("a","#"+options.nextId).click(function()
			{		
				animate("next",true);
				//alert(sId);
			});
			$("a","#"+options.prevId).click(function(){		
				animate("prev",true);				
			});	
			$("a","#"+options.firstId).click(function(){		
				animate("first",true);
			});				
			$("a","#"+options.lastId).click(function(){		
				animate("last",true);				
			});		
			
			function animate(dir,clicked)
			{
				var ot = t;		
				
				switch(dir)
				{
					case "next":{
						t = (ot>=ts) ? (options.continuous ? 0 : ts) : t+1;
						
						// set page numbers
						var currentpage = t+1;
						$('#pagina_'+sId).text(currentpage+"/"+s);
						// set image text
						var bijschrift = $("li:nth-child("+currentpage+")", obj).find("img").attr("alt");
						$('#bijschrift_'+sId).text(bijschrift);
						
						break;
					}
					case "prev":{
						t = (t<=0) ? (options.continuous ? ts : 0) : t-1;
						
						var currentpage = t+1;
						$('#pagina_'+sId).text(currentpage+"/"+s);
						
						var bijschrift = $("li:nth-child("+currentpage+")", obj).find("img").attr("alt");
						$('#bijschrift_'+sId).text(bijschrift);
				
						break;
					} 
					case "first":{
						t = 0;
						
						var currentpage = t+1;
						$('#pagina_'+sId).text(currentpage+"/"+s);
						
						var bijschrift = $("li:nth-child("+currentpage+")", obj).find("img").attr("alt");
						$('#bijschrift_'+sId).text(bijschrift);
						
						break;
					}
					case "last":{
						t = ts;
						

						var currentpage = t+1;
						$('#pagina_'+sId).text(currentpage+"/"+s);
						
						var bijschrift = $("li:nth-child("+currentpage+")", obj).find("img").attr("alt");
						$('#bijschrift_'+sId).text(bijschrift);
						
						
						break;
					} 
					default:
						break; 
				};	
				
				var diff = Math.abs(ot-t);
				var speed = diff*options.speed;						
				if(!options.vertical) 
				{
					p = (t*w*-1);
					$("ul",obj).animate(
						{ marginLeft: p }, 
						speed
					);		
					/*
					var sanne = $("li", obj).next();
					var im = sanne.find("img").attr('alt');
					$('#box_'+sId+' #bijschrift_'+sId).text(im);
					*/
					
				}
				else
				{
					p = (t*h*-1);
					$("ul",obj).animate(
						{ marginTop: p }, 
						speed
					);
				};
				
				if(!options.continuous && options.controlsFade){					
					if(t==ts){
						$("a","#"+options.nextId).hide();
						$("a","#"+options.lastId).hide();
					} else {
						$("a","#"+options.nextId).show();
						$("a","#"+options.lastId).show();					
					};
					if(t==0){
						$("a","#"+options.prevId).hide();
						$("a","#"+options.firstId).hide();
					} else {
						$("a","#"+options.prevId).show();
						$("a","#"+options.firstId).show();
					};					
				};				
				
				if(clicked) clearTimeout(timeout);
				if(options.auto && dir=="next" && !clicked){;
					timeout = setTimeout(function(){
						animate("next",false);
					},diff*options.speed+options.pause);
				};
				
			};
			// init
			var sanne = $("li img", obj).attr('alt');
			$('#bijschrift_'+sId).text(sanne);
			
			
			
			var timeout;
			if(options.auto){;
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			};		
		
			if(!options.continuous && options.controlsFade){					
				$("a","#"+options.prevId).hide();
				$("a","#"+options.firstId).hide();				
			};				
			
		});
	  
	};

})(jQuery);



