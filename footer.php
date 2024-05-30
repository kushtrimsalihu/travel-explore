<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        <p class="text-sm text-red-500">&copy; <?php echo date('Y'); ?> Your Site Name. All rights reserved.</p>
        <nav class="mt-4">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class'     => 'flex justify-center space-x-4',
            ));
            ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
