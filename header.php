<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
    <div class="flex-shrink-0">
        <img class="h-12 w-12" src="https://via.placeholder.com/150" alt="Placeholder Image">
    </div>
    <div>
        <div class="text-xl font-medium text-black">Tailwind Test</div>
        <p class="text-gray-500">Testing Tailwind CSS integration.</p>
    </div>
</div>



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
