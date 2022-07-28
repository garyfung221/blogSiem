<?php include "functions.php";?>
<?php include "adminIncludes/admin_header.php"; ?>


<?php 
if(isset($_POST['update_profile'])){

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

    //encryption
    $user_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);

//insert query
    $query = "UPDATE users SET user_firstname ='$user_firstname',user_lastname ='$user_lastname',user_role='$user_role',
    username='$user_username',user_email='$user_email',user_password='$user_pwd' WHERE username ='$user_username'";    
    $update_user_query=mysqli_query($connection,$query);

?>
<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Profile Updated !", { 
            type: 'success', 
            width: '300',
        });
    });
});

</script>
<?php
    sql_query_exception($update_user_query);
}
?>


<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $profile_query = mysqli_query($connection , $query);
    while ($row = mysqli_fetch_assoc($profile_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}
?>


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
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>

                         <!--Display All Post Table -->

                         <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="post_author">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

 
<div class="form-group">
   
   <label for="user_role">User Role</label>
   <select name="user_role" id="user_role">
   <option name="admin"><?php echo $user_role;?></option>
<?php
if($user_role == 'admin'){
    echo "<option value='subscriber'>subscriber</option>";
}else{
    echo "<option value='admin'>admin</option>";
}

?>

   
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
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

   
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_profile" value="Publish Update">
    </div>

</form>
                      
                    </div>

                </div>
                <!-- /.row Page Heading End -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "adminIncludes/admin_footer.php";?>