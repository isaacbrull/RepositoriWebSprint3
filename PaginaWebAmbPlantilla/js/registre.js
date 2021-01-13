//Implementació funció fletxa i expressions i operadors
/*
((text) => {
    for(let x = 0;x<10;x++) {
        document.getElementById("demo").innerHTML += ((x > 0 ? " - " : "") + text + " " + x);
    }
})("numero");*/


//Implementació expressions regulars a la contrasenya
const formulari = document.getElementById('form');

const missatge = document.getElementById('missatge');

formulari.addEventListener('submit', function(event){
  //"\/W" qualsevol cosa que no sigue un word un text, "d" caracters decimals
  let expressio = /^[\w\d]{8,20}$/;
  let resultat = document.getElementById('password').value.match(expressio);

  if(!resultat){
    missatge.innerHTML = "Caracters ilegals";
  }else {
    missatge.innerHTML = "Formulari enviat satisfactoriament";
  }
  event.preventDefault();
  return false;
});

//var data = new Date(); data.toString();
