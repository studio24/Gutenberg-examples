<?php
function register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'testimonial',
        'title'             => __('Testimonial'),
        'description'       => __('A custom testimonial block.'),
        'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'testimonial', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

$post_type = "people";
function my_rest_prepare_post($data, $post, $request) {
    $_data = $data->data;
    $fields = get_fields($post->ID);
    foreach ($fields as $key => $value) {
        $_data[$key] = get_field($key, $post->ID);
    }
    $data->data = $_data;
    return $data;
}
add_filter("rest_prepare_{$post_type}", 'my_rest_prepare_post', 10, 3);

function my_acf_block_render_callback( $block ) {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
    }
}