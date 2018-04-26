<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta property="og:url" content="http://www.safeitup.se"/>
  <meta property="og:type" content="website" />
  <meta property="og:title" content="SafeItup" />
  <meta property="og:description" content="Vi stöldskyddar dina värdefulla saker" />
  <meta property="og:image:secure_url" content="https://www.safeitup.se/wp-content/themes/safeitup/img/SafeITUp.svg"/>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/app.css">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png"/>
  <title><? echo get_bloginfo(); ?></title>
</head>
<?php wp_head();?>
<body id="safeitup" class="<?php if(is_404()) echo 'not-found' ?>">
