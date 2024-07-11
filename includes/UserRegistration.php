<?php
namespace App;

function is_strong_password($password) {
    return preg_match('/[A-Z]/', $password) && // Contains at least one uppercase letter
           preg_match('/[0-9]/', $password) && // Contains at least one number
           strlen($password) >= 8; // Is at least 8 characters long
}

function handle_user_registration() {
    if (!isset($_POST['submit'])) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Form not submitted'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if (!isset($_POST['user_journey_registration_nonce_field']) || !wp_verify_nonce($_POST['user_journey_registration_nonce_field'], 'user_journey_registration_nonce')) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Nonce verification failed'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    $username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
    $first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone_number = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $profile_image_id = isset($_POST['profile_image']) ? intval($_POST['profile_image']) : 0;
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $verify_password = isset($_POST['verify_password']) ? $_POST['verify_password'] : '';

    if (!is_email($email)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Invalid email address'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if (empty($username)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Username is required'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if (!validate_username($username)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Invalid username format'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if (email_exists($email)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Email address is already in use'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if (!is_strong_password($password)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Password must be at least 8 characters long and contain at least one uppercase letter and one number.'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    if ($password !== $verify_password) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Passwords do not match'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    // Creating user in WordPress
    $userdata = [
        'user_login' => $username,
        'user_pass' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'user_email' => $email,
        'meta_input' => [
            'phone_number' => $phone_number,
            'profile_image' => $profile_image_id,
        ],
    ];

    $user_id = wp_insert_user($userdata);

    if (is_wp_error($user_id)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => $user_id->get_error_message()], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    // Generating a hash code for verification
    $activation_code = wp_generate_password(20, false);
    update_user_meta($user_id, 'activation_code', $activation_code);

    // Email sending part
    $subject = 'Confirmation of registration on our site';
    $message = 'Please click on the following link to confirm your registration: ' . add_query_arg(['key' => $activation_code, 'user' => $user_id], 'http://travel-explore.test/');

    // HTML formatted message
    $html_message = '<html><body>';
    $html_message .= '<p>Please click on the following link to confirm your registration:</p>';
    $html_message .= '<p><a href="' . add_query_arg(['key' => $activation_code, 'user' => $user_id], 'http://travel-explore.test/') . '">Confirm registration</a></p>';

    $html_message .= '</body></html>';

    $headers = [
        'From: Notification <noreply@yoursite.com>',
        'Content-Type: text/html; charset=UTF-8'
    ];

    wp_mail($email, $subject, $html_message, $headers);

    // Notification for the user about the confirmation email
    set_transient('user_journey_registration_message', ['type' => 'success', 'message' => 'Registration successful! Check your email to confirm registration.'], 30);

    wp_redirect($_POST['_wp_http_referer']);
    exit;
}

add_action('admin_post_nopriv_user_journey_registration', 'App\handle_user_registration');
add_action('admin_post_user_journey_registration', 'App\handle_user_registration');

?>
