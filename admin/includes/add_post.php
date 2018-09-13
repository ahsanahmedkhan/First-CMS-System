<?php 
	if (isset($_POST['create_post'])) {
		# code...
		$post_title = $_POST['title'];
		$post_author = $_POST['post_author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		

		//Move uploaded file
		$post_image = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$local_image = "../images/";
		move_uploaded_file($tmp_name, $local_image . $post_image);


		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		//$post_comment_count = 7;

	$query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) 
	VALUES('{$post_category_id}','{$post_title}','{$post_author}',NOW(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
	$insert_posts = mysqli_query($connection,$query);

		QueryConfirm($insert_posts);
	}

 ?>


<form action="" method="Post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">

	<select class="form-control" name="post_category" id="">

      <?php 
        $query = "SELECT * FROM categories ";

        $update_query = mysqli_query($connection,$query);                                            
        
        while ($row = mysqli_fetch_array($update_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        
        echo "<option value='$cat_id'>{$cat_title}</option>";
}
       
      ?>

    </select>
	</div>

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10">			
		</textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>


</form>