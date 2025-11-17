<?php

/**
 * Template Name: صفحه اصلی
 *
 * @package Citynet
 */

get_header();
$bg_image_panel = get_field('bg-image');
?>

<?php if ($bg_image_panel && !wp_is_mobile()) : ?>
    <section id="home-main-banner" class="container">
        <span class="image-banner" style="background-image:url('');"><?= wp_get_attachment_image(get_field('bg-image'),'full'); ?></span>
        <div class="border-panel">
            <div class="container mt-5">
                <?= do_shortcode('[alibeyg_travel_widget flight_url="/flight/" hotel_url="/hotel/" visa_url="/visa/"]') ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <div class="border-panel">
        <div class="container mt-4">
            <?= do_shortcode('[alibeyg_travel_widget flight_url="/flight/" hotel_url="/hotel/" visa_url="/visa/"]') ?>
        </div>
    </div>
<?php endif; ?>
<!-- 
</?php if( $sections = get_field('sections') ) : ?>
    </?php foreach (  $sections as  $section ) : ?>
        <section id="home-sections" class="container px-lg-0 pt-5 mt-lg-5">
            <div class="main-title py-3 mb-4">
                <h1 class="text-center mx-0 mt-3"></?= $section['title'] ?></h1>
            </div>
            <div class="home-slider owl-carousel owl-theme list-unstyled">
                </? foreach( $section  as $index => $posts ): 
                    foreach ($posts as $index => $post ) : 
                        $thumbnail_id = get_post_thumbnail_id($post->ID); ?>
                        <div class="px-3">
                            <div class="content-post px-2 py-2">
                                <a href="</?= get_the_permalink($post->ID) ?>" title="</?php the_title_attribute(); ?>" class="image-wrapper">
                                    </?= wp_get_attachment_image($thumbnail_id, 'full'); ?>
                                </a>
                                <div class="title"><a href="</?= get_the_permalink($post->ID) ?>"></?= $post->post_title ?></a></div>
                            </div>
                        </div>
                    </?php endforeach ;
                endforeach; ?>
            </div>
        </section>
    </?php endforeach; ?>
</?php  endif;?> -->
<?php if ($Visa_page_hp = get_field('select-page-hp')) :  ?>
    <div class="container visa-section">
        <h2><?= get_field('title') ?></h2>
        <div class="row">

            <? foreach ($Visa_page_hp as $index => $page) :
                $thumbnail_id = get_post_thumbnail_id($page->ID);
            ?>
                <div class=" col-12 col-lg-3 px-3 mb-4  ">
                    <div class="all-content-visa px-2 py-2">
                        <a href="<?= get_the_permalink($page->ID) ?>" title="<?php the_title_attribute(); ?>" class="image-wrapper">
                            <?= wp_get_attachment_image($thumbnail_id, 'full'); ?>
                        </a>
                        <div class="title"><a href="<?= get_the_permalink($page->ID) ?>"><?= $page->post_title ?></a></div>

                        <div class="date-public">
                            <!-- <span><//?= $page->post_date ?></span> -->
                        </div>
                    </div>
                </div>
            <? endforeach; ?>


        </div>
    </div>
<?php endif; ?>
<!-- Modal -->
<?php if (get_field('title-modal', 'option') || get_field('image-modal', 'option')) : ?>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"><?= get_field('title-modal', 'option') ?></h5>
                    <button type="button" style="    position: absolute; left: 0;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="<?= get_field('link-address-modal', 'option') ?>"><img src="<?= get_field('image-modal', 'option') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Modal -->
<?php if ($items = get_field('items')) : ?>
    <div class="container mb-lg-5 item-box">
        <div class="row">
            <?php foreach ($items as $item) : ?>
                <div class="col-12 col-md-3 my-3">
                    <div class="d-flex item">
                        <i class="<?= $item['icon'] ?> item-icon"></i>
                        <div class="mr-2">
                            <span class="d-block font-weight-bold"><?= $item['main-title'] ?></span>
                            <span class="d-block sub-title"><?= $item['sub-title'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<?php
get_footer();
