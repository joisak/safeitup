<?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
    endif;
   ?>

<?php



?>




<div id="hero" style="background-image:url('<?php echo $image[0]; ?>')">
    <div class="row">
        <div class="column align-middle small-12 medium-8 large-6">
        <p><?php the_content(); ?></p>

        </div>
    </div>
</div>
