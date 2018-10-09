<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_filter('upload_mimes', 'cc_mime_types');


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}



  
  




function misha_my_load_more_scripts() {
  
   global $wp_query; 
   $posts_per_page = get_option('posts_per_page');
   $max_pages = ceil(wp_count_posts()->publish / $posts_per_page);
  
   // register our main script but do not enqueue it yet
   wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
  
   // now the most interesting part
   // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
   // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
   wp_localize_script( 'my_loadmore', 'load_more_params', array(
     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
     'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
     'post_on_page' => get_option('post_per_page'),
     'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
     'number_of_posts' => wp_count_posts()->publish,
     'max_pages' => $max_pages - 1

   ) );
  
    wp_enqueue_script( 'my_loadmore' );
 }
  
 add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


 function misha_loadmore_ajax_handler(){
  
   // prepare our arguments for the query
   $args = json_decode( stripslashes( $_POST['query'] ), true );
   $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
   $args['post_status'] = 'publish';
  
   // it is always better to use WP_Query but not here
   query_posts( $args );
  
   if( have_posts() ) :
    
     // run the loop
     while( have_posts() ): the_post();
       
        ?>
         <div class="column news-box small-12 medium-12 large-4">
         <?php if(str_word_count( strip_tags( get_the_excerpt() ) ) > 50 ) : ?> 
          <a href="<?  the_permalink(); ?>">
            <div class="news-content"> 
              <h3><?php the_title();  ?></h3>
              <hr>
              <p><? the_excerpt(); ?>

           <a class="read-more" href="<? the_permalink() ?>">Läs mer</a>
           </p>
           </a>
          </div>
          <?php else : ?>
          <div class="news-content"> 
              <h3><?php the_title();  ?></h3>
              <hr>
              <p><? the_excerpt(); ?></p>
          </div>
          <?php endif ?>
         </div><?php
         
       
     endwhile;
  
   endif;
   die; // here we exit the script and even no wp_reset_query() required!
 }


  
 add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
 add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

