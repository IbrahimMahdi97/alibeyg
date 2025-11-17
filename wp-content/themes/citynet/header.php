<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Citynet
 */


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" href="<?= get_template_directory_uri() . '/images/favicon.ico'; ?>" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header <?= wp_is_mobile() ? '' : 'container' ?>" role="banner">
            <?php if (wp_is_mobile()) { ?>
                <div id="reservation-menu" class="d-flex"></div>
            <?php } ?>
            <div class="main-content clearfix <?= wp_is_mobile() ? 'mobile py-0' : 'desktop pl-lg-4 pr-lg-4'; ?> <?php if (!is_front_page()) echo 'other'; ?>">
                <div class="container p-md-0">
                    <? if ( !get_field('logo2', 'option') ) : ?>
                        <div class="row mx-1 mx-lg-0 first-row <?= wp_is_mobile() ? 'position-relative' : ''; ?>">
                            <div class="logo  <?= wp_is_mobile() ? 'mobile mt-0 order-3' : 'desktop col-2 '; ?> <?= is_rtl() ? "mr-auto mr-lg-0 pr-lg-0" : "ml-auto ml-lg-0 pl-lg-0" ?>">
                                <?= is_front_page() ? '<h1 class="site-title">' : '<h3 class="site-title">'; ?>
                                <a class="d-flex <?= wp_is_mobile() ? 'justify-content-end' : '' ?>" href="<?= home_url('/'); ?>" rel="home" title="<?php bloginfo('name'); ?>">
                                    <?php if (get_field('logo', 'option')) : ?>
                                        <img class="d-block py-1 py-md-0 mx-lg-0 <?= is_rtl() ? 'mr-auto mr-md-0' : 'ml-auto ml-md-0' ?>" src="<?= get_field('logo', 'option') ?>" alt="<?php bloginfo('name'); ?>">
                                    <?php endif; ?>
                                </a>
                                <?= is_front_page() ? '</h1>' : '</h3>'; ?>
                            </div>
                            <div class="px-0 <?= wp_is_mobile() ? "" : "col-10 d-flex justify-content-end mt-3" ?> ">
                                <!-- language -->
                                <?php if (is_plugin_active('sitepress-multilingual-cms/sitepress.php')) : ?>
                                    <span class="d-none  lang-<?= is_rtl() ? "fa" : "en" ?> <?= wp_is_mobile() ? "position-absolute" : "" ?>">
                                        <span class="lang-title ml-5">
                                            <span class="icon-chevron-down lang-icon"></span>
                                            <span class="title">Language</span>
                                            <span class="icon-global language-box-icon"></span>
                                        </span>
                                        <div class="lang-box d-none"> <?php do_action('wpml_add_language_selector'); ?> </div>
                                    </span>
                                <?php endif; ?>
                                <!-- end language -->
                                <button class="btn menu-toggle bg-transparent p-0 order-1 col-1 pt-2 <?php if (!wp_is_mobile()) echo 'd-lg-none'; ?>"><i class="menu-icon mx-0 icon-hamburger-menu"></i><i class="close-icon icon-remove"></i></button>
                                <?php if (!wp_is_mobile()) { ?>
                                    <div id="reservation-menu" class="px-0"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row-border"></div>
                        <div class="row second-row">
                            <!-- menu -->
                            <nav id="site-navigation" role="navigation" class="<?= wp_is_mobile() ? 'mobile' : 'desktop col-lg-8 p-0'; ?>">
                                <?php wp_nav_menu([
                                    'theme_location' => 'primary',
                                    'menu_id' => 'main-menu',
                                    'container' => 'ul'
                                ]);
                                ?>
                            </nav>
                            <!-- end menu -->
                            <div class="col-lg-4 d-inline-flex justify-content-end align-items-center <?= (is_rtl()) ? '' : 'pr-0' ?>">
                                <!-- support-mobile -->
                                <?php if (citynet_option('tel-support')) : ?>
                                    <span class="suport-mobile">
                                        <a href="tel:<?= citynet_option('tel-support'); ?>">
                                            <span class="support-title"> <?= mk_tr_num('پشتیبانی 24 ساعته  :  ', is_fa() ? 'fa' : 'en'); ?> </span>
                                            <span class="tel-support"> <?= mk_tr_num(citynet_option('tel-support'), is_fa() ? 'fa' : 'en'); ?> </span>
                                        </a>
                                    </span>
                                <?php endif; ?>
                                <!-- end support mobile -->
                                <!-- mobile -->
                                <span class="d-flex justify-content-end my-auto phone-box">
                                    <?php if (!wp_is_mobile()) :
                                        $prefix_tel = citynet_option('tel-prefix');
                                        $suffix_tel = citynet_option('tel-suffix');
                                        $tel =$suffix_tel;

                                        $prefix_tel_en = citynet_option('tel-prefix-en');
                                        $suffix_tel_en = citynet_option('tel-suffix-en');
                                        $tel_en = $prefix_tel_en . '' . $suffix_tel_en;
                                    ?>
                                        <a class="header-phone d-flex" href="tel:<?= $suffix_tel; ?>">

                                        <?php $content = citynet_option('tel'); ?>
                                            <?php if (!is_rtl()) : ?>
                                                <div class="d-inline-block"> <i class="d-inline-block icon-call"></i></div>
                                               
                                                <span class="suffix-tel">
                                                    <?= mk_tr_num($suffix_tel,get_locale()? trim(substr(get_locale(), 0, 2)):'fa'); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php if (is_rtl()) : ?>
                                                <span class="suffix-tel">
                                                    <?= mk_tr_num($suffix_tel, get_locale()? trim(substr(get_locale(), 0, 2)):'fa'); ?>
                                                </span>
                                               
                                                <div class="d-inline"> <i class="icon-call"></i></div>
                                            <?php endif; ?>

                                        </a>
                                    <?php endif; ?>
                                </span>
                                <!-- end mobile -->
                            </div>
                        </div>
                    <? endif; ?>
                    <? if (get_field('logo2', 'option')  ) : ?>
                        <div class="row">
                            <? if (!wp_is_mobile()) : ?>
                                <div class="col-2 pt-2" style="flex: 0 0 11.666667%;max-width: 11.666667%;">

                                    <div class="logo  <?= is_rtl() ? "mr-auto mr-lg-0 pr-lg-0" : "ml-auto ml-lg-0 pl-lg-0" ?>">
                                        <?= is_front_page() ? '<h1 class="site-title">' : '<h3 class="site-title">'; ?>
                                        <a class="d-flex <?= wp_is_mobile() ? 'justify-content-end' : '' ?>" href="<?= home_url('/'); ?>" rel="home" title="<?php bloginfo('name'); ?>">
                                            <?php if (get_field('logo2', 'option')) : ?>
                                                <img  class="d-block py-1 py-md-0 mx-lg-0 <?= is_rtl() ? 'mr-auto mr-md-0' : 'ml-auto ml-md-0' ?>" src="<?= get_field('logo2', 'option') ?>" alt="<?php bloginfo('name'); ?>">
                                            <?php endif; ?>
                                        </a>
                                        <?= is_front_page() ? '</h1>' : '</h3>'; ?>
                                    </div>

                                </div>
                            <? endif; ?>
                            
                            <div class="<?= wp_is_mobile() ? 'col-12' : 'col-10 pt-0' ?>" style="<?= wp_is_mobile() ? '':'     flex: 0 0 88.333333%;   max-width: 88.333333%;' ?>">
                                <div class="row mx-1 mx-lg-0 first-row <?= wp_is_mobile() ? 'position-relative' : ''; ?>">
                                    <div class="logo  <?= wp_is_mobile() ? 'mobile mt-0 order-3' : 'desktop col-2 '; ?> <?= is_rtl() ? "mr-auto mr-lg-0 pr-lg-0" : "ml-auto ml-lg-0 pl-lg-0" ?>">
                                        <?= is_front_page() ? '<h1 class="site-title">' : '<h3 class="site-title">'; ?>
                                        <a class="d-flex <?= wp_is_mobile() ? 'justify-content-end' : '' ?>" href="<?= home_url('/'); ?>" rel="home" title="<?php bloginfo('name'); ?>">
                                            <?php if (get_field('logo2', 'option') && wp_is_mobile()) : ?>
                                                <img style="max-height: 66px;" class="d-block py-1 py-md-0 mx-lg-0 <?= is_rtl() ? 'mr-auto mr-md-0' : 'ml-auto ml-md-0' ?>" src="<?= get_field('logo2', 'option') ?>" alt="<?php bloginfo('name'); ?>">
                                            <?php endif; ?>
                                        </a>
                                        <?= is_front_page() ? '</h1>' : '</h3>'; ?>
                                    </div>
                                    <div class="px-0 <?= wp_is_mobile() ? "" : "col-10 d-flex justify-content-end mt-3" ?> ">
                                        <!-- language -->
                                        <?php if (is_plugin_active('sitepress-multilingual-cms/sitepress.php')) : ?>
                                            <span class="d-none lang-<?= is_rtl() ? "fa" : "en" ?> <?= wp_is_mobile() ? "position-absolute" : "" ?>">
                                                <span class="lang-title ml-5">
                                                    <span class="icon-chevron-down lang-icon"></span>
                                                    <span class="title">Language</span>
                                                    <span class="icon-global language-box-icon"></span>
                                                </span>
                                                <div class="lang-box d-none"> <?php do_action('wpml_add_language_selector'); ?> </div>
                                            </span>
                                        <?php endif; ?>
                                        <!-- end language -->
                                        <button class="btn menu-toggle bg-transparent p-0 order-1 col-1 pt-2 <?php if (!wp_is_mobile()) echo 'd-lg-none'; ?>"><i class="menu-icon mx-0 icon-hamburger-menu"></i><i class="close-icon icon-remove"></i></button>
                                        <?php if (!wp_is_mobile()) { ?>
                                            <div id="reservation-menu" class="px-0"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row-border"></div>
                                <div class="row second-row">
                                    <!-- menu -->
                                    <nav id="site-navigation" role="navigation" class="<?= wp_is_mobile() ? 'mobile' : 'desktop col-lg-8 p-0'; ?>">
                                        <?php wp_nav_menu([
                                            'theme_location' => 'primary',
                                            'menu_id' => 'main-menu',
                                            'container' => 'ul'
                                        ]);
                                        ?>
                                    </nav>
                                    <!-- end menu -->
                                    <div class="col-lg-4 d-inline-flex justify-content-end align-items-center <?= (is_rtl()) ? '' : 'pr-0' ?>">
                                        <!-- support-mobile -->
                                        <?php if (citynet_option('tel-support')) : ?>
                                            <span class="suport-mobile">
                                                <a href="tel:<?= citynet_option('tel-support'); ?>">
                                                    <span class="support-title"> <?= mk_tr_num('پشتیبانی 24 ساعته  :  ', is_fa() ? 'fa' : 'en'); ?> </span>
                                                    <span class="tel-support"> <?= mk_tr_num(citynet_option('tel-support'), is_fa() ? 'fa' : 'en'); ?> </span>
                                                </a>
                                            </span>
                                        <?php endif; ?>
                                        <!-- end support mobile -->
                                        <!-- mobile -->
                                        <span class="d-flex justify-content-end my-auto phone-box">
                                            <?php if (!wp_is_mobile()) :
                                                $prefix_tel = citynet_option('tel-prefix');
                                                $suffix_tel = citynet_option('tel-suffix');
                                                $tel = $suffix_tel;

                                                $prefix_tel_en = citynet_option('tel-prefix-en');
                                                $suffix_tel_en = citynet_option('tel-suffix-en');
                                                $tel_en = $prefix_tel_en . '' . $suffix_tel_en;
                                            ?>
                                                <a class="header-phone d-flex" href="tel:<?= $tel; ?>">

                                                <?php $content = citynet_option('tel'); ?>
                                            <?php if (!is_rtl()) : ?>
                                                <div class="d-inline-block"> <i class="d-inline-block icon-call"></i></div>
                                               
                                                <span class="suffix-tel">
                                                    <?= mk_tr_num($suffix_tel,get_locale()? trim(substr(get_locale(), 0, 2)):'fa'); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php if (is_rtl()) : ?>
                                                <span class="suffix-tel">
                                                    <?= mk_tr_num($suffix_tel, get_locale()? trim(substr(get_locale(), 0, 2)):'fa'); ?>
                                                </span>
                                               
                                                <div class="d-inline"> <i class="icon-call"></i></div>
                                            <?php endif; ?>

                                                </a>
                                            <?php endif; ?>
                                        </span>
                                        <!-- end mobile -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>

                </div>
            </div>
        </header><!-- #masthead -->
        <?php if (is_singular('tour')) echo '<div class="container py-0">' . do_shortcode('[citynet]') . '</div>'; ?>