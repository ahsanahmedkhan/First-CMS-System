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
                            <!--<small>Author</small>--> 
                        </h1>

<?php 
    if (isset($_GET['source'])) {
        # code...
        $source = $_GET['source'];
    }
    else{
        $source = '';
    }
switch ($source) {
    case 'edit_user':
        # code...
    include"includes/edit_user.php";
        break;
    case 'add_user':
        # code...
    include"includes/add_user.php";
        break;
    
    default:
        # code...
    include "includes/view_all_users.php";
        break;
}

 ?>                        
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