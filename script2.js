
let inputs=document.querySelectorAll('input');
inputs.forEach(element=>{
    element.addEventListener('change',event=>{
        var slanjeForme = true;

 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;
 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 let porIme=document.getElementById("porukaIme");
 porIme.innerHTML="<br>Unesite ime!<br>";
 porIme.style.color="red";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 }
 // Prezime korisnika mora biti uneseno
 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;

 poljePrezime.style.border="1px dashed red";


let porPrez=document.getElementById("porukaPrezime");
porPrez.innerHTML="<br>Unesite Prezime!<br>";
porPrez.style.color="red";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }

 // Korisničko ime mora biti uneseno
 var poljeUsername = document.getElementById("username");
 var username = document.getElementById("username").value;
 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";

let porUs=document.getElementById("porukaUsername");
porUs.innerHTML="<br>Unesite korisničko ime!<br>";
porUs.style.color="red";
 } else {
 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 }

 // Provjera podudaranja lozinki
 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 let porLoz=document.getElementById("porukaPass");
 porLoz.innerHTML="<br>Lozinke nisu iste!<br>";
 porLoz.style.color="red";

let bla=document.getElementById("porukaPassRep");
bla.innerHTML="<br>Lozinke nisu iste!<br>";
bla.style.color="red";
 } else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }

 if (slanjeForme != true) {
 event.preventDefault();
 }

 });

});

 

