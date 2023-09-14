<?php
function meiko_login_form() {
    // Check if the user is already logged in
    if (is_user_logged_in()) {
        return 'You are already logged in!';
    }

    $message = get_transient('meiko_login_message');
    if ($message) {
        echo '<div class="message">' . $message . '</div>';
        delete_transient('meiko_login_message');
    }

    $nonce_field = wp_nonce_field('meiko_login_action', 'meiko_login_nonce', true, false);

    $output = '<form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        ' . $nonce_field . '
        
        <button class="login_user" type="submit" name="login_user">Login</button>
    </form>';

    return $output;
}

function meiko_process_login_form() {
    if (isset($_POST['login_user']) && wp_verify_nonce($_POST['meiko_login_nonce'], 'meiko_login_action')) {
        $credentials = array(
            'user_login'    => sanitize_text_field($_POST['username']),
            'user_password' => $_POST['password'],
            'remember'      => true
        );

        $user = wp_signon($credentials, false);
        if (is_wp_error($user)) {
            set_transient('meiko_login_message', $user->get_error_message(), 60);
        } else {
            set_transient('meiko_login_message', 'Successfully logged in!', 60);
            wp_redirect(home_url());
            exit;
        }
    }
}

function meiko_redirect_after_login() {
    // If our session flag is set, handle the redirect and then clear the flag
    if (isset($_SESSION['meiko_login_success']) && $_SESSION['meiko_login_success'] === true) {
        unset($_SESSION['meiko_login_success']); // Clear the flag
        wp_redirect(home_url());
        exit;
    }
}

function meiko_logout_button() {
    // Check if the user is not logged in
    if (!is_user_logged_in()) {
        return 'You are not logged in!';
    }
    
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    
    global $wpdb;
    $table_name_players = $wpdb->prefix . "mk_players";
    $player = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_players WHERE user_id = %d", $user_id));

    // Use the "username" field from mk_players table
    $username = ($player && isset($player->username)) ? esc_html($player->username) : '';

    $redirect_url = home_url(); // Redirecting to the homepage after logout
    $logout_url = wp_logout_url($redirect_url);
    
    return 'Currently logged in as: ' . $username . ' <a href="' . esc_url($logout_url) . '" class="logout-button">Logout</a>';
}
