<?php

function theredtheme_public_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('theredtheme-font-awesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('theredtheme-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('theredtheme-style',get_template_directory_uri() . "/style.css", array('theredtheme-bootstrap'), $version, 'all');
    
}

add_action('wp_enqueue_scripts','theredtheme_public_styles');


function theredtheme_public_scripts(){
    wp_enqueue_script('thered-theme-jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js",['jquery'],wp_rand(),true);
    wp_enqueue_script('popper',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",['jquery'],wp_rand(),true);
    wp_enqueue_script('bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",['jquery'],wp_rand(),true);
    wp_enqueue_script('js',get_template_directory_uri().'/assets/js/main.js',['jquery'],wp_rand(),true);
}

add_action('wp_enqueue_scripts','theredtheme_public_scripts');

function theredtheme_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','theredtheme_theme_support');

function theredtheme_menus(){
    $locations=array(
        'primary'=>"Desktop Primary Left Sidebar",
        'footer'=>"Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init','theredtheme_menus');

function theredtheme_widget_areas() {
    register_sidebar(
        array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>'',
            'after_widget'=>'',
            'name'=>'Sidebar Area',
            'id'=>'sidebar-1',
            'description'=>'Sidebar Widget Area'
        )
    );
    register_sidebar(
        array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>'',
            'after_widget'=>'',
            'name'=>'Footer Area',
            'id'=>'footer-1',
            'description'=>'Footer Widget Area'
        )
    );
}

add_action('widgets_init','theredtheme_widget_areas')
?>