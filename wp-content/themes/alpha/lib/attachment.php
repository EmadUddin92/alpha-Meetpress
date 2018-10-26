<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );



function alpha_attachments($attachments){
    $fields = array(
        array(
        'name' => 'title',
        'type' => 'text',
        'label' => __('Title','alpha'),
    ),
    );

     $args = array(

         'label'         => 'featured slider',
         'post_type'     => array( 'post'),
         'filetype'      => array( "image"),
         'note'          => 'Add slider images',
         'button_text'   => __( 'Attach Files', 'alpha' ),
         'fields'        => $fields,

     );

    $attachments->register('slider', $args );

}

add_action( 'attachments_register', 'alpha_attachments' );


function alpha_testimonial_attachments($attachments){
    $fields = array(
        array(
            'name' => 'title',
            'type' => 'text',
            'label' => __('Name','alpha'),
        ),
        array(
            'name' => 'position',
            'type' => 'text',
            'label' => __('Position','alpha'),
        ),
        array(
            'name' => 'company',
            'type' => 'text',
            'label' => __('Company','alpha'),
        ),
        array(
            'name' => 'testimonal',
            'type' => 'textarea',
            'label' => __('Testimonial','alpha'),
        ),
    );

    $args = array(

        'label'         => 'testimonial slider',
        'post_type'     => array( 'page'),
        'filetype'      => array( "image"),
        'note'          => 'Add Testimonials',
        'button_text'   => __( 'Attach Files', 'alpha' ),
        'fields'        => $fields,

    );

    $attachments->register('testimonials', $args );

}

add_action( 'attachments_register', 'alpha_testimonial_attachments' );