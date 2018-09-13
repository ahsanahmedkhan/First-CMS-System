                             <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Update Category :</label>
                                    <?php 

                                        if (isset($_GET['edit'])) {
                                             # code.
                                            $edit_cat = $_GET['edit'];
                                            $query = "select * from categories where cat_id = {$edit_cat}";
                                            $update_query = mysqli_query($connection,$query);
                                            
                           while ($row = mysqli_fetch_array($update_query)) {
                            # code...
                                  $cat_id = $row['cat_id'];
                                  $cat_title = $row['cat_title'];
                                    ?>

                <input value="<?php if (isset($cat_title)) { echo $cat_title;  } ?>" 
                class="form-control" type="text" name="cat_title">
                
                             <?php } }  ?>

                             <?php 

                                if (isset($_POST['update_category'])) {
                                    # code...
                                    $update_cat = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$update_cat}' WHERE cat_id = {$cat_id} ";
                                    $update_cat_query = mysqli_query($connection,$query);
                                    if (!$update_cat_query) {
                                        # code...
                                        die("QUERY FAILED " . mysqli_error($connection));
                                    }
                                }


                              ?>
                               </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>

                            </form>