<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="container">
    <div class="authorsection authorpage">
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
</div>
<div class="posts text-center">
    <?php
    while (have_posts()){
        the_post();

       ?>
        <a href="<?php the_permalink(); ?>"> <h2><?php the_title(); ?></h2></a>
       <?php
    }
    ?>

    <div class="container new-pagination">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <?php
                the_posts_pagination(array(
                    "screen_reader_text" => ' ',
                    "prev_text" => "<i class=\"fas fa-arrow-left\"></i>",
                    "next_text" => "<i class=\"fas fa-arrow-right\"></i>"
                ));
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>