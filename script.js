let inputs=document.querySelectorAll('input');
inputs.forEach(element=>{
	element.addEventListener('change',event=>{
		 let slanjeForme = true;
		let currentInput=event.target;
		let inputValue=currentInput.value;
		let inputName=currentInput.getAttribute('name');

		switch(inputName){
			case 'naslov':
			let poljeNaslov = document.querySelector("#naslov");
			if(poljeNaslov.value.length<5||poljeNaslov.value.length>30){
				slanjeForme = false;
 				poljeNaslov.style.border="1px dashed red";
				let naslovPoruka=document.querySelector('#porukaTitle');
				naslovPoruka.innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";
				naslovPoruka.style.color="red";
			}
			break;
			case 'kratki_sadrzaj':

			let poljeAbout = document.querySelector("#kratki_sadrzaj");

			if(poljeAbout.value.length<10||poljeAbout.value.length>100){
				let porukaSadrzaj=document.querySelector('#porukaAbout');
				porukaSadrzaj.innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>"
				porukaSadrzaj.style.color="red";
				slanjeForme = false;
 				poljeAbout.style.border="1px dashed red";

			}
			break;
			case 'sadrzaj':
			 let poljeContent = document.querySelector("#sadrzaj");
			 if(poljeContent.value.length==0){
			slanjeForme = false;
 			poljeContent.style.border="1px dashed red";
 			let porukaContent=document.querySelector('#porukaContent');
 			porukaContent.style.color="red";
 			porukaContent.innerHTML="Sadržaj mora biti unesen!<br>";
			 }
			 break;
			 case 'slika':
			 let slika=document.querySelector('#slika').value;
			 if(slika.length==0){
			 	let porukaSlika=document.querySelector('#porukaSlika');
			 	porukaSlika.innerHTML="Slika mora biti unesena!<br/>";
			 	porukaSlika.style.color="red";
			 }

			 break;
		}

		

	})
})

	