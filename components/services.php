<div id="services">
    <div class="row">


<?php


if( have_rows('services')):
  while( have_rows('services')) : the_row();
    $image = get_sub_field('image');
    $content = get_sub_field('content');

    ?>
    <div class="column content-box small-12 medium-4">
        <div class="icons">
          <img src="<?php echo $image['sizes']['large'] ?>">
        </div>
        <p><?php echo $content ?></p>
      </div>
  <?php
    
  endwhile;

else:
  echo 'no....';

endif;

?>



</div>  
</div>
</div>
