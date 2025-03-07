<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


function cover_video() {
    global $post;
    $video = get_post_meta( $post->ID, 'video-cover', true );
    if ($video == null)
        return;
        
    echo "<div class='video-cover'><video autoplay muted loop src='".$video."'></video></div>";    
}
    

function show_title() {
    global $post;
    $video = get_post_meta( $post->ID, 'hide-title', true );
    return $video != "true";
}
    

// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'gutenberg_style' );

function gutenberg_style() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'photographus-gutenberg', get_theme_file_uri( '/assets/css/gutenberg-editor-style.css' ), false );
}