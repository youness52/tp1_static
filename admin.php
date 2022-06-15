
<?php
session_start();
if(!isset($_SESSION['user']))
header("location:login.php");
?>

<?php
if (isset($_POST['add']) ) {
    $name=$_POST['name'];
    $title=$_POST['title'];
    $sdescription=$_POST['sdescription'];
    $description=$_POST['description'];
    $dir=basename($_FILES["imgyoko"]["name"]);
    move_uploaded_file($_FILES["imgyoko"]["tmp_name"],$dir);
    require("config.php");
    $query = "INSERT INTO `recipes` (`id`, `name`, `title1`, `title2`, `des`, `images`) VALUES (NULL, '$name', '$title', '$sdescription', '$description', '$dir'); ";
    mysqli_query($con, $query) or die('Error querying database.1');
    $msg="Your recipe has been added";
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
					<li><a href="logout.php">LogOut</a></li>
					<li><a href="modifier.php">Edit</a></li>
				</ul>
			</nav>
		</header>
		<section class="home">
			</br>
			<h2> Welcome to Yoko's Kitchen </H2>
			<h3> ADD NEW. </h3>
		</section>
		<section class="courses">

			<article style="margin-left:60px">
				<form action="" method="post"  enctype="multipart/form-data">
					<h3>Add new recipes </h3><br>
					<label for="name"> Recipe</label><br>
					<input type="text" name="name" id="name" value="" required><br><br>
					<label for="title"> Title</label><br>
					<input type="text" name="title" id="title" value="" required><br><br>
					<label for="sdescription"> Small description</label><br>
					<input type="text" name="sdescription" id="sdescription" value="" required><br><br>
					<label for="description"> Description</label><br>
					<textarea name="description" id="description" cols="50" rows="10" required> </textarea><br><br>
					<label for="imgyoko"> Image</label><br>
					<input type="file" name="imgyoko" id="imgyoko"><br><br>
					<input type="submit" name="add" id="add" value="ADD"> <br><br>
					
				</form>
			</article>

		</section>
		<footer>
			&copy; 2011 Yoko's Kitchen
		</footer>
	</div><!-- .wrapper -->
</body>

</html>

