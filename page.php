<?php get_header(); ?>

<section>
    <div class="container">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row mb-3">
                    <div class="col-12">


                        <div class="title">
                            <?php
                                    global $pagename;
                                    if ($pagename == "ciao-ch") {
                                        the_title();
                                        echo " offre";
                                    } else {
                                        the_title();
                                    }
                                    ?>
                            <img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
                        </div>

                        <div class="white-card">

                            <?php the_content(); ?>
                        </div>
                    </div> <!-- /row -->
                <?php endwhile; ?>

            <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <p>Il n'y a pas de résultats.</p>
                    </div>
                </div>
            <?php endif; ?>
                </div> <!-- /white-card -->
    </div> <!-- /container -->
</section>

<?php get_footer(); ?>