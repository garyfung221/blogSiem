<?php

//passing the SQL query to here , check error  
function sql_query_exception($executeQuery){
    global $connection;

    if(!$executeQuery){
        die("QUERY ERROR OR FAILED ! ".mysqli_error($connection));
    }
   
}



//categories.php : insert a new category row into databse
function create_categories(){

    global $connection;

    if(isset($_POST['submit'])){
        $input__title_category = $_POST['cat_title'];

        //1.Check if only has space , 2.Check empty
        if($input__title_category == " " || empty($input__title_category)){
            echo "The filed should not be empty !";
        }
        else{
           //if passing the validation then execute the MYSQL query
           $query = "INSERT INTO categories(cat_title) VALUES ('$input__title_category')";

           //insert into database
           $insert_categories_categories = mysqli_query($connection,$query);

           
           //expectation to catch error
           if(!$insert_categories_categories){
               die("QUERY FAILED ".mysqli_error($connection));
           }      
        }
           
    }
}

//categories.php : display all category table row from database
function displayAll_categories(){
    
    global $connection;

     //execute query
     $query = "SELECT * FROM categories"; 
     $select_categories_categories = mysqli_query($connection,$query);

            //fetch data from databse
             while($rows=mysqli_fetch_assoc($select_categories_categories)){
         $cat_id = $rows['cat_id'];
         $cat_title = $rows['cat_title'];

         
         echo "<tr>";
         echo "<td>{$cat_id}</td>";
         echo "<td>{$cat_title}</td>";
         echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
         echo "<td><a href='categories.php?edit={$cat_id}'>UPDATE</a></td>";
         echo "</tr>";

             }//end while fetch
}



function delete_categories(){
    global $connection;


    
                        //DELETE CATEGORIES ROW QUERY
                        if(isset($_GET['delete'])){
                            $delete_categories_id_value = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = '$delete_categories_id_value'";
                            $delete_categories_query = mysqli_query($connection,$query);
                            //This actually sending the id to page , then delete , it need to click 2 times delete

                            /*
                            1.Click delete button it sending the value(cat_id) to url , it deleted the row
                            2.so now url? is aldready contain the value here , so we want to click delete other row
                            3.It will refreash the page first , to clean up the url?(value) then delete

                            Example:
                            1. click delete (cat_id 4): categories?delete=4  (deleted)
                            2. clcik delete other row(cat_id 10): categories?delete=4  
                            (need refeash to clean the delete=value-> categories
                            3. click delete , categories?delete=10  (deleted)
                            */

                            //refreash the page
                            header("Location: categories.php");
                        }
}

?>