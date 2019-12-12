<?php

add_action( 'init', 'apollo_register_my_cpts' );
function apollo_register_my_cpts() {

    // Case-studies
    $labels = array(
        "name" => __('Case studies', 'studio24'),
        "singular_name" => __('Case study', 'studio24'),
        "menu_name" => __('Case studies', 'studio24'),
        "name_admin_bar" => __('Case study', 'studio24'),
        'add_new'            => __('Add New', 'case-studies', 'studio24'),
        'add_new_item'       => __('Add New Case study', 'studio24'),
        'new_item'           => __('New Case study', 'studio24'),
        'edit_item'          => __('Edit Case study', 'studio24'),
        'view_item'          => __('View Case study', 'studio24'),
        'all_items'          => __('All Case studies', 'studio24'),
        'search_items'       => __('Search Case studies', 'studio24'),
        'parent_item_colon'  => __('Parent Case study:', 'studio24'),
        'not_found'          => __('No Case studies found.', 'studio24'),
        'not_found_in_trash' => __('No Case studies found in Trash.', 'studio24')
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "work", "with_front" => false ),
        "query_var" => true,
        "menu_icon" => "dashicons-analytics",
        "supports" => array("title", "excerpt", "revisions", "editor", "thumbnail"),
    );
    register_post_type("case-studies", $args);



    // People
    $labels = array(
        "name" => __('People', ''),
        "singular_name" => __('Person', ''),
        "menu_name" => __('People', ''),
        "name_admin_bar" => __('Person', ''),
        'add_new'            => __('Add New', 'people', ''),
        'add_new_item'       => __('Add New Person', ''),
        'new_item'           => __('New Person', ''),
        'edit_item'          => __('Edit Person', ''),
        'view_item'          => __('View Person', ''),
        'all_items'          => __('All People', ''),
        'search_items'       => __('Search People', ''),
        'parent_item_colon'  => __('Parent Person:', ''),
        'not_found'          => __('No People found.', ''),
        'not_found_in_trash' => __('No People found in Trash.', '')
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "team", "with_front" => false ),
        "query_var" => true,
        "menu_icon" => "dashicons-businessman",
        "supports" => array("title", "excerpt", "revisions", "editor", "thumbnail"),
    );
    register_post_type("people", $args);

}