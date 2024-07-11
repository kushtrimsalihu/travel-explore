<?php
namespace App;

use PostType;
use Timber\Site;
use TwigExtension;

class Init extends Site {

    public function __construct() {
        $enqueue = new Enqueue();
        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueScripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueStyles']);
        add_action('wp_enqueue_scripts', [$enqueue, 'travel_enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'enqueue_live_search_script']);
        add_action('wp_enqueue_scripts', [$enqueue, 'swiper_scripts']);
        
        add_action('after_setup_theme', [new Setup(), 'theme_supports']);
        add_action('init', [new Setup(), 'register_navigation_menus']);
        add_action('init', [new PostType(), 'register_alternative_tourism_cpt']);
        add_action('init', [new PostType(), 'register_blog_post_type']);
        add_action('init', [new PostType(), 'blog_category']);
        add_action('init', [new PostType(), 'register_alternative_tourism_taxonomies']);
        add_action('init', [new PostType(), 'register_user_journey_post_type']);
        add_action('wp_ajax_live_search', [new Setup(), 'live_search_handler']);
        add_action('wp_ajax_nopriv_live_search', [new Setup(), 'live_search_handler']);
        add_action('template_redirect', [new Setup(), 'setup_404_template_redirect']);

        add_filter('get_robots', [new Setup(), 'remove_max_image_preview'], 10, 3);
        add_filter('acf/settings/save_json', [new Setup(), 'my_acf_json_save_point']);
        add_filter('acf/settings/load_json', [new Setup(), 'my_acf_json_load_point']);
        add_filter('posts_search', [new Setup(), 'advanced_custom_search'], 500, 2);
        add_filter('timber/twig', [new TwigExtension(), 'addToTwig']);
        add_filter('acf/load_field/key=field_667605c8ad53a', [new Setup(), 'acf_load_post_types_choices']);
        add_filter('timber/context', [new TwigExtension, 'addToContext']);
        add_filter('timber/context', [new Setup(), 'add_to_context']);
        add_filter('acf/fields/relationship/query', [new Setup(), 'filter_acf_relationship_query'], 10, 3);

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        // Register custom user registration menu
        add_action('admin_menu', [$this, 'custom_registration_menu']);
        add_action('wp_ajax_user_journey_registration', [$this, 'handle_user_journey_registration']);
        add_action('wp_ajax_nopriv_user_journey_registration', [$this, 'handle_user_journey_registration']);

        parent::__construct();
    }


    
    public function custom_registration_menu() {
        add_menu_page('User Registration', 'User Registration', 'manage_options', 'custom-registration', [$this, 'custom_registration_page'], 'dashicons-admin-users', 6);
    }

    public function custom_registration_page() {
        ?>
        <div class="wrap">
            <h1>User Registration</h1>
            <form id="user-registration-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data">
                <input type="hidden" name="action" value="user_journey_registration">
                <?php wp_nonce_field('user_journey_registration_nonce', 'user_journey_registration_nonce_field'); ?>
                <table class="form-table">
                    <tr>
                        <th><label for="username">Username</label></th>
                        <td><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <th><label for="first_name">First Name</label></th>
                        <td><input type="text" name="first_name" id="first_name" required></td>
                    </tr>
                    <tr>
                        <th><label for="last_name">Last Name</label></th>
                        <td><input type="text" name="last_name" id="last_name" required></td>
                    </tr>
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <th><label for="phone">Phone</label></th>
                        <td><input type="text" name="phone" id="phone" required></td>
                    </tr>
                    <tr>
                        <th><label for="profile_image">Profile Image</label></th>
                        <td><input type="file" name="profile_image" id="profile_image"></td>
                    </tr>
                </table>
                <button type="submit" name="submit" class="button button-primary">Register</button>
            </form>
        </div>
        <?php
    }
    
    public function handle_user_journey_registration() {
        // Verify nonce
        if (!isset($_POST['user_journey_registration_nonce_field']) || !wp_verify_nonce($_POST['user_journey_registration_nonce_field'], 'user_journey_registration_nonce')) {
            wp_send_json_error(['message' => 'Nonce verification failed.']);
            return;
        }

        $username = sanitize_text_field($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $profile_image = $_FILES['profile_image'];

        $errors = [];

        if (username_exists($username) || !validate_username($username)) {
            $errors[] = 'Invalid or already taken username';
        }

        if (!is_email($email) || email_exists($email)) {
            $errors[] = 'Invalid or duplicate email.';
        }

        if (!preg_match('/^\d{10}$/', $phone)) {
            $errors[] = 'Invalid phone number.';
        }

        if ($profile_image['size'] > 0) {
            $upload = wp_handle_upload($profile_image, ['test_form' => false]);
            if ($upload && !isset($upload['error'])) {
                $profile_image_url = $upload['url'];
            } else {
                $errors[] = 'Profile image upload failed.';
            }
        }

        if (!empty($errors)) {
            wp_send_json_error(['message' => implode(', ', $errors)]);
            return;
        }

        $user_id = wp_create_user($username, wp_generate_password(), $email);
        if (is_wp_error($user_id)) {
            wp_send_json_error(['message' => $user_id->get_error_message()]);
            return;
        }

        update_user_meta($user_id, 'phone', $phone);
        update_user_meta($user_id, 'profile_image', $profile_image_url ?? '');

        wp_insert_post([
            'post_title' => $username,
            'post_type' => 'user_journey',
            'post_status' => 'publish',
            'meta_input' => [
                'user_id' => $user_id,
                'email' => $email,
                'phone' => $phone,
                'profile_image' => $profile_image_url ?? '',
            ],
        ]);

        wp_send_json_success();
    }
}
