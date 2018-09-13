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
                    if (isset($_GET['p_id'])) {
                        # code...
                        $the_post_id = $_GET['p_id'];
                    }
              



                    $get_post = "Select * from posts where post_id = $the_post_id ";
                    $run_post = mysqli_query($connection,$get_post);

                        while ($row = mysqli_fetch_array($run_post)) {
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




                        <?php }  ?>

                


                <!-- Blog Comments -->


                <?php 
                if (isset($_POST['create_comment'])) {
                    # code...
                    $the_post_id = $_GET['p_id'];

                    $comment_author =  $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];


                    $query = "INSERT INTO comments(comment_post_id, comment_author,comment_email,comment_content, comment_status, comment_date) 
                    VALUES($the_post_id, '{$comment_author}','{$comment_email}','{$comment_content}', 'unapproved', NOW()) ";
                    $insert_comment = mysqli_query($connection,$query);


$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = '{$the_post_id}'";
$update_comment_count = mysqli_query($connection,$query);

                }

                 ?>




                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_author" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email" />
                        </div>
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

<?php 
    $query = "SELECT * FROM comments WHERE comment_post_id = '{$the_post_id}'";
    $query .="AND comment_status = 'approve'";
    $query .="ORDER BY comment_id DESC";
    $select_comment_query = mysqli_query($connection, $query);


    while ($rows = mysqli_fetch_array($select_comment_query)) {
        # code...
        $comment_date = $rows['comment_date'];
        $comment_content = $rows['comment_content'];
        $comment_author = $rows['comment_author'];
 ?>


 <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                    
 <?php echo $comment_content; ?>
                    </div>
                </div>
  






   <?php } ?> 











               

    
            </div>

            <!-- Blog Sidebar Widgets Column -->
                    <?php include "includes/sidebar.php"; ?>



        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>