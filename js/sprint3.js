var alumne = new Array(6)

alumne[0] = "Ximo"
alumne[1] = "Isaac"
alumne[2] = "Sofian"
alumne[3] = "Joel"
alumne[4] = "Hideo Kojima"
alumne[5] = "Juanito"

for (i=0;i<alumne.length;i++){
   	console.log("L'alumne " + alumne[i] + " és situa a el " + i + " de la llista d'alumnes registrats.")
}
var professor = new Array(3)

professor[0] = "Alex"
professor[1] = "Joan"
professor[2] = "Toni"

for (i=0;i<professor.length;i++){
   	console.log("El professor " + professor[i] + " és situa a el " + i + " de la llista de professors registrats.")
}

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
usuaris.map(usuaris => usuaris)
//Set
let persones = new Set();

persones.add("Ximo");
persones.add("Isaac");
persones.add("Sofian");
persones.add("Joel");
console.log(persones.size); // 4
persones.add("Gos");
console.log(persones.size); // 4

console.log(persones.has("Ximo"));
//Esborrar a pobre Ximo
persones.delete("Ximo");
console.log(persones.has("Ximo"));

//Imprimir l'array
persones.forEach(persona => {
  console.log(`Benvingut ${persona}!`);
});
