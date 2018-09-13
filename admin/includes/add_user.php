<?php 
	if (isset($_POST['create_user'])) {
		# code...
		$username = $_POST['username'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		

		//Move uploaded file
		$user_image = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$local_image = "./images/";
		move_uploaded_file($tmp_name, $local_image . $user_image);
		$user_role = $_POST['user_role'];

	$query = "INSERT INTO users(username,user_firstname,user_lastname,user_email,user_image,user_role) 
	VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";
	$add_user = mysqli_query($connection,$query);

		QueryConfirm($add_user);
	}

 ?>


<form action="" method="Post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" class="form-control" name="username">
	</div>


	<div class="form-group">
		<label for="user_role">Select Role</label>
	<select class="form-control" name="user_role" id="">
	<option value='subscriber'>Select Option</option>
	<option value='admin'>Admin</option>
	<option value='subscriber'>Subscriber</option>
     
    </select>
	</div>

	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>


	<div class="form-group">
		<label for="image">User Image</label>
		<input type="file" name="image">
	</div>
<!--
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10">			
		</textarea>
	</div>
-->
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
	</div>


</form>