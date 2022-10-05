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
       <h1>ČLANAK</h1>
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
include 'connect.php';
define('UPLPATH', 'images/');
?>

<?php

$id=$_GET['id'];
$query="SELECT * FROM vijest WHERE id='$id' ";
$result=mysqli_query($dbc,$query);

while($row=mysqli_fetch_array($result)){
       $naslov= $row['naslov'];
       $kategorija= $row['kategorija'];
       $kratkiSadrzaj=$row['sazetak'];
       $tekst=$row['tekst'];
       $arhiva=$row['arhiva'];
       $datum=$row['datum'];
       $slika=$row['slika'];

       }

?>
<div class="hc">
<h2 class="category" style="
       text-align: left;
       font-size: 46px;
       text-transform: uppercase;"><?php
 echo $kategorija;
 ?></h2></div>
<div style="background-color: lightgreen;margin:0 auto;" id="cont" class="container" style="width: 75%;">
 <div class="row">
 
 <h1 style="color:royalblue;" class="title"><?php
 echo $naslov;
 ?></h1>
 <p class="datum" style=""><?php echo $datum;?></p>
 </div>
 <section class="slika2">
 <?php
 echo '<img src="' . UPLPATH . $slika . '"';
 ?>
 </section>
 <section style="text-align: center;" class="about">
 <p style="font-size: 16px;text-align: center;">
 <?php
 echo $kratkiSadrzaj;
 ?>
 </p>

 <p style="font-size: 16px;text-align: center;">
 <?php
 echo $tekst;
 ?>
 </p>
 </section>
</div>
</div>
 
 

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

