
<?php
if(isset($_POST['Login'])){
$email=$_POST['email'];
$pass=$_POST['passw'];
$pass=md5($pass);
require("config.php");
$sql = "SELECT * FROM `user`where email='$email' and passw='$pass'";
$result=mysqli_query($con,$sql);
if($row=mysqli_fetch_array($result)){
    session_start();
    $_SESSION['user']=$email;
    header("location:admin.php");
}
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
			<h3> Login Page. </h3>
		</section>
		<section class="courses">

			<article style="margin-left:60px">
				<form action="" method="post"  enctype="multipart/form-data">
					<h3>Login Page </h3><br>
					<label for="Email"> Email</label><br>
					<input type="email" name="email"  required><br><br>
					<label for="Password"> Password</label><br>
					<input type="password" name="passw"  required><br><br>
					<input type="submit" name="Login" value="Login"> <br><br>
				</form>
			</article>
		</section>
		<footer>
			&copy; 2011 Yoko's Kitchen
		</footer>
	</div><!-- .wrapper -->
</body>

</html>
