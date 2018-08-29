<?php

/*Cash busting*/

if(site_url()=="http://localhost/wordpress"){
    define("VERSION", time());
}
else{
    define("VERSION",wp_get_theme()-> get("VERSION"));
}


function alpha_bootstraping(){
    load_theme_textdomain("alpha_bootstraping");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $alpha_custom_header_color= array(
        'header-text'=> true,
        'default-text-color'=> '#222',
        'width'=> 1200,
        'height'=> 600,
        'flex-width'=> true,
        'flex-height'=> true

    );
    add_theme_support("custom-header",$alpha_custom_header_color);
    $alpha_custom_logo_defaults= array(
            "width"=>'100',
            "height"=>'100',
    );

    add_theme_support("custom-background");
    add_theme_support("custom-logo",$alpha_custom_logo_defaults);
    register_nav_menu("topmenu",__("Top menu","alpha"));
    register_nav_menu("footermenu",__("Footer menu","alpha"));
    add_theme_support("post-formats", array('image','quote','video','audio','link'));
}

add_action("after_setup_theme","alpha_bootstraping");

function alpha_assets(){
    //for external css file

    wp_enqueue_style("alpha",get_stylesheet_uri(),null,VERSION);
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("fontawsome","//use.fontawesome.com/releases/v5.0.13/css/all.css");
    wp_enqueue_style("featherlight","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css");
    wp_enqueue_style("dashicons");
    wp_enqueue_style("alpha",get_stylesheet_uri(),null,VERSION);
    //for external js file

    wp_enqueue_script("featherlight-js","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js",array("jquery"),VERSION,true);
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

//Custom header background


function alpha_about_page_template_banner(){
    if(is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null,"large");
    ?>
    <style>
        .page-header{
            background-image: url(<?php echo $alpha_feat_image; ?>);
        }
    </style>

    <?php
    }

    if(is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
            <style>
                .header{
                    background-image:url(<?php echo header_image()?>);
                    background-size:cover;
                    margin-bottom:50px;
                }

                .header h1.heading a,h3.tagline{
                    color: #<?php echo get_header_textcolor(); ?>;

                <?php
                    if(!display_header_text()){
                        echo "display:none;";
                    }
                ?>
                }

                .header h1.heading{
                <?php
                if(!display_header_text()){
                    echo "border-bottom:none";
                }
            ?>
                }
            </style>
        <?php
        }
    }

}
add_action("wp_head","alpha_about_page_template_banner",11);