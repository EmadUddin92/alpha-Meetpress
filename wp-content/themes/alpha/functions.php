<?php
function alpha_bootstraping(){
    load_theme_textdomain("alpha_bootstraping");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}

add_action("after_setup_theme","alpha_bootstraping");

function alpha_assets(){
    wp_enqueue_style("alpha",get_stylesheet_uri());
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("fontawsome","//use.fontawesome.com/releases/v5.0.13/css/all.css");
}

add_action("wp_enqueue_scripts","alpha_assets");