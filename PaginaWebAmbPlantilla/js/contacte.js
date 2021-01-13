//mateix que function pero mes curt // (domes es pot fer amb funcions anonimes)
(function() {

  /**
   *
   *  Variables
   *
  */


  /*Variables per a les classes de link, imatge i el mapa  del html*/
  const link =  document.querySelector('.link');
  const img = document.querySelector('.canviimg');
  const mapa = document.querySelector('.zoom');

  /* '' Desplegable*/
  const desplegable = document.querySelector('.opcio select');

  /*Mapes*/
  const mapaEbre = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.8229348104137!2d0.7205774505149048!3d40.72191424484518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a105d05920949b%3A0xe74139ee7f0a85dc!2sInstitut%20Deltebre!5e0!3m2!1sca!2ses!4v1603307639173!5m2!1sca!2ses";
  const mapaRoq = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3019.2307793690397!2d0.4964527505182725!3d40.82289433866014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a0e4ef125f93a7%3A0x33bf02a2ae0771df!2sInstituto%20p%C3%BAblico%20Roquetes!5e0!3m2!1sca!2ses!4v1603305661040!5m2!1sca!2ses";
  const mapaMont = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.395189901719!2d0.5803069505145204!3d40.70931604561608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a0fe735557799b%3A0x3fade49ba3687306!2sInstitut%20Montsi%C3%A0%20i%20CFA%20Sebasti%C3%A0%20Juan%20Arb%C3%B3!5e0!3m2!1sca!2ses!4v1603385016201!5m2!1sca!2ses";

  /*Links*/
  const linkEbre = "https://agora.xtec.cat/iesdeltebre/";
  const linkRoq = "https://agora.xtec.cat/iesroquetes/";
  const linkMon = "https://agora.xtec.cat/insmontsia/";

  /*Imatges*/
  const imgDel = "./img/deltebre.jpeg";
  const imgRoq = "./img/roquetes.jpg";
  const imgMon = "./img/montsia.jpeg";

  /*array y variable per al bucle*/
  const arr = ["3","2","1"];
  let y;

  /*afegir un event que canvia a la variable de desplegable*/
  desplegable.addEventListener('change', function(event) {

    /*switch per a cada canvi al desplegable*/
    switch (this.value){

      case 'deltebre':
        mapa.src = mapaEbre;
        link.href = linkEbre;
        link.innerText = "Institut Deltebre";
        img.src = imgDel;
        break;

      case 'roquetes':
        mapa.src = mapaRoq;
        link.href = linkRoq;
        link.innerText = "Institut Roquetes";
        img.src = imgRoq;
        break;

      case 'montsia':
        mapa.src = mapaMont;
        link.href = linkMon;
        link.innerText = "Institut Montsia";
        img.src = imgMon;
        break;

    }
  });
  /*bucle compta enrere*/
  for (y of arr) {
    console.log(y);
  }

  ////////////////*****************  Proves M6  *****************////////////////

  // Fer ús de parseInt
  console.log("Fer ús de parseInt");

  var numero1 = "10";

  //(typeof) diu el tipo de variable
  console.log("Variable de tipus String: " + typeof numero1);
  console.log("String comvertit a Numero: " +  typeof parseInt(numero1));
  //console.log(parseInt(numero1) * 10);

  // Fer ús de Operador Ternari
  console.log("Fer ús de Operador Ternari");

  //var prova = 5 === hosting.length ? "A huevo, dinerito".toUpperCase() : "Caiste en quiebra";
  // === mira si es igual "el tipus de dades".
  console.log(parseInt(numero1) === 10 ? "OK!, es igual a "+ numero1+" integer".toUpperCase() : "No, es correcte");
  console.log(numero1 === 10 ? "OK!, es igual a "+ numero1+" integer".toUpperCase() : "No, es correcte");

  // Fer ús de expresions regulars
  console.log("Fer ús de expresions regulars");
  function provaExpresions() {
      var frase = "Aixo es una variable de tipus String";
      var patt = new RegExp("e");
      //test es la expresio regular
      var resultat = patt.test(frase);
      return resultat;
  }

  console.log(provaExpresions());

// Fer ús de Date i toString
console.log("Fer ús de Date i toString");

  var dataActual = new Date();
  dataActual.toString();
  console.log(dataActual);

//- fer ús de strings amb `   ` i concatenant variables amb ${  } dins.
const preupoma = 20;
var provaStringConcatena = `La poma te un cost total de ${preupoma}`;
console.log(provaStringConcatena);



})();
