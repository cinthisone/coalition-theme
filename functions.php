<?php 

include 'coalition-options.php';

add_filter('wpcf7_autop_or_not', '__return_false');





// Enqueue Font Awesome for icons
function load_external_css() 
{

    wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style('Font_Awesome');
}
add_action('wp_enqueue_scripts', 'load_external_css');




// Coalition social icons
function coalition_social( $atts, $content = null ) {
    extract(shortcode_atts(array(
        "social_class" => 'social-class',

    ), $atts));
    ob_start();
    ?>

    <?php if (get_option('social_facebook_text')) { ?> 
      <a href="<?php echo get_option('social_facebook_text') ?>" class="fa fa-facebook"></a>
      <?php } ?>
    <?php if (get_option('social_twitter_text')) { ?> 
      <a href="<?php echo get_option('social_twitter_text') ?>" class="fa fa-twitter"></a>
      <?php } ?>
    <?php if (get_option('social_linkedin_text')) { ?> 
      <a href="<?php echo get_option('social_linkedin_text') ?>" class="fa fa-linkedin"></a>
      <?php } ?>
    <?php if (get_option('social_pinterest_text')) { ?> 
      <a href="<?php echo get_option('social_pinterest_text') ?>" class="fa fa-pinterest"></a>
      <?php } ?>
    

    <?php

    return ob_get_clean();
}
add_shortcode("coalition-social", "coalition_social");
