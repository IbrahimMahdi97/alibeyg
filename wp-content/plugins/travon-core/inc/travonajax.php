<?php
/**
 * @Packge     : Travon
 * @Version    : 1.0
 * @Author     : Travon
 * @Author URI : https://www.angfuzsoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function travon_core_essential_scripts( ) {
    wp_enqueue_script('travon-ajax',TRAVON_PLUGDIRURI.'assets/js/travon.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'travon-ajax',
    'travonajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'travon-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','travon_core_essential_scripts');


// travon Section subscribe ajax callback function
add_action( 'wp_ajax_travon_subscribe_ajax', 'travon_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_travon_subscribe_ajax', 'travon_subscribe_ajax' );

function travon_subscribe_ajax( ){
  $apiKey = travon_opt('travon_subscribe_apikey');
  $listid = travon_opt('travon_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'travon-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'travon').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'travon').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'travon').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'travon').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'travon').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_travon_addtocart_notification','travon_addtocart_notification');
add_action('wp_ajax_nopriv_travon_addtocart_notification','travon_addtocart_notification');
function travon_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}