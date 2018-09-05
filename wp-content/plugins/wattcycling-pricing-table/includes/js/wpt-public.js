jQuery(document).ready(function($){
	
/* 	// Link code start
	$('input[name="type_wattbike_nieuw"]').on('change', function(){
		var type_wattbike_nieuw = $("input[name='type_wattbike_nieuw']:checked").val();
	//	var tij = $('.wpt_1_tij').find(':selected').val();
		var url = '';		
		if( type_wattbike_nieuw == 1 )
		{
			url = '1';
		}
		else if( type_wattbike_nieuw == 2 )
		{
			url = '2';
		}		
		if( url != '' )
		{
			$('#wpt_1_url').attr('href',url);
		}
	}); */
		// Link code start
	$('input[name="type_wattbike_nieuw"]').on('change', function(){
		var type_wattbike_nieuw = $("input[name='type_wattbike_nieuw']:checked").val();
	//	var tij = $('.wpt_1_tij').find(':selected').val();
		$('#quantity').val(parseInt(1));
		var quantity_txt = $('#quantity').val();
		var url = '';		
		if( type_wattbike_nieuw == 1 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
			$('#stock_quantity_outer892').show();
			$('#stock_quantity_outer893').hide();
			var stock_quantity_outer892 =  $('#stock_quantity_outer892').attr('data-stock_quantity');
			$('#stock_quantity_outer892').find('span').html(stock_quantity_outer892);
			$("#quantity").attr('max', stock_quantity_outer892);
		}
		else if( type_wattbike_nieuw == 2 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=893&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
			$('#stock_quantity_outer892').hide();
			$('#stock_quantity_outer893').show();
			var stock_quantity_outer893 =  $('#stock_quantity_outer893').attr('data-stock_quantity');
			$('#stock_quantity_outer893').find('span').html(stock_quantity_outer893);
			$("#quantity").attr('max', stock_quantity_outer893);
		}		
		if( url != '' )
		{
			$('#wpt_1_url').attr('href',url);
		}
	});

	$('#wattcycling_minus1').on('click', function(){
		var type_wattbike_nieuw = $("input[name='type_wattbike_nieuw']:checked").val();
		var quantity_txt = parseInt($('#quantity').val()) - parseInt(1);
		if ( quantity_txt <= 0 ) quantity_txt=1;
		var url = '';		
		if( type_wattbike_nieuw == 1 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;			
/* 			var stock_quantity_outer892 =  $('#stock_quantity_outer892').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer892);
			var stock_quantity_outer892int = $('#stock_quantity_outer892').find('span').html();
			var stock_quantity_outer892int =  parseInt(stock_quantity_outer892int );
			var stock_quantity = stock_quantity_outer892int  + parseInt(1);
			if(stock_quantity_outer892>= stock_quantity && stock_quantity_outer892int >=0){
				$('#stock_quantity_outer892').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				//console.log(stock_quantity);
			} */
		} else if( type_wattbike_nieuw == 2 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=893&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;			
/* 			var stock_quantity_outer893 =  $('#stock_quantity_outer893').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer893);
			var stock_quantity_outer893int = $('#stock_quantity_outer893').find('span').html();
			var stock_quantity_outer893int =  parseInt(stock_quantity_outer893int );
			var stock_quantity = stock_quantity_outer893int  + parseInt(1);
			if(stock_quantity_outer893>= stock_quantity && stock_quantity_outer893int >=0){
				$('#stock_quantity_outer893').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=893&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				//console.log(stock_quantity);
			} */			
		}		
		if( url != '' )
		{
			$('#wpt_1_url').attr('href',url);
		}
	});
		$('#wattcycling_plus1').on('click', function(){
			var type_wattbike_nieuw = $("input[name='type_wattbike_nieuw']:checked").val();
			var quantity_txt = parseInt($('#quantity').val()) + parseInt(1);
			if ( quantity_txt <= 0 ) quantity_txt=1;
		var url = '';		
		if( type_wattbike_nieuw == 1 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
/* 			var stock_quantity_outer892 =  $('#stock_quantity_outer892').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer892);
			var stock_quantity_outer892int = $('#stock_quantity_outer892').find('span').html();
			var stock_quantity_outer892int =  parseInt(stock_quantity_outer892int ) - parseInt(1);
			var stock_quantity = stock_quantity_outer892 - quantity_txt ;
			if(stock_quantity_outer892>= stock_quantity && stock_quantity_outer892int >=0){
			$('#stock_quantity_outer892').find('span').html(stock_quantity);
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
			//console.log(stock_quantity);
			}	 */		
		}
		else if( type_wattbike_nieuw == 2 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=893&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
		/* 	var stock_quantity_outer893 =  $('#stock_quantity_outer893').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer893);
			var stock_quantity_outer893int = $('#stock_quantity_outer893').find('span').html();
			var stock_quantity_outer893int =  parseInt(stock_quantity_outer893int ) - parseInt(1);
			var stock_quantity = stock_quantity_outer893 - quantity_txt ;
			if(stock_quantity_outer893>= stock_quantity && stock_quantity_outer893int >=0){
			$('#stock_quantity_outer893').find('span').html(stock_quantity);
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=893&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
			//console.log(stock_quantity);
			} */			
		}		
		if( url != '' )
		{
			$('#wpt_1_url').attr('href',url);
		}
	});
		$('input[name="type_wattbike_huren"]').on('change', function(){
			var type_wattbike_huren = $("input[name='type_wattbike_huren']:checked").val();
			var quantity_txt = $('#quantity3').val();
			//	var tij = $('.wpt_1_tij').find(':selected').val();
		var url = '';		
		if( type_wattbike_huren == 5 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=895&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
			//$('#stock_quantity_outer895').hide();
			//$('#stock_quantity_outer898').show();
		}
		else if( type_wattbike_huren == 6 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=898&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
			//$('#stock_quantity_outer895').hide();
			//$('#stock_quantity_outer898').show();
		}		
		if( url != '' )
		{
			$('#wpt_3_url').attr('href',url);
		}
	});
	$('#wattcycling_minus3').on('click', function(){
		var type_wattbike_huren = $("input[name='type_wattbike_huren']:checked").val();
		var quantity_txt = parseInt($('#quantity3').val()) - parseInt(1);
		if ( quantity_txt <= 0 ) quantity_txt=1;
		var url = '';		
		if( type_wattbike_huren == 5 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=895&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
/* 			var stock_quantity_outer895 =  $('#stock_quantity_outer895').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer895);
			var stock_quantity_outer895int = $('#stock_quantity_outer895').find('span').html();
			var stock_quantity_outer895int =  parseInt(stock_quantity_outer895int );
			var stock_quantity = stock_quantity_outer895int  + parseInt(1);
			if(stock_quantity_outer895>= stock_quantity && stock_quantity_outer895int >=0){
				$('#stock_quantity_outer895').find('span').html(stock_quantity);
				//console.log(stock_quantity);
			} */		

		}
		else if( type_wattbike_huren == 6 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=898&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
/* 			var stock_quantity_outer898 =  $('#stock_quantity_outer898').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer898);
			var stock_quantity_outer898int = $('#stock_quantity_outer898').find('span').html();
			var stock_quantity_outer898int =  parseInt(stock_quantity_outer898int );
			var stock_quantity = stock_quantity_outer898int  + parseInt(1);
			if(stock_quantity_outer898>= stock_quantity && stock_quantity_outer898int >=0){
				$('#stock_quantity_outer898').find('span').html(stock_quantity);
				//console.log(stock_quantity);
			} */			
		}		
		if( url != '' )
		{
			$('#wpt_3_url').attr('href',url);
		}
	});
		$('#wattcycling_plus3').on('click', function(){
			var type_wattbike_huren = $("input[name='type_wattbike_huren']:checked").val();
			var quantity_txt = parseInt($('#quantity3').val()) + parseInt(1);
			if ( quantity_txt <= 0 ) quantity_txt=1;
			var url = '';		
			if( type_wattbike_huren == 5 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=898&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
/* 				var stock_quantity_outer895 =  $('#stock_quantity_outer895').attr('data-stock_quantity');
				$("input[name='quantity']").attr('max', stock_quantity_outer895);
				var stock_quantity_outer895int = $('#stock_quantity_outer895').find('span').html();
				var stock_quantity_outer895int =  parseInt(stock_quantity_outer895int ) - parseInt(1);
				var stock_quantity = stock_quantity_outer895 - quantity_txt ;
				if(stock_quantity_outer895>= stock_quantity && stock_quantity_outer895int >=0){
				$('#stock_quantity_outer895').find('span').html(stock_quantity);
				//console.log(stock_quantity);
				} */			
			}
		else if( type_wattbike_huren == 6 )
		{
			var url = 'https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=898&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
/* 			var stock_quantity_outer898 =  $('#stock_quantity_outer898').attr('data-stock_quantity');
			$("input[name='quantity']").attr('max', stock_quantity_outer898);
			var stock_quantity_outer898int = $('#stock_quantity_outer898').find('span').html();
			var stock_quantity_outer898int =  parseInt(stock_quantity_outer898int ) - parseInt(1);
			var stock_quantity = stock_quantity_outer898 - quantity_txt ;
			if(stock_quantity_outer898>= stock_quantity && stock_quantity_outer898int >=0){
			$('#stock_quantity_outer898').find('span').html(stock_quantity);
			//console.log(stock_quantity);
			} */
		}		
		if( url != '' )
		{
			$('#wpt_3_url').attr('href',url);
		}
	});	
	
	$('select.wpt_2_tij,.wpt_radio_inp').on('change', function(){	
		var type_wattbike_tweedehands = $("input[name='type_wattbike_tweedehands']:checked").val();	
		var wpt_radio = $("input[name='wpt_radio']:checked").val();
		$('#quantity2').val(parseInt(1));
		var quantity_txt = parseInt($('#quantity2').val());
		var url = '';		
		if( wpt_radio == 1 )
		{
			$('.wpt_watt .wpt_price').html('&euro;2800');
			//$('.wpt_radio_1 label span').html('Per maand 2 Daluren trainingen | &euro;69');
			//$('.wpt_radio_2 label span').html('Per week 1 Daluren training | <b>+&euro;10</b> (&euro;79)');			
			if( type_wattbike_tweedehands == 3 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				$('#stock_quantity_outer902').show();
				$('#stock_quantity_outer903').hide();
				$('#stock_quantity_outer905').hide();
				$('#stock_quantity_outer906').hide();
				var stock_quantity_outer902 =  $('#stock_quantity_outer902').attr('data-stock_quantity');
				$('#stock_quantity_outer902').find('span').html(stock_quantity_outer902);
				$("#quantity2").attr('max', stock_quantity_outer902);
			}
			else if( type_wattbike_tweedehands == 4 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=903&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				$('#stock_quantity_outer902').hide();
				$('#stock_quantity_outer903').show();
				$('#stock_quantity_outer905').hide();
				$('#stock_quantity_outer906').hide();
				var stock_quantity_outer903 =  $('#stock_quantity_outer903').attr('data-stock_quantity');
				$('#stock_quantity_outer903').find('span').html(stock_quantity_outer903);
				$("#quantity2").attr('max', stock_quantity_outer903);				
			}
			if( url != '' )
			{
				$('#wpt_2_url').attr('href',url);
			}
		}
		else if( wpt_radio == 2 )
		{
			$('.wpt_watt .wpt_price').html('&euro;1400');
			//$('.wpt_radio_1 label span').html('Per maand 2 Daluren trainingen | <b>-&euro;10</b> (&euro;69)');
			//$('.wpt_radio_2 label span').html('Per week 1 Daluren training | &euro;79');
			
	
			 if( type_wattbike_tweedehands == 3 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=906&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				$('#stock_quantity_outer902').hide();
				$('#stock_quantity_outer903').hide();
				$('#stock_quantity_outer905').show();
				$('#stock_quantity_outer906').hide();
				var stock_quantity_outer905 =  $('#stock_quantity_outer905').attr('data-stock_quantity');
				$('#stock_quantity_outer905').find('span').html(stock_quantity_outer905);
				$("#quantity2").attr('max', stock_quantity_outer905);				
			}
			else if( type_wattbike_tweedehands == 4 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=905&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
					$('#stock_quantity_outer902').hide();
					$('#stock_quantity_outer903').hide();
					$('#stock_quantity_outer905').hide();
					$('#stock_quantity_outer906').show();
				var stock_quantity_outer906 =  $('#stock_quantity_outer906').attr('data-stock_quantity');
				$('#stock_quantity_outer906').find('span').html(stock_quantity_outer906);
				$("#quantity2").attr('max', stock_quantity_outer906);
			}
			if( url != '' )
			{
				$('#wpt_2_url').attr('href',url);
			}
		}
	});
		$('#wattcycling_minus2').on('click', function(){
			var type_wattbike_tweedehands = $("input[name='type_wattbike_tweedehands']:checked").val();	
			var wpt_radio = $("input[name='wpt_radio']:checked").val();
			var quantity_txt = parseInt($('#quantity2').val()) - parseInt(1);
			if ( quantity_txt <= 0 ) quantity_txt=1;
		var url = '';		
		if( wpt_radio == 1 )
		{
			if( type_wattbike_tweedehands == 3 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				/* var stock_quantity_outer902int = $('#stock_quantity_outer902').find('span').html();
				var stock_quantity_outer902int =  parseInt(stock_quantity_outer902int );
				var stock_quantity = stock_quantity_outer902int  + parseInt(1);
				//console.log(stock_quantity);
				if(stock_quantity_outer902>= stock_quantity && stock_quantity_outer902int >=0){
				$('#stock_quantity_outer902').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				//console.log(stock_quantity);
				} */		
			}
			else if( type_wattbike_tweedehands == 4 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=903&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				/* var stock_quantity_outer903int = $('#stock_quantity_outer903').find('span').html();
				var stock_quantity_outer903int =  parseInt(stock_quantity_outer903int );
				var stock_quantity = stock_quantity_outer903int  + parseInt(1);
				//console.log(stock_quantity);
				if(stock_quantity_outer903>= stock_quantity && stock_quantity_outer903int >=0){
				$('#stock_quantity_outer903').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=903&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				} */
			}
		} else if ( wpt_radio == 2 ){
			 if( type_wattbike_tweedehands == 3 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=906&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				/* var stock_quantity_outer905int = $('#stock_quantity_outer905').find('span').html();
				var stock_quantity_outer905int =  parseInt(stock_quantity_outer905int );
				var stock_quantity = stock_quantity_outer905int  + parseInt(1);
				//console.log(stock_quantity);
				if(stock_quantity_outer905>= stock_quantity && stock_quantity_outer905int >=0){
				$('#stock_quantity_outer905').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=906&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				} */
			}
			else if( type_wattbike_tweedehands == 4 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=905&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				/* var stock_quantity_outer906int = $('#stock_quantity_outer906').find('span').html();
				var stock_quantity_outer906int =  parseInt(stock_quantity_outer906int );
				var stock_quantity = stock_quantity_outer906int  + parseInt(1);
				//console.log(stock_quantity);
				if(stock_quantity_outer906>= stock_quantity && stock_quantity_outer906int >=0){
				$('#stock_quantity_outer906').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=905&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				} */
			}
		}
		if( url != '' )
		{
			$('#wpt_2_url').attr('href',url);
		}
	});
		$('#wattcycling_plus2').on('click', function(){
		var type_wattbike_tweedehands = $("input[name='type_wattbike_tweedehands']:checked").val();	
		var wpt_radio = $("input[name='wpt_radio']:checked").val();
		var quantity_txt = parseInt($('#quantity2').val()) + parseInt(1);
			if ( quantity_txt <= 0 ) quantity_txt=1;
		var url = '';		
		if( wpt_radio == 1 )
			{
				if( type_wattbike_tweedehands == 3 )
				{
					var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
					/*var stock_quantity_outer902int = $('#stock_quantity_outer902').find('span').html();
					var stock_quantity_outer902int =  parseInt(stock_quantity_outer902int ) - parseInt(1);
					var stock_quantity = stock_quantity_outer902 - quantity_txt ;
					if(stock_quantity_outer902>= stock_quantity && stock_quantity_outer902int >=0){
					$('#stock_quantity_outer902').find('span').html(stock_quantity);
					var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
					//console.log(stock_quantity);
					} */
				}
				else if( type_wattbike_tweedehands == 4 )
				{
					var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=903&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
					/* var stock_quantity_outer903int = $('#stock_quantity_outer903').find('span').html();
					var stock_quantity_outer903int =  parseInt(stock_quantity_outer903int ) - parseInt(1);
					var stock_quantity = stock_quantity_outer903 - quantity_txt ;
					if(stock_quantity_outer903>= stock_quantity && stock_quantity_outer903int >=0){
					$('#stock_quantity_outer903').find('span').html(stock_quantity);
					var url = 'https://wattcycling.nl/product/wattbike-1-jaar-oud/?add-to-cart=901&variation_id=903&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
					//console.log(stock_quantity);
					} */
				}	
			} else if ( wpt_radio == 2 ){
			 if( type_wattbike_tweedehands == 3 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=906&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				/*var stock_quantity_outer905int = $('#stock_quantity_outer905').find('span').html();
				var stock_quantity_outer905int =  parseInt(stock_quantity_outer905int ) - parseInt(1);
				var stock_quantity = stock_quantity_outer905 - quantity_txt ;
				if(stock_quantity_outer905>= stock_quantity && stock_quantity_outer905int >=0){
				$('#stock_quantity_outer905').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=906&attribute_type=Wattbike%20Pro&quantity='+quantity_txt;
				//console.log(stock_quantity);
				} */
			}
			else if( type_wattbike_tweedehands == 4 )
			{
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=905&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				/* var stock_quantity_outer906 =  $('#stock_quantity_outer906').attr('data-stock_quantity');
				$("input[name='quantity']").attr('max', stock_quantity_outer906);
				var stock_quantity_outer906int = $('#stock_quantity_outer906').find('span').html();
				var stock_quantity_outer906int =  parseInt(stock_quantity_outer906int ) - parseInt(1);
				var stock_quantity = stock_quantity_outer906 - quantity_txt ;
				if(stock_quantity_outer906>= stock_quantity && stock_quantity_outer906int >=0){
				$('#stock_quantity_outer906').find('span').html(stock_quantity);
				var url = 'https://wattcycling.nl/product/wattbike-2-jaar-oud/?add-to-cart=904&variation_id=905&attribute_type=Wattbike%20Trainer&quantity='+quantity_txt;
				//console.log(stock_quantity);
				} */
			}
		}		
		if( url != '' )
		{
			$('#wpt_2_url').attr('href',url);
		}
	});
	// Link code end
	
	
	
	// Move extra on top code start
	if( $(window).width() <= 500 )
	{
		$('.wpt_wrap').prepend($('.wpt_wrap .wpt_red'));
	}
	// Move extra on top code end
	
	
	
	// Select error code start
	$(document).on( 'click', '.wpt_btn a', function(){
		var dag = $(this).parents('.wpt_single').find('.wpt_dag select').val();
		var tij = $(this).parents('.wpt_single').find('.wpt_tij select').val();
		
		if( dag == '' || tij == '' )
		{
			alert("Kies eerst je training!");
			return false;
		}
	});
	// Select error code end
	
	// Day to time selection code start
	$(document).on( 'change', '.wpt_dag select', function(){
		var dag = $(this).val();
		$(this).parents('.wpt_single').find('.wpt_tij select option:first-child').attr('selected','selected');
		//$(this).parents('.wpt_single').find('.dag_1, .dag_2, .dag_3, .dag_4, .dag_5, .dag_6').hide();
		var options = $(this).parents('.wpt_single').find('.wpt_hidden option.dag_'+dag).clone();
		$(this).parents('.wpt_single').find('.wpt_original').find('option').not(':first').remove();	
		$(this).parents('.wpt_single').find('.wpt_original').append(options);	
	});
	// Day to time selection code end
});