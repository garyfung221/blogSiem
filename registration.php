<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
<?php //include "includes/vistor_logs.php";?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
<?php
if(isset($_POST['btn_register'])){
    $uname = $_POST['username'];
    $pwd = $_POST['password'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $user_role = "subscriber";

    $check_query = "SELECT * FROM users";
    $execute_check_query = mysqli_query($connection,$check_query);

    if(!$execute_check_query){
        die("QUERY FAILED ! ".mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($execute_check_query)){
        $db_username = $row['username'];
        $db_email = $row['user_email'];
    }
    if($uname == $db_username && $email == $db_email){
        ?>
<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Username and Email already exist !" , { 
            type: 'danger', 
            width: '300',
        });
    });
});
</script>

<?php
     
    }else if($uname == $db_username){
        ?>
        <script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Username already exist ! " , { 
            type: 'danger', 
            width: '300',
            delay: 4000,
        });
    });
});
</script>
        <?php
    }else if($email == $db_email){
        ?>

<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Email already exist ! " , { 
            
            type: 'danger', 
            width: '300',
        });
    });
});
</script>
        
        <?php
    }else if(($uname==null||$pwd==null||$firstName==null||$lastName==null||$email==null)){
      ?>
        <script>
        $(function() {
        
            setTimeout(function() {
                $.bootstrapGrowl("Fields Can't be empty !" , { 
                    type: 'danger', 
                    width: '300',
                    delay: 4000,
                });
            });
        });
        </script>
        <?php
    }
    else{
        //password encryption:
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);


        $register_query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role)
        VALUES ('$uname','$pwd','$firstName','$lastName','$email','$user_role')";
    
        $register_query = mysqli_query($connection,$register_query);

        
        
        ?>
 <script>
        $(function() {
        
            setTimeout(function() {
                $.bootstrapGrowl("Successfully register !" , { 
                    type: 'success', 
                    width: '300',
                    delay: 4000,
                });
            });
        });
        </script>
        

<?php

        if(!$register_query){
            die("QUERY FAILED ! ".mysqli_error($connection));
        }
    
    }


   
}

?>


    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <!--username-->
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>

                         <!--password-->
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>

                        <!--first name-->
                        <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                        </div>

                        <!--lastname-->
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                        </div>

                        <!--email-->
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                        </div>
                       
                        <!--btn btn-primary:colour ,  btn-block : hover-->
                        <input type="submit" name="btn_register" id="btn-login" class="btn btn-primary btn-lg btn-block " value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>


