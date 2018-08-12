<?php
/**
 Template Name: About Page Template
 *
 */
get_header();
?>


<body <?php body_class();?>>
<?php get_template_part("/template-parts/about-page/hero-page");?>

<div class="posts">
    <?php
    while(have_posts()):
        the_post();
        ?>
        <div class="post" <?php post_class();?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center">
                            <?php the_title();?>
                        </h2>
                        <p class="text-center">
                            <strong><?php the_author();?></strong><br/>
                            <?php echo get_the_date();?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");
                        ?>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <p>
                            <?php
                            if(has_post_thumbnail()){
                                $thumbnail_url = get_the_post_thumbnail_url(null, "large");
//                                            echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                printf('<a href="%s" data-featherlight="image">',$thumbnail_url) ;
                                the_post_thumbnail("large", array("class"=>"img-fluid"));
                                echo '</a>';
                            }
                            ?>
                        </p>
                        <?php
                        the_content();

                        ?>
                    </div>

                </div>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>

<div class="container new-pagination">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <?php
            the_posts_pagination(array(
                "screen_reader_text" =>' ',
                "prev_text"=>"<i class=\"fas fa-arrow-left\"></i>",
                "next_text"=>"<i class=\"fas fa-arrow-right\"></i>"
            ));
            ?>
        </div>
    </div>
</div>


<?php get_footer();?>
