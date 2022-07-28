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

<?php 
$query = "SELECT * FROM event_logs WHERE event_action='spam'";
$count_spam_query = mysqli_query($con,$query);
$spam_count = mysqli_num_rows($count_spam_query);

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


                        


        <!--google line chart-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'total_event');
      data.addColumn('number', 'Normal');
      data.addColumn('number', 'XSS');
      data.addColumn('number', 'Injection');
      data.addColumn('number','Spam');

      data.addRows([
        
        [0, 0, 0,0,0], [<?php echo $event_count; ?>,<?php echo $normal_count; ?>,<?php echo $xss_count; ?>,<?php echo $injection_count; ?>,<?php echo $spam_count; ?>]
      ]);


      var options = {
        title: 'Type of Events',
        hAxis: {
          title: 'Event',
          logScale: true,
          ticks: [0, 5, 10, 20, 30]
          
        },
        vAxis: {
          title: 'Count',
          logScale: false
        },
        colors: ['blue', '#097138','peachpuff','chocolate']
      };

      

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);


      

    }

   
    </script>
    

<div id="chart_div" ></div>
</br>
    </br>
<div id="log_div"></div>               


<!--Event Table-->

<?php echo "<h1> Type of Events Table </h1>"; ?>

<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Event ID</th>
                                        <th>Status</th>
                                        <th>Client IP</th>
                                        <th>Path</th>
                                        <th>Event Type</th>
                                        <th>Date Time</th>
                                 
                                      
                                     
                                    

                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                $query ="SELECT * FROM event_logs WHERE status='close'";
                                $dispaly_threats_list = mysqli_query($con,$query);

                                while($row = mysqli_fetch_assoc($dispaly_threats_list)){
                                    $event_id = $row['event_id'];
                                    $status = $row['status'];
                                    $event_ip = $row['event_ip'];
                                    $feature_path = $row['feature_path'];
                                    $event_action = $row['event_action'];
                                    $created = $row['created'];
                          

                                    if($event_action=='xss'){
                                        $status_color="#097138";
                       
                                    }elseif($event_action=='injection'){
                                        $status_color="peachpuff";
                              
                                    }elseif($event_action=='spam'){
                                        $status_color='chocolate';
                                
                                    }
                     
                                    
                                    echo "<tr>";
                                    echo "<td>".$event_id."</td>";
                                    echo "<td>".$status."</td>";
                                    echo "<td>".$event_ip."</td>";
                                
                     
                                    echo "<td>".$feature_path."</td>";                                       
                                    echo "<td bgcolor=$status_color>".$event_action."</td>";
                                    echo "<td>".$created."</td>";

                                }
                                ?>


                                </tbody>
                            </table>
<!--End Event Table-->


</br>
    </br>


<!--google chart row-->
<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      <?php 

$query = "SELECT * FROM event_logs";

$display_event_logs = mysqli_query($con,$query);

$count_event_row = mysqli_num_rows($display_event_logs);


  


?>


      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string',' Event Id');
        data.addColumn('string', 'Status');
        data.addColumn('string', 'Event IP');
        data.addColumn('string', 'Feature Path');
        data.addColumn('string', 'Event Action');
        data.addColumn('string', 'Created');


        

        data.addRows([
            <?php 
        while($row = mysqli_fetch_array($display_event_logs)){
            $event_str = strval($row['event_id']);
            ?>
        

            ['<?php echo $event_str?>','<?php echo $row['status']?>','<?php echo $row['event_ip']?>','<?php echo $row['feature_path']?>','<?php echo $row['event_action']?>','<?php echo $row['created']?>'], 

       <?php }?>
        ]);



        var table = new google.visualization.Table(document.getElementById('table_div'));
        

         table.draw(data, {showRowNumber: true, width: '100%', height: '100%',page:'enable',pageSize:'10',sortColumn:3,sortAscending: false,pagingSymbols:{prev:'prev',next:'next'},pagingButtonsConfiguration: 'auto'});
      }

  
 
      

    </script>
     <?php echo "<h1> Event Details List </h1>"; ?>
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