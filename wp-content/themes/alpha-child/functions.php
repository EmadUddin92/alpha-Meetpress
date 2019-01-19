<?php

function alpha_child_asset(){
    wp_enqueue_style("parent-style", get_theme_file_uri ("/style.css"));
}

add_action("wp_enqueue_scripts","alpha_child_asset");


function alpha_about_page_template_banner(){

}


function alpha_todays_date(){
    echo date("d/m/y");
}

