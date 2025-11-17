<?php
/**
 * Template Name: تماس با ما
 *
 *
 * @package Citynet
 */

get_header(); 
$banner = get_field('top-banner')? get_field('top-banner'):citynet_option('default_single_top_image'); ?>

<section id="top-banner">
    <div class="wrapper">
        <?= wp_get_attachment_image($banner, 'full'); ?>
    </div>
</section>

<div id="primary" class="content-area">
    <main id="main" class="site-main container py-5 contact-page" role="main">
        
        <div class="row mb-5">
            <div class="col-12 col-lg-5 language-box">
                <header class="main-title py-3">
                    <h1 class="text-center m-0"><?= get_the_title(); ?></h1>
                    <span class="text-center d-block"><?= wp_trim_words(get_the_content(), 9, ''); ?></span>
                </header>
                <div class="wrapper px-4 pt-5 mt-1">
                    <div class="language-en">
                    <?
	                        switch (get_locale()?trim(substr(get_locale(), 0, 2)): 'fa') {
	                            case 'en':
	                               echo do_shortcode('[contact-form-7 id="3119" title="فرم تماس با ما"]');
	                                break;
	                            case 'fa':
	                                echo do_shortcode('[contact-form-7 id="370" title="فرم تماس با ما"]');
	                            break;

	                            case 'ar':
	                                echo do_shortcode('[contact-form-7 id="3121" title="فرم تماس با ما"]');
	                            break;
	                            case 'tr':
	                                echo do_shortcode('[contact-form-7 id="3120" title="فرم تماس با ما"]');
	                            break;

	                            case 'ru':
	                                echo do_shortcode('[contact-form-7 id="3121" title="فرم تماس با ما"]');
	                            break;

	                            default:
                                echo do_shortcode('[contact-form-7 id="370" title="فرم تماس با ما"]');
	                                break;
	                        }
	                        ?>

                    </div>
                </div>
            </div>
                
            <div class="col-12 col-lg-7 mt-5 pt-0">
                <div class="wrapper mt-3 pb-4 contact-info">
                    <?php $address = citynet_option('address_txt');
                    $email = antispambot(citynet_option('email'));
                    $tel = citynet_option('tel22');
                    $front_mobile =citynet_option('front-mobile');
                    $map = citynet_option('google-embed-code');
                    
                    if ($map) {
                        echo '<div id="map-wrapper">' . $map . '</div>';
                    } else { ?>
                        <div id="map-wrapper" class="is-default">
                            <img src="<?= get_template_directory_uri() . '/images/map-image.png'?>">
                        </div>
                    <?php }
                    if ($address || $email || $tel || $front_mobile) { ?>

                        <ul class="list-unstyled px-4 mb-0">
                            <?php if ($address) { ?> 
                                <li class="py-3 d-flex align-items-center">
                                    <i class="fa fa-map-marker lni-lg ml-3"></i>
                                    <?= $address; ?>
                                </li>  
                            <?php }
                            if ($tel) { ?> 
                                <li class="py-3">
                                    <i class="fa fa-phone lni-lg ml-3"></i>
                                    <a class="ltr d-inline-block" href="tel:<?= $tel; ?>"><?=mk_tr_num( $tel ,get_locale()?trim(substr(get_locale(), 0, 2)):'fa'); ?></a>
                                </li>  
                            <?php }
                                if ($front_mobile) { ?> 
                                <li class="py-3">
                                    <i class="fa fa-phone lni-lg ml-3"></i>
                                    <a class="ltr d-inline-block" href="tel:<?= $front_mobile; ?>"><?=mk_tr_num($front_mobile , get_locale()?trim(substr(get_locale(), 0, 2)):'fa') ; ?></a>
                                </li>  
                            <?php }
                            if ($email) { ?> 
                                <li class="py-3">
                                    <i class="fa fa-envelope lni-lg ml-3"></i>
                                    <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                                </li>  
                            <?php } ?>
                        </ul>

                    <?php } ?>

                </div>
               
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>