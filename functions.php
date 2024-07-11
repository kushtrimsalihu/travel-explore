<?php

namespace App;

use Timber\Timber;
use App\Init;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/TwigExtension.php';
require_once __DIR__ . '/includes/Setup.php';
require_once __DIR__ . '/includes/Enqueue.php';
require_once __DIR__ . '/includes/PostType.php';
require_once __DIR__ . '/includes/Init.php';
require_once __DIR__ . '/includes/UserRegistration.php';
require_once __DIR__ . '/includes/UserRegistrationConfirmation.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Timber::init();

new Init();

Timber::$locations = [
    get_template_directory() . '/templates', 
    get_template_directory() . '/modules', 
];

// Shtimi i funksionit për trajtimin e regjistrimit
add_action('admin_post_nopriv_user_journey_registration', 'App\handle_user_registration');
add_action('admin_post_user_journey_registration', 'App\handle_user_registration');

// Vendosja e lokacionit për redirektim pas konfirmimit të regjistrimit
function redirect_after_registration_confirmation() {
    // Kontrollo nëse ky është template për konfirmim regjistrimi
    if (strpos($_SERVER['REQUEST_URI'], 'http://travel-explore.test/') !== false) {
        // Kontrollo për key dhe user në query string
        $key = isset($_GET['key']) ? sanitize_text_field($_GET['key']) : '';
        $user_id = isset($_GET['user']) ? intval($_GET['user']) : 0;

        // Verifikimi i key dhe user id, mund të përdoret për më shumë kontroll
        if (!empty($key) && $user_id > 0) {
            // Redirektimi pas konfirmimit
            wp_redirect(home_url('/profile')); // Ndrysho 'profile' me slug-in e faqes ku do të dërgohet përdoruesi pas konfirmimit
            exit;
        }
    }
}
add_action('template_redirect', 'App\\redirect_after_registration_confirmation');


