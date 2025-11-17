(function($){
    "use strict";
    
    let $travon_page_breadcrumb_area      = $("#_travon_page_breadcrumb_area");
    let $travon_page_settings             = $("#_travon_page_breadcrumb_settings");
    let $travon_page_breadcrumb_image     = $("#_travon_breadcumb_image");
    let $travon_page_title                = $("#_travon_page_title");
    let $travon_page_title_settings       = $("#_travon_page_title_settings");

    if( $travon_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--travon-page-breadcrumb-settings").show();
        if( $travon_page_settings.val() == 'global' ) {
            $(".cmb2-id--travon-breadcumb-image").hide();
            $(".cmb2-id--travon-page-title").hide();
            $(".cmb2-id--travon-page-title-settings").hide();
            $(".cmb2-id--travon-custom-page-title").hide();
            $(".cmb2-id--travon-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--travon-breadcumb-image").show();
            $(".cmb2-id--travon-page-title").show();
            $(".cmb2-id--travon-page-breadcrumb-trigger").show();
    
            if( $travon_page_title.val() == '1' ) {
                $(".cmb2-id--travon-page-title-settings").show();
                if( $travon_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--travon-custom-page-title").hide();
                } else {
                    $(".cmb2-id--travon-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--travon-page-title-settings").hide();
                $(".cmb2-id--travon-custom-page-title").hide();
    
            }
        }
    } else {
        $travon_page_breadcrumb_area.parents('.cmb2-id--travon-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $travon_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--travon-page-breadcrumb-settings").show();
            if( $travon_page_settings.val() == 'global' ) {
                $(".cmb2-id--travon-breadcumb-image").hide();
                $(".cmb2-id--travon-page-title").hide();
                $(".cmb2-id--travon-page-title-settings").hide();
                $(".cmb2-id--travon-custom-page-title").hide();
                $(".cmb2-id--travon-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--travon-breadcumb-image").show();
                $(".cmb2-id--travon-page-title").show();
                $(".cmb2-id--travon-page-breadcrumb-trigger").show();
        
                if( $travon_page_title.val() == '1' ) {
                    $(".cmb2-id--travon-page-title-settings").show();
                    if( $travon_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--travon-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--travon-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--travon-page-title-settings").hide();
                    $(".cmb2-id--travon-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--travon-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $travon_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--travon-page-title-settings").show();
            if( $travon_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--travon-custom-page-title").hide();
            } else {
                $(".cmb2-id--travon-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--travon-page-title-settings").hide();
            $(".cmb2-id--travon-custom-page-title").hide();

        }
    });

    //page settings
    $travon_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--travon-breadcumb-image").hide();
            $(".cmb2-id--travon-page-title").hide();
            $(".cmb2-id--travon-page-title-settings").hide();
            $(".cmb2-id--travon-custom-page-title").hide();
            $(".cmb2-id--travon-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--travon-breadcumb-image").show();
            $(".cmb2-id--travon-page-title").show();
            $(".cmb2-id--travon-page-breadcrumb-trigger").show();
    
            if( $travon_page_title.val() == '1' ) {
                $(".cmb2-id--travon-page-title-settings").show();
                if( $travon_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--travon-custom-page-title").hide();
                } else {
                    $(".cmb2-id--travon-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--travon-page-title-settings").hide();
                $(".cmb2-id--travon-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $travon_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--travon-custom-page-title").hide();
        } else {
            $(".cmb2-id--travon-custom-page-title").show();
        }
    });
    
})(jQuery);