<?php
$alpha_layout_class = "col-md-8";
$alpha_text_class   = "";
if (!is_active_sidebar("sidebar-1")) {
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_text_class   = "text-center";
}
?>

<?php get_header(); ?>
<body <?php body_class(array("first_class", "second_class")); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="container">
    <div class="row">
        <div class="<?php echo $alpha_layout_class; ?>">
            <div class="posts">
                <?php
                while (have_posts()):
                    the_post();
                    ?>
                    <div class="post" <?php post_class(array("first_class", "second_class")); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="post-title <?php echo $alpha_text_class; ?>">
                                        <?php the_title(); ?>
                                    </h2>
                                    <p class="<?php echo $alpha_text_class; ?>">
                                        <strong><?php the_author_posts_link(); ?></strong><br/>
                                        <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    echo get_the_tag_list("<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>");
                                    ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="slider">
                                        <?php
                                        if (class_exists('Attachments')) {
                                            $attachments = new Attachments('slider');
                                            if ($attachments->exist()) {
                                                while ($attachment = $attachments->get()) { ?>
                                                    <div>
                                                        <?php echo $attachment = $attachments->image('large'); ?>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <?php
                                        if (!class_exists('Attachments')) {
                                            if (has_post_thumbnail()) {
                                                $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                                echo '<a href="' . $thumbnail_url . '" data-featherlight="image">';
                                                printf('<a href="%s" data-featherlight="image">', $thumbnail_url);
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo '</a>';
                                            }
                                        }

                                        the_post_thumbnail("alpha-square-new");
                                        echo "<br>";


                                        ?>
                                    </div>
                                    <?php
                                    the_content();
                                    wp_link_pages();
                                    /*next_post_link();
                                    echo "<br>";
                                    previous_post_link();*/
                                    ?>
                                </div>

                                <div class="container authorsection">
                                    <div class="row">
                                        <div class="col-sm-2 authorimage">
                                            <?php
                                            echo get_avatar(get_the_author_meta("id"));
                                            ?>
                                        </div>
                                        <div class="col-sm-10">
                                            <h4><?php echo get_the_author_meta("display_name") ?></h4>
                                            <p><?php echo get_the_author_meta("description") ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    //comments_template();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>

        </div>
        <?php
        if (is_active_sidebar("sidebar-1")):
            ?>
            <div class="col-md-4">
                <?php
                if (is_active_sidebar('sidebar-1')) {
                    dynamic_sidebar('sidebar-1');
                }
                ?>
            </div>

        <?php endif; ?>
    </div>

<?php get_footer(); ?>