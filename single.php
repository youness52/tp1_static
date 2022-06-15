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
						<li><a href="home.html" class="current">home</a></li>
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
			<h3> Single page. </h3>
			</section>
			<section class="courses">
				<?php
                $id=$_GET['id'];
				require("config.php");
                $sql = "SELECT * FROM `recipes`where id=$id";
				$result=mysqli_query($con,$sql);
				if($row=mysqli_fetch_array($result)){
				?>
				<a href="single.php?id=<?php echo $row[0] ?>">
				<article>
					<figure>
						<img src="<?php echo $row[5] ?>" alt="<?php echo $row[1] ?>" />
						<figcaption><?php echo $row[1] ?></figcaption>
					</figure>
					<hgroup>
						<h2><?php echo $row[2] ?></h2>
						<h3><?php echo $row[3] ?></h3>
					</hgroup>
					<p><?php echo $row[4] ?></p>
				</article></a>
					<?php }
				mysqli_close($con);
					?>
			</section>
			
			<footer>
				&copy; 2011 Yoko's Kitchen
			</footer>
		</div><!-- .wrapper -->
	</body>
</html>
