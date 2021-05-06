<?php
add_action( 'rest_api_init', 'wp_api_post_forms_endpoints' );
function wp_api_post_forms_endpoints() {
    global $wp_rest_server;
  register_rest_route( 'postForm', '/v2', array(
        'methods' => 'GET',
        'callback' => 'form_callback',
        'args' => array(),
        'methods' => WP_REST_Server::CREATABLE
    ));
    register_rest_route( 'saveForm', '/v2', array(
        'methods' => 'GET',
        'callback' => 'save_callback',
        'methods' => WP_REST_Server::CREATABLE
    ));
    register_rest_route( 'subs', '/v2', array(
        'methods' => 'GET',
        'callback' => 'subs',
        //'methods' => WP_REST_Server::CREATABLE
    ));
}
function form_callback( $request_data ) {
$data = $request_data->get_params();
$url = 'https://mediamaze.leadbyte.co.uk/api/submit.php?returnjson=yes&campid=&PLEVIN&credit-score=Unsure&'.$data['data'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}
function save_callback( $request_data ) {
    global $wpdb;
    $data = json_encode( array_shift($request_data->get_params()), JSON_PRETTY_PRINT);
    $wpdb->insert( 
        $wpdb->prefix.'form_submits', 
        array( 
            'submission' => $data, 
        ), 
        array( 
            '%s', 
            '%d' 
        ) 
    ); 
    return 'done';
}
function subs( ) {
    global $wpdb;
    $table = $wpdb->prefix . 'form_submits';
    $custom_users = $wpdb->get_results("SELECT * FROM $table");
    echo json_encode($custom_users);
}