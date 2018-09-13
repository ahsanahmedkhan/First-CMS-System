<?php include"includes/db.php"; ?>

<!--Header Included-->
<?php include"includes/header.php"; ?>

            
    <?php include"includes/navigation.php"; ?>    
    
    <!-- /.container -->
    <!-- Page Content -->

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                 <h1 class="page-header">
                    Content Managments System 
                    <small>Php and Bootstrap</small>
                </h1>


                <?php
                     if (isset($_POST['submit'])) {
                    # code...
                    $search = $_POST['search'];

                    $search_query = "select * from posts where post_tags like '%$search%'";
                    $run_query = mysqli_query($connection,$search_query);

                     if (!$search_query) {
                         # code...
                        die("QUERY FAILED".mysqli_error($connection));
                     }

                     $count = mysqli_num_rows($run_query);
                     if ($count == 0) {
                         # code...
                        echo "<h2>No Result</h2>";
                     }
                     else{
                        
                        while ($row = mysqli_fetch_array($run_query)) {
                            # code...
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                        ?>

                <!-- First Blog Post -->
                        <h1><a href='#''><?php echo $post_title; ?></a></h1>
                <p class="lead">
                       By: <a href='index.php'><?php echo $post_author; ?></a> 
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
 <p><?php echo $post_content; ?>.</p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>      



                        <?php }  







                     }

                }  

?>


             
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
                    <?php include "includes/sidebar.php"; ?>



        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>