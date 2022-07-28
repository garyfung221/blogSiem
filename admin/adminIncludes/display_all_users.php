 <!--Display All Users Table -->
 <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Admin</th>
                                        <th>Subscriber</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                 
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query ="SELECT * FROM users";
                                $dispaly_user_list = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($dispaly_user_list)){
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                               
                                    $user_role = $row['user_role'];

                                    echo "<tr>";
                                    echo "<td>".$user_id."</td>";
                                    echo "<td>".$username."</td>";
                                    echo "<td>".$user_firstname."</td>";
                                
                     
                                    echo "<td>".$user_lastname."</td>";                                       
                                    echo "<td>".$user_email."</td>";
                                    echo "<td>".$user_role."</td>";

                                   
                                    //to admin
                                    echo "<td><a href='users.php?permission_to_admin={$user_id}'>Admin</a></td>";
                                    //to suber
                                    echo "<td><a href='users.php?permission_to_suber={$user_id}'>Subscriber</a></td>";
                                    //Edit user , send the user_id to edit_user.php
                                    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                                    //Delete Button
                                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }//end while

                                ?>


                                </tbody>
                            </table>
                            <!--End Display all users table-->


                            <!--Set the user permission to admin-->
                                <?php
                                if(isset($_GET['permission_to_admin'])){
                                    //it will catch the $comemnt_id
                                    $user_id = $_GET['permission_to_admin'];

                                    //set the comment's status to unapprove
                                    $query = "UPDATE users SET user_role ='admin' WHERE user_id ='$user_id'";
                                    $permission_to_admin_query = mysqli_query($connection,$query);

                                    sql_query_exception($permission_to_admin_query);

                                    header("Location: users.php");
                                }

?>


                                <!--Set the user permission to suber-->
                                <?php
                                if(isset($_GET['permission_to_suber'])){
                                    //it will catch the $comemnt_id
                                    $comment_id = $_GET['permission_to_suber'];

                                    //set the comment's status to unapprove
                                    $query = "UPDATE users SET user_role ='subscriber' WHERE user_id ='$user_id'";
                                    $permission_to_subscriber_query = mysqli_query($connection,$query);

                                    sql_query_exception($permission_to_subscriber_query);

                                    header("Location: users.php");
                                }

?>


                               <!--Delete User Row-->
                                <?php
                                if(isset($_GET['delete'])){
                                    //it will catch the user_id
                                    $user_id = $_GET['delete'];

                                    //using user id to find out which comment want to delete
                                    $query = "DELETE FROM users WHERE user_id = '$user_id'";
                                    $DeleteRow_query = mysqli_query($connection,$query);

                                    sql_query_exception($DeleteRow_query);

                                    header("Location: users.php");
                                }

                                ?>




                            