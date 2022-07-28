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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                 
                    <!--Add Category Form-->

                        <!--col-xs-6 The length of div block , there can refer input length-->
                    <div class="col-xs-6">

                    <?php
                    
                    //insert a new category into database categories.php
                    create_categories();


                        ?>



                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category" id="add_cate">
                            </div>
                        </form>


                   



                   
                    <!--End Category Form-->

                    
                    <?php
                    /*
                        //If not meet the conditaion , it will not showing the update form

                    1.If Click the UPDATE button , 
                    it will save the href='categories.php?edit=$cat_id(which cat_id you want to change)
                    then assign the [value] to $cat_id

                    2.then using update_caregories.php

                    */
                   if(isset($_GET['edit'])){

                    //from  echo "<td><a href='categories.php?edit={$cat_id}'>UPDATE</a></td>";
                    $cat_id = $_GET['edit'];

                    include "adminIncludes/update_categories.php";
                   }


                    ?>

                </div>


                    <!--Category Table-->
                    <div class="col-xs-6">
 
                    
               
              
           
                   <!--bootstrap: table fomart , table border , table hover-->
                   <table class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>DELETE</th>
                                <th>UPDATE</th>
                            </thead>
                            <tbody>
           
                           
                           <?php
                           //display all categories table rows from database : categories.php
                           displayAll_categories();
                        ?>

                        <?php
                        //delete the categories table row from databse : categories.php
                        delete_categories();
                        ?>
                         </tbody>
                            
                        </table>

                    <!--End Category Table-->

                  
                    <!--End Category Table Div--> 
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>


 