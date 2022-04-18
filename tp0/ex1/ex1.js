function perimetreC(){
	const pi=3.14;
	let r=prompt("Saisir le rayon");
	let res=r*2*pi;
	alert("le premier cercle"+res.toFixed(2));
	console.log(res.toFixed(2));
}
document.getElementById("res1")=res;


function perimetreR(){
	
    let lar=prompt("Saisir la larguer");
	let lon=prompt("Saisir la longeur");
	let res=lar+lon;
	alert("le premier rectangle"+res.toFixed(2));
	console.log(res.toFixed(2));
}
document.getElementById("res1")=res;