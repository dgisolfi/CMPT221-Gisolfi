<!DOCTYPE html>
	<html>
		<head>
			<title>Limbo</title>
		</head>
		<body>
			<?php
				$logo = "images/dog.png" ;
				$welcome = "Welcome to Limbo!" ;
				echo "<h1>" . $welcome . "</h1>" ;
				echo "<img border=\"0\" src=" . $logo . ">" ;
			?>
		</body>
	</html>

<!-- to run the program run the following command in terminal:  
docker build -t lab2 . 

or to run:
docker run -p 80:80 -v /Users/daniel/code-repos/CMPT221-Gisolfi/Lab2/src:/var/www/html/Lab2

-->