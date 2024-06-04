<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/src/sass/assets/fonts/front.scss" as="font" type="font" crossorigin="anonymous"> 
     <?php wp_head();?>
</head>


<body <?php body_class();?>>

<div class="fixed inset-0 backdrop-blur-sm z-50 flex items-baseline justify-center invisible" id="searchModal">
    <form role="search" action="<?php echo home_url('/'); ?>" id="search-form" method="get" class="mt-16 bg-white-100 w-8/12 h-12 flex items-center justify-start rounded-lg p-3 gap-2 shadow-md">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 20L15.375 15.375M17.3333 10.6667C17.3333 14.3486 14.3486 17.3333 10.6667 17.3333C6.98477 17.3333 4 14.3486 4 10.6667C4 6.98477 6.98477 4 10.6667 4C14.3486 4 17.3333 6.98477 17.3333 10.6667Z" stroke="#2F628C" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <input type="search" name="s" class="w-full" placeholder="Search" value="<?php echo get_search_query() ?>" title="Search" id="searchInput">
        <input type="hidden" name="submit" value="submit" />
        <svg width="12" class="cursor-pointer" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeIcon">
            <path d="M6 6.99665L1.20216 11.7945C1.07122 11.9254 0.906627 11.9924 0.708384 11.9954C0.510157 11.9985 0.34254 11.9315 0.205533 11.7945C0.068511 11.6575 0 11.4914 0 11.2962C0 11.101 0.068511 10.9349 0.205533 10.7978L5.00335 6L0.205533 1.20216C0.0745795 1.07122 0.00758942 0.906628 0.00456304 0.708384C0.00152091 0.510157 0.068511 0.34254 0.205533 0.205533C0.34254 0.068511 0.508644 0 0.703845 0C0.899046 0 1.06515 0.068511 1.20216 0.205533L6 5.00335L10.7978 0.205533C10.9288 0.0745795 11.0934 0.00758942 11.2916 0.00456304C11.4898 0.00152091 11.6575 0.068511 11.7945 0.205533C11.9315 0.34254 12 0.508643 12 0.703844C12 0.899046 11.9315 1.06515 11.7945 1.20216L6.99665 6L11.7945 10.7978C11.9254 10.9288 11.9924 11.0934 11.9954 11.2916C11.9985 11.4898 11.9315 11.6575 11.7945 11.7945C11.6575 11.9315 11.4914 12 11.2962 12C11.101 12 10.9349 11.9315 10.7978 11.7945L6 6.99665Z" fill="#2F628C"/>
        </svg>
    </form>
</div>



<header class="main">

<!--=============== TOP NAVBAR SECTION ===============-->
  <div class="navbar-top w-full h-11 flex flex-row items-center lg:justify-start md:justify-center justify-center gap-7 pl-7 bg-light-p40">
      <div class="phone-number flex flex-row items-center justify-center gap-2">
        <span class="material-symbols-outlined text-white-100 md:text-lg text-xs">phone_in_talk</span>      
        <a href="#" class="text-white-100 md:text-sm text-xs">25210 38111</a>
      </div>
      <div class="email flex flex-row items-center justify-center gap-2">
        <span class="material-symbols-outlined text-white-100 md:text-lg text-xs">mail</span>
        <a href="#" class="text-white-100 md:text-sm text-xs">info@travelexplore.gr</a>
      </div>
  </div>
    

  <!--=============== MAIN NAVBAR SECTION ===============-->

  <div class="navbar w-full h-20  bg-white-100 flex items-center md:justify-center justify-between md:p-6 py-4 px-3">


    <!-- ============LEFT SIDE============ -->
  <div class="left md:w-1/4 w-2/4 p-0">
      <div class="logo-section">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="w-7/12">
      </div>
  </div>



    <!-- ============RIGHT SIDE============ -->
  <div class="right w-full md:flex hidden md:flex-row flex-column items-center md:justify-center justify-end md:bg-transparent bg-white-100 md:py-0 py-6 md:relative absolute md:top-0 top-16 left-0 right-0 md:gap-0 gap-5" id="menuList">
      <div class="menus flex md:flex-row items-center justify-center w-3/4">
          <?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
            ));
          ?>
      </div>
  
      <div class="right-side md:w-1/4 w-full flex md:flex-row flex-row md:justify-between justify-center md:gap-0 gap-5">
        <div class="buttons md:block flex items-center justify-center">
          <a href="#" class="font-roboto font-medium md:text-sm text-lg border border-light-p40 px-6 py-2.5 rounded-full">Login</a>
          <a href="#" id="signup" class="font-roboto text-white-100 font-medium md:text-sm text-lg px-6 py-2.5 rounded-full bg-light-p40 ml-3">Sign Up</a>
        </div>

        <div class="search flex items-center justify-center" id="search-Icon"> 
        <svg width="24" class="cursor-pointer" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 20L15.375 15.375M17.3333 10.6667C17.3333 14.3486 14.3486 17.3333 10.6667 17.3333C6.98477 17.3333 4 14.3486 4 10.6667C4 6.98477 6.98477 4 10.6667 4C14.3486 4 17.3333 6.98477 17.3333 10.6667Z" stroke="#2F628C" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </div>

      </div>
      


  </div>
  
  <div class="burger-menu md:hidden block p-2">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger.png" alt="Logo" class="" id="burger-menu">
  </div>
  <svg width="12" class="md:hidden hidden absolute right-6 z-50 cursor-pointer" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" id="close_Icon">
          <path d="M6 6.99665L1.20216 11.7945C1.07122 11.9254 0.906627 11.9924 0.708384 11.9954C0.510157 11.9985 0.34254 11.9315 0.205533 11.7945C0.068511 11.6575 0 11.4914 0 11.2962C0 11.101 0.068511 10.9349 0.205533 10.7978L5.00335 6L0.205533 1.20216C0.0745795 1.07122 0.00758942 0.906628 0.00456304 0.708384C0.00152091 0.510157 0.068511 0.34254 0.205533 0.205533C0.34254 0.068511 0.508644 0 0.703845 0C0.899046 0 1.06515 0.068511 1.20216 0.205533L6 5.00335L10.7978 0.205533C10.9288 0.0745795 11.0934 0.00758942 11.2916 0.00456304C11.4898 0.00152091 11.6575 0.068511 11.7945 0.205533C11.9315 0.34254 12 0.508643 12 0.703844C12 0.899046 11.9315 1.06515 11.7945 1.20216L6.99665 6L11.7945 10.7978C11.9254 10.9288 11.9924 11.0934 11.9954 11.2916C11.9985 11.4898 11.9315 11.6575 11.7945 11.7945C11.6575 11.9315 11.4914 12 11.2962 12C11.101 12 10.9349 11.9315 10.7978 11.7945L6 6.99665Z" fill="#2F628C"/>
        </svg>

  </div>

</header>

<?php wp_footer(); ?>
</body>
</html>