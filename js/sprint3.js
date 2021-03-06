var alumne = new Array(7)

alumne[0] = "Ximo"
alumne[1] = "Isaac"
alumne[2] = "Sofian"
alumne[3] = "Joel"
alumne[4] = "Hideo Kojima"
alumne[5] = "Juanito"
alumne[6] = "Andrei"

//Ordena al a l'abecedari
    alumne.sort();
//Ordena al revés
    //alumne.reverse();

for (i=0;i<alumne.length;i++){
   	console.log("L'alumne " + alumne[i] + " és situa a el " + i + " de la llista d'alumnes registrats.")
}
/*var professor = new Array(3)

professor[0] = "Alex"
professor[1] = "Joan"
professor[2] = "Toni"

for (i=0;i<professor.length;i++){
   	console.log("El professor " + professor[i] + " és situa a el " + i + " de la llista de professors registrats.")
}*/
var professors = [
  {name: 'Alex', assignatura: 'M6'},
  {name: 'Joan', assignatura: 'M7'},
  {name: 'Toni', assignatura: 'M7'}

];

var professorsM7 =  professors.filter(function(profe) {
  // return profe.assignatura == 'M7';
  console.log(profe.assignatura == 'M7')
});

//Map
const usuaris = [
    {
        id:1,
        nom: 'Isaac',
        admin: true,

    },
    {
        id:2,
        nom: 'Ximo',
        admin: true,
    },
    {
        id:3,
        nom: 'ISofian',
        admin: false,
    }

]
console.log(usuaris.map(usuaris => usuaris))
//Map de Isaac Brull
let informeAlumnes = new Map();
informeAlumnes.set('Sofian', 'encarregat de la teoria');
informeAlumnes.set('Ximo', 'encarregat de coordiar el grup');
informeAlumnes.set('Isaac', 'encarregat de programació');
informeAlumnes.size;


for (let [key, value] of informeAlumnes) {
  console.log(key + ' te la funció de ' + value);
}

informeAlumnes.clear();
informeAlumnes.size;

//Map Ximo
const map = new Map()

map.set('1', 'Aixo es una mera prova')
map.set(1, 'Hosting')
map.set(1, 'Tesla i les bateries')
map.set(true, 'I WON THIS GAME, BY A LOT!')
console.log(map);



//Set
let persones = new Set();

persones.add("Ximo");
persones.add("Isaac");
persones.add("Sofian");
persones.add("Joel");
console.log(persones.size); // 4
persones.add("Gos");
console.log(persones.size); // 5

console.log(persones.has("Ximo"));
//Esborrar a pobre Ximo
persones.delete("Ximo");
console.log(persones.has("Ximo"));

//Imprimir l'array
persones.forEach(persona => {
  console.log(`Benvingut ${persona}!`);
});

//Objectes
//creacio constructor
function hosting(espai, correus, basedades, capacitatbanda) {
	this.espai = espai;
	this.correus = correus;
	this.basedades = basedades;
	this.capacitatbanda = capacitatbanda;
}
//Creació Objecte

//No funciona
// var adquisicio = new hosting();
//
// adquisicio empresa1 = 10;
// adquisicio empresa2 = 12;
//
// delete adquisicio empresa1;
//
// console.log('empresa2' in adquisicio);

var adquisicio1 = new hosting("2Gb", "15 comptes", "1Gb", "500Mb");
var adquisicio2 = new hosting("4Gb", "30 comptes", "2Gb", "1024Mb");
var adquisicio3 = new hosting("6Gb", "50 comptes", "3Gb", "2048Mb");


console.log(adquisicio1);
console.log(adquisicio2);
console.log(adquisicio3);

   	console.log("L'espai total del hosting més barat és de " + adquisicio1.espai + " i conté un total de " + adquisicio1.correus + " de correu");

//Promises
const promise = new Promise((resolve, reject) => {
  const peticio = new XMLHttpRequest();

  peticio.open("GET", "https://www.themealdb.com/api/json/v1/1/lookup.php?i=52772");
  peticio.onload = () => {
    if (peticio.status === 200) {
      resolve(peticio.response);

    } else {
      reject(Error(peticio.statusText));
    }
  };

  peticio.onerror = () => {
    reject(Error("Error, :/"));
  };

  peticio.send();
});

console.log("Petició feta.");

promise.then((data) => {
    console.log("S'han trobat alguns ingredients. A continuació els mostrarem:");
    var arrayProva2 = new Array(JSON.parse(data).meals[0].strIngredient1, JSON.parse(data).meals[0].strIngredient2, JSON.parse(data).meals[0].strIngredient3);
      for(var i=0;i<arrayProva2.length;i++){
        console.log(arrayProva2[i]);
      }
  },
  error => {
    console.log("Promise rebutjada.");
    console.log(error.message);
  }
);
