<?php include "includes/logs_db.php"; ?>

<form action="" method="post">
    <input type="text" name="username" >Username
    <input type="password" name="password" >Password
<input type="submit" name = "submit" value="submit">
</form>

<?php if(isset($_POST['submit'])){
    $time=time()-30;
    $client_ip=getIpAddr();

    //check login count
    $query = "select count(*) as total_count from check_spam where try_time>$time and client_ip='$client_ip'";
    $result = mysqli_query($con,$query);
   $row=mysqli_fetch_assoc($result);
   $total_count=$row['total_count'];

   if($total_count==3){
    echo "To many failed login attempts. Please login after 30 sec";
}

   echo $total_count;

   $username = $_POST['username'];
   $password = $_POST['password'];
  
   if($username=='a'&&$password=='123'){
    mysqli_query($con,"delete from check_spam where client_ip='$client_ip'");

   }else{
    $try_time=time();
    mysqli_query($con,"insert into check_spam(client_ip,try_time) values('$client_ip','$try_time')");
   }

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


