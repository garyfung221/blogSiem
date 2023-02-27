<?php
include "../includes/logs_db.php";

function login_check_event($username, $password){

    global $con;

    $feature_path = "login";

    // Get the user's IP address
    $user_ip_address = isset($_SERVER["HTTP_CLIENT_IP"]) ? $_SERVER["HTTP_CLIENT_IP"] : (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"]);

    // Check for XSS attack
    if(preg_match('/<script\b[^>]*>(.*?)<\/script>/is', $username) || preg_match('/<script\b[^>]*>(.*?)<\/script>/is', $password)){

        $action = "xss";
        $status = "close";

    }
    // Check for SQL injection attack
    else if(preg_match('/[\/\';:,"><()|&*]/', $username) || preg_match('/[\/\';:,"><()|&*]/', $password) || $username=="' or 1=1#--"){

        $action = "injection";
        $status = "close";

    }else{
        $action = "normal";
        $status = "open";
    }

    $query = "INSERT INTO event_logs (event_ip,status,feature_path,event_action,created) VALUES ('$user_ip_address','$status','$feature_path','$action',now())";
    $event_query = mysqli_query($con,$query);
    return;
}
