<?php
session_start();
include '../connect.php';
define('UPLPATH', '../images/');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link   rel="stylesheet" type="text/css" href="../style.css">
	  <link rel="stylesheet"  href="../bootstrap-5.0.1-dist/css/bootstrap.min.css">
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
    <li><a href="unos.html">Unos Vijesti</a></li>
</ul>
</nav>
</div>
</header>
	
    <?php

$uspjesnaPrijava=true;
$admin=true;
if (isset($_POST['submit'])) {
 // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona
 $prijavaImeKorisnika = $_POST['username'];
 $prijavaLozinkaKorisnika = $_POST['pass'];
 $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
 WHERE korisnicko_ime = ?";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
 mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,
$levelKorisnika);
 mysqli_stmt_fetch($stmt);
 //Provjera lozinke
 if (password_verify($_POST['pass'], $lozinkaKorisnika) &&
mysqli_stmt_num_rows($stmt) > 0) {
 $uspjesnaPrijava = true;

 // Provjera da li je admin
 if($levelKorisnika == 1) {
 $admin = true;
 }
 else {
 $admin = false;
 }
 //postavljanje session varijabli
 $_SESSION['$username'] = $imeKorisnika;
 $_SESSION['$level'] = $levelKorisnika;
 } else {
 $uspjesnaPrijava = false;
 }

}

 if ($uspjesnaPrijava == true && $admin == true){
 

$query = "SELECT * FROM vijest";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result)) {

 echo '
 <div class="omotacForme">
 <form enctype="multipart/form-data" action="" method="POST">
 
 <label for="naslov">Naslov vijesti:</label><br/>

 <input type="text" name="naslov" id="naslov"
value="'.$row['naslov'].'"><br/>

 <label for="kratki_sadrzaj">Kratki sadržaj vijesti (do 50
znakova):</label><br/>
 <textarea name="kratki_sadrzaj" id="kratki_sadrzaj" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea><br/>
 
 
 <label for="sadrzaj">Sadržaj vijesti:</label><br/>
 <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea><br/>
 

 <label for="slika">Slika:</label><br/>
 <input type="file" class="input-text" id="photo"
value="'. UPLPATH . $row['slika'].'" name="slika"/><br/>


 <label for="kategorija">Kategorija vijesti:</label><br/>
 <select name="kategorija" id="kategorija" class="form-field-textual"
value="'.$row['kategorija'].'">
 <option value="sport">Sport</option>
 <option value="hrana">Hrana</option>
 </select><br/>
 

 <label>Spremiti u arhivu:
 ';
 
 if($row['arhiva'] == 0) {
 echo '<input type="checkbox" name="arhiva" id="arhiva"/><br/>';
 } else {
 echo '<input type="checkbox" name="arhiva" id="arhiva"
checked/><br/> ';
 }
 echo '
 </label><br/>


 <input type="hidden" name="id" class="form-field-textual"
value="'.$row['id'].'"><br/>
 <button class="gumbovi" type="reset" value="Poništi">Poništi</button>
 <button class="gumbovi" type="submit" name="update" value="Prihvati">
Izmjeni</button>
 <button class="gumbovi" type="submit" name="delete" value="Izbriši">
Izbriši</button>
 </div>
 </form>
 </div>'
 ;
}


if(isset($_POST['delete'])){
 $id=$_POST['id'];
 $query = "DELETE FROM vijest WHERE id=$id ";
 $result = mysqli_query($dbc, $query);
}


if(isset($_POST['update'])){
$slika = $_FILES['slika']['name'];
$naslov=$_POST['naslov'];
$kratkiSadrzaj=$_POST['kratki_sadrzaj'];
$sadrzaj=$_POST['sadrzaj'];
$kategorija=$_POST['kategorija'];
if(isset($_POST['arhiva'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'images/'.$picture;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$id=$_POST['id'];
$query = "UPDATE vijest SET naslov='$naslov', sazetak='$sazetak', tekst='$sadrzaj',
slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
$result = mysqli_query($dbc, $query);
}

?>

<?php
 } else if ($uspjesnaPrijava == true && $admin == false) {

 echo '<h2 style="text-align:center;font-size:36px;">Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali
niste administrator.</h2>';
 } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {


 echo '<h2 style="text-align:center;font-size:36px;">Bok ' . $_SESSION['$username'] . '! Uspješno ste
prijavljeni, ali niste administrator.</h2>';
 } else if ($uspjesnaPrijava == false) {
 ?>
 <?php
 echo '<div style="width:100%;text-align:center;"><h2>Prijava nije prošla,morate se registrirati!</h2></div>';
 echo '<div style="width:100%;text-align:center;"><a style="font-size:18px;text-align:center;" href="../registracija.php">Link za registraciju</a></div>';
 
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