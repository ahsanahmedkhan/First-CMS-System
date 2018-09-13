                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>AUTHOR</th>
                                    <th>COMMENT</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>IN RESPONSE TO</th>
                                    <th>DATE</th>
                                    <th>APPROVE</th>
                                    <th>UNAPROVE</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 

    $query = "select * from comments";
    $select_comments = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_array($select_comments)) {
        # code...
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        
echo "<tr>";
echo "<td>$comment_id</td>";                                    
echo "<td>$comment_author</td>";
echo "<td>$comment_content</td>";
echo "<td>$comment_email</td>";
echo "<td>$comment_status</td>";

/*
$query = "select * from categories where cat_id = {$post_category_id}";
$update_query = mysqli_query($connection,$query);
                                            
while ($row = mysqli_fetch_array($update_query)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

echo "<td>{$cat_title}</td>";
}
*/

$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
$select_comment_post_id = mysqli_query($connection,$query);
while ($rows = mysqli_fetch_array($select_comment_post_id)) {
    # code...
    $post_id = $rows['post_id'];
    $post_title = $rows['post_title'];

    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

}

echo "<td>$comment_date</td>";
echo "<td><a href='comment.php?approve=$comment_id'>Approve</a></td>";
echo "<td><a href='comment.php?unapprove=$comment_id'>Unapprove</a></td>";
echo "<td><a href='comment.php?delete=$comment_id'>Delete</a></td>";
echo "</tr>";                                                                        

    }
 ?>
           </tbody>
          </table>

<?php 


if (isset($_GET['approve'])) {
    # code...
   $approve_comment_id = $_GET['approve'];
   $query = "update comments set comment_status = 'approve' where comment_id = '$approve_comment_id'";
   $approve_comment_query = mysqli_query($connection,$query);
   header("Location: comment.php"); 

   QueryConfirm(!$approve_comment_query);
}

if (isset($_GET['unapprove'])) {
    # code...
   $unapprove_comment_id = $_GET['unapprove'];
   $query = "update comments set comment_status = 'unapprove' where comment_id = '$unapprove_comment_id'";
   $unapprove_comment_query = mysqli_query($connection,$query);
   header("Location: comment.php");

   QueryConfirm(!$unapprove_comment_query);
}



if (isset($_GET['delete'])) {
    # code...
   $delete_comment = $_GET['delete'];
   $query = "delete from comments where comment_id = {$delete_comment}"; 
   $delete_query = mysqli_query($connection,$query);
   header("Location: comment.php");

   QueryConfirm(!$delete_query);
}

?>




