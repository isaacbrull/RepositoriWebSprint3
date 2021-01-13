(function() {
    //https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onclick_dropdown
    /**
    Menu desplegable
    */
    document.getElementById("desplegablePerfil").onclick = function() {myFunction()};

    /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

})();
