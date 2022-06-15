<?php

session_start();
if(!isset($_SESSION['user']))
header("location:login.php");

if (isset($_POST['edit']) ) {
	$id=$_GET['search'];
    $name=$_POST['name'];
    $title=$_POST['title'];
    $sdescription=$_POST['sdescription'];
    $description=$_POST['description'];

	if(isset($_POST['imgyoko'])){
	$dir=basename($_FILES["imgyoko"]["name"]);
    move_uploaded_file($_FILES["imgyoko"]["tmp_name"],$dir);
	}else {
	$dir=$_POST['imgyoko2'];	
	}
    
    require("config.php");
    $query = "UPDATE `recipes` SET `name`='$name',`title1`='$title',`title2`='$sdescription',`des`='$description',`images`='$dir' WHERE id=$id";
    mysqli_query($con, $query) or die('Error querying database.1');
    $msg="Your recipe has been edited";
    mysqli_close($con);
}
?>

<?php
if (isset($_POST['delete']) ) {
	$id=$_POST['idr'];
    require("config.php");
    $query = "DELETE FROM `recipes` WHERE id=$id";
    mysqli_query($con, $query) or die('Error querying database.1');
    $msg="Your recipe has been deleted";
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>HTML5 Layout</title>
	<link href="yoko.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">
		<header>
			<img src="header.jpg" alt="header" />
			<nav>
				<ul>
					<li><a href="home.php" class="current">home</a></li>
					<li><a href="#">classes</a></li>
					<li><a href="#">recipes</a></li>
					<li><a href="#">about</a></li>
					<li><a href="#">contact</a></li>
				</ul>
			</nav>
		</header>
		<section class="home">
			</br>
			<h2> Welcome to Yoko's Kitchen </H2>
			<h3> Edit recipes/Search recipes. </h3>
		</section>
		<section class="courses">
					
			<article style="margin-left:60px">

					<form action="" method="get">
					<label for="name"> Search recipes</label><br>
					<input type="search" name="search" ><br><br>
					</form>
				<?php
					if (isset($_GET['search']) ) {
							$id=$_GET['search'];
							require("config.php");
							$sql = "SELECT * FROM `recipes` WHERE  `id`=$id";
							$result=mysqli_query($con,$sql);
							if($row=mysqli_fetch_array($result)){
					?>
				<form action="" method="post" id="form1" enctype="multipart/form-data">
					<h3>Edit recipes </h3><br>
					<input type="hidden" name="idr" value="<?php echo $row[0] ?>">
					<label for="name"> Recipe</label><br>
					<input type="text" name="name" id="name" value="<?php echo $row[1] ?>" required><br><br>
					<label for="title"> Title</label><br>
					<input type="text" name="title" id="title" value="<?php echo $row[2] ?>" required><br><br>
					<label for="sdescription"> Small description</label><br>
					<input type="text" name="sdescription" id="sdescription" value="<?php echo $row[3] ?>" required><br><br>
					<label for="description"> Description</label><br>
					<textarea name="description" id="description" cols="50" rows="10" required><?php echo $row[4] ?> </textarea><br><br>
					<label for="imgyoko"> Image</label><br>
					<input type="file" name="imgyoko" id="imgyoko"><br><br>
					<input type="hidden" name="imgyoko2" value="<?php echo $row[5] ?>"><br><br>
					<img src="<?php echo $row[5] ?>" alt=""  style="width: 120px;"><br><br>
					<input type="submit" name="edit" id="edit" value="EDIT"><br><br>
					<input type="submit" name="delete"  value="Delete"><br><br>
				</form>

			<?php
			}	mysqli_close($con);			
			}
			
			?>

			
			</article>

		</section>
		<footer>
			&copy; 2011 Yoko's Kitchen
		</footer>
	</div><!-- .wrapper -->
</body>

</html>

