<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
ob_start();
?>


<div class="wpt_wrap">
	<div class="wpt_single wpt_watt">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">
					WattCycling
				</div>
				

				<div class="wpt_price">
					&euro;55
				</div>
				

				<div class="wpt_per">
					Per
					maand
				</div>
			</div>
			<div class="wpt_types">
				(Allround | HIT | Tri/Endurance | d'Huez)
			</div>
		</div>
		

		<div class="wpt_description">
			Train één keer per week een 80 minuten WattCycling groepstraining.<br>
			<br>
			<i>Contractduur 3 maanden, daarna maandelijks opzegbaar</i>
		</div>
		
		<div class="wpt_options">
			<div class="wpt_kies">
				Kies je WattCycling training:
			</div>
			

			<div class="wpt_dag">
				<label>Dag:</label>
				<select class="wpt_1_dag">
					<option value="">- Selecteer -</option>
					<option value="1">Maandag</option>
					<option value="2">Dinsdag</option>
					<option value="3">Woensdag</option>
					<option value="4">Donderdag</option>
					<option value="5">Vrijdag</option>
					<option value="6">Zaterdag</option>
				</select>
			</div>
			

			<div class="wpt_tij">
				<label>Tijdstip:</label>
				<select class="wpt_1_tij wpt_original">
					<option value="">- Selecteer -</option>
				</select>
				<select class="wpt_hidden">
					<option value="">- Selecteer -</option>
					<option value="1" class="dag_1">17:45 - WattCycling d'Huez</option>
					<option value="2" class="dag_1">VOL - 19:10 - WattCycling Allround</option>
					<option value="3" class="dag_1">VOL - 20:35 - WattCycling Tri/Endurance</option>
					<option value="4" class="dag_2">7:00 - WattCycling d'Huez</option>
					<option value="5" class="dag_2">17:45 - WattCycling Tri/Endurance</option>
					<option value="6" class="dag_2">19:10 - WattCycling HIT</option>
					<option value="7" class="dag_2">VOL - 20:35 - WattCycling Allround</option>
					<option value="8" class="dag_3">7:00 - WattCycling Allround</option>
					<option value="9" class="dag_3">17:45 - WattCycling HIT</option>
					<option value="10" class="dag_3">19:10 - WattCycling d'Huez</option>
					<option value="11" class="dag_3">20:35 - WattCycling Tri/Endurance</option>
					<option value="12" class="dag_4">17:45 - WattCycling Allround</option>
					<option value="13" class="dag_4">19:10 - WattCycling Tri/Endurance</option>
					<option value="14" class="dag_4">VOL - 20:35 - WattCycling d'Huez</option>
					<option value="16" class="dag_5">19:10 - WattCycling Allround</option>
					<option value="17" class="dag_6">9:00 - WattCycling Tri/Endurance</option>
					<option value="18" class="dag_6">10:25 - WattCycling d'Huez</option>
				</select>
			</div>
			
			<div class="wpt_btn">
				<a target="_blank" class="wpt_1_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Wattcycling')">Lid worden</a>
			</div>
			
			<div class="wpt_footer">
				<a href="http://wattcycling.nl/amsterdam-amstel/index.php/product/watts-wattcycling-introductietraining/">of doe een introductietraining</a>
			</div>
		</div>
	</div>
	
	<div class="wpt_single wpt_red" id="abonnementen">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">
					WattCycling extra
				</div>
				
				<div class="wpt_price">
					&euro;69
			    </div>
				
				<div class="wpt_per">
					Per
					maand
				</div>
			</div>
			<div class="wpt_types">
				(Combinatie WattCycling & Daluren)
			</div>
		</div>
		
		<div class="wpt_description">
			Train één keer per week een 80 minuten Wattcycling groepstraining plus een te kiezen aantal extra Daluren trainingen.<br>
			<br>
			<i>Contractduur 3 maanden, daarna maandelijks opzegbaar</i>
		</div>
		
		<div class="wpt_options">
			<div class="wpt_kies">
				Eén keer WattCycling + extra trainingen:
			</div>
			
			<div class="wpt_radio wpt_radio_1">
				<input type="radio" name="wpt_radio" id="wpt_radio_1" value="1" checked="checked" class="wpt_radio_inp">
				<label for="wpt_radio_1" class="wpt_radio_label"><span>Per maand 2 Daluren trainingen | &euro;69</span></label>
			</div>
			
			<div class="wpt_radio wpt_radio_2">
				<input type="radio" name="wpt_radio" id="wpt_radio_2" value="2" class="wpt_radio_inp">
				<label for="wpt_radio_2" class="wpt_radio_label"><span>Per week 1 Daluren training | <b>+&euro;10</b> (&euro;79)</span></label>
			</div>
			
			<div class="wpt_kies">
				Kies je WattCycling training:
			</div>
			
			<div class="wpt_dag">
				<label>Dag:</label>
				<select class="wpt_2_dag">
					<option value="">- Selecteer -</option>
					<option value="1">Maandag</option>
					<option value="2">Dinsdag</option>
					<option value="3">Woensdag</option>
					<option value="4">Donderdag</option>
					<option value="5">Vrijdag</option>
					<option value="6">Zaterdag</option>
				</select>
			</div>
			
			<div class="wpt_tij">
				<label>Tijdstip:</label>
				<select class="wpt_2_tij wpt_original">
					<option value="">- Selecteer -</option>
				</select>
				<select class="wpt_hidden">
					<option value="">- Selecteer -</option>
					<option value="1" class="dag_1">17:45 - WattCycling d'Huez</option>
					<option value="2" class="dag_1">VOL - 19:10 - WattCycling Allround</option>
					<option value="3" class="dag_1">VOL - 20:35 - WattCycling Tri/Endurance</option>
					<option value="4" class="dag_2">7:00 - WattCycling d'Huez</option>
					<option value="5" class="dag_2">17:45 - WattCycling Tri/Endurance</option>
					<option value="6" class="dag_2">19:10 - WattCycling HIT</option>
					<option value="7" class="dag_2">VOL - 20:35 - WattCycling Allround</option>
					<option value="8" class="dag_3">7:00 - WattCycling Allround</option>
					<option value="9" class="dag_3">17:45 - WattCycling HIT</option>
					<option value="10" class="dag_3">19:10 - WattCycling d'Huez</option>
					<option value="11" class="dag_3">20:35 - WattCycling Tri/Endurance</option>
					<option value="12" class="dag_4">17:45 - WattCycling Allround</option>
					<option value="13" class="dag_4">19:10 - WattCycling Tri/Endurance</option>
					<option value="14" class="dag_4">VOL - 20:35 - WattCycling d'Huez</option>
					<option value="16" class="dag_5">19:10 - WattCycling Allround</option>
					<option value="17" class="dag_6">9:00 - WattCycling Tri/Endurance</option>
					<option value="18" class="dag_6">10:25 - WattCycling d'Huez</option>
				</select>
			</div>
			
			<div class="wpt_btn">
				<a target="_blank" class="wpt_2_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Wattcycling extra')">Lid worden</a>
			</div>
			
			<div class="wpt_footer">
				<a href="http://wattcycling.nl/amsterdam-amstel/index.php/product/watts-wattcycling-introductietraining/">of doe een introductietraining</a>
			</div>
		</div>
	</div>
	
	<div class="wpt_single wpt_premium">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">
					WattCycling premium
				</div>
				
				<div class="wpt_price">
					&euro;119
				</div>
				
				<div class="wpt_per">
					Per
					maand
				</div>
			</div>
			<div class="wpt_types">
				(2x WattCycling & onbeperkt Daluren)
			</div>
		</div>
		
		<div class="wpt_description">
			Train twee keer per week een 80 minuten WattCycling groepstraining plus onbeperkt Daluren trainingen. Je tweede WattCycling training kies je zelf via het ledensysteem.<br>
			<br>
			<i>Contractduur 3 maanden, daarna maandelijks opzegbaar</i>
		</div>
		
		<div class="wpt_options">
			<div class="wpt_kies">
				Kies je eerste WattCycling training:
			</div>
			
			<div class="wpt_dag">
				<label>Dag:</label>
				<select class="wpt_3_dag">
					<option value="">- Selecteer -</option>
					<option value="1">Maandag</option>
					<option value="2">Dinsdag</option>
					<option value="3">Woensdag</option>
					<option value="4">Donderdag</option>
					<option value="5">Vrijdag</option>
					<option value="6">Zaterdag</option>
				</select>
			</div>
			
			<div class="wpt_tij">
				<label>Tijdstip:</label>
				<select class="wpt_3_tij wpt_original">
					<option value="">- Selecteer -</option>
				</select>
				<select class="wpt_hidden">
					<option value="">- Selecteer -</option>
					<option value="1" class="dag_1">17:45 - WattCycling d'Huez</option>
					<option value="2" class="dag_1">VOL - 19:10 - WattCycling Allround</option>
					<option value="3" class="dag_1">VOL - 20:35 - WattCycling Tri/Endurance</option>
					<option value="4" class="dag_2">7:00 - WattCycling d'Huez</option>
					<option value="5" class="dag_2">17:45 - WattCycling Tri/Endurance</option>
					<option value="6" class="dag_2">19:10 - WattCycling HIT</option>
					<option value="7" class="dag_2">VOL - 20:35 - WattCycling Allround</option>
					<option value="8" class="dag_3">7:00 - WattCycling Allround</option>
					<option value="9" class="dag_3">17:45 - WattCycling HIT</option>
					<option value="10" class="dag_3">19:10 - WattCycling d'Huez</option>
					<option value="11" class="dag_3">20:35 - WattCycling Tri/Endurance</option>
					<option value="12" class="dag_4">17:45 - WattCycling Allround</option>
					<option value="13" class="dag_4">19:10 - WattCycling Tri/Endurance</option>
					<option value="14" class="dag_4">VOL - 20:35 - WattCycling d'Huez</option>
					<option value="16" class="dag_5">19:10 - WattCycling Allround</option>
					<option value="17" class="dag_6">9:00 - WattCycling Tri/Endurance</option>
					<option value="18" class="dag_6">10:25 - WattCycling d'Huez</option>
				</select>
			</div>
			
			<div class="wpt_btn">
				<a target="_blank" class="wpt_3_url" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'premium')">Lid worden</a>
			</div>
			
			<div class="wpt_footer">
				<a href="http://wattcycling.nl/amsterdam-amstel/index.php/product/watts-wattcycling-introductietraining/">of doe een introductietraining</a>
			</div>
		</div>
	</div>
	
	<div class="wpt_single wpt_daluren">
		<div class="wpt_title">
			<div class="wpt_div_flex">
				<div class="wpt_heading">
					Daluren
				</div>
			
				<div class="wpt_price">
					&euro;39
				</div>
				
				<div class="wpt_per">
					Per
					maand
				</div>
			</div>
			<div class="wpt_types">
				(Open Training)
			</div>
		</div>
		
		<div class="wpt_description">
			Train zelf één keer week tijdens de Open training op de Wattbike<br> 
			Kies een training uit de Wattbike app, rij met Zwift of kies de<br> 
			'Training of the Day'.<br> 		
			(ma-do van 9 - 13u). Plan je training zelf via het ledensysteem.<br>
			<br>
			<i>Contractduur 3 maanden, daarna maandelijks opzegbaar</i>
		</div>
		
		<div class="wpt_options">
			<div class="wpt_btn wpt_last_btn">
				<a href="https://wattcycling-amsterdamamstel.virtuagym.com/webshop/product?id=3a8c3a2cbd323e9433e385bcbd8cc98c831a&club=dkQxcjk4a3pjWmgrRjlVc0k0WkNNQT09&embedded=1" target="_blank" onClick="ga('send', 'event', 'Aankoop', 'abonnement', 'Daluren')">Lid worden</a>
			</div>
			
			<div class="wpt_footer">
				<a href="http://wattcycling.nl/amsterdam-amstel/index.php/product/watts-wattcycling-introductietraining/">of doe een introductietraining</a>
			</div>
		</div>
	</div>
</div>

<?php
$return = ob_get_clean();
?>