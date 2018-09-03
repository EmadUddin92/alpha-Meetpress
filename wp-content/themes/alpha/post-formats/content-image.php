<div <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p>
                    <strong><?php the_author(); ?></strong><br/>
                    <?php echo get_the_date(); ?>
                </p>
                <?php
                echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>");
                ?>
                <span class="dashicons dashicons-format-image"></span>
            </div>
            <div class="col-md-8">
                <p>
                    <?php
                    /* if(has_post_thumbnail()){
                         the_post_thumbnail("large", array("class"=>"img-fluid"));
                     }*/

                    if (has_post_thumbnail()) {
                        $thumbnail_url = get_the_post_thumbnail_url(null, "large");
//                                            echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                        printf('<a href="%s" data-featherlight="image">', $thumbnail_url);
                        the_post_thumbnail("large", array("class" => "img-fluid"));
                        echo '</a>';
                    }
                    ?>
                </p>
                <?php
                //                    if(!post_password_required()){
                //                        echo get_the_password_form();
                //                    }
                //                    else{

                //                    }

                the_excerpt();

                ?>
            </div>
        </div>

    </div>
</div>