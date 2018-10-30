<?php

/*
  Plugin Name: WattCycling admin
  Version: 1.0
  Author: Rahul Singh
  Author URI:
  Description: WattCycling admin panel
 */
session_start();

function wpse27856_set_content_type() {
    return "text/html";
}

class WattCycling {

    // Constructor
    function __construct() {

        add_action('admin_menu', array($this, 'wpa_add_menu'));
        register_activation_hook(__FILE__, array($this, 'wpa_install'));
        register_deactivation_hook(__FILE__, array($this, 'wpa_uninstall'));
        add_action('admin_head', array($this,'admin_style'));
        
    }

    /*
     * Actions perform at loading of admin menu
     */

    function wpa_add_menu() {


        $page_hook = add_menu_page('WattCycling', 'WattCycling', 'manage_options', 'manage_wattcycling_configurations', array(
            __CLASS__,
            'manage_wattcycling_configurations'
                ), 'dashicons-admin-page', '1');
    }

    function my_ob_start() {
        ob_start();
    }

    function manage_wattcycling_configurations() {
        if ($_POST) {

            $fields = array(    
              '%PROEFTRAINING_DATUM%,0' => @$_POST['trial-date'],
              '%PROEFTRAINING_TEKST%,0' => @$_POST['trial-training-text'],
              '%TIJDSDUUR_PROEFTRAINING%,0' => @$_POST['tt_from_to'],
              '%BEGINTIJD_PROEFTRAINING%,0' => @$_POST['tt_start_time'],
              
            );
            $postData = array(
                'email' => $_POST['email'],

                "p[${list}]" => 23,  // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
                "status[${list}]" => 1       // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
            );
            WattCycling::submit_active_campaign(23, $_POST['email'],$postData,'contact_sync',$fields);

            $automationData = array(
                "contact_email" => $_POST['email'], // include this or contact_id
                "automation" => "14,15,16",
            );

            WattCycling::submit_active_campaign(23, $_POST['email'],$automationData,'automation_contact_remove',$fields);// remove from the automation

            WattCycling::submit_active_campaign(23, $_POST['email'],$automationData,'automation_contact_add',$fields);// Add to the automation
            echo '<div class="notice notice-success is-dismissible">
                    <p>Sync successfully.</p>
                </div>';
        }
        include plugin_dir_path(__FILE__) . '/views/settings.php';
    }

    /*
     * Actions perform on de-activation of plugin
     */

    function wpa_uninstall() {
        
    }
    function admin_style() { 
        wp_enqueue_style('admin-styles', plugins_url("css/wc-admin.css", __FILE__));
        
    }
    public function submit_active_campaign($list,$email,$post,$api_end_point,$fields){
          
        $key = '6b63499f41e755d003f7da682fdb94058fa99e0af0c5f9661dda3c1067a7ac40a5f1d9ab';
        $url = 'https://wattcyclingamstel.api-us1.com';

        $params = [
            'api_key' => $key,
            'api_action' => $api_end_point,
            'api_output' => 'json'
        ];
        

        foreach ($fields as $key => $value) {
            $post["field[%${key}%,0]"] = $value;
        }

        

        $query = WattCycling::as_query_string($params);
        $data = WattCycling::as_query_string($post);

        // define a final API request - GET
        $api = $url . '/admin/api.php?' . $query;

        $request = curl_init($api); // initiate curl object

        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

       $response = (string)curl_exec($request); // execute curl post and store results in $response

        if (!curl_errno($request)) {
            $info = curl_getinfo($request);

        } else {
            (curl_error($request));
        }

        curl_close($request); // close curl object

        
    }

    public function as_query_string($array){
        return implode('&', array_map(function ($k, $v) {
            return urlencode($k) . '=' . urlencode($v);
        }, array_keys($array), $array));
    }

}

$wattCycling = new WattCycling();
