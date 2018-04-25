<?php
get_header(); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

get_template_part( 'components/header_menu');
?>
 
      
            <div class="single-news-page"> 
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="column small-12 medium-6 medium-offset-3 single-news-container">
                    <h2><?php the_title(); ?></h2>
                    <?php if( $image > 1 ) : ?>
                         <img src="<?  echo $image[0]; ?>"> 
                    <?php endif ?>
                    <span class="publish-date"> PUBLICERAD: <?php echo get_the_date('j M Y'); ?></span>
                    <hr>
                   
                    <p><?php the_content(); ?></p>

  
            
                        
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'screen_reader_text' => 'Fler nyheter:',
                        'next_text' => ' ' . __( '', '' ) . '%title',
                        'prev_text' => '' . __( '', '' ) . '%title'   
                    ) );

                    
                    ?>
                    
                    <div class="link-back">
                        <i class="ion-ios-arrow-back" id="prev"></i>
                        <a href="<? echo get_home_url() ?>/">Tillbaka</a>
                    </div>

                    
                    </div>  
                
                </div>
                    <?php
                // End the loop.
            endwhile;  ?>
            </div>

 
<?php get_footer(); ?>