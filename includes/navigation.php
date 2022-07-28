<nav class="navbar topnavbar navbar-fixed-top " role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Gary Fung</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
          
                <?php
                //get table from database : categories
                $query = "SELECT * FROM categories";
                //execute the SQL query
                $select_all_categories_query = mysqli_query($connection,$query);
          
                //fetch the data from database
                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                    //assign the database row value[cat_title] to variable
                    $cat_title = $row['cat_title'];
                    //echo this with html formal
                    echo "<li><a href='#'>{$cat_title}</a></li>";
                }
          //100719
          ?>

<style>
          .topnavbar{
            background-color: #100719 !important;
          }
        
      </style>                  
        
                    <li>
                        <a href="admin">Admin</a>
                    </li>

                    <?php 
                    if($_SESSION){

                   
                    if(($_SESSION['user_role'])=='admin'){
                        if(isset($_GET['p_id'])){
                            $post_id = $_GET['p_id'];

                            //going edit selected post
                            echo "<li><a href='admin/posts.php?source=edit_posts&p_id={$post_id}'>Edit Article</a></li>";
                        }else if($_SESSION['user_role']=='subscriber'){

                        }
                    }
                }
                    ?>

                     <!--     
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> 
                
                -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>