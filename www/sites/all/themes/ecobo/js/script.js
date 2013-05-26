/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */


// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {
	$(document).ready(function(){
		
		/* Set submit button newsletter form */
		$("#block-mailchimp-lists-ecobo-newsletter-list input#edit-submit").val(Drupal.t("Inschrijven"));
		
		
		$("#edit-mailchimp-lists-mailchimp-ecobo-newsletter-list-title").text(Drupal.t("Wilt u op de hoogte blijven van al onze projecten? Schrijf u dan hier in voor onze nieuwsbrief."));
		
		
		
		
		
		/*
		
		$("#edit-mailchimp-lists-mailchimp-ecobo-newsletter-list-title").text("Wilt u op de hoogte blijven van al onze projecten? Schrijf u dan hier in voor onze nieuwsbrief.");
		*/
		
		
		
		// BOX COUNT ITEMS
		var items_1 = $("#count1").attr('value');
		var items_2 = $("#count2").attr('value');
		var items_3 = $("#count3").attr('value');
		
		$("#pagina_1").text('1/'+items_1);
		$("#pagina_2").text('1/'+items_2);
		$("#pagina_3").text('1/'+items_3);
		

		// make first tab selected
		$("#tabs h3#1").addClass("selected");
		$("#block-views-project-images-verkavelingen").css('margin-left','-2000px');
		$("#block-views-project-images-plannen").css('margin-left','-2000px');
		
		
		// TABBED MENU MOUSE ENTER EVENTS
		$("#tabs h3").bind('click', function()
		{
			$("#tabs h3").removeClass("selected");
			$(this).addClass("selected");
			var id = $(this).attr('id');
			
			$("#block-views-project-images-sfeerbeelden, #block-views-project-images-verkavelingen, #block-views-project-images-plannen").css('margin-left','-2000px');
			
			
			if( id == 1 )
			{
				$("#block-views-project-images-sfeerbeelden").css('margin-left','0px');
			}
			if( id == 2 )
			{
				$("#block-views-project-images-verkavelingen").css('margin-left','0px');
			}
			if( id == 3 )
			{
				$("#block-views-project-images-plannen").css('margin-left','0px');
			}
		});
		
		
		
		
		
		
		
	});
	
	
	
	
	
	
})(jQuery, Drupal, this, this.document);
