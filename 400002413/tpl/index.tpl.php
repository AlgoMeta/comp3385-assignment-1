<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="/"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<?php
					if (SessionManager::userIsLoggedIn()) {
						echo '<li><a href="index.php?controller=Logout">Logout</a></li>';
					} else {
						echo '<li><a href="index.php?controller=Login">Login</a></li>';
						echo '<li><a href="index.php?controller=SignUp">Sign Up</a></li>';
					}
				?>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>

			<?php
				$counter = 0;
				foreach($this->obsData[0] as $record){
					if ($counter == 0) {
						echo "<div class='centered'>";
					}

					echo '<section>
							<a href="#"><img src="images/' . $record["course_image"] . '" alt="First Course" title="Data structures">
							<span class="course-title">' . $record["course_name"] . '</span>
							<span>' . $record["instructor_name"] .'</span></a>
						</section>';
					
					$counter++;
			
					if ($counter == 4) {
						echo "</div>";
						$counter = 0;
					}
				}
			?>
			
			<h1>Learner Recommended</h1>

			<?php
				$counter = 0;
				foreach($this->obsData[1] as $record){
					if ($counter == 0) {
						echo "<div class='centered'>";
					}

					echo '<section>
							<a href="#"><img src="images/' . $record["course_image"] . '" alt="First Course" title="Data structures">
							<span class="course-title">' . $record["course_name"] . '</span>
							<span>' . $record["instructor_name"] .'</span></a>
						</section>';
					
					$counter++;
			
					if ($counter == 4) {
						echo "</div>";
						$counter = 0;
					}
				}
			?>
			
			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>