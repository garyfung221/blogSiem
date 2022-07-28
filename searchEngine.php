<?php 
include "includes/db.php";
include "includes/header.php";

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


//If have submit from the sidebar.php 's search form , it will execute
if(isset($_POST['submit'])){

    $search_word = $_POST['search'];

    //search only post_tag and only showing the published post  
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search_word%' AND post_status ='published'";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query){
        die("QUERY FAILED ".mysqli_error($connection));
    }
    //count how many rows meet the query condition 
    $count = mysqli_num_rows($search_query);
        if($count==0){
            echo "<h1>"."There are no result"."<h1>";
        }else {
            


//start while fetch

            //fetch the value from database then assign to variables
            while($row = mysqli_fetch_assoc($search_query)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            
        ?>

        
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>                    
                   <!-- Echo Dynamic Post title -->
                <a href="#"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">        <!-- Echo Dynamic Post author -->
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>                                                     <!-- Echo Dynamic Post date -->
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>                                            <!-- Echo Dynamic Image -->
            <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
            <hr>      <!-- Echo Dynamic Post Content -->
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>



           <?php } //end while fetch, this bracket belong to loop while
        }
}

?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>