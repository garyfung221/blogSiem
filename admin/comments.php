<?php include "functions.php";?>
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

                         <!--Display All Post Table -->

                         <!--Switch to othe page-->
                        <?php
                           
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                         
                            }else{
                                $source = '';
                            }
                            switch($source){
                                case 'post_posts';
                                include "adminIncludes/post_posts.php";
                                break;

                                case 'edit_posts';
                                include "adminIncludes/edit_posts.php";
                                break;

                                case '14';
                                echo "NICE 1100";
                                break;

                                default:
                                include "adminIncludes/display_all_comments.php";
                                break;
                            }

                            ?>
                    </div>

                </div>
                <!-- /.row Page Heading End -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>