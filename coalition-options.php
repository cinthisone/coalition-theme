<?php 

// Code below is based on file upload solution found at:
// URL: https://rudrastyh.com/wordpress/creating-options-pages.html
// Author: Misha Rudrastyh Digital 



add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'coali-slug') {
        wp_enqueue_media();
        wp_register_script('my-admin-js', get_stylesheet_directory_uri() .'/js/my-admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');

    }
}


add_action( 'admin_menu', 'coali_menu_page' );

function coali_menu_page() {

    add_options_page(
        'My Page Title', // page <title>Title</title>
        'Coali Options', // menu link text
        'manage_options', // capability to access the page
        'coali-slug', // page URL slug
        'coali_page_content', // callback function /w content
        2 // priority
    );

}

function coali_page_content(){

    echo '<div class="wrap">
        <h1>Coalition Test Settings</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'coali_settings' ); // settings group name
            do_settings_sections( 'coali-slug' ); // just a page slug
            submit_button();

        echo '</form></div>';

}




add_action( 'admin_init',  'coali_register_setting' );

function coali_register_setting(){

    

    add_settings_section(
        'some_settings_section_id', // section ID
        '', // title (if needed)
        '', // callback function (if needed)
        'coali-slug' // page slug
    );

    register_setting(
        'coali_settings', // settings group name
        'phone_text', // option name
        'sanitize_text_field' // sanitization function
    );
    register_setting(
        'coali_settings', // settings group name
        'fax_text', // option name
        'sanitize_text_field' // sanitization function
    );

    register_setting(
        'coali_settings', // settings group name
        'social_facebook_text', // option name
        'sanitize_text_field' // sanitization function
    );

    register_setting(
        'coali_settings', // settings group name
        'social_twitter_text', // option name
        'sanitize_text_field' // sanitization function
    );

    register_setting(
        'coali_settings', // settings group name
        'social_linkedin_text', // option name
        'sanitize_text_field' // sanitization function
    );

    register_setting(
        'coali_settings', // settings group name
        'social_pinterest_text', // option name
        'sanitize_text_field' // sanitization function
    );

      register_setting(
        'coali_settings', // settings group name
        'address_text', // option name
        '' // sanitization function
    );

      register_setting(
        'coali_settings', // settings group name
        'logo_image', // option name
        '' // sanitization function
    );

    add_settings_field(
        'phone_text',
        'Phone',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'phone_text',
            'class' => 'coali-class', // for <tr> element
            'phone_text',
        )
    );

    add_settings_field(
        'fax_text',
        'Fax',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'fax_text',
            'class' => 'coali-class', // for <tr> element
            'fax_text',
        )
    );

    add_settings_field(
        'social_facebook_text',
        'Social Facebook',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'social_facebook_text',
            'class' => 'coali-class', // for <tr> element
            'social_facebook_text',
        )
    );

    add_settings_field(
        'social_twitter_text',
        'Social Twitter',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'social_twitter_text',
            'class' => 'coali-class', // for <tr> element
            'social_twitter_text',
        )
    );

    add_settings_field(
        'social_linkedin_text',
        'Social LinkedIn',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'social_linkedin_text',
            'class' => 'coali-class', // for <tr> element
            'social_linkedin_text',
        )
    );

    add_settings_field(
        'social_pinterest_text',
        'Social Pinterest',
        'coali_text_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'social_pinterest_text',
            'class' => 'coali-class', // for <tr> element
            'social_pinterest_text',
        )
    );

    add_settings_field(
        'address_text',
        'Address',
        'coali_textarea_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'address_text',
            'class' => 'coali-class', // for <tr> element
            'address_text',
        )
    );
    
    add_settings_field(
        'logo_image',
        'Logo Image',
        'coali_upload_field_html', // function which prints the field
        'coali-slug', // page slug
        'some_settings_section_id', // section ID
        array( 
            'label_for' => 'logo_image',
            'class' => 'coali-class', // for <tr> element
            'logo_image',
        )
    );
}


function coali_text_field_html($args){

    $option = get_option($args[0]);
        echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';   
}

function coali_textarea_field_html($args){
    
    $address_field = get_option('address_text');
    ?>
    <textarea name="address_text" id="" cols="30" rows="10"><?php echo isset($address_field) ? esc_textarea($address_field) : '';   ?></textarea>
    <?php
}


function coali_upload_field_html($args){

    $logo_image = get_option('logo_image');

    ?>
    <label for="upload_image">
        <input id="upload_image" type="text" size="36" name="logo_image" value="<?php echo isset($logo_image) ? $logo_image : 'https://';   ?>" /> 
        <input id="upload_image_button" class="button" type="button" value="Upload Image" />
        <br />Enter a URL or upload an image
    </label>
    <?php
}




#### coali_options
function coali_options( $atts, $content = null ) {
    extract(shortcode_atts(array(
        "option" => '',

    ), $atts));
    ob_start();
    echo get_option($option);
    ?>
    
    <?php
    return ob_get_clean();
}
add_shortcode("coali_options", "coali_options");






