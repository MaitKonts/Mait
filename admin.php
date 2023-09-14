<?php
// Function to add the main admin menu for the Meiko Plugin
function meiko_main_admin_menu() {
    add_menu_page(
        'Meiko Plugin',           // Page title
        'Meiko Plugin',           // Menu title
        'manage_options',         // Capability required
        'meiko-plugin',           // Menu slug
        '',                       // We won't define a callback function here yet. If needed, you can specify a function to display the main menu content.
        'dashicons-admin-generic' // Icon URL
    );
    // DEBUG: Main admin menu added
    error_log('Meiko Plugin: Main admin menu added');
}

// Function to add submenus to the main Meiko Plugin admin menu
function meiko_add_submenus() {

    // Meiko Crypto submenu
    add_submenu_page(
        'meiko-plugin',
        'Meiko Crypto Settings',
        'Meiko Crypto',
        'manage_options',
        'meiko-crypto',
        'meiko_crypto_settings_page'
    );

    // Meiko Ranks submenu
    add_submenu_page(
        'meiko-plugin',
        'Meiko Ranks',
        'Meiko Ranks',
        'manage_options',
        'meiko-ranks',
        'meiko_ranks_page_content'
    );

    // Manage Market Items submenu
    add_submenu_page(
        'meiko-plugin',
        'Manage Market Items',
        'Market Items',
        'manage_options',
        'meiko-market-items',
        'meiko_add_market_item_callback'
    );

    // Manage Main submenu
    add_submenu_page(
        'meiko-plugin', 
        'Meiko Settings', 
        'Meiko Settings', 
        'manage_options', 
        'meiko_settings', 
        'meiko_settings_callback' 
    );

    add_submenu_page(
        'meiko-plugin',
        'Manage Plants',
        'Meiko Plants',
        'manage_options',
        'meiko-plants',
        'meiko_manage_plants_callback'
    );
    // DEBUG: Submenus added
    error_log('Meiko Plugin: Submenus added');
}