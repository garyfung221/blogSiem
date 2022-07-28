<?php
include "../event_function.php";
include "db.php";
include "logs_db.php";
session_start();


?>


<?php
//sending from the sidebar.php form
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //other function
 
   login_check_event($username,$password);
    check_spam();
    if($username==null&&$password==null){
        echo "<a href='../index.php'>Please enter the username or password ! Click here to go back !</a>";
        return -1;
    }elseif($username==null){
        echo "<a href='../index.php'>Please enter the username ! Click here to go back !</a>";
return -1;
    }elseif($password==null){
            echo "<a href='../index.php'>Please enter the password ! Click here to go back !</a>";
      return -1;
    }
    

}




//if want to avoid sql injection , we can use mysqli_real_escape_string , but no gonna use there
$query = "SELECT * FROM users WHERE username ='$username'";
$login_user_query = mysqli_query($connection,$query);
$login_user_count = mysqli_num_rows($login_user_query);


if($login_user_count<1){
    echo "<a href='../index.php'>Password or Account Invalid ! Click here to go back !</a>";
    return -1;
}else{



if(!$login_user_query){
    die("QUERY ERROR OR FAILED ! ".mysqli_error($connection));
}

while($row = mysqli_fetch_array($login_user_query)){

    if($row['username']==null||empty($row['username'])){
        echo "<a href='../index.php'>Password or Account Invalid ! Click here to go back !</a>";
        return -1;
    }else{
        $login_username = $row['username'];
    }

    $login_user_id = $row['user_id'];

    $login_user_password = $row['user_password'];
    $login_user_firstname = $row['user_firstname'];
    $login_user_lastname = $row['user_lastname'];
    $login_user_role = $row['user_role'];
    


}





if($login_username == $username){
    if(password_verify($password,$login_user_password)||($login_user_password == $password)){
        nSpam();
        $_SESSION['username'] = $login_username;
        $_SESSION['user_firsname'] = $login_user_firstname;
        $_SESSION['user_lastname'] = $login_user_lastname;
        $_SESSION['user_role'] = $login_user_role;
    
    //into admin folder
header("Location: ../admin");
}else{
    echo "<a href='../index.php'>Password or Account Invalid ! Click here to go back !</a>";
    return -1;
}
}

}
?>



<?php 
function check_spam(){

    global $con;
    $time=time()-30;
    $client_ip=getIpAddr();

    //check login count
    $query = "select count(*) as total_count from check_spam where try_time>$time and client_ip='$client_ip'";
    $result = mysqli_query($con,$query);
   $row=mysqli_fetch_assoc($result);
   $total_count=$row['total_count'];
   $try_time=time();
   mysqli_query($con,"insert into check_spam(client_ip,try_time) values('$client_ip','$try_time')");

   if($total_count==4){
    spam();
   }

}

function nSpam(){
    global $con;
    $client_ip=getIpAddr();
    mysqli_query($con,"delete from check_spam where client_ip='$client_ip'");
}





function spam(){
    global $con;
    $client_ip=getIpAddr();
    $status = "close";
    $action = "spam";
    $feature_path = "login";
    $query = "INSERT INTO event_logs (event_ip,status,feature_path,event_action,created) VALUES ('$client_ip','$status','$feature_path','$action',now())";
    $event_query = mysqli_query($con,$query);

}

function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}

?>