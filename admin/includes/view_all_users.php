                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>USER NAME</th>
                                    <th>FRIST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>EMAIL</th>
                                    <th>USER IMAGE</th>
                                    <th>USER ROLE</th>
                                    <th>ADMIN</th>
                                    <th>SUBSCRIBER</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 

    $query = "select * from users";
    $select_users = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_array($select_users)) {
        # code...
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        
echo "<tr>";
echo "<td>$user_id</td>";                                    
echo "<td>$username</td>";
echo "<td>$user_firstname</td>";
echo "<td>$user_lastname</td>";
echo "<td>$user_email</td>";
echo "<td><img width='100' src='./images/$user_image' </img></td>";
echo "<td>$user_role</td>";

/*
$query = "select * from categories where cat_id = {$post_category_id}";
$update_query = mysqli_query($connection,$query);
                                            
while ($row = mysqli_fetch_array($update_query)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

echo "<td>{$cat_title}</td>";
}
*/

echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";

echo "</tr>";
 
 }
 
 ?>
           </tbody>
          </table>

<?php 


if (isset($_GET['change_to_admin'])) {
    # code...
   $the_user_id = $_GET['change_to_admin'];
   $query = "update users set user_role = 'admin' where user_id = '$the_user_id'";
   $change_admin_query = mysqli_query($connection,$query);
   header("Location: users.php");

   QueryConfirm(!$change_admin_query);
}

if (isset($_GET['change_to_sub'])) {
    # code...
   $the_user_id = $_GET['change_to_sub'];
   $query = "update users set user_role = 'Subscriber' where user_id = '$the_user_id'";
   $change_sub_query = mysqli_query($connection,$query);
   header("Location: users.php");

   QueryConfirm(!$change_admin_query);
}

if (isset($_GET['delete'])) {
    # code...
   $delete_user = $_GET['delete'];
   $query = "delete from users where user_id = {$delete_user}"; 
   $delete_query = mysqli_query($connection,$query);
   header("Location: users.php");

   QueryConfirm(!$delete_query);
}

?>
