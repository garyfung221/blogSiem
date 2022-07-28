


<?php
//the post_id is passing from displayALL eidt source :

if(isset($_GET['p_id'])){
    //assign the value from the posts.php 
    $edit_postID = $_GET['p_id'];

}

//using the $edit_postID to find the which row data need to showing
$query ="SELECT * FROM posts WHERE post_id = '$edit_postID'";
$show_editPosts_byID = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($show_editPosts_byID)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    

}//end while


//if click the update button (these data from the form exist) , execute update into database 
if(isset($_POST['update_post'])){


    //What the form contain values:
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    //save picture : 1value: formName 2value: picture name
    $post_image = $_FILES['post_image']['name'];
    //select hold the picture
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_tmp, "../images/$post_image");


    //Avoid the user not select the image then upload
    if(empty($post_image)){
        $query ="SELECT * FROM posts WHERE post_id = '$edit_postID'";
        $get_orgin_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($get_orgin_image)){
            $post_image = $row['post_image'];
        }
    }


    //execute the query Update the new data changing into database
    $query = "UPDATE posts SET post_category_id ='$post_category_id', post_title = '$post_title', post_author = '$post_author',
     post_date = now(), post_image = '$post_image', post_content = '$post_content', post_tags = '$post_tags', post_status = '$post_status' WHERE post_id = '$edit_postID'";

    $update_post = mysqli_query($connection,$query);

    ?>
<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Post Updated !", { 
            type: 'success', 
            width: '300',
        });
    });
});

</script>
<?php
    sql_query_exception($update_post);

}


?>





<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" class="form-control" name="post_title" value="<?php echo $post_title?>">
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
    <input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
</div> 


<!-- Post status to drop down list -->
<div class="form-group"> 
    <label for="post_status">Post Status</label>
    <select name="post_status" id="">

    <!--ucfirst make the both display same size--> 

    <!--There value is assign currenly post_status value into this filed -->
<option value='<?php echo $post_status; ?>'><?php echo ucfirst($post_status); ?></option>
    <?php
    //if post_status is == published that echo the draft , if selected then assign the draft into value  
    if($post_status == 'published'){
        echo "<option value='draft'>Draft</option>";
    }else{
        echo "<option value='published'>Published</option>";
    }

?>
</select>
</div>
<!-- End Post status to drop down list -->

<!--

<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status?>">
</div>

-->

<div class="form-group">
    <label for="post_image">Post Image</label>
    <img width="110" src="../images/<?php echo $post_image;?>">
    <input type="file" name="post_image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags?>">
</div>

<div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"><?php echo $post_content?></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
</div>

</form>




