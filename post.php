<?php 
include "includes/db.php";
include "includes/header.php";
include "includes/logs_db.php";
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

            //when get the url switch to which post_id page
            if(isset($_GET['p_id'])){
                $url_post_id = $_GET['p_id'];
            }




            //sql query
            //Add where because we have to find out which post to display
                $query = "SELECT * FROM posts WHERE post_id = '$url_post_id'";
                //execute the MYSQL query then assign to variable
                $select_all_posts_query = mysqli_query($connection,$query);


    //start while fetch

                //fetch the value from database then assign to variables
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                
            ?>

            
                <h1 class="page-header">
                   
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
               

                <hr>



               <?php } //end while fetch, this bracket belong to loop while?>


<!-- Blog Comments -->

<!--Submit the comment into database-->
<?php
if(isset($_POST['submit_comment'])){
    //get the post id from url
    $url_post_id = $_GET['p_id'];

    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    
    comment_check_event($comment_author,$comment_email,$comment_content);
    
    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) 
    VALUES ('$url_post_id','$comment_author','$comment_email','$comment_content','unapproved',now())";

    $submit_comment_query = mysqli_query($connection , $query);

    if(!$submit_comment_query){
        die('QUERY FAILED !'.mysqli_error($connection));
    }

    //when submit a comment , it will +1 into database of post_comment_count
    $query ="UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id ='$url_post_id'";
    $plus_comment_count = mysqli_query($connection,$query);


}

?>


<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="" method="post" role="form">
    <div class="form-group">
        <label for="comment_author">Author</label>
            <input type="text" class="form-control" name="comment_author" >
        </div>
        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" class="form-control" name="comment_email">
        </div>
        <div class="form-group">
        <label for="comment">Comment</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
    </form>
</div>

<hr>
               
<!-- Posted Comments -->
<?php
$query = "SELECT * FROM comments WHERE comment_post_id ='$url_post_id' AND comment_status='approve' ORDER BY comment_id DESC ";
$show_comment_query = mysqli_query($connection,$query);
    if(!$show_comment_query){
        die("QUERY FAILED !".mysqli_error($connection));
    }
    while($row=mysqli_fetch_assoc($show_comment_query)){
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];
    
?>

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="./images/memeber_icon.jpg" alt="" width="60" height="60">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author;?>
            <small><?php echo $comment_date;?></small>
        </h4>
        <?php echo $comment_content;?>
    </div>
</div>

<?php } //end while?>







           
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>


<?php 
function comment_check_event($comment_author,$comment_email,$comment_content){
    global $con;
    
    $feature_path = "comment";
    
    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
$user_ip_address = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
$user_ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
$user_ip_address = $_SERVER["REMOTE_ADDR"];
}



    
if($comment_author=='<script>alert(1)</script>'||$comment_email=='<script>alert(1)</script>'||$comment_content=='<script>alert(1)</script>'||$comment_content=='<script>alert("try to xss")</script>'){
    
$action ="xss";
$status = "close";
}


elseif(($comment_author=='/')||($comment_author==',')||($comment_author=='\'')||($comment_author=='"')||($comment_author==')')||($comment_author=='(')||($comment_author==';')||($comment_author=='')||($comment_email=='/')||($comment_email==',')||($comment_email=='\'')||($comment_email=='"')||($comment_email==')')||($comment_email=='(')||($comment_email==';')||($comment_content=='/')||($comment_content==',')||($comment_content=='\'')||($comment_content=='"')||($comment_content==')')||($comment_content=='(')||($comment_content==';')){

$action = "injection";
$status = "close";

}else{
    $action = "normal";
    $status = "open";
}

$query = "INSERT INTO event_logs (event_ip,status,feature_path,event_action,created) VALUES ('$user_ip_address','$status','$feature_path','$action',now())";
$event_query = mysqli_query($con,$query);

}
?>

