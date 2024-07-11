<?php
namespace App;

// Funksioni për të trajtuar konfirmimin e regjistrimit
function user_registration_confirmation_shortcode($atts) {
    if (isset($_GET['key']) && isset($_GET['user'])) {
        $activation_code = sanitize_text_field($_GET['key']);
        $user_id = intval($_GET['user']);

        $saved_activation_code = get_user_meta($user_id, 'activation_code', true);

        if ($activation_code === $saved_activation_code) {
            delete_user_meta($user_id, 'activation_code');
            update_user_meta($user_id, 'user_activated', true);

            // Optional: Log the user in automatically after confirmation
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            do_action('wp_login', get_userdata($user_id)->user_login, get_userdata($user_id));

            return '<p>Regjistrimi juaj u konfirmua me sukses. Tani jeni të kyçur.</p>';
        } else {
            return '<p>Kodi i aktivizimit nuk është i vlefshëm.</p>';
        }
    } else {
        return '<p>Të dhënat për konfirmimin e regjistrimit janë të mangëta.</p>';
    }
}
add_shortcode('user_registration_confirmation', 'App\user_registration_confirmation_shortcode');
?>
