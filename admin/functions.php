<?php

function QueryConfirm($result){
    global $connection;

    if (!$result) {
            # code...
            die("QUERY FAILED " . mysqli_error($connection));
        }

}


                   function insert_categories(){

                            global $connection;

                                if (isset($_POST['submit'])) {
                                     # code...
                                    $cat_title = $_POST['cat_title'];

                                    if ($cat_title == "" || empty($cat_title)) {
                                        # code...
                                        echo "This field should not be empty";
                                    }
                                    else{
                                        $query = "insert into categories(cat_title) value('{$cat_title}')";
                                        $create_cat = mysqli_query($connection, $query);

                                        if (!$create_cat) {
                                            # code...
                                            die('QUERY FAILED' . mysqli_error($connection));
                                        }
                                    }
                                 }
                        } 
?>

<?php 
        function findallcategories(){
            global $connection;

                    $get_cat = "select * from categories";
                    $run_cat = mysqli_query($connection, $get_cat);
                    while ($row = mysqli_fetch_array($run_cat)){         
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
?>
                    <tr>

                     <td><?php echo $cat_id; ?></td>
                     <td><?php echo $cat_title; ?></td>
                     <td><?php echo "<a href='categories.php?delete={$cat_id}'>Delete</a>"; ?></td>
                     <td><?php echo "<a href='categories.php?edit={$cat_id}'>Edit</a>"; ?></td>
                     </tr>
<?php   } } ?>

<?php 
function deletecategories(){
    global $connection;

if (isset($_GET['delete'])) {
   # code.
   $delete_cat = $_GET['delete'];
   $query = "delete from categories where cat_id = {$delete_cat}";
   $delete_query = mysqli_query($connection,$query);
   header("Location: categories.php");

  }

 }

?>


