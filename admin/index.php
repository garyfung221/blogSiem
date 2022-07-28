<?php include "adminIncludes/admin_header.php"; ?>

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
                        </h1>
                 
                    </div>
                </div>
                <!-- /.row -->

<!--widgets-->
       
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<!--Show the number of post dynamic data in dashboard-->
<?php
$query = "SELECT * FROM posts";
$count_post_query = mysqli_query($connection,$query);
$post_count = mysqli_num_rows($count_post_query);

echo "<div class='huge'>$post_count</div>";

?>



                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<!--Show the comments of post dynamic data in dashboard-->
<?php 
$query = "SELECT * FROM comments";
$count_comment_query = mysqli_query($connection,$query);
$comment_count = mysqli_num_rows($count_comment_query);

echo "<div class='huge'>$comment_count</div>";


?>


                    
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comments.php">
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



<!--Show the users of post dynamic data in dashboard-->
<?php
$query = "SELECT * FROM users";
$count_users_query = mysqli_query($connection,$query);
$user_count = mysqli_num_rows($count_users_query);

echo "<div class='huge'>$user_count</div>";
?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="./users.php">
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


<!--Show the category of post dynamic data in dashboard-->
<?php
$query = "SELECT * FROM categories";
$count_category_query = mysqli_query($connection,$query);
$category_count = mysqli_num_rows($count_category_query);
    echo "<div class='huge'>$category_count</div>";
?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="./categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                
<?php
//other count 

//draft post
$query = "SELECT * FROM posts WHERE post_status ='draft'";
$count_draft_post_query = mysqli_query($connection,$query);
$post_draft_count = mysqli_num_rows($count_draft_post_query);

//unapprove comment
$query = "SELECT * FROM comments WHERE comment_status ='unapproved'";
$count_unapprove_query = mysqli_query($connection,$query);
$comment_unapprove_count = mysqli_num_rows($count_unapprove_query);

//suber
$query = "SELECT * FROM users WHERE user_role ='subscriber'";
$count_suber_query = mysqli_query($connection,$query);
$user_suber_count = mysqli_num_rows($count_suber_query);


?>


                <!--google chart row-->
    <div class="row">

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            //x     ,  y  ,  y  , y
          ['Type','Count'],

            <?php 
            $chart_text = ['Published Posts','Draft Posts','Comments','Unapprove Comments','Users','Subscriber','Categories'];
            $chart_count = [$post_count, $post_draft_count, $comment_count, $comment_unapprove_count, $user_count,$user_suber_count, $category_count];
            
            //i < 4 because only 4 type of data such as post,comment,user,cate
            for($i = 0 ; $i < 7 ; $i++){
                echo "['{$chart_text[$i]}'".","."{$chart_count[$i]}],";
            }

            //every bar chart  like this :  ['Posts',1000];
          ?>  
        ]);

        var options = {
          chart: {
            title: 'Types of Status',
            subtitle: 'Posts & comments',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

    </div>



<!--end google chart row-->
<!--End widgets-->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>