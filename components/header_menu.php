<?php

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

?>


<div class="container header-nav <?php if(is_single()){ echo 'panel'; } ?>">
    <div class="row align-middle topbar">
        <div class="logo column small-2">
            <a href="<?php if(is_single()){ echo get_home_url() . '/'; }else{ echo '#safeitup'; }?>"><img class="logo-white" src="<? echo $image[0]?>"></a>            
            <a href="<?php if(is_single()){ echo get_home_url() . '/'; }else{ echo '#safeitup'; }?>"><img class="logo-dark"src="<? echo get_template_directory_uri();?>/img/SafeITUp.svg"></a>
        </div>
        <div class="mobile-menu">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        </div>
        <div class="top-menu column">
 
        <ul>
            <li>
            <a href="<?php if(is_single()){ echo get_home_url() . '/#services'; } else { echo '#services'; }?>">Våra tjänster</a>
            </li>
            <li>
            <a href="<?php if(is_single()){ echo get_home_url() . '/#partners'; } else { echo '#partners'; }?>">Samarbetspartners</a>
            </li>
            <li>
            <a href="<?php if(is_single()){ echo get_home_url() . '/#news'; } else { echo '#news'; }?>">Nyheter</a>
            </li>
            <li>
            <a href="<?php if(is_single()){ echo get_home_url() . '/#contact'; } else { echo '#contact'; }?>">Kontakt</a>
            </li>
            <li>
            <a href="#loggain">Logga in</a>
            </li>
        </ul>
        </div>
    </div>
</div>