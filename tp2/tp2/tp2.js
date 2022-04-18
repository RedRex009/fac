//declaration des variables
var text = document.getElementById("result");
var Perso = [];
var J = [];
var A = [];
var i = 0;
var j = 0;
var a = 0;

//creation de prototype Personnage
var Personnage = {
	initPerso: function (nom,sante,force){
		this.nom=nom;
		this.sante=sante;
		this.force=force;
	}
}

//fonction de creation de nouvelle personne
function CreateP(){
	let P=Object.create(Personnage);
	P.nom=prompt("Inserer le nom de la personne");
	P.sante=prompt("Inserer la santé de la personne");
	P.force=prompt("Inserer la force de la personne");
var descriptionPersonne=
P.nom+" a "+P.sante+" points de vie et "+P.froce+" en force ";
Perso[i]=descriptionPersonne;
i+=1;

}

//fonction d'affichage de toutes les personnes
function Show(){
for (i=0;i<Perso.length;i++){
	text.innerHTML+=Perso[i]+"<br>";
}
}

//creation de prototype joueur

var Joueur = Object.create(Personnage);

// ajout de la fonction decrire

Joueur.decrire=function(){
var description=
this.nom + "a" + this.sante + "points de vie" + this.force + "en droce et " + this.xp + " points d experiece";
return description;
};

//fonction de creation de nouveaux joueurs
function CreateJ(){
let Jr = Object.create(Joueur);
Jr.nom = prompt("Inserer le nom du joueur :");
Jr.sante = prompt("Inserer la santé du joueur :");
Jr.force = prompt("Inserer la force du joueur :");
Jr.xp = prompt("Inserer l experience du joueur :");
J[j] = Jr.decrire();
j += 1;

}


//fonction d'affichage de tous les joueurs
function ShowJoueur(){
for (j = 0; j < J.length; j++){
	text.innerHTML += J[j] + "<br>";
}



}


//creation du prototype adversaire

var Adversaire = Object.create(Personnage);

//on ajoute la fonction initAdversaire au prototype

Adversaire.initAdversaire = fonction(nom, sante, force, race, valeur);
{
	this.initPerso(nom, sante, force);
	this.race = race;
	this.valeur = valeur;
}

//focntion de création de nouveaux adversaire

function CreateA(){
	let Ad = Object.create(Adversaire);
	Ad.nom = prompt("Inserer le nom de l adversaire :");
	Ad.sante = prompt("Inserer la sante de l adversaire :");
	Ad.force = prompt("Inserer la force de l adversaire :");
	Ad.race = prompt("Inserer la race de l adversaire :");
	Ad.valeur = prompt("Inserer l experinece de l adversaire :");



var descriptionAd=
Ad.nom + " a " + Ad.sante +" points de vie et " + Ad.froce + " en force " + Ad.race + " en race "  + Ad.valeur + " en valeur ";
A[a] = descriptionAd;
a += 1;


}


//fonction d'affichage de tous les adversaires
function ShowAd() {
	for(a = 0; a < A.length; a++)
	{
		text.innerHTML += A[a] + "<br>";
	}
}