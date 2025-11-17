<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Citynet
 */

if (!is_page_template('print-tour.php')) { ?>

    </div><!-- #content -->
    <?php if (citynet_get_device_type() != 'computer' && !citynet_is_panel_pages() && !isset($_COOKIE['pwa-notif']) && get_field('pwa-title', 'option')) { ?>
        <div id="pwa-notif">
            <div class="d-flex">
                <svg class="fa-times" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#8e8e8e" d="M4.70703 6.12162C4.31628 5.73087 4.31628 5.09787 4.70703 4.70712C5.09778 4.31638 5.73078 4.31638 6.12153 4.70712L18.8498 17.4354C19.2405 17.8261 19.2405 18.4591 18.8498 18.8499C18.459 19.2406 17.826 19.2406 17.4353 18.8499L4.70703 6.12162Z" />
                    <path fill="#8e8e8e" d="M17.4353 4.70712C17.826 4.31638 18.459 4.31638 18.8498 4.70712C19.2405 5.09787 19.2405 5.73087 18.8498 6.12162L6.12153 18.8499C5.73078 19.2406 5.09778 19.2406 4.70703 18.8499C4.31628 18.4591 4.31628 17.8261 4.70703 17.4354L17.4353 4.70712Z" />
                </svg>
                <span class="d-block mr-2"><?= get_field('pwa-title', 'option') ?></span>
            </div>
            <a href="<?= get_field('pwa-domain', 'option') ?>"><?= is_fa() ? 'کلیک کنید' : 'Click' ?></a>
        </div>
    <?php } ?>
    <?php if (get_field('answer-men', 'option') && !citynet_is_panel_pages()) :  ?>
        <div id="whatsapp-contact">
            <div class="footer-whatsapp-share">
                <i class="icon-whatsApp whatsapp m-0"></i>
                <svg class="close" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#fff" d="M4.70703 6.12162C4.31628 5.73087 4.31628 5.09787 4.70703 4.70712C5.09778 4.31638 5.73078 4.31638 6.12153 4.70712L18.8498 17.4354C19.2405 17.8261 19.2405 18.4591 18.8498 18.8499C18.459 19.2406 17.826 19.2406 17.4353 18.8499L4.70703 6.12162Z" />
                    <path fill="#fff" d="M17.4353 4.70712C17.826 4.31638 18.459 4.31638 18.8498 4.70712C19.2405 5.09787 19.2405 5.73087 18.8498 6.12162L6.12153 18.8499C5.73078 19.2406 5.09778 19.2406 4.70703 18.8499C4.31628 18.4591 4.31628 17.8261 4.70703 17.4354L17.4353 4.70712Z" />
                </svg>
            </div>
            <div class="footer-whatsapp-share-box">
                <div class="footer-whatsapp-share-header">
                    <div class="footer-share-header-heading">
                        <?php the_field('whatsapp-share-heading', 'option'); ?>
                        <i class="<?= (is_plugin_active('citynet/citynet.php')) ? 'icon-whatsApp' : 'lni lni-whatsapp' ?> whatsapp"></i>
                    </div>
                    <div class="footer-share-header">
                        <?php the_field('whatsapp-share-desc', 'option'); ?>
                    </div>
                    <div class="footer-whatsapp-share-footer">
                        <p><?php the_field('whatsapp-share-second-share', 'option'); ?></p>
                    </div>
                    <?php if (have_rows('answer-men', 'option')) {
                        $counter = 1;
                        while (have_rows('answer-men', 'option')) {
                            the_row(); ?>
                            <div class="footer-whatsapp-share-main-box">
                                <a target="_blank" rel="nofollow external" href="<?php if (wp_is_mobile()) : ?>https://wa.me/<?php the_sub_field('link-whatsapp'); ?><?php else : ?>https://web.whatsapp.com/send?phone=<?php the_sub_field('link-whatsapp'); ?>&text=پشتیبانی خرید بلیط هواپیما و هتل<?php endif; ?>">
                                    <div class="footer-whatsapp-share-right-side">
                                        <i class="icon-whatsApp"></i>
                                        <div class="footer-whatsapp-share-main-box-name">
                                            <span class="footer-share-name">
                                                <?php the_sub_field('name') ?>
                                            </span>
                                            <span class="footer-share-position">
                                                <?php the_sub_field('position'); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="footer-whatsapp-share-left-side">
                                        <?= wp_get_attachment_image(get_sub_field('avatar-image'), 'thumbnail'); ?>
                                    </div>
                                </a>
                            </div>
                    <?php $counter++;
                        }
                    } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <div class="container pt-5 pb-3">
                <div class="menu-wrapper d-flex flex-column align-items-center align-items-lg-start pt-xl-4">
                    <img src="<?= get_field('logo', 'option'); ?>">
                    <div class="mt-lg-5"> <?php wp_nav_menu(array('theme_location' => 'footer')); ?> </div>
                </div>
                <div class="m-3 mx-lg-0 my-lg-3 p-4 d-lg-flex position-relative address-box">
                    <div class="tel-box<?= is_rtl() ? ' ' : '-en'; ?>">
                        <?php if (get_field('mobile', 'option')) :
                            $tel_number = mk_tr_num(get_field('mobile', 'option'));
                            $new_tel_number = preg_replace('/^0/', '+98', $tel_number); ?>
                          <a href="tel:<?= $tel_number; ?>"><?=  mk_tr_num($tel_number, get_locale()?(trim(substr(get_locale(), 0, 2))): 'fa' ) ; ?></a>
                        <?php endif; ?>
                    </div>
                    <span class="mx-lg-3 address-box">
                        <?php if (get_field('address_txt', 'option')) :
                            $footer_adrress = get_field('address_txt', 'option'); ?>
                            <?= is_fa() ? mk_tr_num($footer_adrress, 'fa') : $footer_adrress; ?>
                        <?php endif; ?>
                    </span>
                    <span class="google-map">
                        <?php if (get_field('address-google-map', 'option')) :
                            $google_map = mk_tr_num(get_field('address-google-map', 'option'));
                            $google_map_name = mk_tr_num(get_field('address-google-name', 'option')); ?>
                            <a href="<?= $google_map; ?>">(<?= $google_map_name?>)</a>
                        <?php endif; ?>
                    </span>
                    <div class="social-network<?= is_rtl() ? ' ' : '-en'; ?>">
                        <?php citynet_generate_social_networks(null, ['list-unstyled', 'text-center', 'd-flex', 'align-items-center', 'justify-content-center'], ['d-inline-block', 'mx-1'], true) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="namad-box mt-5 mt-lg-4">
            <div class="d-flex justify-content-center position-relative cn-arrow-footer">
                <i class="icon-arrow-up position-absolute"></i>
                <?php include 'images/background-arrow.php'; ?>
            </div>
            <div class="container d-lg-flex justify-content-between py-lg-3">
                <?php if (!wp_is_mobile()) { ?>
                    <div class="copyright ">
                        <?php if (is_fa()) { ?>
                            <span class="mt-4 m-0 d-flex"> © تمامی حقوق محفوظ و متعلق به <p class="name mx-1"><?php bloginfo('name') ?></p> می باشد.</span>
              
                        <?php } else { ?>
                            <span class="mt-4 m-0 d-flex">Copyright © <p class="name mx-1"> <?php bloginfo('name') ?> </p> . All rights reserved.</span>
                  
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="mt-3 mt-lg-0 d-flex justify-content-center logo-box">

                <ul id="logo-licenses" class="list-unstyled">
                        <?php //Show Enamad logo
                            if (citynet_option('enamad-activate') && citynet_option('enamad-id') && citynet_option('enamad-code')) { ?>
                                <li class="<?= is_fa() ? 'mr-2' : 'ml-2' ?>"><img id="logo-enamad" src="https://trustseal.enamad.ir/logo.aspx?id=<?= citynet_option('enamad-id'); ?>&Code=<?= citynet_option('enamad-code'); ?>" onclick='window.open("https://trustseal.enamad.ir/?id=<?= citynet_option('enamad-id'); ?>&amp;Code=<?= citynet_option('enamad-code'); ?>")' alt="نماد اعتماد الکترونیک"></li>
                            <?php } ?>
                            <?php if (have_rows('footer_links','option')):  ?>
                                <?php while (have_rows('footer_links','option')): the_row(); ?>
                                    <?php $image = get_sub_field('image'); ?>
                                    <?php $link = get_sub_field('link'); ?>
                                    <li class="<?= is_fa() ? 'mr-2' : 'ml-2' ?>">
                                        <img style="cursor: pointer;" class="mx-1" src="<?= esc_url($image); ?>" alt="<?= esc_attr($image['alt']); ?>" onclick="window.open('<?= esc_url($link); ?>', '_blank')">
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                </div>
                <?php if (wp_is_mobile()) { ?>
                    <div class="copyright">
                        <?php if (is_fa()) { ?>
                            <span class="mt-4 m-0 d-flex"> © تمامی حقوق محفوظ و متعلق به <p class="name mx-1"><?php bloginfo('name') ?></p> می باشد.</span>
             
                        <?php } else { ?>
                            <span class="mt-4 m-0 d-flex">Copyright © <p class="name mx-1"> <?php bloginfo('name') ?> </p> . All rights reserved.</span>
                         
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </footer><!-- #colophon -->

    </div><!-- #page -->

<?php }

wp_footer(); ?>
</body>

</html>