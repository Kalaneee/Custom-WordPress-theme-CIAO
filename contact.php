<?php
/*
Template Name: Commander
*/

get_header(); ?>

<section id="contact">
    <div class="container">

        <div class="title"> Contact
            <img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 contact-left d-flex">
                <div class="white-card">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title mb-2">Si vous voulez contacter directement une membre de l’équipe : </h6>
                            <ul>
                                <li><a href="mailto:marjory.winkler@ciao.ch">marjory winkler</a>, directrice</li>
                                <li><a href="mailto:anne.dechambre@ciao.ch">Anne Dechambre</a>, responsable de site</li>
                            </ul>
                            <p class="card-text">Vous pouvez également nous contacter à l’aide du formulaire ci-dessous.</p>
                        </div>

                    </div>
                    <?php
                    wp_reset_query(); // necessary to reset query
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 contact-right d-flex">
                <div class="white-card">
                    <div class="card">
                        <h3 class="mt-2"><a>Association Romande CIAO</a></h3>
                        <p Av. de Riant-Mont 1</br> 1004 Lausanne</br> Tél: <a href="tel:+41213119206">+ 41 21 311 92 06</a></br>
                            Email: <a href="mailto:info@ciao.ch">info@ciao.ch</a></br>
                            CCP: 10-5261-6</p>
                    </div>
                    <hr>
                    <iframe class=".embed-responsive-item" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBPI6J6kvlnEK3ALA-hJjzLzzDZ_32lyXs
							    &q=AvDeRiantMont+1,Lausanne+VD" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</section>

<?php get_footer(); ?>