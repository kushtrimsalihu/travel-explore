<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/src/sass/assets/fonts/front.scss" as="font" type="font/woff2" crossorigin="anonymous">

    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
    <div class="flex-shrink-0">
        <img class="h-12 w-12" src="https://via.placeholder.com/150" alt="Placeholder Image">
    </div>
    <div>
        <div class="font-roboto font-900 text-xl  text-black">Tailwind Test</div>
        <p class=" font-roboto text-gray-500">Testing Tailwind CSS integration.</p>
    </div>
</div>
<div class="max-w-1440 bg-gray-200 p-4">
    This div has a maximum width of 1440px (90rem).
  </div>
<div class="font-roboto font-normal text-xl text-black">Tailwind Test 400</div>
  <!-- Duke përdorur font-weight 500 -->
  <div class="font-roboto font-medium text-xl text-black">Tailwind Test 500</div>
  <!-- Duke përdorur font-weight 700 -->
  <div class="font-roboto font-bold text-xl text-black">Tailwind Test 700</div>
  <!-- Duke përdorur font-weight 900 -->
  <div class="font-roboto font-black text-xl text-black">Tailwind Test 900</div>


<header class="main">
    <?php
        wp_nav_menu(array(
            'theme_location' => 'top-menu',
        ));
    ?>
</header>

<?php wp_footer(); ?>
</body>
</html>
