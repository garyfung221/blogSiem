

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    <!--Search Engine Form-->
                    <form action="searchEngine.php" method="post">

                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                                            <!--Submit button-->
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>

                    <!--Search Engine Form-->
                    </form>

                    <!-- /.input-group -->
                </div>



<?php


?>


<?php
if($_SESSION){
    ?>
    <div class="well">
        <?php
    echo "<h1> Hello , ".$_SESSION['username']." !</h1>";?>
    <form action="includes/logout.php" method="post">
     <span class="input-group-btn">
                    <button class="btn btn-primary" name="logout" type="submit" >Logout</button> 
                    
                </span>
                </form>
                </div>

<?php } else {?>





        
        <!-- Login Well -->
        <div class="well">
            <h4>Login</h4><h5><a href="registration.php">No account ? Click here to sign up !</a></h5>

            <!--Login Form-->
            <form action="includes/login.php" method="post">

            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username" >
             
            </div>

            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">

                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit" >Submit</button> 
                </span>
             
            </div>

            <!--Login Form-->
            </form>

            <!-- /.input-group -->
        </div>
        <!--Login Well-->

 <?php } //end check session?>
        





                <!-- Blog Categories Well -->
                <div class="well">

                <?php
                //get table from database : categories
                $query = "SELECT * FROM categories";
                //execute the SQL query
                $select_all_categories_sidebar = mysqli_query($connection,$query);
          
          ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                    //fetch the data from database
                    while($row = mysqli_fetch_assoc($select_all_categories_sidebar)){
                        $cat_id = $row['cat_id'];

                    //assign the database row value[cat_title] to variable
                    $cat_title = $row['cat_title'];
                    //echo this with html formal
                    echo "<li><a href='via_category_post.php?categoryID={$cat_id}'>{$cat_title}</a></li>";
                }
                ?>
                           
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       <!--Removed col-lg-6-->
                        <!-- /.col-lg-6 -->

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <?php include "widget.php"; ?>
              
              <?php include "logo.php"; ?>

            </div>