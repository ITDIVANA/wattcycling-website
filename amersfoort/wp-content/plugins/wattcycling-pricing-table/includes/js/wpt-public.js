jQuery(document).ready(function($){
	
	// Link code start
	$('select.wpt_1_tij').on('change', function(){
		
		var tij = $('.wpt_1_tij').find(':selected').val();
		var url = '';
		
		if( tij == 1 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=d3db68e70f82e3012a526bcf9e5916429c03&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 2 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=57d9b2019c9340de8aefc2dc1ccaf5f94e37&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 3 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=38f386cb549b63ec6b76d1071076e250cb05&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 4 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=40c357108bce60c9040494e2fe3c962cab0a&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 5 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=4d3edc7c1cbeac709f8dc2ea4d3e7b24be42&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 6 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=c1d5216169cd32959958121b5447ac68d83b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 7 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=a5a4c465ee59454c136d918b05080d6b6497&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 8 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=ccd5b1dd89e32e9186accd7dd2e3aad7d2ab&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 9 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=5e26aece8a4a7374feb1800985c6844c1965&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 10 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=d30ea10b29f5eed96cb703d3706fce310014&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 11 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=e0a7081bd925c9144c8155240a1d9f21d1cc&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 12 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=32b48cfc267d0d6e814ac423fd0caa241dd5&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 13 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=5a992e53399327021e34d027832b0487e960&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 14 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=d28bf3049cdcb8c21d4f54d200fdb1697e95&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 15 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=e4eb3e89a1d9b6846a7fa8bf826df29a01bb&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 16 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=efa406318d5932e927c2ab8a744594c0e468&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 17 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=ebabcb8f2366ebbbdbc844df911a12435657&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 18 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=5817aee5db1bb0bc0f03c89059199c191c5c&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		
		if( url != '' )
		{
			$('.wpt_1_url').attr('href',url);
		}
	});
	
	
	
	$('select.wpt_2_tij,.wpt_radio_inp').on('change', function(){
		
		var tij = $('.wpt_2_tij').find(':selected').val();
		var rad = $("input[name='wpt_radio']:checked").val();
		var url = '';
		
		if( rad == 1 )
		{
			$('.wpt_red .wpt_price').html('&euro;69');
			$('.wpt_radio_1 label span').html('Per maand 2 Daluren trainingen | &euro;69');
			$('.wpt_radio_2 label span').html('Per week 1 Daluren training | <b>+&euro;10</b> (&euro;79)');
			
			if( tij == 1 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=b3d85e1ecd7e0d2a938ba4f82eb9dcb556ae&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 2 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=4787239bf1195324c84b42d5bdcb44b7b3f6&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 3 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=804eb54c44ed75e94cebfb7183453f2fa4a8&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 4 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=d21d3e406e3adea92c7ebe865844b2c8b132&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 5 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=30e0a758f68b4345f363d492b7630c9aae4d&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 6 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=72635cf35dddf04e69cdc4aff8ef6af8a400&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 7 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=0469472e1b8d2a821d8bc7c8a38e5673c69e&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 8 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=fd35bc6d21efbbd4d833327d0ba3e6f6d793&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 9 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=745e6dcbd077a9d2d2ceb2913587606db306&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 10 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=714892d0cf9e51c386f01f3525f44f6a2848&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 11 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=624b203166f4c17ae7425018002d667e431c&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 12 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=859d80a1c027c0f94efe2304a1b35e8aac5a&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 13 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=714892d0cf9e51c386f01f3525f44f6a2848&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 14 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=4589aa93b5e81f00fdb36367fd6608ea0455&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 15 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=c702abfeebb85a48dc7ac49f7bc088759ccb&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 16 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=25f1fc24ce58b826128a9e8842d75dad303d&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 17 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=1264369fac294f2cd39566b84cfbbd1568de&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 18 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=74eca2d59b800531313e6ca8532b9018de17&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
		}
		else if( rad == 2 )
		{
			$('.wpt_red .wpt_price').html('&euro;79');
			$('.wpt_radio_1 label span').html('Per maand 2 Daluren trainingen | <b>-&euro;10</b> (&euro;69)');
			$('.wpt_radio_2 label span').html('Per week 1 Daluren training | &euro;79');
			
			if( tij == 1 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=92233fa1b22e7237a7566178fb11c1ba0d81&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 2 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=dcc31e0d3f52e6444e7ebed52eeab8c5a2ca&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 3 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=bd97db8257ccfdb16502dae6fd73a2e9baf5&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 4 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=fbf9e58c42c94336461ad83318c8e9e3b371&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 5 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=8014ddca981e7262b2fe07e7f7884b6d8c05&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 6 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=cc73697a29d599537741238f198d30413338&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 7 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=32d3d2000fab3e8a612d8edb7f9ce3da7f02&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 8 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=fd825d4c666719b4c9bf14be80adc917f89f&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 9 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=934a3be11846b65f0591db87be0c8b87122b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 10 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=0d10bf04883f2cb4af863211d7acaae4eca2&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 11 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=6c72fe74d667dfc47e71e9f40e78e3af210b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 12 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=961623f96dec5ec4de79131d36f1ec5e4953&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 13 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=04984db64676cc5a57da4b8ddd75338513d5&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 14 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=0e244b92c2f3a9cc7930e1c5b1be1a88b36f&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 15 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=7e5cb678ffccd4d895fe58f0b470c40bdb77&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 16 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=baf71a6e701ba77d3ffd800665b3ad6791e0&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 17 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=4cf11c62e5a7733c5b41a7cfef47979b30eb&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
			else if( tij == 18 )
			{
				url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=59e8e571f2796052075efe19114384b065cf&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
			}
		}
		
		if( url != '' )
		{
			$('.wpt_2_url').attr('href',url);
		}
	});
	
	
	
	$('select.wpt_3_tij').on('change', function(){
		
		var tij = $('.wpt_3_tij').find(':selected').val();
		var url = '';
		
		if( tij == 1 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=2905ad0aee56f25fecc6d5852dd40f29bd70&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 2 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=6d3361fb163b07ad397a5076646273286c21&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 3 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=33bf75c6ff084f64974e5fe09a22ef98ec15&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 4 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=b1a10fe89c99fe810bdd65369e47f5264d2d&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 5 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=790be108be8f38784701217da06bb6629869&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 6 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=85c98b85df449b6653de5ac83ceb9dabb1ee&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 7 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=f41384020ac44b264414fe0de6ad8b8a133d&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 8 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=2b6e8747e0a5b96c577b7b4940755f5b8a61&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 9 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=d9a6b4e73bea384172fbd0926015c020c55c&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 10 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=db11a6b4d29602a679f08857db9aa946d7ee&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 11 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=66375ed56e83fc6308e883f6d532cb6c1fc9&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 12 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=1d63b07945a658dea20422188eed2d6f3388&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 13 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=3202930195d54095aec86e36c9e66d3752ab&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 14 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=188e64dcbf75c0b16e378add44ca6852e038&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 15 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=b27e38ccaee68c4149e765935d41c0a88a7c&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 16 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=87c411d597858871b6eb72cf89fa7a3249db&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 17 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=b1c95f51e319cb94ad68b7645d03a30a1497&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		else if( tij == 18 )
		{
			url = 'https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=00e5ae3b5725a250a7d82522712558ebc3b2&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1';
		}
		
		if( url != '' )
		{
			$('.wpt_3_url').attr('href',url);
		}
	});

	// Link code end
	
	
	
	// Move extra on top code start
	/* if( $(window).width() <= 500 )
	{
		$('.wpt_wrap').prepend($('.wpt_wrap .wpt_red'));
	} */
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