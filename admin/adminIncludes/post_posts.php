<?php
if(isset($_POST['new_post'])){

    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    //save picture : 1value: formName 2value: picture name
    $post_image = $_FILES['post_image']['name'];

    //select hold the picture
    $post_image_tmp = $_FILES['post_image']['tmp_name'];

    $post_tag = $_POST['post_tags'];
    //solving the content too long issue
    $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);

    //set the date format
    $post_date = date('y-m-d');

    //because not hold the count comment function , so that hard code first
    $post_comment_count = 0;


    //upload picture to images folder 
    // select the hold picture , then send it to images/[your select picture name] 

    move_uploaded_file($post_image_tmp, "../images/$post_image" );

    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) 
    VALUES('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tag','$post_comment_count','$post_status')";

    //now() fubction is means current date

    $postNew_post_query = mysqli_query($connection,$query);
?>

<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Create Post Success !", { 
            type: 'success', 
            width: '300',
        });
    });
});

</script>



<?php    
    //sql exception function ,  refer to function.php , because posts.php had include function.php then posts.php include this function , so it can call it.
    sql_query_exception($postNew_post_query);

}


?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

 
<div class="form-group">
   
   <label for="post_category">Post Category</label>
   <select name="post_category" id="post_category">
   
   <?php
   //fetch the categories table , then displayed by section
   $query = "SELECT * FROM categories";
   $display_categoryList = mysqli_query($connection,$query);
   
   sql_query_exception($display_categoryList);
   
   while($row = mysqli_fetch_assoc($display_categoryList)){
       $category_cat_id = $row['cat_id'];
       $category_title = $row['cat_title'];
   
       echo "<option value='{$category_cat_id}'>{$category_title}</option>";
   }
   
   ?>
   </select>
   
   </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <!--if too long maybe get some issue-->
    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="new_post" value="Publish Post">
    </div>

</form>


