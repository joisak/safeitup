<?php
    $partner_header = get_field('partner_header');
    $partner_content = get_field('partner_content');
?>

<div id="partners">
<div class="row">
        <div class="column">
            <h2 class="text-left"><? echo $partner_header?></h2>
        </div>
    </div>
    <div class="row">
        <div class="column small-12 medium-4">
            <?php echo $partner_content; ?>
        </div>
        <div class="column small-12 medium-8">
            <div class="row align-middle">
            <?php if( have_rows('partners_logo')):
                while( have_rows('partners_logo')) : the_row();
                    $partners_logo = get_sub_field('logo');
                    ?>
                    <div class="column small-12 medium-4">
                        <img class="" src="<?php echo $partners_logo['sizes']['large']?>">
                    </div>
                    
                    <?php
                endwhile;
            endif;
            ?>
            </div>
          
        </div>
    </div>
</div>