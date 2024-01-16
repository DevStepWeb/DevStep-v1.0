<?php
get_header();

/* Template Name: Home */
$editables = get_itens('editables');
?>
<main>
    <section class="hero">

        <div class="hero_content container">

            <h1 data-aos="fade-down" data-aos-delay="200">
                <?= get_field('texto_principal') ?>
            </h1>
            <p data-aos="fade-up" data-aos-delay="300">
                <?= get_field('descricao_principal') ?>
            </p>
            <div class="btn_hero" data-aos="fade-in" data-aos-delay="500"><a href="#">Entre em contato!</a></div>

            <div class="icon_devstep"><img src="<?= THEME_URI ?>/assets/img/devstep.svg" alt="devstep"
                    data-aos="fade-in" data-aos-delay="800"></div>
        </div>
        <div class="hero_objects">
            <span data-aos="fade-in" class="span_i" data-aos-delay="400"></span>
            <span data-aos="fade-in" class="span_a" data-aos-delay="550"></span>
            <span data-aos="fade-in" class="span_e" data-aos-delay="650"></span>
        </div>
    </section>

    <section class="make">
        <div class="make_content container">
            <div class="make_content_left">
                <div class="title">
                    <h1 data-aos="fade-down" data-aos-delay="400">
                        <?= $editables['about']['title']; ?>
                    </h1>
                    <span data-aos="fade-left" data-aos-delay="700">
                        <?= $editables['about']['description']; ?>
                    </span>
                </div>
                <div class="make_content_left_list">

                    <?php
                    $index = 1;
                    foreach ($editables['about']['itens'] as $about) {
                        ?>
                        <article class="make_content_list_item" data-aos="fade-up" data-aos-delay="<?= $index ?>00">
                            <h1><span>.
                                    <?= $index; ?>
                                </span>
                                <?= $about['title'] ?>
                            </h1>
                            <p>
                                <?= $about['subtitle'] ?>
                            </p>
                        </article>
                        <?php
                        $index++;
                    }
                    ?>
                </div>

            </div>
            <div class="make_content_right parallax" data-aos="fade-in" data-aos-delay="1500">
                <img src="<?= THEME_URI ?>/assets/img/icon_about.svg" class="layer" data-depth="0.5"
                    data-parallax="{'y' : '30'}" alt="">
            </div>
        </div>
    </section>

    <section class="cases">
        <div class="cases_content ">
            <div class="container">
                <div class="title">
                    <h1>
                        <?= $editables['projects']['title']; ?>
                    </h1>
                    <span>
                        <?= $editables['projects']['description']; ?>
                    </span>
                </div>
            </div>

            <div class="cases_content_list">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $argsworks = array(
                            'post_type' => 'works',
                            'posts_per_page' => 12,
                        );
                        $loopworks = new WP_Query($argsworks);
                        ?>
                        <?php
                        $index = 5;
                        while ($loopworks->have_posts()):
                            $loopworks->the_post();

                            ?>
                            <li class="cases_content_list_item swiper-slide" data-aos="fade-down"
                                data-aos-delay="<?= $index ?>00">
                                <picture class="thumb">
                                    <?php the_post_thumbnail('full'); ?>
                                </picture>
                                <div class="info">
                                    <span>
                                        <?= get_field('subtitulo'); ?>
                                    </span>
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                    <p>
                                        <?= get_field('descricao_do_projeto'); ?>
                                    </p>
                                </div>
                            </li>

                            <?php $index++; endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="depoiments">
        <div class="depoiments_content container">
            <div class="title">
                <h1 data-aos="fade-down" data-aos-delay="400">
                    <?= $editables['depoiments']['title']; ?>
                </h1>
                <span data-aos="fade-down" data-aos-delay="700">
                    <?= $editables['depoiments']['description']; ?>
                </span>
            </div>
            <div class="swiper depoiments_slider">
                <div class="swiper-wrapper">
                    <?php
                    $argsworks = array(
                        'post_type' => 'depoiments',
                        'posts_per_page' => 12,
                    );
                    $loopworks = new WP_Query($argsworks);
                    ?>
                    <?php
                    $index = 5;
                    while ($loopworks->have_posts()):
                        $loopworks->the_post(); 
                        ?>
                        <li class="depoiments_content_item swiper-slide" data-aos="fade-down"
                            data-aos-delay="<?= $index ?>00">
                            <p>
                                <?php the_content(); ?>
                            </p>
                            <figcaption>
                                <picture class="thumb">
                                    <?php the_post_thumbnail('full'); ?>
                                </picture>
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                            </figcaption>
                        </li>

                        <?php $index++; endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="icon-depoiments parallax" data-aos="fade-in" data-aos-delay="1500">
                <img src="<?= THEME_URI ?>/assets/img/about_icon.png" class="layer" data-depth="0.5"
                    data-parallax="{'y' : '30'}" alt="about_icon">
            </div>
            <div class="icon-depoiments-n parallax" data-aos="fade-in" data-aos-delay="1500">
                <img src="<?= THEME_URI ?>/assets/img/depoiment_icon.svg" class="layer" data-depth="0.5"
                    data-parallax="{'y' : '30'}" alt="about_icon">
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="faq_content container">
        <div class="title">
                <h1 data-aos="fade-down" data-aos-delay="400">
                    <?= $editables['faq']['title']; ?>
                </h1>
                <span data-aos="fade-down" data-aos-delay="700">
                    <?= $editables['faq']['description']; ?>
                </span>
            </div>     
            <ul class="faq-list flex flex_wrap">
        <?php
        $index = 5;
        foreach ($editables['faq']['itens'] as $faq) {
            ?>
            <li class="faq-item" data-aos="fade-up" data-aos-delay="<?php echo $index; ?>00">
                <div class="faq-toggle">
                    <h1>
                        <?php echo $faq['title'] ?>
                    </h1>
                    <div class="faq-icon">
                        <span class="arrow"></span>
                    </div>
                </div>
                <div class="faq-description">
                    <p>
                        <?php echo $faq['text'] ?>
                    </p>
                </div>
            </li>
            <?php
            $index++;
        }
        ?>
    </ul>   <div class="icon-faq-n parallax" data-aos="fade-in" data-aos-delay="1500">
                <img src="<?= THEME_URI ?>/assets/img/depoiment_icon.svg" class="layer" data-depth="0.5"
                    data-parallax="{'y' : '30'}" alt="about_icon">
            </div>
        </div>

    </section>

    <section class="warning" id="contact">
        <div class="warning_content container"> 
            <h1 data-aos="fade-down" data-aos-delay="600">Vamos começar o seu projeto agora mesmo?</h1> 
            <div data-aos="fade-up" data-aos-delay="1300">
                <a href="#" class="btn_home">
                    Faça seu orçamento!
                    <img src="<?= THEME_URI ?>/assets/img/arrow-right-line.svg" alt="arrow" width="25px" height="25px">
                </a>
            </div>
            <div class="right_icon" data-aos="fade-in" data-aos-delay="800">
                <img src="<?= THEME_URI ?>/assets/img/meia-luia-devstep.png" class="layer" alt="">
            </div>
        </div>
    </section>
</main>
<?php

get_footer(); ?>