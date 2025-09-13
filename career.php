<?php

/* Template Name: Career Template */
get_header(); 

$career_banner_type            = get_field('career_banner_type');
$career_desktop_image   = get_field('career_desktop_image');
$career_m_image         = get_field('career_mobile_image');
$career_mobile_image    = $career_m_image ? $career_m_image : $career_desktop_image;
$career_banner_video_type      = get_field('career_banner_video_type');
$career_poster_image    = get_field('career_poster_image');
$career_banner_vimeo_id        = get_field('career_banner_vimeo_id');
$career_banner_youtube_id      = get_field('career_banner_youtube_id');
$career_banner_upload_video    = get_field('career_banner_upload_video');
$career_banner_sub_heading     = get_field('career_banner_sub_heading');
$career_banner_h         = get_field('career_banner_heading');
if(empty($career_banner_h)){
    $career_banner_heading = get_the_title();
}else{
    $career_banner_heading = $career_banner_h;
}
$career_banner_description     = get_field('career_banner_description');
$career_banner_button_text     = get_field('career_banner_button_text');
$career_banner_button_link     = get_field('career_banner_button_link');

$open_position_heading         = get_field('open_position_heading');
$open_position_button_text     = get_field('open_position_button_text');


$short_intro_desktop_image      = get_field('short_intro_desktop_image');
$short_intro_mobile_image       = get_field('short_intro_mobile_image');
$short_intro_sub_heading        = get_field('short_intro_sub_heading');
$short_intro_heading            = get_field('short_intro_heading');
$short_intro_description        = get_field('short_intro_description');
$short_intro_button_text        = get_field('short_intro_button_text');
$short_intro_button_link        = get_field('short_intro_button_link');

$video_desktop_image            = get_field('video_desktop_image');
$video_mobile_image             = get_field('video_mobile_image');
$video_type                     = get_field('video_type');
$video_vimeo_id                 = get_field('video_vimeo_id');
$video_youtube_id               = get_field('video_youtube_id');
$video_upload_video             = get_field('video_upload_video');

$place_work_desktop_image       = get_field('place_work_desktop_image');
$place_work_mobile_image        = get_field('place_work_mobile_image');
$place_work_sub_heading         = get_field('place_work_sub_heading');
$place_work_heading             = get_field('place_work_heading');
$place_work_description         = get_field('place_work_description');
$place_work_button_text         = get_field('place_work_button_text');
$place_work_button_link         = get_field('place_work_button_link');

$short_intro_reward_heading     = get_field('short_intro_reward_heading');
$short_intro_reward_description = get_field('short_intro_reward_description');

$career_notification_sub_heading    = get_field('career_notification_sub_heading');
$career_notification_heading        = get_field('career_notification_heading');
$career_notification_form_id        = get_field('career_notification_form_id');
$career_notification_form_text      = get_field('career_notification_form_text');

$open_positions_sub_heading         = get_field('open_positions_sub_heading');
$open_positions_heading             = get_field('open_positions_heading');
$open_positions_description         = get_field('open_positions_description');
$open_positions_button_text         = get_field('open_positions_button_text');
$open_positions_button_link         = get_field('open_positions_button_link');
$open_positions_select_career_posts    = get_field('open_positions_select_career_posts');
?>

<section class="default-banner-section pos-relative">
        <?php if ($career_banner_type === 'image') : ?>
            <?php if (!empty($career_desktop_image)) : ?>
                <div class="banner-bg">
                    <picture class="object-fit">
                        <source srcset="<?php echo $career_desktop_image['url']; ?>" media="(min-width: 768px)">
                        <img src="<?php echo $career_mobile_image['url']; ?>" alt="<?php echo $career_mobile_image['alt']; ?>">
                    </picture>
                </div>
            <?php endif; ?>
            <?php elseif ($career_banner_type === 'video') : ?>

                <?php if ($career_banner_video_type === 'youtube' && !empty($career_banner_youtube_id)) : ?>
                    <div class="default-banner-video background-bg">
                        <div class="default-banner-video">
                            <div class="banner-bg background-bg home-banner-iframe youtube-background video-background" 
                                data-ytbg-fade-in="true" 
                                data-vbg="https://www.youtube.com/watch?v=<?php echo $career_banner_youtube_id; ?>"></div>

                            <?php if (!empty($career_poster_image)) : ?>
                                <div class="banner-bg">
                                    <picture class="object-fit">
                                        <img loading="eager" src="<?php echo $career_poster_image['url']; ?>" alt="<?php echo $career_poster_image['alt']; ?>">
                                    </picture>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php elseif ($career_banner_video_type === 'vimeo' && !empty($career_banner_vimeo_id)) : ?>
                    <div class="default-banner-video background-bg">
                        <div class="default-banner-video">
                            <div class="banner-bg background-bg home-banner-iframe youtube-background video-background" 
                                data-ytbg-fade-in="true" 
                                data-vbg="https://vimeo.com/<?php echo $career_banner_vimeo_id; ?>"></div>

                            <?php if (!empty($career_poster_image)) : ?>
                                <div class="banner-bg">
                                    <picture class="object-fit">
                                        <img loading="eager" src="<?php echo $career_poster_image['url']; ?>" alt="<?php echo $career_poster_image['alt']; ?>">
                                    </picture>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php elseif ($career_banner_video_type === 'upload-video' && !empty($career_banner_upload_video)) : ?>
                    <div class="default-banner-video background-bg">
                        <div class="default-banner-video">
                            <div class="banner-bg background-bg z-1">
                                <video autoplay muted loop>
                                    <source src="<?php echo $career_banner_upload_video['url']; ?>" type="video/mp4">
                                </video>
                            </div>

                            <?php if (!empty($career_poster_image)) : ?>
                                <div class="banner-bg">
                                    <picture class="object-fit">
                                        <img loading="eager" src="<?php echo $career_poster_image['url']; ?>" alt="<?php echo $career_poster_image['alt']; ?>">
                                    </picture>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

        <?php endif; ?>

    <div class="container">
        <div class="default-banner-main flex">
            <div class="default-banner-text">
                <?php if(!empty($career_banner_sub_heading)){ ?>
                <span class="optional-text"><?php echo $career_banner_sub_heading; ?></span>
                <?php } ?>
                <h1><?php echo $career_banner_heading; ?></h1>
                <?php echo $career_banner_description; ?>
                <?php if(!empty($career_banner_button_text && $career_banner_button_link)){ ?>
                    <a href="<?php echo $career_banner_button_link; ?>" class="button"><?php echo $career_banner_button_text; ?></a>
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

<?php if(!empty($open_position_heading || $open_position_button_text)){ ?>
<section class="request-section">
    <div class="container">
        <div class="request-blck flex flex-vcenter pos-relative">
            <div class="request-lt flex ">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                d="M-1.54308e-05 20.5743L15.7304 4.84426H0V0H24V24H19.1557V8.26969L3.42568 24L-1.54308e-05 20.5743Z"
                fill="#E7FF25" />
            </svg>
            <h4><?php echo $open_position_heading; ?></h4>
            </div>
            <?php if(!empty($open_position_button_text)){ ?>
                <div class="request-rt flex flex-vcenter">
                <a href="#careers-opportunities" class="dark-bg button"><?php echo $open_position_button_text; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($short_intro_desktop_image || $short_intro_heading || $short_intro_description)){ ?>
<section class="repeater-section pos-relative">
      <div class="container">
          <div class="repeater-main">
              <div class="repeater-list flex reverse full-repeater">
                  <?php if(!empty($short_intro_desktop_image)){ ?>
                  <div class="repeater-img">
                      <picture class="object-fit">
                          <source srcset="<?php echo $short_intro_desktop_image['url']; ?>" media="(min-width: 768px)">
                          <img src="<?php echo $short_intro_mobile_image['url']; ?>" alt="<?php echo $short_intro_mobile_image['alt']; ?>">
                      </picture>
                      <div class="repeater-line-thumb bottom-left">
                          <figure class="object-fit">
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/short-intersect.svg" alt="line">
                          </figure>
                      </div>
                  </div>
                  <?php } ?>
                  <?php if(!empty($short_intro_sub_heading || $short_intro_heading ||$short_intro_description )){ ?>
                    <div class="repeater-text">
                        <?php if(!empty($short_intro_sub_heading)){ ?>
                            <span class="optional-text"><?php echo $short_intro_sub_heading; ?></span>
                        <?php } if(!empty($short_intro_heading)){ ?>
                        <div class="h3"><?php echo $short_intro_heading; ?></div>
                        <?php }
                            echo $short_intro_description; 
                        if(!empty($short_intro_button_text && $short_intro_button_link)){ ?>
                        <div class="btn"> 
                            <a href="<?php echo $short_intro_button_link; ?>" class="button"><?php echo $short_intro_button_text; ?></a>
                        </div>
                        <?php } ?>
                    </div>
                  <?php } ?>
              </div>
          </div>
      </div>
</section>
<?php } ?>

<?php if (have_rows('short_intro_culture_point')) : ?>
    <?php 
        $row_count = count(get_field('short_intro_culture_point')); 
    ?>
    <section class="featured-section">
        <div class="container">
            <div class="featured-main">
                <div class="featured-lists flex">
                    <?php while (have_rows('short_intro_culture_point')) : the_row(); 
                        $icon        = get_sub_field('short_intro_culture_point_icon');
                        $heading     = get_sub_field('short_intro_culture_point_heading');
                        $description = get_sub_field('short_intro_culture_point_description');
                        if(!empty($heading || $description)){
                    ?>
                        <div class="featured-list intro-list-<?php echo $row_count; ?>">
                            <div class="feature-icon">
                                <figure class="object-fit">
                                    <?php if ($icon) : ?>
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    <?php endif; ?>
                                </figure>
                            </div>

                            <?php if ($heading) : ?>
                                <h2 class="h4"><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if ($description) : ?>
                               <?php echo $description; ?>
                            <?php endif; ?>
                        </div>
                    <?php } endwhile; wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php 

if(!empty($video_desktop_image)){ 
if($video_type == 'vimeo'){
            if(!empty($video_vimeo_id)){
            $default_video_popup = "https://player.vimeo.com/video/". $video_vimeo_id."";}
          } else if($video_type == 'youtube'){
            if(!empty($video_youtube_id)){
            $default_video_popup = "http://www.youtube.com/watch?v=". $video_youtube_id."";}
          }else if($video_type == 'upload-video'){
            if(!empty($video_upload_video)){
            $default_video_popup =  $video_upload_video['url'];
            }
          }
           else {
            $default_video_popup = "";
          }    
?>
<section class="big-video-section">
      <div class="container">
        <div class="big-video-main relative">
          <figure class="object-fit">
            <img src="<?php echo $video_desktop_image['url']; ?>" alt="<?php echo $video_desktop_image['alt']; ?>">
          </figure>
          <?php if(!empty($default_video_popup)){ ?>
            <div class="play-btn-main flex flex-center play-btn-red">
                <div class="play-btn relative">
                    <a href="<?php echo $default_video_popup; ?>"
                        class="popup-youtube play-btn-bg flex flex-center radius-50">
                        
                    </a>
                    <span>Play video</span>
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
</section>
<?php } ?>


<?php if (have_rows('people_points')) : 
    $row_count = count(get_field('people_points')); // total repeater rows
    ?>
    <section class="featured-section">
        <div class="container">
            <div class="featured-main">
                <div class="featured-lists flex">
                    <?php while (have_rows('people_points')) : the_row(); 
                        $people_point_icon        = get_sub_field('people_point_icon');
                        $people_point_heading     = get_sub_field('people_point_heading');
                        $people_point_description = get_sub_field('people_point_description');
                        if(!empty($people_point_heading || $people_point_description)){
                    ?>
                        <div class="featured-list intro-list-<?php echo $row_count; ?>">
                            <div class="feature-icon">
                                <figure class="object-fit">
                                    <?php if (!empty($people_point_icon)) : ?>
                                        <img src="<?php echo $people_point_icon['url']; ?>" alt="<?php echo $people_point_icon['alt']; ?>">
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <?php if (!empty($people_point_heading)) : ?>
                                <h2 class="h4"><?php echo $people_point_heading; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($people_point_description)) : ?>
                                <?php echo $people_point_description; ?>
                            <?php endif; ?>
                        </div>
                    <?php } endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(!empty($place_work_desktop_image || $place_work_heading || $place_work_description)){ ?>
    <section class="repeater-section pos-relative">
        <div class="container">
            <div class="repeater-main">
                <div class="repeater-list flex full-repeater">
                    <?php if(!empty($place_work_desktop_image)){ ?>
                    <div class="repeater-img">
                        <picture class="object-fit">
                            <source srcset="<?php echo $place_work_desktop_image['url']; ?>" media="(min-width: 768px)">
                            <img src="<?php echo $place_work_mobile_image['url']; ?>" alt="<?php echo $place_work_mobile_image['alt']; ?>">
                        </picture>
                        
                    </div>
                    <?php } ?>
                    <?php if(!empty($place_work_sub_heading || $place_work_heading ||$place_work_description )){ ?>
                        <div class="repeater-text">
                            <?php if(!empty($place_work_sub_heading)){ ?>
                                <span class="optional-text"><?php echo $place_work_sub_heading; ?></span>
                            <?php } if(!empty($place_work_heading)){ ?>
                            <div class="h3"><?php echo $place_work_heading; ?></div>
                            <?php }
                                echo $place_work_description; 
                            if(!empty($place_work_button_text && $place_work_button_link)){ ?>
                            <div class="btn"> 
                                <a href="<?php echo $place_work_button_link; ?>" class="button"><?php echo $place_work_button_text; ?></a>
                            </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if(!empty($short_intro_reward_heading || $short_intro_reward_description ) || have_rows('short_intro_reward_features')){ ?>
    <section class="stats-section">
        <div class="container">
            <div class="stats-main flex">
                <?php if(!empty($short_intro_reward_heading || $short_intro_reward_description)){ ?>
                <div class="stats-intro flex">
                    <?php if(!empty($short_intro_reward_heading)){ ?>
                    <div class="stats-heading">
                        <hr class="small">
                        <h2><?php echo $short_intro_reward_heading; ?></h2>
                    </div>
                    <?php } ?>
                    <div class="stats-desc relative">
                        <?php echo $short_intro_reward_description; ?>
                        <div class="stats-line-shape absolute">
                            <figure class="object-fit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/short-intersect.svg" alt="line">
                            </figure>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if (have_rows('short_intro_reward_features')) : ?>
                    <div class="stats-lists flex">
                        <?php while (have_rows('short_intro_reward_features')) : the_row(); 
                            $short_intro_reward_feature_icon        = get_sub_field('short_intro_reward_faeture_icon');
                            $short_intro_reward_feature_heading     = get_sub_field('short_intro_reward_faeture_heading');
                            $short_intro_reward_feature_description = get_sub_field('short_intro_reward_faeture_description');

                            if (!empty($short_intro_reward_feature_heading) || !empty($short_intro_reward_feature_description)) :
                        ?>
                            <div class="stats-list flex">
                                <div class="stats-icon">
                                    <figure class="object-fit">
                                        <?php if (!empty($short_intro_reward_feature_icon)) : ?>
                                            <img src="<?php echo $short_intro_reward_feature_icon['url']; ?>" alt="<?php echo $short_intro_reward_feature_icon['alt']; ?>">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <?php if (!empty($short_intro_reward_feature_heading)) : ?>
                                    <h2 class="h4"><?php echo $short_intro_reward_feature_heading; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($short_intro_reward_feature_description)) : ?>
                                    <?php echo $short_intro_reward_feature_description; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php } ?>

<?php echo  advertise_with_us();
   echo optional_cta(); 
?>
<?php if(!empty($career_notification_sub_heading || $career_notification_heading || $career_notification_form_id)){ ?>
    <section class="careers-notification-section">
        <div class="container">
            <div class="careers-notification-main flex">
                <?php if(!empty($career_notification_sub_heading || $career_notification_heading)){ ?>
                <div class="careers-notification-lt">
                    <div class="careers-notification-title flex relative">
                        <div class="careers-notification-text">
                            <?php if(!empty($career_notification_sub_heading)){ ?>
                                <span class="optional-text"><?php echo $career_notification_sub_heading; ?></span>
                            <?php } if(!empty($career_notification_heading)){ ?>
                                <h2 class="h3"><?php echo $career_notification_heading; ?></h2>
                            <?php } ?>
                        </div>
                        <?php if(!empty($career_notification_heading)){ ?>
                        <div class="careers-notification-icon">
                            <figure class="object-fit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/right-arrow-yellow.svg" alt="right-arrow-yellow">
                            </figure>
                        </div>
                        <div class="careers-notification-bg absolute">
                            <figure class="object-fit">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Intersect-shape.svg" alt="Intersect-shape">
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } if(!empty($career_notification_form_id)){ ?>
                    <div class="careers-notification-rt">
                        <div class="careers-notification-form">
                            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => $career_notification_form_id ) ); ?>
                            <?php if(!empty($career_notification_form_text)){ ?>
                            <div class="careers-notification-note flex flex-vcenter flex-center">
                                <div class="careers-notification-shield">
                                    <figure class="object-fit">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shield-icon.svg" alt="shield-icon">
                                    </figure>
                                </div>
                                <span><?php echo $career_notification_form_text; ?></span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>


<?php if(!empty($open_positions_heading || $open_positions_description) || !empty($open_positions_select_career_posts)){ ?>
    <section class="careers-opportunities-section" id="careers-opportunities">
        <div class="container">
            <div class="careers-opportunities-main flex">
                <?php if(!empty($open_positions_sub_heading || $open_positions_heading || $open_positions_description)){ ?>
                    <div class="careers-opportunities-text flex relative">
                        <?php if(!empty($open_positions_sub_heading)){ ?>
                            <span class="optional-text"><?php echo $open_positions_sub_heading; ?></span>
                        <?php } if(!empty($open_positions_heading)){ ?>
                            <h2 class="h3"><?php echo $open_positions_heading; ?></h2>
                        <?php }  
                            echo $open_positions_description;
                        ?>
                        <?php if(!empty($open_positions_button_link && $open_positions_button_text)){ ?>
                            <a href="<?php echo $open_positions_button_link; ?>" class="button trans"><?php echo $open_positions_button_text; ?></a>
                        <?php } ?>
                        <div class="careers-bg-wave absolute">
                            <svg width="435" height="251" viewBox="0 0 435 251" fill="none">
                                <path
                                    d="M-30.5299 126.155H-50.762C-50.762 126.155 -46.2322 77.5379 -40.6441 77.5379C-35.0559 77.5379 -30.5299 126.155 -30.5299 126.155ZM-0.180001 1.25331C-5.76818 1.25331 -10.2979 126.155 -10.2979 126.155H9.93791C9.93791 126.155 5.40818 1.25331 -0.180001 1.25331ZM-30.5299 126.155C-30.5299 126.155 -26.0002 195.026 -20.412 195.026C-14.8238 195.026 -10.2979 126.155 -10.2979 126.155H-30.5299ZM50.4058 125.377H70.6378C70.6378 125.377 66.1081 173.994 60.5199 173.994C54.9317 173.994 50.4058 125.377 50.4058 125.377ZM20.0558 250.278C25.644 250.278 30.1737 125.377 30.1737 125.377H9.93791C9.93791 125.377 14.4676 250.278 20.0558 250.278ZM50.4058 125.377C50.4058 125.377 45.876 56.5054 40.2878 56.5054C34.6997 56.5054 30.1737 125.377 30.1737 125.377H50.4058ZM90.8698 125.764H70.6378C70.6378 125.764 75.1675 77.1471 80.7557 77.1471C86.3439 77.1471 90.8698 125.764 90.8698 125.764ZM121.22 0.862554C115.632 0.862554 111.102 125.764 111.102 125.764H131.338C131.338 125.764 126.808 0.862554 121.22 0.862554ZM90.8698 125.764C90.8698 125.764 95.3995 194.636 100.988 194.636C106.576 194.636 111.102 125.764 111.102 125.764H90.8698ZM171.805 124.986H192.038C192.038 124.986 187.508 173.603 181.92 173.603C176.331 173.603 171.805 124.986 171.805 124.986ZM141.456 249.888C147.044 249.888 151.573 124.986 151.573 124.986H131.338C131.338 124.986 135.867 249.888 141.456 249.888ZM171.805 124.986C171.805 124.986 167.276 56.1146 161.688 56.1146C156.099 56.1146 151.573 124.986 151.573 124.986H171.805ZM212.27 125.57H192.038C192.038 125.57 196.567 76.9536 202.155 76.9536C207.74 76.9536 212.27 125.57 212.27 125.57ZM242.619 0.669071C237.031 0.669071 232.502 125.57 232.502 125.57H252.737C252.737 125.57 248.208 0.669071 242.619 0.669071ZM212.27 125.57C212.27 125.57 216.799 194.442 222.387 194.442C227.976 194.442 232.502 125.57 232.502 125.57H212.27ZM293.205 124.793H313.437C313.437 124.793 308.908 173.41 303.319 173.41C297.735 173.41 293.205 124.793 293.205 124.793ZM262.855 249.694C268.443 249.694 272.973 124.793 272.973 124.793H252.737C252.737 124.793 257.267 249.694 262.855 249.694ZM293.205 124.793C293.205 124.793 288.676 55.9211 283.087 55.9211C277.499 55.9211 272.973 124.793 272.973 124.793H293.205ZM333.669 125.18H313.437C313.437 125.18 317.967 76.5629 323.555 76.5629C329.14 76.5629 333.669 125.18 333.669 125.18ZM364.019 0.27832C358.431 0.27832 353.901 125.18 353.901 125.18H374.137C374.137 125.18 369.607 0.27832 364.019 0.27832ZM333.669 125.18C333.669 125.18 338.199 194.051 343.787 194.051C349.375 194.051 353.901 125.18 353.901 125.18H333.669ZM414.605 124.402H434.837C434.837 124.402 430.307 173.019 424.719 173.019C419.135 173.023 414.605 124.402 414.605 124.402ZM384.255 249.303C389.843 249.303 394.373 124.402 394.373 124.402H374.137C374.137 124.402 378.667 249.303 384.255 249.303ZM414.605 124.402C414.605 124.402 410.075 55.5304 404.487 55.5304C398.899 55.5304 394.373 124.402 394.373 124.402H414.605Z"
                                    fill="#00644F" />
                            </svg>
                        </div>
                    </div>
                <?php } ?>
                <?php
                    
                    $career_posts = get_field('open_positions_select_career_posts');
                    if ($career_posts) :
                        $careers = $career_posts;
                    else :
                        $careers = get_posts(array(
                            'post_type'      => 'careers',
                            'posts_per_page' => 4, 
                            'orderby'        => 'date',
                            'order'          => 'ASC',
                        ));
                    endif;
                    ?>

                    <?php if ($careers) : ?>
                    <div class="careers-opportunities-lists flex">
                        <?php foreach ($careers as $post) : setup_postdata($post); ?>
                            <div class="careers-opportunities-list flex">
                                <div class="careers-job-title flex">
                                    <div class="careers-job-name">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="careers-job-time">
                                        Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> ago
                                    </div>
                                </div>
                                <div class="careers-job-btn">
                                    <a href="<?php the_permalink(); ?>" class="button">Apply</a>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>