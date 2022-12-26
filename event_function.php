<?php
include "../includes/logs_db.php";

function login_check_event($username,$password){

    global $con;

$feature_path = "login";

if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $user_ip_address = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $user_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $user_ip_address = $_SERVER["REMOTE_ADDR"];
}



if(($username=='<script>')||($password=='<script>')){

    $action = "xss";
    $status = "close";

 
    
}else if(($username=="/")||($username==',')||($username=='\'')||($username=='"')||($username==')')||($username=='(')||($username==';')||($password=='/')||($password==',')||($password=='\'')||($password=='"')||($password==')')||($password=='(')||($password==';')||($username=="' or 1=1#--")){

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

