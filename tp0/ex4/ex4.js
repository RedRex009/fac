var text= document.getElementByID("text")
var counter = 0

//fonction count

function Count(){
	counter=counter+1
	text.innerHTML="Vous avez cliqué"+counter+"fois."
}

//fonction reset

function Reset(){
	counter = 0
	text.innerHTML="Vous avez cliqué"+counter+"fois."
}