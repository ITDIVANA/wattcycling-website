<?php
global $mk_options;

$mk_footer_class = $show_footer = $disable_mobile = $footer_status = '';

$post_id = global_get_post_id();
if($post_id) {
  $show_footer = get_post_meta($post_id, '_template', true );
  $cases = array('no-footer', 'no-header-footer', 'no-header-title-footer', 'no-footer-title');
  $footer_status = in_array($show_footer, $cases);
}

if($mk_options['disable_footer'] == 'false' || ( $footer_status )) {
  $mk_footer_class .= ' mk-footer-disable';
}

if($mk_options['footer_type'] == '2') {
  $mk_footer_class .= ' mk-footer-unfold';
}


$boxed_footer = (isset($mk_options['boxed_footer']) && !empty($mk_options['boxed_footer'])) ? $mk_options['boxed_footer'] : 'true';
$footer_grid_status = ($boxed_footer == 'true') ? ' mk-grid' : ' fullwidth-footer';
$disable_mobile = ($mk_options['footer_disable_mobile'] == 'true' ) ? $mk_footer_class .= ' disable-on-mobile'  :  ' ';

?>

<section id="mk-footer-unfold-spacer"></section>

<section id="mk-footer" class="<?php echo $mk_footer_class; ?>" <?php echo get_schema_markup('footer'); ?>>
    <?php if($mk_options['disable_footer'] == 'true' && !$footer_status) : ?>
    <div class="footer-wrapper<?php echo $footer_grid_status;?>">
        <div class="mk-padding-wrapper">
            <?php mk_get_view('footer', 'widgets'); ?>
            <div class="clearboth"></div>
        </div>
    </div>
    <?php endif;?>
    <?php if ( $mk_options['disable_sub_footer'] == 'true' && ! $footer_status ) { 
        mk_get_view( 'footer', 'sub-footer', false, ['footer_grid_status' => $footer_grid_status] ); 
    } ?>
</section>
</div>
<?php 
    global $is_header_shortcode_added;
    
    if ( $mk_options['seondary_header_for_all'] === 'true' || get_header_style() === '3' || $is_header_shortcode_added === '3' ) {
        mk_get_header_view('holders', 'secondary-menu', ['header_shortcode_style' => $is_header_shortcode_added]); 
    }
?>
</div>

<div class="bottom-corner-btns js-bottom-corner-btns">
<?php
    if ( $mk_options['go_to_top'] != 'false' ) { 
        mk_get_view( 'footer', 'navigate-top' );
    }
    
    if ( $mk_options['disable_quick_contact'] != 'false' ) {
        mk_get_view( 'footer', 'quick-contact' );
    }
    
    do_action('add_to_cart_responsive');
?>
</div>


<?php if ( $mk_options['header_search_location'] === 'fullscreen_search' ) { 
    mk_get_header_view('global', 'full-screen-search');
} ?>

<?php if (!empty($mk_options['body_border']) && $mk_options['body_border'] === 'true') { ?>
    <div class="border-body border-body--top"></div>
    <div class="border-body border-body--left border-body--side"></div>
    <div class="border-body border-body--right border-body--side"></div>
    <div class="border-body border-body--bottom"></div>
<?php } ?>

<footer id="mk_page_footer">
    <?php
    
    wp_footer();

    if( (isset($mk_options['pagespeed-optimization']) and $mk_options['pagespeed-optimization'] != 'false')
     or (isset($mk_options['pagespeed-defer-optimization']) and $mk_options['pagespeed-defer-optimization'] != 'false')) {
    ?>
    <script>
        !function(e){var a=window.location,n=a.hash;if(n.length&&n.substring(1).length){var r=e(".vc_row, .mk-main-wrapper-holder, .mk-page-section, #comments"),t=r.filter("#"+n.substring(1));if(!t.length)return;n=n.replace("!loading","");var i=n+"!loading";a.hash=i}}(jQuery);
    </script>
    <?php } else { ?>
    <script>
        // Run this very early after DOM is ready
        (function ($) {
            // Prevent browser native behaviour of jumping to anchor
            // while preserving support for current links (shared across net or internally on page)
            var loc = window.location,
                hash = loc.hash;

            // Detect hashlink and change it's name with !loading appendix
            if(hash.length && hash.substring(1).length) {
                var $topLevelSections = $('.vc_row, .mk-main-wrapper-holder, .mk-page-section, #comments');
                var $section = $topLevelSections.filter( '#' + hash.substring(1) );
                // We smooth scroll only to page section and rows where we define our anchors.
                // This should prevent conflict with third party plugins relying on hash
                if( ! $section.length )  return;
                // Mutate hash for some good reason - crazy jumps of browser. We want really smooth scroll on load
                // Discard loading state if it already exists in url (multiple refresh)
                hash = hash.replace( '!loading', '' );
                var newUrl = hash + '!loading';
                loc.hash = newUrl;
            }
        }(jQuery));
    </script>
    <?php } ?>


    <?php 
    // Asks W3C Total Cache plugin to move all JS and CSS assets to before body closing tag. It will help getting above 90 grade in google page speed.
    if(isset($mk_options['pagespeed-optimization']) and $mk_options['pagespeed-optimization'] != 'false' and defined('W3TC')) {
        echo "<!-- W3TC-include-js-head -->";
        echo "<!-- W3TC-include-css -->";
    }
    ?>
	<?php
		$week_days = array();
	$week_days[] = "Maandag";
	$week_days[] = "Dinsdag";
	$week_days[] = "Woensdag";
	$week_days[] = "Donderdag";
	$week_days[] = "Vrijdag";
	$week_days[] = "Zaterdag";

	$training_timeby_day = array();
	$training_timeby_day['Maandag'][] = "17.45u - WattCycling d’Huez";
	$training_timeby_day['Maandag'][] = "19.10u - Wattcycling Allround";
	$training_timeby_day['Maandag'][] = "20.35u - WattCycling Tri-Endurance";
	$training_timeby_day['Dinsdag'][] = "7.00u - WattCycling d’Huez";
	$training_timeby_day['Dinsdag'][] = "17.45u - WattCycling Tri-Endurance";
	$training_timeby_day['Dinsdag'][] = "19.10u - WattCycling HIT";
	$training_timeby_day['Dinsdag'][] = "20.35u - WattCycling Allround";
	$training_timeby_day['Woensdag'][] = "7.00u - WattCycling Allround";
	$training_timeby_day['Woensdag'][] = "17.45u - WattCycling HIT";
	$training_timeby_day['Woensdag'][] = "19.10u - WattCycling d’Huez";
	$training_timeby_day['Woensdag'][] = "20.35u - WattCycling Tri/Endurance ";
	$training_timeby_day['Donderdag'][] = "17.45u - WattCycling Allround";
	$training_timeby_day['Donderdag'][] = "19.10u - Wattcycling Tri-Endurance";
	$training_timeby_day['Donderdag'][] = "20.35u - WattCycling d’Huez";
	$training_timeby_day['Vrijdag'][] = "19.10u - WattCycling Allround";
	$training_timeby_day['Zaterdag'][] = "9.00u - WattCycling Tri-Endurance";
	$training_timeby_day['Zaterdag'][] = "10.25u - WattCycling d’Huez";
	?>
<?php  if ( !is_product() ){ ?>
<script type="text/javascript">
if (jQuery('#week_days').length) {
    var week_days= document.getElementById("week_days");
    var training_time = document.getElementById("training_time");
	//onchange(); //Change options after page load
   // week_days.onchange = onchange; // change options when week_days is changed

    //function onchange() {
		jQuery("#week_days").on("change", function () {
        <?php foreach ($week_days as $record_day) {?>
            if (week_days.value == '<?php echo $record_day; ?>') {
                option_html = "";
                <?php if (isset($training_timeby_day[$record_day])) { ?> // Make sure training_timeby_day is exist
                    <?php foreach ($training_timeby_day[$record_day] as $value) { ?>
                        option_html += "<option value='<?php echo $value; ?>'><?php echo $value; ?></option>";
                    <?php } ?>
                <?php } ?>
                training_time.innerHTML = option_html;
            }
        <?php } ?>
		  });
   // }
   
}
</script>
<?php } ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	
	$(window).scroll(function (event) {
    var scrollTop = $(window).scrollTop();
//	console.log(scrollTop);
	if(scrollTop>40){
		// Do something
		$('.mk-main-navigation').css('margin-top','25px');
		$('.top-navigation-ul').css('display','none');
	} else {
		$('.top-navigation-ul').css('display','flow-root');
		$('.mk-main-navigation').css('margin-top','0');
	}
});
	setTimeout(function(){
		$('#mk-accordion-11').find('.mk-accordion-single').removeClass('current');
		$('#mk-accordion-11').find('.mk-accordion-pane').hide();
	}, 1500);
});
</script>

<script>
jQuery(document).ready(function (){
jQuery("#amersfoort_custom_button").click(function (){
	alert("Selecteer eerst product-opties alvorens dit product in de winkelmand te plaatsen.");
	jQuery('html, body').animate({
        scrollTop: jQuery(".variations").offset().top -80
    }, 2000);
	//jQuery(".variations").css({'margin-top':'100px'});
});
});
</script>
</footer>  
</body>
</html>