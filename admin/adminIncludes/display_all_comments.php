 <!--Display All Comment Table -->
 <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Comment</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>In Response to</th>
                                        <th>Date</th>
                                        <th>Approve</th>
                                        <th>Unapprove</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query ="SELECT * FROM comments";
                                $select_posts = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_posts)){
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_content = $row['comment_content'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];

                                    echo "<tr>";
                                    echo "<td>".$comment_id."</td>";
                                    echo "<td>".$comment_author."</td>";
                                    echo "<td>".$comment_content."</td>";
                                
                     
                                    echo "<td>".$comment_email."</td>";                                       
                                    echo "<td>".$comment_status."</td>";

                                    //to print out realated post title
                                    $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id'";
                                    $Comment_post_title = mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_assoc($Comment_post_title)){
                                        $respone_post_id = $row['post_id'];
                                        $related_post_title = $row['post_title'];
                                      echo "<td><a href='../post.php?p_id=$respone_post_id'>$related_post_title</td>";
                                    }
                                
                                    echo "<td>".$comment_date."</td>";

                                    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                    echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                     
        
                                    //Delete Button
                                    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                    echo "</tr>";
                                }//end while

                                ?>


                                </tbody>
                            </table>
                            <!--End Display all cooment table-->


                            <!--Set the comment Unapprove-->
                                <?php
                                if(isset($_GET['approve'])){
                                    //it will catch the $comemnt_id
                                    $comment_id = $_GET['approve'];

                                    //set the comment's status to unapprove
                                    $query = "UPDATE comments SET comment_status ='approve' WHERE comment_id ='$comment_id'";
                                    $approve_query = mysqli_query($connection,$query);

                                    sql_query_exception($approve_query);

                                    header("Location: comments.php");
                                }

?>


                                <!--Set the comment Unapprove-->
                                <?php
                                if(isset($_GET['unapprove'])){
                                    //it will catch the $comemnt_id
                                    $comment_id = $_GET['unapprove'];

                                    //set the comment's status to unapprove
                                    $query = "UPDATE comments SET comment_status ='unapprove' WHERE comment_id ='$comment_id'";
                                    $unapprove_query = mysqli_query($connection,$query);

                                    sql_query_exception($unapprove_query);

                                    header("Location: comments.php");
                                }

?>


                               <!--Delete Post Row-->
                                <?php
                                if(isset($_GET['delete'])){
                                    //it will catch the $comemnt_id
                                    $comment_id = $_GET['delete'];

                                    //using comemnt id to find out which comment want to delete
                                    $query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
                                    $DeleteRow_query = mysqli_query($connection,$query);

                                    sql_query_exception($DeleteRow_query);

                                    header("Location: comments.php");
                                }

                                ?>




                            