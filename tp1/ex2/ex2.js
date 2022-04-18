var t = [8, 12, 9, 12, 17, 18, 15, 13];
var n = ["tata", "tete", "titi", "toto", "tutu", "tate", "tati", "tato"];
eleve = new Array;


let i = 0
t.forEach(function(element) {

    eleve.push({ name: n[i], note: element });
    i++
});



eleve.forEach(function(element) {


    document.getElementById("tab").innerHTML += "<tr >" + "<th>" + element.name + "</th>" + "<th>" + element.note + "</th>" + "</tr>";
});



//note sup a 3achra
let s = eleve.filter(eleve => eleve.note > 10);
document.getElementById("sup").innerHTML += s.length;


let sum = 0;
eleve.forEach(function(element) {
    sum += element.note;
});
document.getElementById("moy").innerHTML += (sum / eleve.length);



let max = 0;
eleve.forEach(function(element) {
    if (element.note > max) { max = element.note }
});
document.getElementById("max").innerHTML += max;
// find pos

let r = eleve.find(({ note }) => note === 9);
document.getElementById("pos").innerHTML += (eleve.indexOf(r) + 1);





let tb = eleve.sort(function(a, b) {
    var nameA = a.name.toUpperCase();
    var nameB = b.name.toUpperCase();
    if (nameA < nameB) {
        return -1;
    }
    if (nameA > nameB) {
        return 1;
    }
    return 0;
});
tb.forEach(function(element) {
    document.getElementById("tab_trie_name").innerHTML += "<tr >" + "<th>" + element.name + "</th>" + "<th>" + element.note + "</th>" + "</tr>";
});


//trie tab by note 
let tr = eleve.sort((a, b) => a.note - b.note);
tr.forEach(function(element) {
    document.getElementById("tab_trie_note").innerHTML += "<tr >" + "<th>" + element.name + "</th>" + "<th>" + element.note + "</th>" + "</tr>";
});