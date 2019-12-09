<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-12543305-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-12543305-4');
    </script>

    <!-- General -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Valentin Kaelin">
    <meta name="keywords" content="Association, romande, ciao">
    <meta name="description" content="CIAO est une association qui met à disposition les compétences de professionnel·le·s reconnu·e·s dans leur domaine spécifique pour répondre aux besoins d’information et d’orientation des jeunes romands de 11-20 ans dans une multitude de domaines.">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">

        <div class="header">
            <div class="top">
                <div class="n-container">
                    <a href="https://associationciao.ch/" class="slogan">Association <b>CIAO</b></a>
                    <div style="float: right;">
                        <a href="https://twitter.com/associationciao" target="_blank">
                            <i class="fab fa-twitter icon"></i>
                        </a>
                        <a href="https://www.facebook.com/ciao.ch/" target="_blank">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                        <a href="https://www.instagram.com/ciao.ch/" target="_blank">
                            <i class="fab fa-instagram icon"></i>
                        </a>
                        <a href="https://www.youtube.com/user/wwwciaoch/feed" target="_blank">
                            <i class="fab fa-youtube icon"></i>
                        </a>
                        <a href="https://www.ciao.ch/" target="_blank">
                            <i class="fas fa-globe icon"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalSearch" class="clickable">
                            <i class="fas fa-search icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="n-container">
                <div class="logo">
                    <a href="https://associationciao.ch/"><img src="<?= get_template_directory_uri(); ?>/assets/logo.png"></a>
                </div>
            </div>
        </div>

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="n-container-small">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php
                    wp_nav_menu(array(
                        'menu'            => 'top-menu',
                        'theme_location'  => 'primary',
                        'depth'           => 2,
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'navbar',
                        'menu_class'      => 'nav navbar-nav ml-auto',
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>

                </div> <!-- /container -->
            </nav>
        </header>

        <!-- Modal -->
        <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="modalSearchLabel" aria-hidden="true">
            <div class="modal-dialog mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSearchLabel">Rechercher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="search" method="get" id="searchform" class="searchform" action="https://associationciao.ch/">
                            <div class="form-row">
                                <div class="col">
                                    <input class="form-control" type="text" value="" name="s" id="s">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary btn-search" type="submit" id="searchsubmit" value="Rechercher"><span>Rechercher</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>