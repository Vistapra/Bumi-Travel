<?php
$thumbnail = isset($settings['image_size']) && $settings['image_size'] ? $settings['image_size'] : 'post-thumbnail';
$post_id    = $post['ID'];
$ba_post    = BABE_Post_types::get_post($post_id);
$url        = BABE_Functions::get_page_url_with_args($post_id, $_GET);
$image      = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $thumbnail);
if ( !isset($ba_post['discount_price_from']) || !isset($ba_post['price_from']) || !isset($ba_post['discount_date_to']) || !isset($ba_post['discount']) ) {
   $prices = BABE_Post_types::get_post_price_from($post_id);
} else {
   $prices = $ba_post;
}

$duration_arr = array();
$duration = '';
if (!empty($ba_post) && isset($ba_post['duration']) && !empty($ba_post['duration'])){            
   if ( !empty($ba_post['duration']['d']) ) {
      $duration_arr[] = $ba_post['duration']['d'] . ' ' . ($ba_post['duration']['d'] == '1' ? __('day', 'gowilds') : __('days', 'gowilds'));
   }
   if ( !empty($ba_post['duration']['h']) ) {
      $duration_arr[] = $ba_post['duration']['h'] . ' ' . ($ba_post['duration']['h'] == '1' ? __('hour', 'gowilds') : __('hours', 'gowilds'));
   }
   if ( !empty($ba_post['duration']['i']) ) {
      $duration_arr[] = $ba_post['duration']['i'] . ' ' . ($ba_post['duration']['i'] == '1' ? __('minute', 'gowilds') : __('minutes', 'gowilds'));

   }
   $duration .= implode(' ', $duration_arr);
}

?>

<div class="booking-list__single ba-block-item">
   <div class="booking-list__wrap">

      <div class="booking-list__image">
         <?php if(has_post_thumbnail($post_id)){ ?>
            <a class="booking-list__thumbnail" href="<?php echo esc_url($url) ?>">
               <img src="<?php echo esc_url($image[0]) ?>" alt="<?php echo esc_attr( $post['post_title'] ) ?>">
            </a>
         <?php } ?>  

         <?php 
            $discount = isset($post['discount']) && $post['discount'] ? $post['discount'] : false;
            $featured = isset($ba_post['gowilds_booking_featured'] ) ? $ba_post['gowilds_booking_featured'] : false;
            if($discount || $featured){
               echo '<div class="booking-list__labels item-labels">';
                  if($discount){
                     echo '<span class="booking-list__label booking-list__discount">' . esc_html($discount) . '% ' . esc_html__( 'off', 'gowilds' ) . '</span>';
                  }
                  if($featured){
                     echo '<span class="booking-list__label booking-list__featured">' . esc_html__( 'Featured', 'gowilds' ) . '</span>';
                  }
               echo '</div>';   
            }
         ?>

         <?php if(class_exists('Gowilds_Addons_Wishlist_Ajax')){ 
            echo Gowilds_Addons_Wishlist_Ajax::html_icon($post_id);
         } ?>

      </div>

        <div class="booking-list__content">
            <div class="booking-list__content-inner">
               
               <div class="booking-list__content-top">
                  <?php echo BABE_Rating::post_stars_rendering($post_id); ?>

                  <?php 
                  $images = isset($ba_post['images']) && $ba_post['images'] ? $ba_post['images'] : false;
                  $video  = isset($ba_post['gowilds_booking_video']) ? $ba_post['gowilds_booking_video'] : false;
                  if($video || $images): ?>
                     <div class="booking-list__media booking__media">

                        <?php if($images){
                           $i = 1;
                           foreach($images as $image){ 
                              $classes = ($i>1) ? 'hidden' : 'ba-gallery';
                              if( isset(wp_get_attachment_image_src($image['image_id'], 'full')[0]) ){ ?>
                                 <a class="<?php echo esc_attr($classes) ?>" href="<?php echo esc_url(wp_get_attachment_image_src($image['image_id'], 'full')[0]) ?>" data-elementor-lightbox-slideshow="<?php echo wp_rand(5) ?>">
                                    <?php 
                                       if($i == 1){
                                          echo '<i class="las la-camera"></i>';
                                          echo '<span>' . count($images) . '</span>';
                                       }
                                    ?>
                                 </a>
                              <?php }  
                              $i = $i + 1;
                           }
                        } ?>

                        <?php if($video){ ?>
                           <a class="booking-list__video popup-video" href="<?php echo esc_url($video) ?>"><i class="las la-video"></i></a>
                        <?php } ?>

                     </div>
                  <?php endif; ?>
               </div>

               <h3 class="booking-list__title">
                  <a href="<?php echo esc_url( $url ); ?>"><?php echo apply_filters( 'translate_text', $post['post_title'] ); ?></a>
               </h3>
               
               <?php 
                  $address = isset($ba_post['address']) ? $ba_post['address'] : false;
                  if($address){ ?>
                  <div class="booking-list__address">
                     <i class="fas fa-map-marker-alt"></i><span><?php echo esc_html( $address['address'] ); ?></span>
                  </div>
               <?php } ?>

               <div class="booking-list__price">
                  <label><?php echo esc_html__('From', 'gowilds'); ?></label>
                  <span class="item_info_price_new"><?php echo BABE_Currency::get_currency_price($prices['discount_price_from']); ?></span>
                  <?php if($prices['discount_price_from'] < $prices['price_from']){ ?>
                     <span class="item_info_price_old"><?php echo BABE_Currency::get_currency_price($prices['price_from'])  ?></span>
                  <?php } ?>
               </div>
            </div>   

            <div class="booking-list__meta">
               <div class="booking-list__meta-left">
                  <?php
                     $av_times   = BABE_Post_types::get_post_av_times($ba_post);
                     $guests     = isset($ba_post['guests']) ? $ba_post['guests'] : false;
                     if (!empty($duration)){
                        echo '<span class="item-days booking-list__item-meta"><i class="las la-clock"></i><span>' . esc_html($duration) . '</span></span>';
                     }
                     if ($guests){
                        echo '<span class="item-user booking-list__item-meta"><i class="las la-user-friends"></i><span>' . $guests . '</span></span>';
                     }
                  ?>
               </div>
               <div class="booking-list__meta-right">
                  <a href="<?php echo the_permalink($post_id) ?>"><?php echo esc_html__('Explore', 'gowilds') ?></a>
               </div>   
            </div>

        </div>
    </div>
</div>