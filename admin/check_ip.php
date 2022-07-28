<?php include "functions.php";?>
<?php include "adminIncludes/admin_header.php"; ?>
<?php include "../includes/logs_db.php";?>


<link rel="stylesheet" href="../css/page_check_ip.css" />

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "adminIncludes/admin_navigation.php";?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
            
                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">

        

                    <h1 class="page-header">
                            Welcome to admin 
                            <small><?php echo $_SESSION['username'];?></small>
                            <?php // include "time.php" ?>
                        </h1>

                

           </div>
                </div>
                <!-- /.row -->

     

<!--widgets-->
       
                <!-- /.row -->
                

<!--TOP COUNT-->


<!--Show the logs dynamic data in dashboard-->
<?php 
$query = "SELECT * FROM visitor_logs";
$count_logs_query = mysqli_query($con,$query);
$logs_count = mysqli_num_rows($count_logs_query);
?>

<!--Show the events dynamic data in dashboard-->
<?php 
$query = "SELECT * FROM event_logs";
$count_events_query = mysqli_query($con,$query);
$event_count = mysqli_num_rows($count_events_query);

       ?>



<!--Show the monitor list dynamic data in dashboard-->
<?php 
$query = "SELECT * FROM record_ip";
$count_monitor_query = mysqli_query($con,$query);
$monitor_count = mysqli_num_rows($count_monitor_query);

       ?>




<!--Show the threats dynamic data in dashboard-->
<?php 
$query = "SELECT * FROM event_logs WHERE event_action='xss' OR event_action='injection'";
$count_threats_query = mysqli_query($con,$query);
$threats_count = mysqli_num_rows($count_threats_query);

       ?>



<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $logs_count; ?></div>
                        <div>Logs</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary"> <!--colour-->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i> <!--icon-->
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $event_count; ?></div>
                      <div>Events</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $monitor_count; ?></div>
                        <div> Monitor List</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $threats_count; ?></div>
                         <div>Threats</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>







       




                <!-- /.row -->


<!--End widgets-->
            </div>
            <!-- /.container-fluid -->



        </div>
        <!-- /#page-wrapper -->


      <!-- Check iP-->

        <div class="row">
  <div class="col-sm-9">
    

  <div class="search">
    <div class="container">

        <div class="col-md-4 mx-auto">
          <div class="txt text-center">

            <h1>Search</h1>
            <p>Please input the IP query</p>
       
          </div>
          
          <form class="form" action="" method="post">
            <input type="text" class="input me-2" name="ip" placeholder="Enter a IP address/domain " required />
            <input type="submit" name="search" class="btn" value="Search"/>
          </form>

</br>


        <!--Bookmark the query-->
        <?php 
if(isset($_POST['add_db'])){

    $user_ip = $_POST['ip'];
    $record_description = $_POST['description'];
    if(strlen($user_ip)<7){
        echo "Please input the correct IP or Domain !";
        return -1;
    }
    if(empty($record_description)){
        echo "The description can't be empty !";
        return -1;
    }

    $data = file_get_contents("http://ip-api.com/json/{$user_ip}?fields=status,message,continent,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,currency,isp,org,as,mobile,proxy,hosting,query");
    $json = json_decode($data,true);
 


   $record_contient = $json['continent'];
   $record_country_code = $json['countryCode'];
   $record_region = $json['region'];
   $record_region_name = $json['regionName'];
    $record_city = $json['city'];
    $record_zip = $json['zip'];
    $record_location = $json['lat'].",".$json['lon'];
    $record_timezone = $json['timezone'];
    $record_isp = $json['isp'];
    $record_org = $json['org'];
    $record_as = $json['as'];
    $record_mobile_cellular = json_encode($json['mobile']);
    $record_proxy = json_encode($json['proxy']);
    $record_hosting = json_encode($json['hosting']);


    $query = "INSERT INTO record_ip (description,ip_adress,continent,country_code,region,region_name,city,zip,location,timezone,isp,org,as_number,mobile_cellular,proxy,hosting,created)
    VALUES ('$record_description','$user_ip','$record_contient','$record_country_code','$record_region','$record_region_name','$record_city','$record_zip','$record_location','$record_timezone','$record_isp','$record_org','$record_as','$record_mobile_cellular','$record_proxy','$record_hosting',now())";

    $bookmark_search = mysqli_query($con,$query);

    echo "The record have been insert into database !";
}

?>


      
<?php


if (isset($_POST['search'])) {

$user_ip = $_POST['ip'];
if(strlen($user_ip)<7){
    echo "Please input the correct IP or Domain !";
    return -1;
}



   $data = file_get_contents("http://ip-api.com/json/{$user_ip}?fields=status,message,continent,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,currency,isp,org,as,mobile,proxy,hosting,query");
   $json = json_decode($data,true);


   ?>
   </br>

   <iframe
  width="350"
  height="350"
  frameborder="0" style="border:0"
  referrerpolicy="no-referrer-when-downgrade"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCzGtuwjdeohgcFavrPz6NUp2s82TU3qEQ&q=<?php echo $json['regionName'].$json['city'];?>&zoom=15&language=en"
  allowfullscreen>
</iframe>
<img width="350" src="https://cache.ip-api.com/<?php echo $json['lon']; ?>,<?php echo $json['lat'];?>,10" class="w-20"/>


      </div>
      <div class="col-xs-6 col-sm-6">
      <div class="col-md-4 mx-auto">
            <table class="item table table-bordered h-100 p-4 first">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>


              <tbody>
              <tr>
                  <td>Query IP:</td>
                  <td><?php echo $json['query']; ?></td>
                </tr>
              <tr>
                  <td>Status:</td>
                  <?php if($json['status']=='success'){
                    $status_color = "green";
                }else{
                    $status_color = "red";
                }
                  ?>
                  <td bgcolor=<?php echo $status_color; ?>><?php echo $json['status']; ?></td>
                </tr>
                <tr>
                  <td>Contient:</td>
                  <td><?php echo $json['continent']; ?></td>
                </tr>
                <tr>
                  <td>CountryCode:</td>
                  <td><?php echo $json['countryCode']; ?></td>
                </tr>
                <tr>
                  <td>Region:</td>
                  <td><?php echo $json['region']; ?></td>
                </tr>
                <tr>
                  <td>RegionName:</td>
                  <td><?php echo $json['regionName']; ?></td>
                </tr>
                <tr>
                  <td>City:</td>
                  <td><?php echo $json['city']; ?></td>
                </tr>
                <tr>
                  <td>Zip:</td>
                  <td><?php echo $json['zip']; ?></td>
                </tr>
                <tr>
                  <td>Location:</td>
                  <td><?php echo $json['lat'].",".$json['lon']; ?></td>
                </tr>
                <tr>
                  <td>TimeZone:</td>
                  <td><?php echo $json['timezone']; ?></td>
                </tr>
                <tr>
                  <td>ISP:</td>
                  <td><?php echo $json['isp']; ?></td>
                </tr>
                <tr>
                  <td>ORG:</td>
                  <td><?php echo $json['org']; ?></td>
                </tr>
                <tr>
                  <td>AS:</td>
                  <td><?php echo $json['as']; ?></td>
                </tr>
                <tr>
                  <td>MOBILE(cellular):</td>
                  <td><?php echo json_encode($json['mobile']); ?></td>
                </tr> 
                <tr>
                  <td>Proxy:</td>
                  <td><?php echo json_encode($json['proxy']); ?></td>
                </tr>
                <tr>
                  <td>Hosting:</td>
                  <td><?php echo json_encode($json['hosting']); ?></td>
                </tr>
              
              </tbody>
            </table>
          </div>
          
<?php } ?>

      </div>
    </div>
    </br>
    <form class="form" action="" method="post">
<input type="text" class="input me-2" name="description" placeholder="Enter a Description " required />
<input type="text" class="input me-1" name="ip" placeholder="Enter a IP address/domain " required />
 <input style="background-color:brown" type="submit" name="add_db" class="btn" value="Bookmark"/>
</form>
  </div>
</div>



                         <!-- End Check IP-->

                   


                        </div>
                <!-- /.row Page Heading End -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>