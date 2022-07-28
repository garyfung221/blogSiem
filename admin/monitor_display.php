<?php include "functions.php";?>
<?php include "adminIncludes/admin_header.php"; ?>
<?php include "../includes/logs_db.php";?>

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
                            <?php //include "time.php" ?>
                        </h1>

                <?php 
             

                $query = "SELECT COUNT(*) FROM record_ip WHERE country_code ='CA'";
                $result = mysqli_query($con,$query);
                $count = mysqli_fetch_array($result);


                $query2 = "SELECT COUNT(*) FROM record_ip WHERE country_code ='RU'";
                $result2 = mysqli_query($con,$query2);
                $count2 = mysqli_fetch_array($result2);
             

                $query3 = "SELECT COUNT(*) FROM record_ip WHERE country_code ='US'";
                $result3 = mysqli_query($con,$query3);
                $count3 = mysqli_fetch_array($result3);

                $query4 = "SELECT COUNT(*) FROM record_ip WHERE country_code ='JP'";
                $result4 = mysqli_query($con,$query4);
                $count4 = mysqli_fetch_array($result4);

                $query5 = "SELECT COUNT(*) FROM record_ip WHERE country_code ='HK'";
                $result5 = mysqli_query($con,$query5);
                $count5 = mysqli_fetch_array($result5);
                
/*
               $query2 = "SELECT DISTINCT country_code FROM record_ip";
               $result2 = mysqli_query($con,$query2);
               while($row=mysqli_fetch_array($result2)){
                    echo $row['country_code'];
               }
               */
               $query3 = "SELECT country_code, count(country_code) as count from record_ip group by country_code";
               $result3 = mysqli_query($con,$query3);
      

                ?>

           </div>
                </div>
                <!-- /.row -->

     

<!--widgets-->


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

<!--Normal event-->
<?php 
$query = "SELECT * FROM event_logs WHERE event_action='normal'";
$count_normal_event_query = mysqli_query($con,$query);
$normal_count = mysqli_num_rows($count_normal_event_query);

       ?>


<!--XSS event-->
<?php 
$query = "SELECT * FROM event_logs WHERE event_action='xss'";
$count_xss_query = mysqli_query($con,$query);
$xss_count = mysqli_num_rows($count_xss_query);

       ?>

<!--Injection event-->
<?php 
$query = "SELECT * FROM event_logs WHERE event_action='injection'";
$count_injection_query = mysqli_query($con,$query);
$injection_count = mysqli_num_rows($count_injection_query);

       ?>



                <!-- /.row -->
                

<!--TOP COUNT-->

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
   

<!--END COUNT-->


                <!-- /.row -->


<!--End widgets-->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <!--google Map chart-->
        <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
        
          ['Country', 'Count'],
          ['CA', <?php echo $count[0];?>],
          ['RU',<?php echo $count2[0];?>],
          ['US',<?php echo $count3[0];?> ],
          ['JP',<?php echo $count4[0];?> ],
          ['HK', <?php echo $count5[0];?>],
  






/* GOE CHATT















*/








          


        ]);

        var options = {
         
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }


    </script>

 
<?php echo "<h1>IP Distributed Graph</h1>";?>
<div id="regions_div" style="width: '100%'; height: 600px;"></div>
                        
<!--google chart row-->
<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      <?php 

$query = "SELECT * FROM record_ip";
$list_user = mysqli_query($con,$query);



  


?>

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','ip_id');
        data.addColumn('string', 'Description');
        data.addColumn('string', 'IP Adress');
        data.addColumn('string', 'Continent');
        data.addColumn('string', 'Country Code');
        data.addColumn('string', 'Region');
        data.addColumn('string', 'Region Name');
        data.addColumn('string', 'City');
        data.addColumn('string', 'Zip');
        data.addColumn('string', 'Location');
        data.addColumn('string', 'Time Zone');
        data.addColumn('string', 'ISP');
        data.addColumn('string', 'ORG');
        data.addColumn('string', 'AS');
        data.addColumn('string', 'Mobile(cellular)');
        data.addColumn('string', 'Proxy');
        data.addColumn('string', 'Hosting');
        data.addColumn('string', 'Created');


        

        data.addRows([
            <?php 
        while($row = mysqli_fetch_array($list_user)){
            $recordip_str = strval($row['ip_id']);
            ?>
        

            ['<?php echo $recordip_str?>',
            '<?php echo $row['description']?>','<?php echo $row['ip_adress']?>','<?php echo $row['continent']?>','<?php echo $row['country_code']?>','<?php echo $row['region']?>','<?php echo $row['region_name']?>','<?php echo $row['city']?>','<?php echo $row['zip']?>','<?php echo $row['location']?>','<?php echo $row['timezone']?>','<?php echo $row['isp']?>','<?php echo $row['org']?>','<?php echo $row['as_number']?>','<?php echo $row['mobile_cellular']?>','<?php echo $row['proxy']?>','<?php echo $row['hosting']?>','<?php echo $row['created']?>'], 

       <?php }?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));
        

         table.draw(data, {showRowNumber: true, width: '100%', height: '100%',page:'enable',pageSize:'10',sortColumn:3,sortAscending: false,pagingSymbols:{prev:'prev',next:'next'},pagingButtonsConfiguration: 'auto'});
      }

  
 
      

    </script>
    <br>
    <br>
    <br>
    <?php echo "<h1>Monitor List</h1>";?>
<div id="table_div"></div>
</div>
<!--end google chart row-->


                        </div>
                <!-- /.row Page Heading End -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>