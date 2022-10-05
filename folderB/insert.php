<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link   rel="stylesheet" type="text/css" href="../style.css">
      <link rel="stylesheet"  href="../bootstrap-5.0.1-dist/css/bootstrap.min.css">
       <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
   <script src="../js/form-validation.js"></script> 
    <title>Administracija</title>
</head>
<body>

<main class="main">
<div class="row">
<header><h1>Administracija</h1>
</div>
<div class="row">
<nav id="navigacija" class="col-lg-12">
<ul><li><a href="../index.php">Home</a></li>
    <li><a href="../kategorije.php?kategorija=sport">Sport</a></li>
    <li><a href="../kategorije.php?kategorija=hrana">Food</a></li>
    <li><a href="../login.html">Administracija</a></li>
    <li><a href="unos.html">Unos vijesti</a></li>
</ul>
</nav>
</div>
</header>


<?php
include '../connect.php';
if(isset($_POST['submit'])){
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['kratki_sadrzaj'];
$content=$_POST['sadrzaj'];
$category=$_POST['kategorija'];
    $date=date('d.m.Y.');
    if(isset($_POST['odabir'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = '../images/'.$picture;
move_uploaded_file($_FILES['slika']['tmp_name'], '$target_dir');

if(strlen($date)==0||strlen($title)==0||
    strlen($about)==0||strlen( $content)==0|| strlen($picture)==0||
strlen($category)==0){
    echo 'Registracija nije prošla';

}else{
    $query = "INSERT INTO vijest (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
}




mysqli_close($dbc);
}



?>

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
</main>


</body>
</html>