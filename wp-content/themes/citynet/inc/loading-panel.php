<?php $type =  get_query_var('name'); ?>

<?php if ($type == 'domestic'): ?>

    <template id="full-loading-template">
        <aside id="full-loading" v-show="shared.searchState == 'loading'">
            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
            <p class="search-info">
                <?php _e('Search in','citynet') ?>
                <span>{{shared.searchInfo.origin[0]}}</span>
                <?php _e('To ','citynet') ?>
                <span>{{shared.searchInfo.destination[0]}}</span>
                <?php _e('in','citynet') ?>
                <span class="ltr">{{shared.departing_fa}}</span>
                <template v-if="shared.searchInfo.date.length>1"><?php _e('To ','citynet') ?></template>
                <span class="ltr" v-if="shared.searchInfo.date.length>1">{{shared.searchInfo.date[1]}}</span>
                <?php _e('For','citynet') ?>
                <span>{{shared.searchInfo.adult}} <?php _e('Adult','citynet') ?></span>
                <span v-if="shared.searchInfo.child>0"><?php _e('and','citynet') ?> {{shared.searchInfo.child}} <?php _e('Child','citynet') ?></span>
                <span v-if="shared.searchInfo.infant>0"><?php _e('and','citynet') ?> {{shared.searchInfo.infant}} <?php _e('Infant','citynet') ?></span>
                ...
            </p>
            <?php
            if (citynet_option('domestic_loading')) {
                echo '<ul>';
                while (have_rows('domestic_loading','option')) { the_row();
                    echo '<li>' . get_sub_field('txt') . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </aside>
    </template>

<?php elseif($type == 'outbound'): ?>

<!-- search template to full loading   -->

    <template id="full-loading-template">
        <aside id="full-loading" v-show="shared.searchState == 'loading'">
            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
            <div class="search-info">
                <p style="text-align:center;" v-if=" shared.formFlightType == 'multi-way'">
                    <?php _e('Search in','citynet') ?>
                    <span>{{shared.complete_origin}}</span>
                    <?php _e('To ','citynet') ?>
                    <span>{{shared.complete_dest}}</span>
                    <?php _e('in','citynet') ?>
                    <span class="ltr">{{shared.searchInfo.date[0]}}</span>
                    <?php _e('and','citynet') ?>
                    <span>{{shared.searchInfo.origin[1]}}</span>
                    <?php _e('To ','citynet') ?>
                    <span>{{shared.searchInfo.destination[1]}}</span>
                    <?php _e('in','citynet') ?>
                    <span class="ltr">{{shared.searchInfo.date[1]}}</span>

                    <!--                <template v-if="shared.searchInfo.date.length>1">به</template>-->
                    <!--                <span class="ltr" v-if="shared.searchInfo.date.length>1">{{shared.searchInfo.date[1]}}</span>-->
                    <?php _e('For','citynet') ?>
                    <span>{{shared.searchInfo.adult}} <?php _e('Adult','citynet') ?></span>
                    <span v-if="shared.searchInfo.child>0"><?php _e('and','citynet') ?> {{shared.searchInfo.child}} <?php _e('Child','citynet') ?></span>
                    <span v-if="shared.searchInfo.infant>0"><?php _e('and','citynet') ?> {{shared.searchInfo.infant}} <?php _e('Infant','citynet') ?></span>
                    ...
                </p>

                <p style="text-align:center;" v-if="shared.formFlightType == 'two-way' || shared.formFlightType == 'one-way'">
                    <?php _e('Search in','citynet') ?>
                    <span>{{ shared.complete_origin}}</span>
                    <?php _e('To ','citynet') ?>
                    <span>{{ shared.complete_dest }}</span>
                    <?php _e('in','citynet') ?>
                    <span class="ltr">{{shared.searchInfo.date[0]}}</span>

                    <template v-if="shared.searchInfo.date.length>1"><?php _e('To ','citynet') ?></template>
                    <span class="ltr" v-if="shared.searchInfo.date.length > 1">{{shared.searchInfo.date[1]}}</span>
                    <?php _e('For','citynet') ?>
                    <span>{{shared.searchInfo.adult}} <?php _e('Adult','citynet') ?></span>
                    <span v-if="shared.searchInfo.child > 0"><?php _e('and','citynet') ?> {{shared.searchInfo.child}} <?php _e('Child','citynet') ?></span>
                    <span v-if="shared.searchInfo.infant > 0"><?php _e('and','citynet') ?> {{shared.searchInfo.infant}} <?php _e('Infant','citynet') ?></span>
                    ...
                </p>
            </div>
            <?php
            if ( citynet_option( 'outbound_loading' ) ) {
                echo '<ul>';
                while (have_rows('outbound_loading','option')) { the_row();
                    echo '<li>' . get_sub_field('txt') . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </aside>

    </template>
<?php elseif ($type=='cip'): ?>
    <template id="full-loading-template">
        <aside id="full-loading" v-show="shared.searchState == 'loading'">
            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
            <p class="search-info">
                <?php _e('Search','citynet') ?> CIP
                <span>{{shared.destination}}</span>
                <template v-if="shared.searchInfo.date.length>1"><?php _e('To ','citynet') ?></template>
                <span class="ltr" v-if="shared.searchInfo.date.length>1">{{shared.searchInfo.date[1]}}</span>
                <?php _e('For','citynet') ?>
                <span>{{shared.searchInfo.adult}} <?php _e('Adult','citynet') ?></span>
                <span v-if="shared.searchInfo.child > 0"><?php _e('and','citynet') ?> {{shared.searchInfo.child}} <?php _e('Child','citynet') ?></span>
                <span v-if="shared.searchInfo.infant > 0"><?php _e('and','citynet') ?> {{shared.searchInfo.infant}} <?php _e('Infant','citynet') ?></span>
                ...
            </p>
            <?php
            if (citynet_option('domestic_loading')) {
                echo '<ul>';
                while (have_rows('domestic_loading','option')) { the_row();
                    echo '<li>' . get_sub_field('txt') . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </aside>
    </template>
<?php elseif ($type=='insurance'): ?>
    <template id="full-loading-template">
        <aside id="full-loading" v-show="shared.searchState == 'loading'">
            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
            <p class="search-info">
                <?php _e('Looking for travel insurance for','citynet') ?>
                {{shared.country}}
                ...
            </p>
            <?php
            if (citynet_option('domestic_loading')) {
                echo '<ul>';
                while (have_rows('domestic_loading','option')) { the_row();
                    echo '<li>' . get_sub_field('txt') . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </aside>
    </template>

<?php elseif ($type=='foreign-hotel'): ?>

<template id="full-loading-template">
    <aside id="full-loading" v-show="shared.searchState == 'loading'">
        <div class="loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>

        <p class="search-info">

            <?php _e('Search','citynet') ?>
        <span>{{type}} {{name}}</span>
            <?php _e('From Date','citynet') ?>
         <span>{{dateIn}}</span>
            <?php _e('To Date','citynet') ?>
         <span>{{dateOut}}</span>
            <?php _e('For a period','citynet') ?>
         <span>{{diffDays}}</span>
            <?php _e('For','citynet') ?>
         <span>{{totalAdult}}</span>
            <?php _e('People','citynet') ?> <?php _e('Adult','citynet') ?>
         <span v-if="totalChild > 0"> <?php _e('and','citynet') ?> {{totalChild}}  <?php _e('Child','citynet') ?></span>
         <span>در {{no_of_rooms}} اتاق</span>
         </p>
        <?php
        if ( citynet_option( 'hotel_loading' ) ) { ?>
        <ul>
            <?php while (have_rows('hotel_loading','option')): the_row() ?>
            <li><?php the_sub_field('txt') ?></li>
            <?php endwhile; ?>
        </ul>
        <?php } ?>
    </aside>
</template>

<?php elseif ($type=='local-hotel'): ?>
<template id="full-loading-template">
    <aside id="full-loading" v-show="shared.searchState == 'loading'">
        <div class="loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
             <p class="search-info">
            <?php _e('Search','citynet') ?>
            <span>{{type}} {{name}}</span>
            <?php _e('From Date','citynet') ?>
            <span>{{dateIn}}</span>
            <?php _e('To Date','citynet') ?>
            <span>{{dateOut}}</span>
            <?php _e('For a period','citynet') ?>
            <span>{{diffDays}}</span>
            <?php _e('For','citynet') ?>
            <span>{{totalAdult}}</span>
            <?php _e('People','citynet') ?> <?php _e('Adult','citynet') ?>
            <span v-if="totalChild > 0"> <?php _e('and','citynet') ?> {{totalChild}}  <?php _e('Child','citynet') ?></span>
            <span>در {{no_of_rooms}} اتاق</span>
            </p>
        <div class="search-info">
            <?php _e('Please wait a bit, the system is receiving the best hotel rates','citynet') ?>.
        </div>
        <?php
        if ( citynet_option( 'hotel_loading_local' ) ) { ?>
            <ul>
                <?php while (have_rows('hotel_loading_local','option')): the_row() ?>
                    <li><?php the_sub_field('txt') ?></li>
                <?php endwhile; ?>
            </ul>
        <?php } ?>
    </aside>
</template>

<?php elseif ($type=='transfer'): ?>
    <template id="full-loading-template">
        <aside id="full-loading" v-show="shared.searchState == 'loading'">
            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
            <p class="search-info">
                <?php _e('Search in','citynet') ?>
                <span>{{shared.origin}}</span>
                <?php _e('To','citynet') ?>
                <span>{{shared.destination}}</span>
                <?php _e('in','citynet') ?>
                <span class="ltr">{{shared.searchInfo.deptDate}}</span>
                <template v-if="shared.searchType == 2"><?php _e('To','citynet') ?></template>
                <span class="ltr"
                      v-if="shared.searchType == 2 && shared.searchInfo.retDate">{{shared.searchInfo.retDate}}</span>
                ...
            </p>
            <?php
            if (citynet_option('transfer_loading')) {
                echo '<ul>';
                foreach (citynet_option('transfer_loading') as $text) {
                    echo '<li>' . $text['text'] . '</li>';
                }
                echo '</ul>';
            }
            ?>
        </aside>
    </template>



<?php endif ?>