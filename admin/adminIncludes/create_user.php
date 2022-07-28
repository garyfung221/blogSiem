<?php
if(isset($_POST['create_user'])){


    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

/*
    //save picture : 1value: formName 2value: picture name
    $post_image = $_FILES['post_image']['name'];

    //select hold the picture
    $post_image_tmp = $_FILES['post_image']['tmp_name'];

    */
    $user_username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_pwd = $_POST['user_password'];

//insert query
    $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) 
    VALUES ('$user_username','$user_pwd','$user_firstname','$user_lastname','$user_email','$user_role')";

    $create_user_query = mysqli_query($connection,$query);

    sql_query_exception($create_user_query);

    ?>

<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Create User Success !", { 
            type: 'success', 
            width: '300',
        });
    });
});

</script>

<?php


}//end if isset


?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="post_author">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

 
<div class="form-group">
   
   <label for="user_role">User Role</label>
   <select name="user_role" id="user_role">
   <option value="">Select Option</option>
    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
   
   </select>
   
   </div>

<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

-->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

   
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Publish Create User">
    </div>

</form>


