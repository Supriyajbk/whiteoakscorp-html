<?php
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Permissions-Policy: 'camera=(), microphone=(), geolocation=()' always;");
add_filter('xmlrpc_enabled', '__return_false');
/** Disable REST API **/
// Filters for WP-API version 1.x
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
function zerowp_disable_rest_api($access)
{
    if (is_user_logged_in()) {
        return $access;
    }
    $errorMessage = 'REST API is disabled!';
    if (!is_wp_error($access)) {
        return new WP_Error(
            'rest_api_disabled',
            $errorMessage,
            [
                'status' => rest_authorization_required_code(),
            ]
        );
    }
    $access->add(
        'rest_api_disabled',
        $errorMessage,
        [
            'status' => rest_authorization_required_code(),
        ]
    );
    return $access;
}
add_filter('rest_authentication_errors', 'zerowp_disable_rest_api', 99);
if (!is_admin()) {
    // default URL format
    if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
    add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request)
{
    // permalink URL format
    if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
    else return $redirect;
}
if ( ! function_exists( 'whiteaokscorporate_setup' ) ) {

	function whiteaokscorporate_setup() {

		load_theme_textdomain( 'whiteaokscorporate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'whiteaokscorporate' ),
				'footer'  => __( 'Secondary menu', 'whiteaokscorporate' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);		
	}
}
register_nav_menus(
    array(
        'primary' => esc_html__( 'Primary menu', 'whiteaokscorporate' ),
        'footer'  => __( 'Secondary menu', 'whiteaokscorporate' ),
    )
);
add_action( 'after_setup_theme', 'whiteaokscorporate_setup' );

function my_mce_buttons_2($buttons) {
/**
* Add in a core button that's disabled by default
*/
$buttons[] = 'superscript';
$buttons[] = 'subscript';
return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function disable_comments_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_menu');

function disable_comments_post_type() {
    remove_post_type_support('post', 'comments');
}
add_action('init', 'disable_comments_post_type');

// Disable support for comments on 'page' post type
function disable_comments_page_type() {
    remove_post_type_support('page', 'comments');
}
add_action('init', 'disable_comments_page_type');

if( function_exists('acf_add_options_sub_page') )
{
   acf_add_options_sub_page(array(
       'title' => 'Header Options',
      'parent' => 'themes.php',
   ));
}

if(function_exists('acf_add_options_sub_page')) {
       acf_add_options_sub_page(array(
               'title' => 'Footer Options',
               'parent' => 'themes.php',
       ));
}



function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  
  add_filter('upload_mimes', 'cc_mime_types');
  add_filter( 'big_image_size_threshold', '__return_false' );

  function add_my_custom_body_class( $classes ) {
    global $post; 
    if(is_page(array(497, 15, 193, 191, 70, 210)) || (is_404())) {
        $classes[] = 'trans-header';
    }
    return $classes;
}
add_filter( 'body_class', 'add_my_custom_body_class');

  function whiteaokscorporate_scripts()
{
    $p_cache = rand(109220, 1228398987878);

    wp_enqueue_style('whiteaokscorporate-style', get_template_directory_uri() . '/style.css', array(), '' . $p_cache . '');
    wp_enqueue_script( 'whiteaokscorporate-script', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array(), ''.$p_cache.'', true );
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), ''.$p_cache.'', true );
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/css/slick.css', array(), '' . $p_cache . '');
    wp_enqueue_script( 'slick-min-js', get_template_directory_uri() . '/js/slick.min.js', array(), ''.$p_cache.'', true );
    wp_enqueue_script( 'custom-slick', get_template_directory_uri() . '/js/custom-slick.js', array(), ''.$p_cache.'', true );
    if(is_page_template( 'templates/contact.php' )){
        wp_enqueue_style('contact-style',  get_template_directory_uri() . '/css/contact.css', array(), ''.$p_cache.'', 'all');
    
    }
    if ( is_page() && !is_page_template()){
       wp_enqueue_style('default-style',  get_template_directory_uri() . '/css/default.css', array(), ''.$p_cache.'', 'all');       
     wp_enqueue_script( 'video-js', get_template_directory_uri() . '/js/jquery.youtube-background.min.js', array(), ''.$p_cache.'', true );
      wp_enqueue_script( 'iframe-js', get_template_directory_uri() . '/js/iframe.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/home.php' )){
        wp_enqueue_style('home-style',  get_template_directory_uri() . '/css/index.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'counter-js', get_template_directory_uri() . '/js/counter.js', array(), ''.$p_cache.'', true );
        wp_enqueue_script( 'video-js', get_template_directory_uri() . '/js/jquery.youtube-background.min.js', array(), ''.$p_cache.'', true );
        wp_enqueue_script( 'iframe-js', get_template_directory_uri() . '/js/iframe.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/about.php' )){
        wp_enqueue_style('about-style',  get_template_directory_uri() . '/css/about.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'counter-js', get_template_directory_uri() . '/js/counter.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/advertising.php' )){
        wp_enqueue_style('advertising-style',  get_template_directory_uri() . '/css/advertising.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'counter-js', get_template_directory_uri() . '/js/counter.js', array(), ''.$p_cache.'', true );
        wp_enqueue_script( 'jquery.selectBox-js', get_template_directory_uri() . '/js/jquery.selectBox.js', array(), ''.$p_cache.'', true );
        wp_enqueue_script( 'custom-selectBox-js', get_template_directory_uri() . '/js/custom-selectBox.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/career.php' )){
        wp_enqueue_style('careers-style',  get_template_directory_uri() . '/css/careers-page.css', array(), ''.$p_cache.'', 'all');
       wp_enqueue_style('pop-up-style',  get_template_directory_uri() . '/css/magnific-popup.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/magnific-popup.min.js', array(), ''.$p_cache.'', true ); 
    }
    if ( is_singular('careers')){
        wp_enqueue_style('careers-post-style',  get_template_directory_uri() . '/css/careers-post-page.css', array(), ''.$p_cache.'', 'all');       
        
    }
    if (is_404())
    {
        wp_enqueue_style('404-style',  get_template_directory_uri() . '/css/404.css', array(), ''.$p_cache.'', 'all');
    }

}


add_action('wp_enqueue_scripts', 'whiteaokscorporate_scripts');

function optional_cta(){
//    if(is_page_template( 'templates/career.php' )){
//     $hide_cta_desktop = "hide-in-desktop hide-in-tablet";
//    }else{
//     $hide_cta_desktop = "";
//    }
    
if (have_rows('optional_preheader')) : ?>
<section class="repeater-section pos-relative <?php //echo $hide_cta_desktop; ?>">
    <div class="container-md">
        <div class="repeater-main">
            <?php while (have_rows('optional_preheader')) : the_row(); 
            $row_index = get_row_index();
                $desktop_image   = get_sub_field('optional_preheader_desktop_image');
                $mobile_image    = get_sub_field('optional_preheader_mobile_image');
                $sub_heading     = get_sub_field('optional_preheader_sub_heading');
                $heading         = get_sub_field('optional_preheader_heading');
                $description     = get_sub_field('optional_preheader_description');
                $button_text     = get_sub_field('optional_preheader_button_text');
                $button_link     = get_sub_field('optional_preheader_button_link');
                if(!empty($desktop_image || $heading || $description)){ 
            ?>
            <div class="repeater-list flex">
                <?php if(!empty($desktop_image)){ ?>
                    <div class="repeater-img">
                         
                        <picture class="object-fit">
                            <source srcset="<?php echo $desktop_image['url']; ?>" media="(min-width: 768px)">
                            <img src="<?php echo $mobile_image['url']; ?>" alt="<?php echo $mobile_image['alt']; ?>">
                        </picture>
                        <?php if ($row_index % 2 == 1): ?>
                            <!-- For rows 1, 3, 5... -->
                            <div class="repeater-line-thumb">
                                <figure class="object-fit">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intersect-mist.svg" alt="line">
                                </figure>
                            </div>
                        <?php else: ?>
                            <!-- For rows 2, 4, 6... -->
                            <div class="repeater-line-thumb">
                                <figure class="object-fit">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/short-intersect.svg" alt="line">
                                </figure>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                <?php } if(!empty($heading || $description)){ ?>
                    <div class="repeater-text">
                        <?php if(!empty($sub_heading)){ ?>
                            <span class="optional-text"><?php echo $sub_heading; ?></span>
                        <?php } if(!empty($heading)){ ?>
                            <div class="h3"><?php echo $heading; ?></div>
                        <?php } if(!empty($description)){
                            echo $description;    
                        } ?> 
                        <?php if ($button_text && $button_link) : ?>    
                            <div class="btn"> <a href="<?php echo $button_link; ?>" class="button"><?php echo $button_text; ?></a></div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
            
            <?php } endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif;  }

function advertise_cta(){
$advertise_cta_desktop_image = get_field('advertise_cta_desktop_image');
$advertise_cta_mobile_image  = get_field('advertise_cta_mobile_image');
$advertise_cta_sub_heading     = get_field('advertise_cta_sub_heading');
$advertise_cta_heading      = get_field('advertise_cta_heading');
$advertise_cta_description = get_field('advertise_cta_description');
$advertise_cta_button_text  = get_field('advertise_cta_button_text');
$advertise_cta_button_link     = get_field('advertise_cta_button_link');
if(empty($advertise_cta_desktop_image)){
    $no_img = "no-img";
}else{
    $no_img = "";
}
if(empty($advertise_cta_heading &&  $advertise_cta_description)){
    $no_txt = "no-text";
}else{
    $no_txt = "";
}

if(!empty($advertise_cta_desktop_image || $advertise_cta_heading ||  $advertise_cta_description)){
?>

    <section class="cta-module pos-relative ">
        <div class="container pos-relative">
            <div class="cta-wave">
                <svg width="873" height="449" viewBox="0 0 873 449" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M36.3367 226.074H0C0 226.074 8.13538 138.758 18.1717 138.758C28.2081 138.758 36.3367 226.074 36.3367 226.074ZM90.8451 1.75108C80.8088 1.75108 72.6734 226.074 72.6734 226.074H109.017C109.017 226.074 100.881 1.75108 90.8451 1.75108ZM36.3367 226.074C36.3367 226.074 44.4721 349.767 54.5084 349.767C64.5448 349.767 72.6734 226.074 72.6734 226.074H36.3367ZM181.697 224.677H218.034C218.034 224.677 209.898 311.993 199.862 311.993C189.826 311.993 181.697 224.677 181.697 224.677ZM127.189 449C137.225 449 145.36 224.677 145.36 224.677H109.017C109.017 224.677 117.152 449 127.189 449ZM181.697 224.677C181.697 224.677 173.562 100.984 163.525 100.984C153.489 100.984 145.36 224.677 145.36 224.677H181.697ZM254.37 225.372H218.034C218.034 225.372 226.169 138.056 236.205 138.056C246.242 138.056 254.37 225.372 254.37 225.372ZM308.879 1.04928C298.842 1.04928 290.707 225.372 290.707 225.372H327.051C327.051 225.372 318.915 1.04928 308.879 1.04928ZM254.37 225.372C254.37 225.372 262.506 349.065 272.542 349.065C282.579 349.065 290.707 225.372 290.707 225.372H254.37ZM399.731 223.975H436.067C436.067 223.975 427.932 311.291 417.896 311.291C407.859 311.291 399.731 223.975 399.731 223.975ZM345.222 448.298C355.259 448.298 363.394 223.975 363.394 223.975H327.051C327.051 223.975 335.186 448.298 345.222 448.298ZM399.731 223.975C399.731 223.975 391.595 100.282 381.559 100.282C371.523 100.282 363.394 223.975 363.394 223.975H399.731ZM472.404 225.024H436.067C436.067 225.024 444.203 137.709 454.239 137.709C464.269 137.709 472.404 225.024 472.404 225.024ZM526.913 0.701787C516.876 0.701787 508.741 225.024 508.741 225.024H545.084C545.084 225.024 536.949 0.701787 526.913 0.701787ZM472.404 225.024C472.404 225.024 480.54 348.718 490.576 348.718C500.612 348.718 508.741 225.024 508.741 225.024H472.404ZM617.765 223.628H654.101C654.101 223.628 645.966 310.943 635.929 310.943C625.9 310.943 617.765 223.628 617.765 223.628ZM563.256 447.95C573.292 447.95 581.428 223.628 581.428 223.628H545.084C545.084 223.628 553.22 447.95 563.256 447.95ZM617.765 223.628C617.765 223.628 609.629 99.9344 599.593 99.9344C589.556 99.9344 581.428 223.628 581.428 223.628H617.765ZM690.438 224.323H654.101C654.101 224.323 662.237 137.007 672.273 137.007C682.302 137.007 690.438 224.323 690.438 224.323ZM744.946 0C734.91 0 726.775 224.323 726.775 224.323H763.118C763.118 224.323 754.983 0 744.946 0ZM690.438 224.323C690.438 224.323 698.573 348.016 708.61 348.016C718.646 348.016 726.775 224.323 726.775 224.323H690.438ZM835.798 222.926H872.135C872.135 222.926 864 310.242 853.963 310.242C843.934 310.248 835.798 222.926 835.798 222.926ZM781.29 447.249C791.326 447.249 799.462 222.926 799.462 222.926H763.118C763.118 222.926 771.253 447.249 781.29 447.249ZM835.798 222.926C835.798 222.926 827.663 99.2326 817.627 99.2326C807.59 99.2326 799.462 222.926 799.462 222.926H835.798Z"
                        fill="#00513F" />
                </svg>
            </div>
            <div class="cta-main flex flex-vcenter  ">
                <?php if(!empty($advertise_cta_heading ||  $advertise_cta_description)){ ?>
                    <div class="cta-text <?php echo $no_img; ?>">
                        <?php if(!empty($advertise_cta_sub_heading)){ ?>
                            <span class="signal optional-text"><?php echo $advertise_cta_sub_heading; ?></span>
                        <?php } if(!empty($advertise_cta_heading)){ ?>
                            <div class="h2"><?php echo $advertise_cta_heading; ?></div>
                        <?php }  
                            echo $advertise_cta_description; 
                        ?>
                        <?php if (!empty($advertise_cta_button_text && $advertise_cta_button_link)) { ?>
                        <div class="btn-wrap"> <a href="<?php echo $advertise_cta_button_link; ?>" class="button yellow-btn"><?php echo $advertise_cta_button_text; ?></a></div>
                        <?php } ?>
                        <!-- end of btn wrap -->
                    </div>
                <?php } if(!empty($advertise_cta_desktop_image)){ ?>
                <div class="cta-img pos-relative <?php echo $no_txt; ?>">
                    <picture class="object-fit">
                        <source srcset="<?php echo $advertise_cta_desktop_image['url']; ?>" media="(min-width:768px)">
                        <img src="<?php echo $advertise_cta_mobile_image['url']; ?>" alt="<?php echo $advertise_cta_mobile_image['alt']; ?>">
                    </picture>

                    <div class="cta-line hide-in-mobile">
                        <figure class="object-fit">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="">
                        </figure>
                    </div>
                </div>
                <?php } ?>
                <div class="cta-line hide-in-desktop hide-in-tablet">
                    <figure class="object-fit">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
<?php } }

function advertise_with_us(){
$advertise_desktop_image    = get_field('advertise_desktop_image');
$advertise_mobile_image     = get_field('advertise_mobile_image');
$advertise_sub_heading      = get_field('advertise_sub_heading');
$advertise_heading          = get_field('advertise_heading');
$advertise_description      = get_field('advertise_descripiton');
$advertise_button_text      = get_field('advertise_button_text');
$advertise_button_link      = get_field('advertise_button_link');

$no_img_advertise = empty($advertise_desktop_image) ? "no-img" : "";

$no_txt_advertise = (empty($advertise_heading) && empty($advertise_description)) ? "no-text" : "";
// if(is_page_template( 'templates/career.php' )){
//     $hide_advertise_desktop = "hide-in-desktop hide-in-tablet";
//    }else{
//     $hide_advertise_desktop = "";
//    }
if(!empty($advertise_desktop_image || $advertise_heading ||  $advertise_description)){
?>
    <section class="cta-module pos-relative <?php //echo $hide_advertise_desktop; ?>">
        <div class="container pos-relative">
          <div class="cta-wave">
            <svg width="873" height="449" viewBox="0 0 873 449" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M36.3367 226.074H0C0 226.074 8.13538 138.758 18.1717 138.758C28.2081 138.758 36.3367 226.074 36.3367 226.074ZM90.8451 1.75108C80.8088 1.75108 72.6734 226.074 72.6734 226.074H109.017C109.017 226.074 100.881 1.75108 90.8451 1.75108ZM36.3367 226.074C36.3367 226.074 44.4721 349.767 54.5084 349.767C64.5448 349.767 72.6734 226.074 72.6734 226.074H36.3367ZM181.697 224.677H218.034C218.034 224.677 209.898 311.993 199.862 311.993C189.826 311.993 181.697 224.677 181.697 224.677ZM127.189 449C137.225 449 145.36 224.677 145.36 224.677H109.017C109.017 224.677 117.152 449 127.189 449ZM181.697 224.677C181.697 224.677 173.562 100.984 163.525 100.984C153.489 100.984 145.36 224.677 145.36 224.677H181.697ZM254.37 225.372H218.034C218.034 225.372 226.169 138.056 236.205 138.056C246.242 138.056 254.37 225.372 254.37 225.372ZM308.879 1.04928C298.842 1.04928 290.707 225.372 290.707 225.372H327.051C327.051 225.372 318.915 1.04928 308.879 1.04928ZM254.37 225.372C254.37 225.372 262.506 349.065 272.542 349.065C282.579 349.065 290.707 225.372 290.707 225.372H254.37ZM399.731 223.975H436.067C436.067 223.975 427.932 311.291 417.896 311.291C407.859 311.291 399.731 223.975 399.731 223.975ZM345.222 448.298C355.259 448.298 363.394 223.975 363.394 223.975H327.051C327.051 223.975 335.186 448.298 345.222 448.298ZM399.731 223.975C399.731 223.975 391.595 100.282 381.559 100.282C371.523 100.282 363.394 223.975 363.394 223.975H399.731ZM472.404 225.024H436.067C436.067 225.024 444.203 137.709 454.239 137.709C464.269 137.709 472.404 225.024 472.404 225.024ZM526.913 0.701787C516.876 0.701787 508.741 225.024 508.741 225.024H545.084C545.084 225.024 536.949 0.701787 526.913 0.701787ZM472.404 225.024C472.404 225.024 480.54 348.718 490.576 348.718C500.612 348.718 508.741 225.024 508.741 225.024H472.404ZM617.765 223.628H654.101C654.101 223.628 645.966 310.943 635.929 310.943C625.9 310.943 617.765 223.628 617.765 223.628ZM563.256 447.95C573.292 447.95 581.428 223.628 581.428 223.628H545.084C545.084 223.628 553.22 447.95 563.256 447.95ZM617.765 223.628C617.765 223.628 609.629 99.9344 599.593 99.9344C589.556 99.9344 581.428 223.628 581.428 223.628H617.765ZM690.438 224.323H654.101C654.101 224.323 662.237 137.007 672.273 137.007C682.302 137.007 690.438 224.323 690.438 224.323ZM744.946 0C734.91 0 726.775 224.323 726.775 224.323H763.118C763.118 224.323 754.983 0 744.946 0ZM690.438 224.323C690.438 224.323 698.573 348.016 708.61 348.016C718.646 348.016 726.775 224.323 726.775 224.323H690.438ZM835.798 222.926H872.135C872.135 222.926 864 310.242 853.963 310.242C843.934 310.248 835.798 222.926 835.798 222.926ZM781.29 447.249C791.326 447.249 799.462 222.926 799.462 222.926H763.118C763.118 222.926 771.253 447.249 781.29 447.249ZM835.798 222.926C835.798 222.926 827.663 99.2326 817.627 99.2326C807.59 99.2326 799.462 222.926 799.462 222.926H835.798Z"
                fill="#00513F" />
            </svg>
          </div>
          <div class="cta-main flex flex-vcenter  ">
            <?php if(!empty($advertise_heading ||  $advertise_description)){ ?>
                <div class="cta-text <?php echo $no_img_advertise; ?>">
                <?php if(!empty($advertise_sub_heading)){ ?>
                <span class="signal optional-text "><?php echo $advertise_sub_heading; ?></span>
                <?php } if(!empty($advertise_heading)){ ?>
                <div class="h2"><?php echo $advertise_heading; ?></div>
                <?php  } 
                    echo $advertise_description;
                ?>
               <?php if (!empty($advertise_button_text && $advertise_button_link)) { ?>
                    <div class="btn-wrap"> <a href="<?php echo $advertise_button_link; ?>" class="button yellow-btn"><?php echo $advertise_button_text; ?></a></div>
                <?php } ?>
                
                <!-- end of btn wrap -->
                </div>
            <?php } if(!empty($advertise_desktop_image)){ ?>
            <div class="cta-img pos-relative <?php echo $no_txt_advertise; ?>">
              <picture class="object-fit">
                <source srcset="<?php echo $advertise_desktop_image['url']; ?>" media="(min-width:768px)">
                <img src="<?php echo $advertise_mobile_image['url']; ?>" alt="<?php echo $advertise_mobile_image['alt']; ?>">
              </picture>

              <div class="cta-line hide-in-mobile">
                <figure class="object-fit">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="">
                </figure>
              </div>
            </div>
            <?php } ?>
              <div class="cta-line hide-in-desktop hide-in-tablet">
                <figure class="object-fit">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="">
                </figure>
              </div>
          </div>
        </div>
    </section>
<?php } }

function shortcode_post_image() {
    // Get custom fields
    $post_desktop_image = get_field('post_desktop_image');
    $post_mobile_image  = get_field('post_mobile_image');
    if(!empty($post_desktop_image)){
    // Generate HTML
    ob_start();
    ?>
    <div class="default-thumb fluid-width">
        <div class="fluid-width-wrapper">
            <picture class="object-fit" role="none">
                <source srcset="<?php echo $post_desktop_image['url']; ?>">
                <img decoding="async" src="<?php echo $post_mobile_image['url']; ?>" alt="<?php echo $post_mobile_image['alt']; ?>">
            </picture>
        </div>
    </div>
    <?php
    return ob_get_clean();
} }
add_shortcode('image', 'shortcode_post_image');


function shortcode_micro_cta() {
   
    $micro_cta_image                = get_field('micro_cta_image');
    $micro_cta_image_mobile         = get_field('micro_cta_image_mobile');
    $micro_cta_sub_heading          = get_field('micro_cta_sub_heading');
    $micro_cta_heading              = get_field('micro_cta_heading');
    $micro_cta_download_button_text = get_field('micro_cta_download_button_text');
    $micro_cta_upload_file          = get_field('micro_cta_upload_file');
    $post_micro_cta_button_text     = get_field('post_micro_cta_button_text');
    $post_micro_cta_button_link     = get_field('post_micro_cta_button_link');

    if (empty($micro_cta_image && $micro_cta_heading)) {
        return ''; 
    }

    ob_start();
    ?>
    <section class="micro-cta-module pos-relative">
        <div class="container">
            <div class="micro-cta-main flex">
                <?php if (!empty($micro_cta_image)) : ?>
                <div class="micro-cta-thumb">
                    <picture class="object-fit">
                        <source srcset="<?php echo $micro_cta_image['url']; ?>" media="(min-width768px)">
                        <img src="<?php echo $micro_cta_image_mobile['url']; ?>" 
                             alt="<?php echo $micro_cta_image_mobile['alt']; ?>" 
                             title="<?php echo $micro_cta_image_mobile['title']; ?>">
                    </picture>
                </div>
                <?php endif; ?>
                <?php if (!empty($micro_cta_sub_heading || $micro_cta_heading || $micro_cta_download_button_text || $post_micro_cta_button_text)) : ?>
                    <div class="micro-cta-text">
                        <?php if (!empty($micro_cta_sub_heading)) : ?>
                            <span class="signal optional-text"><?php echo $micro_cta_sub_heading; ?></span>
                        <?php endif; ?>

                        <?php if (!empty($micro_cta_heading)) : ?>
                            <div class="h3"><?php echo $micro_cta_heading; ?></div>
                        <?php endif; ?>

                        <div class="btn-wrap">
                            <?php if (!empty($micro_cta_download_button_text) && !empty($micro_cta_upload_file)) : ?>
                                <a href="<?php echo $micro_cta_upload_file['url']; ?>" 
                                class="button" download>
                                <?php echo $micro_cta_download_button_text; ?>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($post_micro_cta_button_text) && !empty($post_micro_cta_button_link)) : ?>
                                <a href="<?php echo $post_micro_cta_button_link; ?>" 
                                class="readmore">
                                <?php echo $post_micro_cta_button_text; ?>
                                </a>
                            <?php endif; ?>
                        </div><!-- end btn wrap -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('download_module', 'shortcode_micro_cta');


function shortcode_twoimage() {
    
    $post_image_one         = get_field('post_image_one');
    $post_image_one_mobile  = get_field('post_image_one_mobile');
    $post_image_two         = get_field('post_image_two');
    $post_image_two_mobile  = get_field('post_image_two_mobile');

    if (empty($post_image_one) && empty($post_image_two)) {
        return ''; 
    }

    ob_start();
    ?>
    <div class="default-thumb-two fluid-width">
        <div class="fluid-width-wrapper">
            <?php if (!empty($post_image_one)) : ?>
                <div class="default-thumb-flex">
                    <picture class="object-fit" role="none">
                        <source srcset="<?php echo $post_image_one['url']; ?>" alt="<?php echo $post_image_one['alt']; ?>">
                        <img decoding="async" src="<?php echo $post_image_one_mobile['url']; ?>" alt="<?php echo $post_image_one_mobile['alt']; ?>">
                    </picture>
                </div>
            <?php endif; ?>

            <?php if (!empty($post_image_two)) : ?>
                <div class="default-thumb-flex">
                    <picture class="object-fit" role="none">
                        <source srcset="<?php echo $post_image_two['url']; ?>" alt="<?php echo $post_image_two['alt']; ?>">
                        <img decoding="async" src="<?php echo $post_image_two_mobile['url']; ?>" alt="<?php echo $post_image_two_mobile['alt']; ?>">
                    </picture>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('twoimage', 'shortcode_twoimage');


function shortcode_cta($atts) {
  
    $post_cta_note = get_field('post_cta_note');

    if (empty($post_cta_note)) {
        return ''; 
    }

    ob_start();
    ?>
    <section class="block-module">
        <div class="container">
            <div class="block-inner flex">
                <div class="block-lt">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M-1.54308e-05 20.5743L15.7304 4.84426H0V0H24V24H19.1557V8.26969L3.42568 24L-1.54308e-05 20.5743Z"
                            fill="#E7FF25" />
                    </svg>
                </div>
                <!-- end of block lt -->
                <div class="block-rt">
                    <svg width="552" height="122" viewBox="0 0 552 122" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.2062 63.312H0.222656C0.222656 63.312 5.36843 8.08326 11.7166 8.08326C18.0648 8.08326 23.2062 63.312 23.2062 63.312ZM57.6838 -78.576C51.3356 -78.576 46.1898 63.312 46.1898 63.312H69.1777C69.1777 63.312 64.0319 -78.576 57.6838 -78.576ZM23.2062 63.312C23.2062 63.312 28.352 141.55 34.7002 141.55C41.0484 141.55 46.1898 63.312 46.1898 63.312H23.2062ZM115.149 62.4285H138.133C138.133 62.4285 132.987 117.657 126.639 117.657C120.291 117.657 115.149 62.4285 115.149 62.4285ZM80.6717 204.316C87.0198 204.316 92.1656 62.4285 92.1656 62.4285H69.1777C69.1777 62.4285 74.3235 204.316 80.6717 204.316ZM115.149 62.4285C115.149 62.4285 110.003 -15.8097 103.655 -15.8097C97.3071 -15.8097 92.1656 62.4285 92.1656 62.4285H115.149ZM161.116 62.868H138.133C138.133 62.868 143.279 7.63936 149.627 7.63936C155.975 7.63936 161.116 62.868 161.116 62.868ZM195.594 -79.0199C189.246 -79.0199 184.1 62.868 184.1 62.868H207.088C207.088 62.868 201.942 -79.0199 195.594 -79.0199ZM161.116 62.868C161.116 62.868 166.262 141.106 172.61 141.106C178.958 141.106 184.1 62.868 184.1 62.868H161.116ZM253.059 61.9846H276.043C276.043 61.9846 270.897 117.213 264.549 117.213C258.201 117.213 253.059 61.9846 253.059 61.9846ZM218.582 203.873C224.93 203.873 230.076 61.9846 230.076 61.9846H207.088C207.088 61.9846 212.234 203.873 218.582 203.873ZM253.059 61.9846C253.059 61.9846 247.914 -16.2536 241.565 -16.2536C235.217 -16.2536 230.076 61.9846 230.076 61.9846H253.059ZM299.026 62.6483H276.043C276.043 62.6483 281.189 7.41957 287.537 7.41957C293.881 7.41957 299.026 62.6483 299.026 62.6483ZM333.504 -79.2397C327.156 -79.2397 322.01 62.6483 322.01 62.6483H344.998C344.998 62.6483 339.852 -79.2397 333.504 -79.2397ZM299.026 62.6483C299.026 62.6483 304.172 140.886 310.52 140.886C316.869 140.886 322.01 62.6483 322.01 62.6483H299.026ZM390.969 61.7648H413.953C413.953 61.7648 408.807 116.993 402.459 116.993C396.115 116.993 390.969 61.7648 390.969 61.7648ZM356.492 203.653C362.84 203.653 367.986 61.7648 367.986 61.7648H344.998C344.998 61.7648 350.144 203.653 356.492 203.653ZM390.969 61.7648C390.969 61.7648 385.824 -16.4734 379.475 -16.4734C373.127 -16.4734 367.986 61.7648 367.986 61.7648H390.969ZM436.937 62.2043H413.953C413.953 62.2043 419.099 6.97567 425.447 6.97567C431.791 6.97567 436.937 62.2043 436.937 62.2043ZM471.414 -79.6836C465.066 -79.6836 459.92 62.2043 459.92 62.2043H482.908C482.908 62.2043 477.762 -79.6836 471.414 -79.6836ZM436.937 62.2043C436.937 62.2043 442.082 140.442 448.431 140.442C454.779 140.442 459.92 62.2043 459.92 62.2043H436.937ZM528.88 61.3209H551.863C551.863 61.3209 546.717 116.55 540.369 116.55C534.025 116.554 528.88 61.3209 528.88 61.3209ZM494.402 203.209C500.75 203.209 505.896 61.3209 505.896 61.3209H482.908C482.908 61.3209 488.054 203.209 494.402 203.209ZM528.88 61.3209C528.88 61.3209 523.734 -16.9173 517.386 -16.9173C511.037 -16.9173 505.896 61.3209 505.896 61.3209H528.88Z"
                            fill="#003D30" />
                    </svg>
                    <h4><?php echo esc_html($post_cta_note); ?></h4>
                </div>
                <!-- end of block rt -->
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('cta', 'shortcode_cta');


function shortcode_single_cta() {
   
    $post_call_action_heading = get_field('post_call_action_heading');
    $post_call_action_link    = get_field('post_call_action_link');

    if (empty($post_call_action_heading)) {
        return ''; 
    }

    ob_start();
    ?>
    <section class="single-cta">
        <div class="container">
            <div class="single-cta-inner pos-relative">
                <div class="h5">
                    <?php if (!empty($post_call_action_link)) : ?>
                        <a href="<?php echo $post_call_action_link; ?>" class="readmore">
                            <?php echo $post_call_action_heading; ?>
                        </a>
                    <?php else : ?>
                        <?php echo $post_call_action_heading; ?>
                    <?php endif; ?>
                </div>
                <div class="single-line-thumb">
                    <figure class="object-fit">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/short-intersect.svg'); ?>" alt="line">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('calltoaction', 'shortcode_single_cta');


function shortcode_faq_accordion($atts) {
   
    if (!have_rows('faq')) {
        return ''; 
    }

    ob_start();
    ?>
    <section class="accordion-module">
        <div class="container">
            <div class="accordion-main">
                <?php 
                while (have_rows('faq')) : the_row();
                    $question = get_sub_field('post_faq_question');
                    $answer   = get_sub_field('post_faq_answer');

                    if (!empty($question && $answer)) {
                    ?>
                    <div class="accordion">
                        <div class="accordion-item">
                            <a href="#" class="accordion-heading">
                                <span class="title"><?php echo $question; ?></span>
                            </a>
                            <div class="content">
                                <?php echo $answer; ?>
                            </div>
                        </div>
                    </div>
                <?php } endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('faq', 'shortcode_faq_accordion');


function shortcode_single_testimonial() {
    $testimonial          = get_field('testimonial');
    $testimonial_image    = get_field('testimonial_image');
    $testimonial_image_mobile = get_field('testimonial_image_mobile');
    $testimonial_name     = get_field('testimonial_name');
    $testimonial_position = get_field('testimonial_position');

    if (empty($testimonial)) {
        return ''; 
    }
    ob_start(); ?>
    
    <section class="single-testimonial fluid-width">
        <div class="fluid-width-wrapper">
            <div class="container">
                <div class="single-testimonial-wrap flex">
                    <?php if(!empty($testimonial)): ?>
                        <div class="single-testimonial-lt">
                            <?php echo $testimonial; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($testimonial_image || $testimonial_name || $testimonial_position)) : ?>
                        <div class="single-testimonial-rt">
                            <?php if (!empty($testimonial_image)) : ?>
                            <div class="single-testimonial-thumb">
                                <picture class="object-fit">
                                    <source srcset="<?php echo $testimonial_image['url']; ?>" media="(min-width: 768px)">
                                    <img src="<?php echo $testimonial_image_mobile['url']; ?>" alt="<?php echo $testimonial_image_mobile['alt']; ?>" title="<?php echo $testimonial_image_mobile['title']; ?>">
                                </picture>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($testimonial_name || $testimonial_position)) : ?>
                                <div class="clients-info">
                                    <?php if (!empty($testimonial_name)) : ?>
                                        <span class="author-name"><?php echo $testimonial_name; ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($testimonial_position)) : ?>
                                        <span class="author-pos"><?php echo $testimonial_position; ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="block-quote">
                                <svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.6818 0.200195L18.4545 7.00393C14.3535 9.09739 12.1616 11.7142 11.8788 14.8544C14.3535 15.2033 16.298 16.2151 17.7121 17.8899C19.197 19.4949 19.9394 21.5186 19.9394 23.9609C19.9394 26.8918 18.9848 29.2644 17.0758 31.0787C15.1667 32.893 12.7626 33.8002 9.86364 33.8002C6.96465 33.8002 4.59596 32.8232 2.75758 30.8694C0.919192 28.9155 0 26.0544 0 22.2862C0 18.3086 1.06061 14.331 3.18182 10.3535C5.37374 6.30611 8.87374 2.92169 13.6818 0.200195ZM35.7424 0.200195L40.5152 7.00393C36.4141 9.16717 34.2222 11.784 33.9394 14.8544C36.4141 15.2033 38.3586 16.2151 39.7727 17.8899C41.2576 19.4949 42 21.5186 42 23.9609C42 26.8918 41.0455 29.2644 39.1364 31.0787C37.2273 32.893 34.8232 33.8002 31.9242 33.8002C29.096 33.8002 26.7626 32.8232 24.9242 30.8694C23.0859 28.9155 22.1667 26.0544 22.1667 22.2862C22.1667 18.3086 23.2273 14.331 25.3485 10.3535C27.4697 6.30611 30.9343 2.92169 35.7424 0.200195Z" fill="#E7FF25"/>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
add_shortcode('testimonial', 'shortcode_single_testimonial');

function banner(){
$banner_type            = get_field('banner_type');
$banner_desktop_image   = get_field('banner_desktop_image');
$banner_m_image         = get_field('banner_mobile_image');
$banner_mobile_image    = $banner_m_image ? $banner_m_image : $banner_desktop_image;
$banner_poster_image    = get_field('banner_poster_image');
$banner_video_type      = get_field('banner_video_type');
$banner_vimeo_id        = get_field('banner_vimeo_id');
$banner_youtube_id      = get_field('banner_youtube_id');
$banner_upload_video    = get_field('banner_upload_video');
$banner_sub_heading     = get_field('banner_sub_heading');
$banner_h         = get_field('banner_heading');
if(empty($banner_h)){
    $banner_heading = get_the_title();
}else{
    $banner_heading = $banner_h;
}
$banner_description     = get_field('banner_description');
$banner_button_text     = get_field('banner_button_text');
$banner_button_link     = get_field('banner_button_link');
    ?>
    <section class="default-banner-section pos-relative">
 
    <?php if ($banner_type === 'image') : ?>
            <?php if (!empty($banner_desktop_image)) : ?>
                <div class="banner-bg">
                    <picture class="object-fit">
                        <source srcset="<?php echo $banner_desktop_image['url']; ?>" media="(min-width: 768px)">
                        <img src="<?php echo $banner_mobile_image['url']; ?>" alt="<?php echo $banner_mobile_image['alt']; ?>">
                    </picture>
                    <!-- <div class="home-banner-overlay background-bg black-bg"></div> -->
                </div>
            <?php endif; ?>
        <?php elseif ($banner_type === 'video') : ?>
            <?php if (($banner_video_type === 'youtube' && $banner_youtube_id)) : ?>
                <div class="default-banner-video background-bg">
                    <div class="default-banner-video">
                        <div class="banner-bg background-bg home-banner-iframe youtube-background video-background" data-ytbg-fade-in="true" data-vbg="https://www.youtube.com/watch?v=<?php echo $banner_youtube_id; ?>"></div>
                        
                        <?php if (!empty($banner_poster_image)) : ?>
                            <div class="banner-bg">
                                <picture class="object-fit">
                                    <img loading="eager" src="<?php echo $banner_poster_image['url']; ?>" alt="<?php echo $banner_poster_image['alt']; ?>">
                                </picture>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (($banner_video_type === 'vimeo' && $banner_vimeo_id)) : ?>
                <div class="default-banner-video background-bg">
                    <div class="default-banner-video">
                        <div class="banner-bg background-bg home-banner-iframe youtube-background video-background" data-ytbg-fade-in="true" data-vbg="https://vimeo.com/<?php echo $banner_vimeo_id; ?>"></div>
                        <div class="home-banner-overlay background-bg black-bg"></div>
                        <?php if (!empty($banner_poster_image)) : ?>
                            <div class="banner-bg">
                                <picture class="object-fit">
                                    <img loading="eager" src="<?php echo $banner_poster_image['url']; ?>" alt="<?php echo $banner_poster_image['alt']; ?>">
                                </picture>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (($banner_video_type === 'upload-video' && $banner_upload_video)) : ?>
                <div class="default-banner-video background-bg">
                    <div class="default-banner-video">
                        <div class="banner-bg background-bg z-1">
                            <video autoplay muted loop>
                                <source src="<?php echo $banner_upload_video['url']; ?>" type="video/mp4">
                            </video>
                        </div>
                        
                        <?php if (!empty($banner_poster_image)) : ?>
                            <div class="banner-bg">
                                <picture class="object-fit">
                                    <img loading="eager" src="<?php echo $banner_poster_image['url']; ?>" alt="<?php echo $general_poster_image['alt']; ?>">
                                </picture>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <div class="container">
        <div class="default-banner-main flex center">
            <div class="default-banner-text">
                <?php if(!empty($banner_sub_heading)){ ?>
                <span class="optional-text"><?php echo $banner_sub_heading; ?></span>
                <?php } ?>
                <h1><?php echo $banner_heading; ?></h1>
                <?php echo $banner_description; ?>
                <?php if(!empty($banner_button_text && $banner_button_link)){ ?>
                    <a href="<?php echo $banner_button_link; ?>" class="button"><?php echo $banner_button_text; ?></a>
                <?php } ?>
            </div>
            <div class="banner-wave">
                <svg width="873" height="449" viewBox="0 0 873 449" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M36.3367 226.074H0C0 226.074 8.13538 138.758 18.1717 138.758C28.2081 138.758 36.3367 226.074 36.3367 226.074ZM90.8451 1.75108C80.8088 1.75108 72.6734 226.074 72.6734 226.074H109.017C109.017 226.074 100.881 1.75108 90.8451 1.75108ZM36.3367 226.074C36.3367 226.074 44.4721 349.767 54.5084 349.767C64.5448 349.767 72.6734 226.074 72.6734 226.074H36.3367ZM181.697 224.677H218.034C218.034 224.677 209.898 311.993 199.862 311.993C189.826 311.993 181.697 224.677 181.697 224.677ZM127.189 449C137.225 449 145.36 224.677 145.36 224.677H109.017C109.017 224.677 117.152 449 127.189 449ZM181.697 224.677C181.697 224.677 173.562 100.984 163.525 100.984C153.489 100.984 145.36 224.677 145.36 224.677H181.697ZM254.37 225.372H218.034C218.034 225.372 226.169 138.056 236.205 138.056C246.242 138.056 254.37 225.372 254.37 225.372ZM308.879 1.04928C298.842 1.04928 290.707 225.372 290.707 225.372H327.051C327.051 225.372 318.915 1.04928 308.879 1.04928ZM254.37 225.372C254.37 225.372 262.506 349.065 272.542 349.065C282.579 349.065 290.707 225.372 290.707 225.372H254.37ZM399.731 223.975H436.067C436.067 223.975 427.932 311.291 417.896 311.291C407.859 311.291 399.731 223.975 399.731 223.975ZM345.222 448.298C355.259 448.298 363.394 223.975 363.394 223.975H327.051C327.051 223.975 335.186 448.298 345.222 448.298ZM399.731 223.975C399.731 223.975 391.595 100.282 381.559 100.282C371.523 100.282 363.394 223.975 363.394 223.975H399.731ZM472.404 225.024H436.067C436.067 225.024 444.203 137.709 454.239 137.709C464.269 137.709 472.404 225.024 472.404 225.024ZM526.913 0.701787C516.876 0.701787 508.741 225.024 508.741 225.024H545.084C545.084 225.024 536.949 0.701787 526.913 0.701787ZM472.404 225.024C472.404 225.024 480.54 348.718 490.576 348.718C500.612 348.718 508.741 225.024 508.741 225.024H472.404ZM617.765 223.628H654.101C654.101 223.628 645.966 310.943 635.929 310.943C625.9 310.943 617.765 223.628 617.765 223.628ZM563.256 447.95C573.292 447.95 581.428 223.628 581.428 223.628H545.084C545.084 223.628 553.22 447.95 563.256 447.95ZM617.765 223.628C617.765 223.628 609.629 99.9344 599.593 99.9344C589.556 99.9344 581.428 223.628 581.428 223.628H617.765ZM690.438 224.323H654.101C654.101 224.323 662.237 137.007 672.273 137.007C682.303 137.007 690.438 224.323 690.438 224.323ZM744.946 0C734.91 0 726.775 224.323 726.775 224.323H763.118C763.118 224.323 754.983 0 744.946 0ZM690.438 224.323C690.438 224.323 698.573 348.016 708.61 348.016C718.646 348.016 726.775 224.323 726.775 224.323H690.438ZM835.798 222.926H872.135C872.135 222.926 864 310.242 853.963 310.242C843.934 310.248 835.798 222.926 835.798 222.926ZM781.29 447.249C791.326 447.249 799.462 222.926 799.462 222.926H763.118C763.118 222.926 771.253 447.249 781.29 447.249ZM835.798 222.926C835.798 222.926 827.663 99.2326 817.627 99.2326C807.59 99.2326 799.462 222.926 799.462 222.926H835.798Z"
                        fill="#00644F" />
                </svg>
            </div>
        </div>
    </div>
</section>
<?php }

function social_proof(){
$social_proof_heading   = get_field('social_proof_heading');
$social_proof_description   = get_field('social_proof_description');
if(!empty($social_proof_heading || $social_proof_description) || have_rows('social_proof_statistics')){
    ?>
<section class="counter-section">
     <div class="container">
         <div class="counter-main-wrap pos-relative">
            <?php if(!empty($social_proof_description || $social_proof_heading)){ ?>
                <div class="counter-intro flex flex-vcenter">
                    <div class="counter-lt">
                        <div class="intersect-line hide-in-desktop hide-in-tablet">
                            <figure class="object-fit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="line">
                            </figure>
                        </div>
                        <?php if(!empty($social_proof_heading)){ ?>
                            <hr class="small">
                            <h2><?php echo $social_proof_heading; ?></h2>
                        <?php } ?>
                    </div>
                    <?php if(!empty($social_proof_description)){ ?>
                    <div class="counter-rt pos-relative">
                        <?php echo $social_proof_description; ?>
                        <div class="intersect-line hide-in-mobile">
                            <figure class="object-fit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-intersect.svg" alt="line">
                            </figure>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (have_rows('social_proof_statistics')) : ?>
                <div class="counter-stats flex" data-counter-main="counter-main">
                    <?php while (have_rows('social_proof_statistics')) : the_row(); 
                        $number      = get_sub_field('social_proof_statistics_number');
                        $symbol      = get_sub_field('social_proof_statistics_symbol');
                        $description = get_sub_field('social_proof_statistics_description');
                        if(!empty($number || $description)){
                    ?>

                    <div class="counter-list">
                        <?php if(!empty($number)){ ?>
                        <div class="counter-top flex  pos-relative">
                            <span class="counter" data-duration="3000" data-count-to="<?php echo $number; ?>"><?php echo $number; ?></span>
                            <?php if(!empty($symbol)){ ?>
                                <span class="counter-symmblo"><?php echo $symbol; ?></span>
                            <?php } ?>
                        </div>
                        <?php } 
                        echo $description;
                        ?>
                    </div>
                    <?php } endwhile; ?>
                </div>
            <?php endif; ?>

         </div>
         <?php if ( !is_page_template( 'templates/advertising.php' ) ) : ?>
            <div class="counter-wave">
                <svg width="861" height="443" viewBox="0 0 861 443" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path
                     d="M35.6773 223.046H-0.173828C-0.173828 223.046 7.85285 136.897 17.7551 136.897C27.6574 136.897 35.6773 223.046 35.6773 223.046ZM89.4574 1.72085C79.5552 1.72085 71.5285 223.046 71.5285 223.046H107.386C107.386 223.046 99.3597 1.72085 89.4574 1.72085ZM35.6773 223.046C35.6773 223.046 43.704 345.087 53.6063 345.087C63.5085 345.087 71.5285 223.046 71.5285 223.046H35.6773ZM179.095 221.668H214.947C214.947 221.668 206.92 307.817 197.018 307.817C187.115 307.817 179.095 221.668 179.095 221.668ZM125.315 442.993C135.218 442.993 143.244 221.668 143.244 221.668H107.386C107.386 221.668 115.413 442.993 125.315 442.993ZM179.095 221.668C179.095 221.668 171.069 99.6275 161.166 99.6275C151.264 99.6275 143.244 221.668 143.244 221.668H179.095ZM250.798 222.354H214.947C214.947 222.354 222.973 136.205 232.875 136.205C242.778 136.205 250.798 222.354 250.798 222.354ZM304.578 1.02843C294.676 1.02843 286.649 222.354 286.649 222.354H322.507C322.507 222.354 314.48 1.02843 304.578 1.02843ZM250.798 222.354C250.798 222.354 258.824 344.394 268.727 344.394C278.629 344.394 286.649 222.354 286.649 222.354H250.798ZM394.216 220.976H430.067C430.067 220.976 422.04 307.125 412.138 307.125C402.236 307.125 394.216 220.976 394.216 220.976ZM340.436 442.301C350.338 442.301 358.365 220.976 358.365 220.976H322.507C322.507 220.976 330.533 442.301 340.436 442.301ZM394.216 220.976C394.216 220.976 386.189 98.9351 376.287 98.9351C366.385 98.9351 358.365 220.976 358.365 220.976H394.216ZM465.918 222.011H430.067C430.067 222.011 438.094 135.862 447.996 135.862C457.891 135.862 465.918 222.011 465.918 222.011ZM519.698 0.685574C509.796 0.685574 501.769 222.011 501.769 222.011H537.627C537.627 222.011 529.6 0.685574 519.698 0.685574ZM465.918 222.011C465.918 222.011 473.945 344.051 483.847 344.051C493.749 344.051 501.769 222.011 501.769 222.011H465.918ZM609.336 220.633H645.187C645.187 220.633 637.161 306.782 627.258 306.782C617.363 306.782 609.336 220.633 609.336 220.633ZM555.556 441.958C565.458 441.958 573.485 220.633 573.485 220.633H537.627C537.627 220.633 545.654 441.958 555.556 441.958ZM609.336 220.633C609.336 220.633 601.309 98.5922 591.407 98.5922C581.505 98.5922 573.485 220.633 573.485 220.633H609.336ZM681.038 221.318H645.187C645.187 221.318 653.214 135.169 663.116 135.169C673.012 135.169 681.038 221.318 681.038 221.318ZM734.818 -0.00683594C724.916 -0.00683594 716.89 221.318 716.89 221.318H752.747C752.747 221.318 744.721 -0.00683594 734.818 -0.00683594ZM681.038 221.318C681.038 221.318 689.065 343.359 698.967 343.359C708.87 343.359 716.89 221.318 716.89 221.318H681.038ZM824.456 219.94H860.308C860.308 219.94 852.281 306.089 842.379 306.089C832.483 306.096 824.456 219.94 824.456 219.94ZM770.676 441.266C780.579 441.266 788.605 219.94 788.605 219.94H752.747C752.747 219.94 760.774 441.266 770.676 441.266ZM824.456 219.94C824.456 219.94 816.43 97.8998 806.527 97.8998C796.625 97.8998 788.605 219.94 788.605 219.94H824.456Z"
                     fill="#00644F" />
             </svg>
            </div>
        <?php endif; ?>

       
     </div>
</section>
<?php } }


