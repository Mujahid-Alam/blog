<?php
$connect = mysqli_connect('localhost','root','','blog') or die("Connection Failed");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="" class="navbar-brand">Blog</a>
<form action="" class="d-flex">
<input type="serach" class="form-control" >
<Input type="submit" class="btn btn-success">

</form>    
    
    </nav>


<div>


</div>
<div class="container">
	<div class="row">



		<div class="col-lg-3">
			<form action="index.php" method="post" enctype="multipart/form-data">
				<div class="mb-3">
				<label for="img">Image</label>
				<input type="file" name="photo" id="img">
				</div>
				<div class="mb-3">
					<input type="submit" name="send" class="btn btn-success">
					
				</div>
			</form>
		</div>
<div class="col-lg-9">
<div class="row">
<div class="col-lg-3">

<?php
$call =mysqli_query($connect,"SELECT * FROM posts");
while($row_m=mysqli_fetch_array($call)):


?>
<div class="card"> 
<img src="images/<?php echo $row_m['photos'] ?>" class="img-fluid" style="height:200px; object-fit:cover;">
</div>
</div>

<?php endwhile; ?>

</div>
</div>
		
	</div>
	
</div>
</body>
</html>

<?php

 if(isset($_POST['send'])){
 $pic = $_FILES['photo']['name'];
 $tmp_name = $_FILES['photo']['tmp_name'];

 move_uploaded_file($tmp_name, "images/$pic");


 $query = mysqli_query($connect, "INSERT INTO posts (photos) value('$pic')");

 if($query)
	echo "ho gya";
else
	echo "Not huwa";

}
?>

<?php include('audio.php') ;?>