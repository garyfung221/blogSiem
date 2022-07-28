

<?php 
include "includes/db.php";
include "includes/header.php";
include "includes/vistor_logs.php";
?>

    <!-- Navigation -->
    <?php 
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

         


            //sql query
            //only post_status == published then going next
                $query = "SELECT * FROM posts WHERE post_status ='published'";
                //execute the MYSQL query then assign to variable
                $select_all_posts_query = mysqli_query($connection,$query);

                //check if no posts is published then echo this else execute while
                if(mysqli_num_rows($select_all_posts_query)<1){
                    echo "<h1 class='text-center'>NO POSTS FOUND !";
                }

    //start while fetch

                //fetch the value from database then assign to variables
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    //add id to after admin panel section
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,90);

                    //check the post is that , published
                    $post_status = $row['post_status'];


                
            ?>

            
         

                <!-- First Blog Post -->
                <h2>                    
                       <!-- Echo Dynamic Post title -->
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">        <!-- Echo Dynamic Post author -->
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>                                                     <!-- Echo Dynamic Post date -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>                                            <!-- Echo Dynamic Image -->
                <a  href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image  ?>" alt=""></a>
                <hr>      <!-- Echo Dynamic Post Content -->
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



               <?php } //end while fetch, this bracket belong to loop while?>





           
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>