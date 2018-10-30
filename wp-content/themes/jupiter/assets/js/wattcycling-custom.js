jQuery(document).ready(function () {
	var lastScrollTop = 0;
		jQuery(window).resize(function () {
			var windowWidth = jQuery( window ).width();
			//console.log(windowWidth);
			if(windowWidth>768){
				jQuery.stickysidebarscroll("#form_outer_div",{offset: {top: 257, bottom: 400, left:100}});
			//	jQuery(window).on("scroll", function() {					
						//var scrollTop = jQuery(document).scrollTop();
						//var divHeight = jQuery("#form_outer_div").offset().top;
						//var documentHeight = jQuery(document).height();
						//var windowHeight = jQuery(window).height();
						//var footer_top = jQuery("#mk-footer").offset().top;
						//offsetTop = windowHeight - 400;
						//var scrollPosition = windowHeight + scrollTop;
						//var scrollBottom = documentHeight - windowHeight - scrollTop;
						//console.log("footer_top : "+footer_top);
						//console.log("windowHeight : "+windowHeight);
						//console.log("divHeight : "+divHeight);
						//console.log("scrollTop : "+scrollTop);
						//console.log("documentHeight : "+documentHeight);
						//console.log("scrollPosition : "+scrollPosition);
/* 						if(scrollTop > lastScrollTop && scrollTop >=460 ){
							 if (scrollPosition  > footer_top){
									jQuery("#form_outer_div").removeClass("direction_down");
									jQuery("#form_outer_div").removeClass("direction_up");
									jQuery("#form_outer_div").addClass("wattcycling_footer_top");
							 }else{
									jQuery("#form_outer_div").removeClass("direction_up");
									jQuery("#form_outer_div").removeClass("wattcycling_footer_top");
									jQuery("#form_outer_div").addClass("direction_down");
							 }
							//console.log("direction: down");
						}
					if(lastScrollTop >scrollTop ){
						//console.log("direction: up");
						if(scrollTop<=460 || scrollPosition > footer_top){
							jQuery("#form_outer_div").removeClass("direction_down");
							jQuery("#form_outer_div").removeClass("direction_up");
						}else{
							jQuery("#form_outer_div").removeClass("direction_down");
							jQuery("#form_outer_div").removeClass("wattcycling_footer_top");
							jQuery("#form_outer_div").addClass("direction_up");
						}
					} 
						lastScrollTop = scrollTop; */
				//});
			} else {
				if(jQuery("#form_outer_div_href").length > 0) {
				 var divHeight = jQuery("#form_outer_div_href").offset().top;
				}
				scrollTop = jQuery(window).scrollTop();
				jQuery(window).on("scroll", function() {
					if(jQuery("#form_outer_div_href").length > 0) {
						var divHeight = jQuery("#form_outer_div_href").offset().top;
					}
					var scrollPosition = jQuery(window).height() + jQuery(window).scrollTop();
					if(scrollPosition>divHeight && windowWidth<=768){
						jQuery('#voor_alpe_dhuzes').attr("style", "display: none !important");
					} else {
						jQuery('#voor_alpe_dhuzes').attr("style", "display: block !important");
					}
				});
				jQuery('#voor_alpe_dhuzes').show();
			}
		}).resize();
		
		jQuery("#train_wattcycling_nl").submit(function(event){
			event.preventDefault();

			var location = jQuery('#location').val();
			var per_weken = jQuery('#per_weken').val();
			var keer = jQuery('#keer').val();

			if( location == '' || per_weken == '' || keer == '') {
				alert("Kies eerst je training!");
				return false;
			}
			var keer =  parseInt(keer);
			var per_weken =  parseInt(per_weken);
		   var total_credits = keer * per_weken;
		   if(total_credits == 1 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=9a4730f6386b4f6a16481e511cd91d457783&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   }  else if(total_credits == 2 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=a210308f3595bc9b8b6e704873089d7c41ec&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 3 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=a149bcea219ceda2a02f54b31c6613fda9bb&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   }else if(total_credits == 4 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=af18411a32d0dcc901572eba647955f51cc6&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 5 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=8f59675c3199786e71b22e236758dc86130f&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 6 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=9b8e182ca9e33a37b6e179ae2655808a7137&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 7 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=6ffa7a26dc2524c5c6574357007b1af32806&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 8 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=173c3cda13e13c558330723a38599f32a1bc&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 9 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=efc615271700c7a18076132545e89df2afbb&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 10 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=6341e068736fa15e5241faffe843235f0202&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1 ";
		   } else if(total_credits == 12 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=7104d9cd0e409a725e39e7ed4dfd4711249b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else if(total_credits == 14 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=7104d9cd0e409a725e39e7ed4dfd4711249b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   }  else if(total_credits == 16 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=12cc95daed99f1c37f4739de6e91bb44c662&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   }  else if(total_credits == 18 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=594e5d92dce663b7438c214bc1987d7056cc&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   }  else if(total_credits == 20 && location == 'amsterdam-amstel'){
				var url = "https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=a2244a687699e6a183121a1bba5920de90fd&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1";
		   } else {
			   alert('There is no url for this combination. Please choose another combination.');
		   } 
			
		  //  var url = total_credits;
		if(url != '' && url !=null){
		  window.open(url, '_blank'); 
		}
		});	
			//jQuery('.shipping_method:checked').parent('li').css({"border":"1px solid #00ced1","background":"#afeeee"});
			//jQuery('.shipping_method').removeAttr("checked");
			
/* 		jQuery('#place_order').click(function(){			
			var isChecked = jQuery('.shipping_method').prop('checked');
			console.log('isChecked' + isChecked);
			if(!isChecked){
				alert("Please choose Shipping method first.");
				return false;
			}
		}); */
		jQuery('.shipping_method:checked').parent('li').css({"border":"1px solid #00ced1","background":"#afeeee"});
		jQuery('.shipping_method').change('on', function(){
			jQuery('.shipping_method').parent('li').css({"border":"1px solid #eee","background":"none"});
			jQuery('.shipping_method:checked').parent('li').css({"border":"1px solid #00ced1","background":"#afeeee"});
		});
		
/* 		jQuery('#shipping_method li').click('on', function(){
			jQuery('.shipping_method').prop("checked", true);
			jQuery('.shipping_method').parent('li').css({"border":"1px solid #eee","background":"none"});
			jQuery('.shipping_method:checked').parent('li').css({"border":"1px solid #00ced1","background":"#afeeee"});
		}); */

	var label_text = jQuery( "#shipping_method_0_flat_rate7" ).parent('li').find("label").text();
    label_text = label_text.replace(":", " –");
	var label_text = jQuery( "#shipping_method_0_flat_rate7" ).parent('li').find("label").text(label_text);
	var label_text = jQuery( "#shipping_method_0_flat_rate9" ).parent('li').find("label").text();
    label_text = label_text.replace(": €0.00", " – gratis");
	var label_text = jQuery( "#shipping_method_0_flat_rate9" ).parent('li').find("label").text(label_text);
	
	var gratis = "gratis";
	jQuery('#shipping_method li label:contains('+gratis+')', document.body).each(function(){
	jQuery(this).html(jQuery(this).html().replace(
			new RegExp(gratis, 'g'), '<span class=gratis>'+gratis+'</span>'
	  ));
	});		
	
	jQuery( "#shipping_method_0_free_shipping5" ).parent('li').find("label").append( "<span class='shipping_subline_txt'>We zetten je Wattbike klaar bij Wattbike Benelux in Amsterdam</span>" );
	jQuery( "#shipping_method_0_flat_rate9" ).parent('li').find("label").append( "<span class='shipping_subline_txt'>Je bestelling wordt bezorgd op een adres na keuze</span>" );
	jQuery( "#shipping_method_0_flat_rate7" ).parent('li').find("label").append( "<span class='shipping_subline_txt'>We komen langs om de Wattbike bij je thuis te monteren en geven een introductie</span>" );

	jQuery(document.body).on('update_checkout', function(e){
    //e.preventDefault();
    //e.stopPropagation();
    e.stopImmediatePropagation();
    //console.log(e);
	});
	
	
	
		jQuery(window).resize(function () {
			var windowWidth = jQuery( window ).width();
			
			//console.log(windowWidth);
			if(windowWidth>768){
				jQuery("#secondary_menu_main_div").show();
				jQuery(".page-template-template-location-page #mk-header-1").removeClass('sticky-style-fixed');
				jQuery(".page-template-template-location-page #mk-header-1").removeClass('a-sticky');
				if(jQuery(".page-template-template-location-page").length > 0) {
					var pathname = window.location.pathname;
					console.log("pathname : ",pathname);				
					var domain = pathname.split('/');
					var locationId = domain[domain.length - 2];
					console.log("domain: ",domain);
					console.log("last: ",locationId);
					if(locationId !=''){
						jQuery('.mk-header-padding-wrapper').removeClass('.mk-header-padding-wrapper');
						jQuery('.page-template-template-location-page .wpb_row.vc_row.vc_row-fluid.mk-fullwidth-true').attr("id",locationId).attr('id');
						location.href = "#"+locationId;				
					}
				}

				jQuery(window).on("scroll", function() {
					var scrollTop = jQuery(document).scrollTop();
					jQuery(".page-template-template-location-page #mk-header-1").removeClass('a-sticky');
							 if (scrollTop  > 420){
									jQuery("#secondary_menu_main_div").addClass('secondary_menu_fixed_div');
									jQuery(".page-template-template-location-page .mk-header-holder").addClass('main_menu_postion_cls');
							 } else{
									jQuery("#secondary_menu_main_div").removeClass('secondary_menu_fixed_div');
									jQuery(".page-template-template-location-page.mk-header-holder").removeClass('main_menu_postion_cls'); 
							 }
				});
			} else{
						jQuery("#secondary_menu_main_div").hide();
					}
			}).resize();
});

