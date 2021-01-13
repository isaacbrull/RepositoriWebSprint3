(function() {

  console.log("\n %c Projekt v0.1 | Projecte unificat | http://projekt.cat \n",
              "color: white; background: #171b27; padding:5px 0; border-bottom: solid 2px #dd6b20;")

  /**
   *
   *  Variables
   *
  */
  const android = /(android)/i.test(navigator.userAgent);
  const banner = document.querySelector('.banner-background');
  const menuicon = document.querySelector('.header-menu-icon');
  const menulist = document.querySelector('.header-menu-list');
  const menuform = document.querySelector('.header-form');
  /* Function calls */
  //slide(1,3);


  function slide(n,t) {

    let c = arguments[2] || 1;

    if (c >= n+1) {
      c = 1;
    }

    banner.style.backgroundImage = 'url("./img/banner-' + c + '.jpg")';
    setTimeout(function(){ slide(n,t,c+1); }, (t*1000));

  }

  /* Listeners */
  window.addEventListener('scroll', function() {
    if (!android) {
      banner.style.backgroundPosition = '0 '+(-0.4*window.scrollY)+'px';
    }
  });

  menuicon.addEventListener('click', function() {

      let state = menulist.dataset.state;

      if (state == 'visible') {
        menulist.style.top = '-100px';
        menulist.dataset.state = 'hidden';
      } else {
        menulist.style.top = '128px';
        menulist.dataset.state = 'visible';
      }

  });

  if (menuform) {

    menuform.addEventListener('submit', function(event) {

      let button = document.activeElement.dataset.button;

      if (button == "registre") {
        this.action="./registre.php";
        this.submit();

      } else {
        this.action="./index.php";
        this.submit();

      }

      event.preventDefault();
      return false;

    });

  }

})();
