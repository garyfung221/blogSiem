

<nav class="navbar topnavbar navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">HOME SITE</a></li>


           
      
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_firsname'].$_SESSION['user_lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                      
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!--deleted charts , table , form!-->
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-file"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php"> View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=post_posts"> Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li class="">
                        <a href="comments.php"><i class="fa fa-paper-plane"></i> Comments</a>
                    </li>
  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i> Users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">Users List</a>
                            </li>
                            <li>
                                <a href="users.php?source=create_user">Create User</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#siem_dropdown"><i class="fa fa-bar-chart"></i> SIEM<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="siem_dropdown" class="collapse">
                            <li>
                                <a href="logs_display.php">Logs</a>
                            </li>
                            <li>
                                <a href="events_display.php">Event</a>
                            </li>
                            <li>
                                <a href="monitor_display.php">Monitor</a>
                            </li>
                            <li>
                                <a href="check_ip.php">Check IP</a>
                            </li>
                        </ul>
                    </li>
             


                </ul>
            </div>

            <style>
          .topnavbar{
            background-color: #100719 !important;
          }
          </style>