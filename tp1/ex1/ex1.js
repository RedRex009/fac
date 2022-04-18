var t = [8, 12, 9, 12, 17, 18, 15, 13];



t.forEach(function(element) {
    document.getElementById("tab").innerHTML += "<th>" + element + "</th>";
});



let t1 = t.filter(x => x > 10);
document.getElementById("sup").innerHTML += t1.length;



let sum = 0;
t.forEach(function(element) {
    sum += element;
});
document.getElementById("moy").innerHTML += (sum / t.length);



let tr = t.sort(function(a, b) { return a - b });
tr.forEach(function(element) {
    document.getElementById("tabtrie").innerHTML += "<th>" + element + "</th>";
});