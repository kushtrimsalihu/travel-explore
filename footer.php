<footer class="bg-brown-800 text-white p-4 lg:pt-24">
    <div class="footer-container max-w-1384 mx-auto">      
        <div class="flex flex-col lg:flex-row justify-between gap-64 lg:gap-72 lg:mb-24"> 
            <div class="mb-16 mt-12 lg:m-0 w-96"> 
                <p class="font-roboto text-2xl leading-10 text-white-100">Logo here</p>
                <h4 class="text-brown-400 font-roboto font-medium text-sm leading-5 mt-2">
                    Lorem ipsum dolor sit amet<br>consectetur adipisicing text
                </h4>
            </div>
            <div class="hidden lg:flex lg:gap-6 flex-wrap xl:flex-nowrap"> 
                <div class="text-grey-400 space-y-4 text-left lg:min-w-52">
                    <h4 class="mb-2 text-white-100">Product</h4>
                    <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5 list-none">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu-product',
                                'container' => false,
                                'items_wrap' => '%3$s'
                            ));
                        ?>
                    </div>
                </div>
                <div class="text-grey-400 space-y-4 list-none text-left lg:min-w-52">
                    <h4 class="mb-2 text-white-100">Company</h4>
                    <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5 list-none">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu-company',
                                'container' => false,
                                'items_wrap' => '%3$s'
                            ));
                        ?>
                    </div>
                </div>
                <div class="text-grey-400 space-y-4 list-none text-left lg:min-w-52">
                    <h4 class="mb-2 text-white-100">Legals</h4>
                    <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5 list-none">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu-legals',
                                'container' => false,
                                'items_wrap' => '%3$s'
                            ));
                        ?>
                    </div>
                </div>
                <div class="text-grey-400 space-y-4 list-none text-left lg:min-w-52">
                    <h4 class="mb-2 text-white-100">Social Media</h4>
                    <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5 list-none">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu-social-media',
                                'container' => false,
                                'items_wrap' => '%3$s'
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="block lg:hidden grid grid-cols-2 gap-6 mb-10"> 
            <div class="flex flex-col space-y-4 text-grey-400 list-none">
                <h4 class="mb-2 text-white-100">Product</h4>
                <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-product',
                            'container' => false,
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                </div>
            </div>
            <div class="flex flex-col space-y-4 text-grey-400 list-none">
                <h4 class="mb-2 text-white-100">Company</h4>
                <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-company',
                            'container' => false,
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                </div>
            </div>
            <div class="flex flex-col space-y-4 text-grey-400 list-none">
                <h4 class="mb-2 text-white-100">Legals</h4>
                <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-legals',
                            'container' => false,
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                </div>
            </div>
            <div class="flex flex-col space-y-4 text-grey-400 list-none">
                <h4 class="mb-2 text-white-100">Social Media</h4>
                <div class="child-items space-y-3 font-roboto font-normal text-sm leading-5">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-social-media',
                            'container' => false,
                            'items_wrap' => '%3$s'
                        ));
                    ?>
                </div>
            </div>
        </div>
        <hr class="border-brown-400 w-full h-1 rounded-md opacity-40 mb-12 lg:mb-8 ">

        <div class="mt-4 mb-4"> 
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center lg:mb-0 mt-8">
                <div class="w-full lg: mb-4 lg:mb-0 text-left">
                    <h4 class="text-base text-white-100">Join our newsletter</h4>
                    <p class="text-brown-400 text-sm whitespace-nowrap mb-6 lg:mt-2 lg:mb-4 leading-5 mt-2">We’ll send you a nice letter once per week. No spam.</p>
                </div>
                <div class="w-full lg:flex flex-col lg:flex-row justify-end items-center">
                    <div class="flex justify-end w-full lg:w-auto">
                        <form action="/subscribe" method="POST" class="inline-block w-full flex flex-col lg:flex-row items-center">
                            <input type="email" name="email" placeholder="Enter your email" required class="w-full lg:w-72 min-h-10 bg-white border rounded-full font-roboto text-sm text-light-p40 py-2 px-4">
                            <button type="submit" class="bg-light-p40 text-white min-h-10 px-4 rounded-full w-full lg:w-auto lg:ml-4 mt-4 lg:mt-0 mb-8 lg:mb-0 text-white-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-brown-400 w-full h-1 rounded-md opacity-40 mb-2 lg:mt-0">

        <div class="w-full flex flex-col sm:flex-row justify-between text-left text-grey-400 mt-6">
                &copy; 2023 Starlabs. All rights reserved
        </div>
    </div>
</footer>
