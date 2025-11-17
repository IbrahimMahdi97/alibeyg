<?php
/**
 * Template Name: جستجوی تور
 *
 *
 * @package Citynet
 */

get_header();

$search_query = [
    'country' => null,
    'city' => null,
    'duration_from' => null,
    'duration_to' => null,
    'budget_from' => null,
    'budget_to' => null,
    'discount' => null,
    'tour_category' => null,
    'trip_type' => null,
];

$cities = null;

if (!empty($_GET['ts_country']) && $_GET['ts_country'] != '-1') {
    $search_query['country'] = (int)$_GET['ts_country'];
    $cities = get_posts(array(
        'post_type' => 'city',
        'orderby' => 'meta_value_num date',
        'meta_key' => 'priority',
        'nopaging' => true,
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'country',
                'value' => $search_query['country'],
                'compare' => '='
            )
        )
    ));
}
if (!empty($_GET['ts_city']) && $_GET['ts_city'] != '-1') {
    $search_query['city'] = (int)$_GET['ts_city'];
}
if (!empty($_GET['duration_from'])) {
    $search_query['duration_from'] = (int)$_GET['duration_from'];
}
if (!empty($_GET['duration_to'])) {
    $search_query['duration_to'] = (int)$_GET['duration_to'];
}
if (!empty($_GET['budget_from'])) {
    $search_query['budget_from'] = (int)str_replace(',', '', $_GET['budget_from']);
}
if (!empty($_GET['budget_to'])) {
    $search_query['budget_to'] = (int)str_replace(',', '', $_GET['budget_to']);
}
if (!empty($_GET['discount'])) {
    $search_query['discount'] = (int)$_GET['discount'];
}
if (!empty($_GET['tour_category'])) {
    $search_query['tour_category'] = [];
    foreach ($_GET['tour_category'] as $item) {
        array_push($search_query['tour_category'], (int)$item);
    }
}
if (!empty($_GET['trip_type'])) {
    $search_query['trip_type'] = $_GET['trip_type'];
}

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title"><?php the_title() ?></h1>
        </header><!-- .page-header -->

        <aside id="tour-search">
            <form action="" novalidate>
                <?php if (is_fa()) : ?>
                    <div class="form-group">
                        <label for="ts-country"><?php _e('Destination Country', 'citynet'); ?></label>
                        <select name="ts_country" class="form-control" id="ts-country">
                            <option value="-1" selected><?php _e('Choose', 'citynet'); ?></option>
                            <?php
                            $args = array(
                                'post_type' => 'country',
                                'orderby' => 'meta_value_num date',
                                'meta_key' => 'priority',
                                'nopaging' => true,
                                'posts_per_page' => -1,
                            );
                            $countries = get_posts($args);
                            foreach ($countries as $country) { ?>
                                <option
                                        value="<?php echo $country->ID ?>" <?php echo ($search_query['country'] == $country->ID) ? 'selected' : ''; ?>><?php echo $country->post_title ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ts-city"><?php _e('Destination City', 'citynet'); ?></label>
                        <select name="ts_city" class="form-control" id="ts-city">
                            <option value="-1" selected><?php _e('Choose', 'citynet'); ?></option>
                            <?php
                            if ($cities) {
                                foreach ($cities as $city) { ?>
                                    <option
                                            value="<?php echo $city->ID ?>" <?php echo ($search_query['city'] == $city->ID) ? 'selected' : ''; ?>><?php echo $city->post_title ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                <?php else : ?>
                    <div class="form-group">
                        <label for="ts-city"><?php _e('Destination City', 'citynet'); ?></label>
                        <select name="ts_city" class="form-control" id="ts-city">
                            <option value="-1" selected><?php _e('Choose', 'citynet'); ?></option>
                            <?php
                            $args = array(
                                'post_type' => 'city',
                                'orderby' => 'meta_value_num date',
                                'meta_key' => 'priority',
                                'nopaging' => true,
                                'posts_per_page' => -1,
                            );
                            $cities = get_posts($args);
                            foreach ($cities as $city) { ?>
                                <option
                                        value="<?php echo $city->ID ?>" <?php echo ($search_query['city'] == $city->ID) ? 'selected' : ''; ?>><?php echo $city->post_title ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="duration-from"><?php _e('Trip Duration (nights)', 'citynet'); ?></label>
                    <input class="form-control numeric" id="duration-from" type="text"
                           name="duration_from" placeholder="<?php _e('From (just the number)', 'citynet'); ?>"
                           value="<?php echo $search_query['duration_from'] ?>">
                    <input class="form-control numeric" type="text"
                           name="duration_to" placeholder="<?php _e('To (just the number)', 'citynet'); ?>"
                           value="<?php echo $search_query['duration_to'] ?>">
                </div>
                <div class="form-group">
                    <label for="budget-from"><?php _e('Trip Budget ($)', 'citynet'); ?></label>
                    <input class="form-control numeric money" id="budget-from" type="text"
                           name="budget_from" placeholder="<?php _e('From (just the number)', 'citynet'); ?>"
                           value="<?php echo $search_query['budget_from'] ?>">
                    <input class="form-control numeric money" type="text"
                           name="budget_to" placeholder="<?php _e('To (just the number)', 'citynet'); ?>"
                           value="<?php echo $search_query['budget_to'] ?>">
                </div>
                <div class="form-group">
                    <label><?php _e('Discount', 'citynet'); ?></label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="discount" value="1"
                            <?php echo(isset($search_query['discount']) ? 'checked' : ''); ?>> <?php _e('Discounted Tours', 'citynet'); ?>
                    </label>
                </div>
                <div class="form-group">
                    <label><?php _e('Trip Type', 'citynet'); ?></label>
                    <?php
                    if (is_fa()) {
                        $field = get_field_object('field_57bbd2c300922');
                    } else {
                        $field = get_field_object('field_57bd387aca109');
                    }
                    if ($field) {
                        foreach ($field['choices'] as $k => $v) { ?>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="trip_type[]"
                                    <?php echo (!empty($search_query['trip_type']) && in_array($k, $search_query['trip_type'])) ? 'checked' : ''; ?>
                                       value="<?php echo $k ?>"> <?php echo $v ?>
                            </label>
                        <?php }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label><?php _e('Tour Type', 'citynet'); ?></label>
                    <?php
                    if(is_fa()) {
                        $tour_category = get_terms('tour-category');
                    } else {
                        $tour_category = get_terms('irantour-category');
                    }
                    foreach ($tour_category as $term) { ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="tour_category[]"
                                <?php echo (!empty($search_query['tour_category']) && in_array($term->term_id, $search_query['tour_category'])) ? 'checked' : ''; ?>
                                   value="<?php echo $term->term_id ?>"> <?php echo $term->name ?>
                        </label>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary"><?php _e('Search', 'citynet'); ?></button>
            </form>
        </aside>


        <?php
        $args = array(
            'post_type' => (is_fa()) ? 'tour' : 'irantour',
            'orderby' => 'meta_value_num date',
            'meta_key' => 'priority',
            'nopaging' => true,
        );
        $args['meta_query'] = [];
        // country
        if (!empty($search_query['country'])) {
            array_push($args['meta_query'], array(
                    'key' => 'countries',
                    'value' => '"' . $search_query['country'] . '"',
                    'compare' => 'LIKE',
                )
            );
        }
        // city
        if (!empty($search_query['city'])) {
            array_push($args['meta_query'], array(
                    'key' => 'cities',
                    'value' => '"' . $search_query['city'] . '"',
                    'compare' => 'LIKE',
                )
            );
        }
        // duration
        if (!empty($search_query['duration_from']) && !empty($search_query['duration_to'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_duration',
                    'value' => array($search_query['duration_from'], $search_query['duration_to']),
                    'type' => 'numeric',
                    'compare' => 'BETWEEN',
                )
            );
        } elseif (!empty($search_query['duration_from'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_duration',
                    'value' => $search_query['duration_from'],
                    'type' => 'numeric',
                    'compare' => '>=',
                )
            );
        } elseif (!empty($search_query['duration_to'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_duration',
                    'value' => $search_query['duration_to'],
                    'type' => 'numeric',
                    'compare' => '<=',
                )
            );
        }
        // budget
        if (!empty($search_query['budget_from']) && !empty($search_query['budget_to'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_price',
                    'value' => array($search_query['budget_from'], $search_query['budget_to']),
                    'type' => 'numeric',
                    'compare' => 'BETWEEN',
                )
            );
        } elseif (!empty($search_query['budget_from'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_price',
                    'value' => $search_query['budget_from'],
                    'type' => 'numeric',
                    'compare' => '>=',
                )
            );
        } elseif (!empty($search_query['budget_to'])) {
            array_push($args['meta_query'], array(
                    'key' => 's_price',
                    'value' => $search_query['budget_to'],
                    'type' => 'numeric',
                    'compare' => '<=',
                )
            );
        }
        // departure date
        if (!empty($search_query['discount'])) {
            array_push($args['meta_query'], array(
                    'key' => 'off_price',
                    'value' => '',
                    'compare' => '!=',
                )
            );
        }
        // trip type
        if (!empty($search_query['trip_type'])) {
            $temp = [];
            foreach ($search_query['trip_type'] as $type) {
                array_push($temp, array(
                        'key' => 'trip_type',
                        'value' => '"' . $type . '"',
                        'compare' => 'LIKE',
                    )
                );
            }
            array_push($args['meta_query'], array_merge(array(
                'relation' => 'OR'
            ), $temp));
        }
        // tour category
        if (!empty($search_query['tour_category'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => (is_fa()) ? 'tour-category' : 'irantour-category',
                    'field' => 'id',
                    'terms' => $search_query['tour_category'],
                    'operator' => 'IN',
                )
            );
        }
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            ?>

            <ul class="isotope">
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <?php
                    get_template_part('template-parts/content', 'box');
                    ?>

                <?php endwhile; ?>
            </ul>

        <?php else : ?>

            <div class="col-12 col-sm-8 col-md-9">
                <div class="alert alert-danger">
                    <?php _e('None of our tours matches your search. Please refine your filters and try again.', 'citynet') ?>
                </div>
            </div>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
