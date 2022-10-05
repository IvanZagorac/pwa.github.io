<?php
include 'connect.php';
define('UPLPATH', 'images/');
?>

<!DOCTYPE html>
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
	<h1>Vijesti</h1>
</div>
<div class="row">
<nav id="navigacija" class="col-lg-12">
<ul><li><a href="index.php">Home</a></li>
	<li><a href="kategorije.php?kategorija=Sport">Sport</a></li>
	<li><a href="kategorije.php?kategorija=Hrana">Food</a></li>
	<li><a href="login.html">Administracija</a></li>
	<li><a href="folderB/unos.html">Unos vijesti</a></li>
</ul>
</nav>
</div>
</header>



 <section role="main">
    <div style="width: 60%;margin: 0 auto;" class="omotacForme">
 <form  enctype="multipart/form-data" action="" method="POST">
 
 <label for="ime">Ime: </label><br/>
 <input style="width:45%;" type="text" name="ime" id="ime" class="form-fieldtextual"><br/>
 <span id="porukaIme" class="bojaPoruke"></span><br/>
 <label for="prezime">Prezime: </label><br/>
 <input  style="width:45%;" type="text" name="prezime" id="prezime" class="formfield-textual"><br/>
 <span id="porukaPrezime" class="bojaPoruke"></span><br/>

 <label for="username">Korisničko ime:</label><br/>
 
 <input  style="width:45%;" type="text" name="username" id="username" class="formfield-textual"><br/>

 <span id="porukaUsername" class="bojaPoruke"></span><br/>
 <label for="pass">Lozinka: </label><br/>
<input  style="width:45%;" type="password" name="pass" id="pass" class="formfield-textual"><br/>

 <span id="porukaPass" class="bojaPoruke"></span><br/>
 <label for="passRep">Ponovite lozinku: </label><br/>
 <input  style="width:45%;" type="password" name="passRep" id="passRep"
class="form-field-textual"><br/>
 <span id="porukaPassRep" class="bojaPoruke"></span><br/>
 

 <button name="submit" type="submit" value="Prijava"
id="slanje">Prijava</button>
 </form>
</div>

<?php
$registriranKorisnik = '';
if(isset($_POST['submit'])){
	$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = rand(0,1);



 $msg="";
$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0){
 $msg='Korisničko ime već postoji!';
}else{
    if(strlen($ime)==0||strlen($prezime)==0||
    strlen($username)==0||strlen( $lozinka)==0|| strlen($hashed_password)==0||
strlen($razina)==0){

    }else{
        $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,
razina)VALUES (?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($dbc);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
$hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 $registriranKorisnik = true;
 }
}

}

 
 if($registriranKorisnik == true) {
 echo '<h2 style="text-align:center;font-size:36px;">Korisnik je uspješno registriran!</h2>';
 echo '<div style="width:100%;text-align:center;"><a style="text-align:center;font-size:36px;" href="login.html">Ulogiraj se </a></div>';
 } 
 
mysqli_close($dbc);

    }

 
?>

<script src="script2.js"></script>

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