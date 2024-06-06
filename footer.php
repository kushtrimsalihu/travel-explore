
<footer class="bg-[#2C1608] text-white pt-24 pr-6 pb-6 pl-6">
    <div class="footer-container px-6 justify-center">
        
        <div class="flex flex-col md:flex-row justify-between gap-72 mb-24"> 
            <div class="flex-1 mb-8 md:mb-0">
                <p class="font-roboto text-2xl leading-10 text-white-100">Logo here</p>
                <h4 class="text-[#FFDCC2] font-roboto font-medium text-sm leading-5 mt-2">
                    Lorem ipsum dolor sit amet<br>consectetur adipisicing text
                </h4>
            </div>
            <div class="hidden md:flex md:gap-6">
                <div class="flex-1 text-[#FFEBCD] space-y-4 w-[920px]">
                    <h4 class="mb-2 text-[#FFEFFF]">Product</h4>
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
                <div class="flex-1 text-[#FFEBCD] space-y-4 list-none">
                    <h4 class="mb-2 text-[#FFEFFF]">Company</h4>
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
                <div class="flex-1 text-[#FFEBCD] space-y-4 list-none">
                    <h4 class="mb-2 text-[#FFEFFF]">Legals</h4>
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
                <div class="flex-1 text-[#FFEBCD] space-y-4 list-none">
                    <h4 class="mb-2 text-[#FFEFFF]">Social Media</h4>
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
        <div class="block md:hidden grid grid-cols-2 gap-6 mb-24"> 
            <div class="flex flex-col space-y-4 text-[#FFEBCD] list-none">
                <h4 class="mb-2 text-[#FFEFFF]">Product</h4>
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
            <div class="flex flex-col space-y-4 text-[#FFEBCD] list-none">
                <h4 class="mb-2 text-[#FFEFFF]">Company</h4>
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
            <div class="flex flex-col space-y-4 text-[#FFEBCD] list-none">
                <h4 class="mb-2 text-[#FFEFFF]">Legals</h4>
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
            <div class="flex flex-col space-y-4 text-[#FFEBCD] list-none">
                <h4 class="mb-2 text-[#FFEFFF]">Social Media</h4>
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
        <hr class="border-[#FFEBCD] w-full h-1 rounded-md opacity-40">

        <!-- Newsletter and Subscription Section -->
        <div class="mt-12 mb-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-7 mb-7">
                <div class="w-full md:flex-1 mb-4 md:mb-0">
                    <h4 class="text-base text-[#FFEFFF]">Join our newsletter</h4>
                    <p class="text-[#FFDCC2] text-sm whitespace-nowrap">We’ll send you a nice letter once per week. No spam.</p>
                </div>
                <div class="w-full md:flex-1 flex flex-col md:flex-row justify-end items-center"> <!-- Removed unnecessary gap classes -->
                    <form action="/subscribe" method="POST" class="inline-block w-full md:w-auto flex flex-col md:flex-row items-center w-full"> <!-- Removed unnecessary gap classes -->
                        <input type="email" name="email" placeholder="Enter your email" required class="w-full md:w-72 min-h-10 bg-white border rounded-full font-roboto text-sm text-[#2C1608]">
                        <button type="submit" class="bg-[#88511D] text-white py-2 px-4 rounded-full w-full md:w-auto md:ml-4 mt-4 md:mt-0">Subscribe</button> <!-- Added md:ml-4 and mt-4 -->
                    </form>
                </div>
            </div>
        </div>
        <hr class="border-[#FFEBCD] w-full h-1 rounded-md opacity-40">

        <!-- Footer Bottom Section -->
        <div class="w-full flex flex-col sm:flex-row justify-between text-left text-white">
            <div class="text-[#FFEBCD] mt-6">
                &copy; 2023 Starlabs. All rights reserved
            </div>
        </div>
    </div>
</footer>
