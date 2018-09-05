<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
ob_start();
?>
<div class="wpt_wrap">
	<div class="wpt_single wpt_watt" id="tweedehands">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">Tweedehands</div>				
				<div class="wpt_price">&euro;2800</div>				
				<div class="wpt_per"></div>
			</div>
			<div class="wpt_types">Wattbike pro of trainer</div>
		</div>		
		<div class="wpt_description">Alle tweedehands Wattbikes krijgen een uitgebreide servicebeurt. Hierdoor kun je nog jaren plezier aan de Wattbike beleven.<br><br><u>Nieuw model:</u> minder dan 1 jaar oud (2 jaar garantie)<br><u>Oud model:</u> 4 jaar oud (1 jaar garantie)</div>		
		<div class="wpt_options">
			<div class="wpt_kies">Welke Wattbike kies jij?</div>			
			<div class="wpt_radio wpt_radio_1">
				<input type="radio" name="wpt_radio" id="wpt_radio_1" value="1" checked="checked" class="wpt_radio_inp">
				<label for="wpt_radio_1" class="wpt_radio_label"><span>Nieuw model | &euro;2800</span></label>
			</div>			
			<div class="wpt_radio wpt_radio_2">
				<input type="radio" name="wpt_radio" id="wpt_radio_2" value="2" class="wpt_radio_inp">
				<label for="wpt_radio_2" class="wpt_radio_label"><span>Oud model | &euro;1400</span></label>
			</div>			
			<div class="wpt_kies">Kies je Wattbike type:</div>
			<label><i>De pro trapt zwaarder dan de trainer.</i></label>			
			<div class="wpt_dag">
				<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_tweedehands" id="type_wattbike_3" value="3" checked="checked" class="wpt_radio_inp">
				<label for="type_wattbike_3" class="wpt_radio_label"><span>Pro</span></label>
			</div>			
			<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_tweedehands" id="type_wattbike_4" value="4" class="wpt_radio_inp">
				<label for="type_wattbike_4" class="wpt_radio_label"><span>Trainer</span></label>
			</div>	
			</div>
			<?php
					$variation_id =902;
					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity902 = $_product->get_stock_quantity();
					$variation_id =903;
					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity903 = $_product->get_stock_quantity();
					$variation_id =905;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity905 = $_product->get_stock_quantity();
					$variation_id =906;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity906 = $_product->get_stock_quantity();							
			?>			
			<div class="quantity buttons_added wattcycling_box">
				<input type="button" id="wattcycling_plus2" value="+" class="plus wattcycling_plus">
				<label class="screen-reader-text" for="quantity">Aantal: </label>
				<input type="text" id="quantity2" class="input-text qty text wattcycling_txt" step="1" min="1" max="<?php echo $stock_quantity902; ?>" name="quantity" value="1" title="Aantal" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
				<input type="button" id="wattcycling_minus2" value="-" class="minus wattcycling_minus">
			</div>
			<?php if(!empty($stock_quantity902)){ ?>
			<div class="stock_quantity_outer" id="stock_quantity_outer902" data-stock_quantity="<?php echo $stock_quantity902; ?>"><span> <?php echo $stock_quantity902; ?></span> op voorraad</div>
			<?php }  ?>
			<?php if(!empty($stock_quantity903)){ ?>
			<div class="stock_quantity_outer"  id="stock_quantity_outer903" data-stock_quantity="<?php echo $stock_quantity903; ?>" style="display:none;"><span><?php echo $stock_quantity903; ?></span> op voorraad</div>
			<?php }  ?>
			<?php if(!empty($stock_quantity905)){ ?>
			<div class="stock_quantity_outer"  id="stock_quantity_outer905" data-stock_quantity="<?php echo $stock_quantity905; ?>" style="display:none;"><span><?php echo $stock_quantity905; ?></span> op voorraad</div>
			<?php }  ?>
			<?php if(!empty($stock_quantity906)){ ?>
			<div class="stock_quantity_outer"  id="stock_quantity_outer906" data-stock_quantity="<?php echo $stock_quantity906; ?>" style="display:none;"><span><?php echo $stock_quantity906; ?></span> op voorraad</div>
			<?php }  ?>
			<div class="wpt_btn">
				<a href="https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=901&variation_id=902&attribute_type=Wattbike%20Pro&quantity=1" target="_blank" id="wpt_2_url" class="wpt_2_url">Koop de Wattbike</a>
				<?php /*<a target="_blank" class="wpt_2_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Wattcycling extra')">Lid worden</a> */ ?>
			</div>		
			<div class="wpt_footer"></div>
		</div>
	</div>	
	<div class="wpt_single wpt_red">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">Nieuw</div>
				<div class="wpt_price">&euro;3290</div>
				<div class="wpt_per"></div>
			</div>
			<div class="wpt_types">Wattbike pro of trainer</div>
		</div>
		<div class="wpt_description">Wattbike is de ultieme indoor fiets voor fietsers. Een indoor fiets die gestructureerd trainen makkelijk maakt en iedere fietser helpt doelen te bereiken. De Wattbike is op voorraad.<br><br>2 jaar garantie</div>		
		<div class="wpt_options">
			<div class="wpt_kies">Kies je Wattbike type:</div>
			<label><i>De pro trapt zwaarder dan de trainer.</i></label>
			<div class="wpt_dag">
			<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_nieuw" id="type_wattbike_1" value="1" checked="checked" class="wpt_radio_inp">
				<label for="type_wattbike_1" class="wpt_radio_label"><span>Pro</span></label>
			</div>			
			<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_nieuw" id="type_wattbike_2" value="2" class="wpt_radio_inp">
				<label for="type_wattbike_2" class="wpt_radio_label"><span>Trainer</span></label>
			</div>	
			</div>
				<?php
					$variation_id =892;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity892 = $_product->get_stock_quantity();
					$variation_id =893;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity893 = $_product->get_stock_quantity();					
				?>
			<div class="quantity buttons_added wattcycling_box">
				<input type="button" id="wattcycling_plus1" value="+" class="plus wattcycling_plus">
				<label class="screen-reader-text" for="quantity">Aantal: </label>
				<input type="text" id="quantity" class="input-text qty text wattcycling_txt" step="1" min="1" max="<?php echo $stock_quantity892; ?>" name="quantity" value="1" title="Aantal" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
				<input type="button" id="wattcycling_minus1" value="-" class="minus wattcycling_minus">
			</div>
			<?php if(!empty($stock_quantity892)){ ?>
			<div class="stock_quantity_outer" id="stock_quantity_outer892"  data-stock_quantity="<?php echo $stock_quantity892; ?>"><span> <?php echo $stock_quantity892; ?></span> op voorraad</div>
			<?php }  ?>
			<?php if(!empty($stock_quantity893)){ ?>
			<div class="stock_quantity_outer"  id="stock_quantity_outer893" data-stock_quantity="<?php echo $stock_quantity893; ?>" style="display:none;"><span><?php echo $stock_quantity893; ?></span> op voorraad</div>
			<?php }  ?>			
			<div class="wpt_btn">
				<a  target="_blank" href="https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=886&variation_id=892&attribute_type=Wattbike%20Pro&quantity=1" id="wpt_1_url" class="wpt_1_url">Koop de Wattbike</a>
				<?php /* <a  href="https://wattcycling.nl/product/wattbike-kopen/" target="_blank" class="wpt_1_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Wattcycling')">Koop de Wattbike</a>  */ ?>
			</div>			
			<div class="wpt_footer"></div>
		</div>
	</div>	
	<div class="wpt_single wpt_premium">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">Huren</div>				
				<div class="wpt_price">&euro;110</div>				
				<div class="wpt_per">Per	maand</div>
			</div>
			<div class="wpt_types huren">Wattbike pro of trainer</div>
		</div>		
		<div class="wpt_description">Of je nu op de Wattbike wil overwinteren, revalideert van een blessure of de Wattbike wil proberen alvorens aan te schaffen, huren is een oplossing.<br><br><u>Borg:</u> €250</div>
		
		<div class="wpt_options">
			<div class="wpt_kies">Kies je Wattbike type:</div>
				<label><i>De pro trapt zwaarder dan de trainer.</i></label>
			<div class="wpt_dag">
			<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_huren" id="type_wattbike_5" value="5" checked="checked" class="wpt_radio_inp">
				<label for="type_wattbike_5" class="wpt_radio_label"><span>Pro</span></label>
			</div>			
			<div class="wpt_radio type_wattbike">
				<input type="radio" name="type_wattbike_huren" id="type_wattbike_6" value="6" class="wpt_radio_inp">
				<label for="type_wattbike_6" class="wpt_radio_label"><span>Trainer</span></label>
			</div>
			</div>
				<?php
/* 					$variation_id =895;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity895 = $_product->get_stock_quantity();
					$variation_id =898;					
					$_product = new WC_Product_Variation($variation_id);
					$stock_quantity898 = $_product->get_stock_quantity();		 */			
				?>
			<div class="quantity buttons_added wattcycling_box">
				<input type="button" id="wattcycling_plus3" value="+" class="plus wattcycling_plus">
				<label class="screen-reader-text" for="quantity">Aantal: </label>
				<input type="text" id="quantity3" class="input-text qty text wattcycling_txt" step="1" min="1" max="" name="quantity" value="1" title="Aantal" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
				<input type="button" id="wattcycling_minus3" value="-" class="minus wattcycling_minus">
			</div>
			<div class="wpt_btn">
				<a  href="https://wattcycling.nl/product/wattbike-kopen-2/?add-to-cart=894&variation_id=895&attribute_type=Wattbike%20Pro&quantity=1" target="_blank" id="wpt_3_url" class="wpt_3_url">Huur de Wattbike</a>
				<?php /* <a target="_blank" class="wpt_3_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'premium')">Lid worden</a>*/ ?> 
			</div>			
			<div class="wpt_footer"></div>
		</div>
	</div>
	<?php
/* 	<div class="wpt_single wpt_daluren">
		<div class="wpt_title">
			<div class="wpt_div_flex"><div class="wpt_heading">Strippenkaart</div></div>
			<div class="wpt_types">Train wanneer jij wil</div>
		</div>	
		<div class="wpt_options punch_card_optn"><div class="wpt_kies">Kies je strippenkaart:</div></div>
		<a target="_blank" class="wpt_4_url"  href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=76ae38a8e9a4a13a3ed469ca75ed782a2a4b&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1"><div class="wpt_radio punch_card"><span class="punch_card_txt">1 keer Open training</span><div class="punch_card_price_outer"><div class="punch_card_price">&euro;12,50</div><div class="right_arrow"><img src="<?php echo plugins_url(); ?>/wattcycling-pricing-table/includes/images/right-corner.png" /></div></div></div></a>

		<a target="_blank" class="wpt_5_url" href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=43e7c860fe79335e9c8d40df1b4f638e7aa2&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1"><div class="wpt_radio punch_card"><span class="punch_card_txt">10 keer Open training</span><div class="punch_card_price_outer"><div class="punch_card_price">&euro;100</div><div class="right_arrow"><img src="<?php echo plugins_url(); ?>/wattcycling-pricing-table/includes/images/right-corner.png" /></div></div></div></a>

		<a target="_blank" class="wpt_6_url" href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=a7616dd0b83513417531db46293b3053fe33&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1"><div class="wpt_radio punch_card"><span class="punch_card_txt">1 keer WattCycling</span><div class="punch_card_price_outer"><div class="punch_card_price">&euro;17,50</div><div class="right_arrow"><img src="<?php echo plugins_url(); ?>/wattcycling-pricing-table/includes/images/right-corner.png" /></div></div></div></a>
		
		<a target="_blank" class="wpt_7_url" href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=5dec6de17e3a53bfffc5f10405aad40f7df0&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1"><div class="wpt_radio punch_card"><span class="punch_card_txt">10 keer WattCycling</span><div class="punch_card_price_outer"><div class="punch_card_price">&euro;150</div><div class="right_arrow"><img src="<?php echo plugins_url(); ?>/wattcycling-pricing-table/includes/images/right-corner.png" /></div></div></div></a>
		
		<div class="wpt_options">
			<!-- <div class="wpt_btn wpt_last_btn">
				<a href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=3a8c3a2cbd323e9433e385bcbd8cc98c831a&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1" target="_blank" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Daluren')">Lid worden</a>
			</div> -->
			
			<div class="wpt_footer">
				<a href="http://wattcycling.nl/amsterdam-amstel/index.php/product/watts-wattcycling-introductietraining/">of doe een introductietraining</a>
			</div>
		</div>
	</div> */	?>
</div>
<?php $return = ob_get_clean(); ?>