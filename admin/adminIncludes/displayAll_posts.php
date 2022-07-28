
 
 <!--Display All Post Table -->
 <table class="table table-bordered table-hover">



                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Titile</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Comments</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query ="SELECT * FROM posts";
                                $select_posts = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_posts)){
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_date = $row['post_date'];
                                    

                                    echo "<tr>";
                                    echo "<td>".$post_id."</td>";
                                    echo "<td>".$post_author."</td>";
                                    echo "<td>".$post_title."</td>";
                                 //via the post_id to find the cat_id , then print the category title , not the cat_id 
                                 $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'";
                                  $print_cat_title = mysqli_query($connection,$query);
                                    while($print_Cat_ID = mysqli_fetch_assoc($print_cat_title)){
                                  $cat_title = $print_Cat_ID['cat_title'];
                                    echo "<td>".$cat_title."</td>";
                                    }
                                                                           
                                    echo "<td>".$post_status."</td>";
                                    //if only echo value of image can't display , we have to add a path of images
                                    echo "<td><img width='110' src='../images/$post_image' alt='image'></td>";
                                    echo "<td>".$post_tags."</td>";
                                    echo "<td>".$post_comment_count."</td>";
                                    echo "<td>".$post_date."</td>";
                                    //Edit Button , When click it , going to edit_posts.php
                                    echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
                                    //Delete Button
                                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }//end while

                                ?>


                                </tbody>
                            </table>
                            <!--End Display all post table-->





                                <!--Delete Post Row-->
                                <?php
                                if(isset($_GET['delete'])){
                                    //it will catch the $post_id 
                                    $delete_post_id = $_GET['delete'];

                                    $query = "DELETE FROM posts WHERE post_id = '$delete_post_id'";
                                    $DeleteRow_query = mysqli_query($connection,$query);

                                    sql_query_exception($DeleteRow_query);

                                    header("Location: posts.php");
                                }

                                ?>




                            