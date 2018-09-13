<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small> 
                        </h1>
                        <div class="col-xs-6">

                        <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category :</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>

                            </form>

                            <?php 

                                if (isset($_GET['edit'])) {
                                    # code...
                                    $cat_id = $_GET['edit'];

                                    include"includes/update_categories.php";
                                }

                             ?>

                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CATEGORY TITLE</th>
                                        <th>DELETE</th>
                                        <th>EDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <label for="cat-title">All Categories :</label>
                                
                                <?php findallcategories(); ?>
                                
                                <?php deletecategories();  ?>
                                    

                                </tbody>

                            </table>    


                        </div>

                    </div>
                </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                </div>
                <!-- /.row -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   
   <?php include"includes/admin_footer.php"; ?>