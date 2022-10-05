
<?php
include 'connect.php';
define('UPLPATH', 'images/');
?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link   rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet"  href="bootstrap-5.0.1-dist/css/bootstrap.min.css">
	<title></title>
</head>
<body>

	<div id="header" class="row">
<header>
	<h1>Kategorija</h1>
</div>
<div class="row">
<nav id="navigacija" class="col-lg-12">
<ul><li><a href="index.php">Home</a></li>
	<li><a href="kategorije.php?kategorija=sport">Sport</a></li>
	<li><a href="kategorije.php?kategorija=hrana">Food</a></li>
	<li><a href="login.html">Administracija</a></li>
	<li><a href="folderB/unos.html">Unos vijesti</a></li>
</ul>
</nav>
</div>
</header>

<?php
	$kategorija=$_GET['kategorija'];
	$query = "SELECT * FROM vijest WHERE kategorija='$kategorija'";

	$result=mysqli_query($dbc,$query);
?>

<section class="sport">
<h2 style="text-transform: uppercase;"><?php echo $kategorija ?></h2>
<br/>
<br/>
<?php
	echo '<div id="con" class="container">
			<div class="row">';
		
while($row=mysqli_fetch_array($result)){
	
	echo '
 		<div id="omotacVijesti" class="col-lg-4 col-md-6 col-sm-12">
 		
 	 	<img src="' . UPLPATH . $row['slika'] . '"
 	 	
	 	<div class="naslov2"
 		 <h3 class="title">
 		 <a id="reference" href="clanak.php?id='. $row['id'] . '"> '. $row['naslov'] . '
 		 </a></h3>
 		 <p class="sazetakV">'. $row['sazetak'] . ' </p>
 		<p class="datumV"> '. $row['datum'] . '</p>
 		 
 		 </div>
 		 ';
	
	
	}
	echo '</div></div>';
		
?>

</section>

<div class="row">
<footer class="footer">
		<div class="col-lg-12">
		<h3>Ivan Zagorac</h3><br/>
		</div>
		<div class="col-lg-12">
		<h3>ivan.zagorac18@gmail.com</h3><br/>
		</div>
		<div class="col-lg-12">
		<h3>2022</h3><br/>
		</div>


</footer>
</div>


</body>
</html>
