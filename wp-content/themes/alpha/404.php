<?php
    get_header();
?>

<body <?php body_class();?> >
<div class="container errorview">
    <div class="row">
        <div class="col align-self-center">
            <h1 class="text-center">
                <?php
                _e ("Sorry we couldn't found what you were looking for!");
                ?>
            </h1>
        </div>
    </div>
</div>
</body>

<?php
get_footer();
