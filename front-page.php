<?php
/*
Template Name: HomeNew
*/

get_header();

$args_blog = array(
    'post_type' => 'post',
    'posts_per_page' => 3
);
$req_blog = new WP_Query($args_blog); ?>

<section class="front-page mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-9">
                <div class="title">
                    Derniers articles
                    <img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
                </div>
                <?php if ($req_blog->have_posts()) : ?>
                    <div class="home-news row">
                        <?php while ($req_blog->have_posts()) : $req_blog->the_post(); ?>
                            <div class="col-12 col-sm-6 col-md-4 item">
                                <div class="item-content">
                                    <div class="item-header">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="news-img" src="<?= get_img_article() ?>" alt="Image de l'article">
                                        </a>
                                        <div class="px-4 py-3 news-content">
                                            <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p class="news-content m-0">
                                                <?php $content = get_the_content();
                                                        echo wp_trim_words($content, '10'); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item-footer px-2 py-2 text-right">
                                        <a class="news-link btn btn-primary" href="<?php the_permalink(); ?>"><span>Lire la suite <span class="arrow">»</span></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                            wp_reset_postdata(); ?>
                    </div>

                <?php endif; ?>

                <div class="separator-container">
                    <div class="mask"></div>
                    <div class="separator"></div>
                    <div class="wrap-button">
                        <a href="<?= get_page_link(get_page_by_title('articles')->ID); ?>" class="btn btn-primary more-news mw-100">
                            <span class="align-middle" style="line-height: 43px;">Voir plus d'articles</span>
                        </a>
                    </div>
                </div>

                <div class="title">
                    Association CIAO
                    <img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
                </div>
                <div class="row present-ciao">
                    <div class="col-md-12 col-lg-6 avoid-right-pad mb-4 mb-lg-0">
                        <div class="img-maquette-1"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 avoid-left-pad mb-4 mb-lg-0">
                        <div class="white-card-front p-5">
                            <h2 class="news-title">Qui sommes-nous ?</h2>
                            <p>CIAO est une association qui met à disposition les compétences de professionnel·le·s reconnu·e·s dans leur domaine spécifique pour répondre aux besoins d’information et d’orientation des jeunes romands de 11-20 ans dans une multitude de domaines. A travers son site ciao.ch, elle offre une aide ponctuelle sans prise en charge thérapeutique et oriente, si nécessaire, vers une démarche plus approfondie auprès d’institutions actives au niveau local.</p>
                            <div class="button-wrap w-100">
                                <a href="<?= get_page_link(get_page_by_title('association')->ID); ?>" class="btn btn-primary more-news mw-100">
                                    <span class="align-middle" style="line-height: 43px;">En savoir plus »</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Col-9: news -->
            <div class="sidebar col-12 col-lg-3">
                <div class="sidenav-cta text-center">
                    <a href="http://ciao.ch" class="btn btn-primary more-news mw-100">
                        <span class="align-middle" style="line-height: 43px;">Visiter ciao.ch</span>
                    </a>
                    <a href="<?= get_page_link(get_page_by_path('soutenir')->ID); ?>" class="btn btn-primary more-news mw-100">
                        <span class="align-middle" style="line-height: 43px;">Soutenir ciao</span>
                    </a>
                </div>

                <a class="twitter-timeline d-none d-lg-block" data-lang="fr" data-theme="light" data-chrome="noscrollbar" data-height="1150" data-link-color="#7CD0F5" href="https://twitter.com/AssociationCiao?ref_src=twsrc%5Etfw"></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div> <!-- Col-3 : sidebar -->

        </div> <!-- /row -->
    </div> <!-- /container -->
</section>

<?php get_footer(); ?>