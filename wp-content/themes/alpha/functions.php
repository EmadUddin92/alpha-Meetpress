<?php
/**
 *
 */
function alpha_bootstraping(){
    load_theme_textdomain("alpha_bootstraping");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    register_nav_menu("topmenu",__("Top menu","alpha"));
    register_nav_menu("footermenu",__("Footer menu","alpha"));
}

add_action("after_setup_theme","alpha_bootstraping");

function alpha_assets(){
    wp_enqueue_style("alpha",get_stylesheet_uri());
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("fontawsome","//use.fontawesome.com/releases/v5.0.13/css/all.css");
}

add_action("wp_enqueue_scripts","alpha_assets");

//sidebar

function alpha_sidebar(){
    register_sidebar(
        array(
            'name'=> __('single Post Sidebar','alpha'),
            'id'=> 'sidebar-1',
            'description'=> __('Right Sidebar','alpha'),
            'before_widget'=> '<section id="%1$s" class="widget %2$s">',
            'after_widget'=> '</section>',
            'before_title'=> '<h2 class="widget-title">',
            'after_title'=> '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'=> __('Footer Left','alpha'),
            'id'=> 'footer-left',
            'description'=> __('Widgetized area on the left','alpha'),
            'before_widget'=> '<section id="%1$s" class="widget %2$s">',
            'after_widget'=> '</section>',
            'before_title'=> '<h2 class="widget-title">',
            'after_title'=> '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'=> __('Footer Right','alpha'),
            'id'=> 'footer-right',
            'description'=> __('Widgetized area on the right','alpha'),
            'before_widget'=> '<section id="%1$s" class="widget %2$s">',
            'after_widget'=> '</section>',
            'before_title'=> '<h2 class="widget-title">',
            'after_title'=> '</h2>',
        )
    );
}

add_action("widgets_init","alpha_sidebar");


//password protected post filter

function alpha_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }

    else{
        echo get_the_password_form();
    }
}

add_filter("the_excerpt","alpha_the_excerpt");

function protected_title_change(){
    return "%s";
}
add_filter("protected_title_format", "protected_title_change");
//menu filter

function alpha_menu_item_class($classes , $items){
    $classes[]= "list-inline-item";
    return $classes;
}

add_filter("nav_menu_css_class", "alpha_menu_item_class",10, 2);