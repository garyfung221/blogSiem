                        
                        
                       
                       <!--UPDATE FORM  if categories.php 's meet the edit condition , it will showing this form-->

                       <!--Start Form-->
                       <form action="" method="post">
                        <div class="form-group">
                        <label for="cat-title">Edit Category</label>


             
                        <?php
                        //Showing the Category Title on input 

                        //if click the update button will run these code, because update Button value = edit
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];

                            //to find the Category Title via the id passing by edit
                       $query = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
                       //execute query 
                       $show_editValue_query = mysqli_query($connection,$query);
                       //fetch row
                       while($rows=mysqli_fetch_assoc($show_editValue_query)){
                        //assign the cat_id and cat_title to variable
                        $Edit_ID = $rows['cat_id'];
                        $Edit_Value = $rows['cat_title'];
                            ?>
                            
                            <!--Showing the Category title on input -->
                <input type="text" class="form-control" name="cat_title" value="<?php if(isset($Edit_Value)){echo $Edit_Value;} ?>">
                      <?php }//end fetch while}
                       }//end edit isset?>

                       <!--End Form-->
                    
                                

                       <?php
                       //if click the button of Update Category , it'll be update the value into database
                        if(isset($_POST['update_category'])){
                            $update_value = $_POST['cat_title'];

                            //via cat_id to find the row , cat_id passing by categories.php
                            $query = "UPDATE categories SET cat_title = '$update_value' WHERE cat_id ='$cat_id'";
                            $Update_query = mysqli_query($connection,$query);
                            if(!$Update_query){
                                die("QUERY FAILED".mysqli_error($connection));
                            }//end check connection?>

<script>
$(function() {

    setTimeout(function() {
        $.bootstrapGrowl("Update Category Success !", { 
            type: 'success', 
            width: '300',
        });
    });
});

</script>
                            <?php
                        }//end isset

                       ?>


                            </div>
                        
                        <?php 
                       
                        ?>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                            </div>
                        </form>


