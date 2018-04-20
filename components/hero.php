<?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
    endif;
   ?>



<div class="container header-nav">
    <div class="row align-middle topbar">
        <div class="logo column small-2">
            <a href="#safeitup">SafeItUp</a>
        </div>
        <div class="mobile-menu">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        </div>
        <div class="top-menu column">
        <ul>
            <li>
            <a href="#services">Våra tjänster</a>
            </li>
            <li>
            <a href="#partners">Samarbetspartners</a>
            </li>
            <li>
            <a href="#news">Nyheter</a>
            </li>
            <li>
            <a href="#contact">Kontakt</a>
            </li>
            <li>
            <a href="#">Logga in</a>
            </li>
        </ul>
        </div>
    </div>
</div>

<div id="hero" style="background-image:url('<?php echo $image[0]; ?>')">
    <div class="row">
        <div class="column align-middle small-12 medium-8 large-6">
        <p><?php the_content(); ?></p>
        
        </div>
    </div>
</div>
