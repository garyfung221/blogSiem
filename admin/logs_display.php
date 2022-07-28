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
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Count'],
          ['Logs',   <?php echo $logs_count; ?>],
          ['Events', <?php echo $event_count; ?>],
          ['Monitor',<?php echo $monitor_count; ?>],
          ['Threats',<?php echo $threats_count; ?>],
        ]);

        var options = {
          title: 'SIEM types of informations',
          slices: {0: {color: '#04B431'}, 1:{color: '#2E64FE'}, 2:{color: 'FFBF00'}, 3: {color: 'red'}},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<div id="donutchart" style="width: '100%'; height: 500px;"></div>
                        
<!--google chart row-->
<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      <?php 

$query = "SELECT * FROM visitor_logs";

$display_visitor_logs = mysqli_query($con,$query);

$count_log_row = mysqli_num_rows($display_visitor_logs);


  


?>

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','log_id');
        data.addColumn('string', 'page_url');
        data.addColumn('string', 'referrer_url');
        data.addColumn('string', 'IP Address');
        data.addColumn('string', 'Agent');
        data.addColumn('string', 'Time');


        

        data.addRows([
            <?php 
        while($row = mysqli_fetch_array($display_visitor_logs)){
            $log_str = strval($row['log_id']);
            ?>
        

            ['<?php echo $log_str?>','<?php echo $row['page_url']?>','<?php echo $row['referrer_url']?>','<?php echo $row['user_ip_address']?>','<?php echo $row['user_agent']?>','<?php echo $row['created']?>'], 

       <?php }?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));
        

       table.draw(data, {showRowNumber: true, width: '100%', height: '100%',page: 'enable', 
 pageSize: '10', 
 sortColumn: 3, 
 sortAscending: false,pagingSymbols: {
            prev: 'prev',
            next: 'next'
        },
        pagingButtonsConfiguration: 'auto'});
      }

  
 
      

    </script>
    <?php echo "<h1> Logs Details List </h1>"; ?>
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