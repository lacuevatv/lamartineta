function loadLazyImages() {
    var dimensiones = {
        mobile: 100,
        tablet: 768,
        desktop: 992
    }

    var lazyImages = document.querySelectorAll('.lazy-load-image');

    
    if ( lazyImages.length > 0 ) {
        
        //cargamos todas las imagenes
        for (var index = 0; index < lazyImages.length; index++) {
            var element = lazyImages[index];
            
            //recuperamos data de imagen orginal
            var image = element.querySelector('img');
            
            //recoletamos los datos del elemento
            var iSrc = image.getAttribute('data-src');
            var iSrc768 = image.getAttribute('data-src-tablet');
            var iSrcMov = image.getAttribute('data-src-mobile');
            var iSrcSVG= image.getAttribute('data-src-svg');
            var alt = image.getAttribute('alt');
            var clases = image.className;
    
            if ( iSrc.trim() == '' ) { 
                return;
            }


            //elemento picture
            var picture = document.createElement('picture');

            
            //elemento svg 
            if ( iSrcSVG != null ) {

                var sourceSVG = document.createElement('source');
                    sourceSVG.setAttribute('type', 'image/svg+xml' );
                    sourceSVG.setAttribute('srcset', iSrcSVG.trim() );

                picture.appendChild(sourceSVG);
            }

            //elemento source por defecto, es el mayor

            var srcDefaults = iSrc.trim().split(',' );
            var dataSrcDesktop = '';
            
            for (var a = 0; a < srcDefaults.length; a++) {
                if (a !=0) {
                    dataSrcDesktop += ', ';
                }
                dataSrcDesktop += srcDefaults[a] + ' ' + (a+1) + 'x';
            }


            var sourcedesktop = document.createElement('source');
                sourcedesktop.setAttribute('media', '(min-width: '+dimensiones.desktop+'px)' );
                sourcedesktop.setAttribute('srcset', dataSrcDesktop );

            
            picture.appendChild(sourcedesktop);
           
            //elemento source tablet

            if ( iSrc768.trim() != '' ) {
                var srcTablet = iSrc768.trim().split(',' );

                var dataSrcTabvar = '';

                for (var c = 0; c < srcTablet.length; c++) {
                    if (c !=0) {
                        dataSrcTabvar += ', ';
                    }
                    dataSrcTabvar += srcTablet[c] + ' ' + (c+1) + 'x';
                }


                var sourceTablet = document.createElement('source');
                    sourceTablet.setAttribute('media', '(min-width: '+dimensiones.tablet+'px)' );
                    sourceTablet.setAttribute('srcset', dataSrcTabvar );

                
                picture.appendChild(sourceTablet);
            }

            //elemento source mobile

            if ( iSrcMov.trim() != '' ) {
                var srcMobile = iSrcMov.trim().split(',' );

                var dataSrcMobile = '';

                for (var c = 0; c < srcMobile.length; c++) {
                    if (c !=0) {
                        dataSrcMobile += ', ';
                    }
                    dataSrcMobile += srcMobile[c] + ' ' + (c+1) + 'x';
                }


                var sourceMobile = document.createElement('source');
                    sourceMobile.setAttribute('media', '(min-width: '+dimensiones.mobile+'px)' );
                    sourceMobile.setAttribute('srcset', dataSrcMobile );

                
                picture.appendChild(sourceMobile);
            }
            

            //creamos elemento img por defecto
            var img = document.createElement('img');
                img.src = srcDefaults[0];
                img.setAttribute('alt', alt);
                if ( clases == null || clases == '') {
                    img.classList.add('image-responsive-block');
                } else {
                    clases = clases.split(' ');
                    for (var c = 0; c < clases.length; c++) {
                        img.classList.add(clases[c]);
                    }

                }
                

                picture.appendChild(img);
            

            //borro la imagen original si es que estaba
            element.innerHTML = '';
            //agregamos la imagen al dom
            element.appendChild(picture);
    
        }
    }
}



function formulario(idform) {
    
    var formulario = document.querySelector(idform);
    
    formulario.addEventListener('submit', function(event){
        event.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute(window.recpatchaKey, {action: 'bookingform'}).then(function(token) {
                
                var url = window.baseURL + 'ajax/process-form.php';
                var data = new FormData(formulario);

                data.append('token', token);
                data.append('action', 'bookingform');

                    fetch(url, {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    mode: 'cors', // no-cors, *cors, same-origin
                    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: 'same-origin', // include, *same-origin, omit
                    // headers: {
                    // 'Content-Type': 'application/json'
                    // // 'Content-Type': 'application/x-www-form-urlencoded',
                    // },
                    redirect: 'follow', // manual, *follow, error
                    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                    body: data // body data type must match "Content-Type" header
                }).then(function(response){
                    return response.json();
                    //return response.text();
                }).then(function(respuesta){
                    //respuesta formulario
                    console.log(respuesta);
                    var respuestaContenedor = document.querySelector('.respuesta')
                    respuestaContenedor.innerText = respuesta.mensaje;
                    respuestaContenedor.classList.add('on');

                    document.querySelector(idform).reset()
                    document.querySelector(idform).querySelector('.wrapper-formulario').classList.add('off');
                })
                .catch(function(error) {
                    console.log('Hubo un problema con la petición Fetch:' + error.message);
                });
                
            });
        });
    });
    
}


//calcula posicion de un elemento
function getOffset( el ) {
    var _x = 0;
    var _y = 0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
  }
  
  
  //detecta el browser, devuelve browser
  function browserDetection() {
    var userAgent = navigator.userAgent.toLowerCase(); 
    var browser;
    if ( userAgent.indexOf('trident') > -1 || userAgent.indexOf('msie') > -1) {
        browser = 'ie';
    } else if ( userAgent.indexOf('edge') > -1 ) {
        browser = 'edge';
    } else if (userAgent.indexOf('safari')!=-1){ 
        if (userAgent.indexOf('chrome')  > -1){
            browser = 'chrome';
        } else if((userAgent .indexOf('opera')  > -1)||(userAgent.indexOf('opr')  > -1)){
            browser = 'opera';
        } else {
            browser = 'safari';
        }
  
    } else if (userAgent.indexOf('firefox') !=-1) {
        browser = 'firefox';
    } else {
        browser = 'dont-know';    
    }
    
    return browser;
  }
  
  //ve si esta visible en pantalla el elemento, devuelve true/false
  function isVisible ( el ) {
    var result = false;
    // Browser viewport
    var viewport_h = window.innerHeight;
    var viewport_top = window.pageYOffset;
    var viewport_bottom = viewport_top + viewport_h;
    // DOM Element
    var el_h = el.offsetHeight;                  // Height
    var el_top = el.getBoundingClientRect().top; // Top
    var el_bottom = el_top + el_h;               // Bottom
    // Is inside viewport?
    if ( el_bottom > 0 && el_top < viewport_h ) { 
      result = 1.0 - ( el_top + el_h ) / ( viewport_h + el_h );
    }
    
    return result;
  }
  
  //hace smoth scroll al elemento seleccionado, se le pasa el selector, #id .clase o tag tipo h1
  function smoothScroll(eID) {
  
    //toma la posicion del elemento, el cual debe pasarse para que sea uno solo por queryselector: '.clase', '#id', 'tag'
    function elmYPosition(eID) {
        var elm = document.querySelector(eID);
        var y = elm.offsetTop;
        var node = elm;
        while (node.offsetParent && node.offsetParent != document.body) {
            node = node.offsetParent;
            y += node.offsetTop;
  
            if ( window.innerWidth < 768) {
                y-=50;   
            }
        }
        return y;
    }
    
    //toma la posicion actual de la ventana
    function currentYPosition() {
        // Firefox, Chrome, Opera, Safari
        if (self.pageYOffset) return self.pageYOffset;
        // Internet Explorer 6 - standards mode
        if (document.documentElement && document.documentElement.scrollTop)
            return document.documentElement.scrollTop;
        // Internet Explorer 6, 7 and 8
        if (document.body.scrollTop) return document.body.scrollTop;
        return 0;
    }
  
  
    //smoth scroll
    var startY = currentYPosition();
    var stopY = elmYPosition(eID);
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    if (distance < 100) {
        scrollTo(0, stopY); return;
    }
    var speed = Math.round(distance / 100);
    if (speed >= 20) speed = 20;
    var step = Math.round(distance / 25);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    if (stopY > startY) {
        for ( var i=startY; i<stopY; i+=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; if (leapY > stopY) leapY = stopY; timer++;
        } return;
    }
    for ( var i=startY; i>stopY; i-=step ) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
    }
}

function togleMenu() {
    var btn = document.querySelector('.togle');
    var menu = document.querySelector('.main-menu');

    if (menu.classList.contains('open')) {
        //cierra menu
        menu.classList.remove('open');
        btn.classList.remove('open');
    } else {
        //abre menu
        menu.classList.add('open');
        btn.classList.add('open');
    }
}

function insertMap(mapa) {
    var contenedor = document.querySelector('#map');
    var map = document.createElement('iframe');
    map.src = mapa;
    map.width = "100%";
    map.height = "450";
    map.frameborder = "0";
    map.style = "border:0";

    contenedor.appendChild(map);
    // <iframe src="" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

}

function init() {

    //togle
    var togle = document.querySelector('.togle');

    togle.addEventListener('click', togleMenu);

    //formulario
    if (document.querySelector('#booking_form')) {
        formulario('#booking_form');
    }
   
    //smothscroll menu
    var smotsScrolls = document.querySelectorAll('.smoth-scroll');
    if (smotsScrolls.length > 0) {
        for (var index = 0; index < smotsScrolls.length; index++) {
            var element = smotsScrolls[index];

            element.addEventListener('click', function(event){
                event.preventDefault();
                smoothScroll(this.getAttribute('href'));
                if (this.getAttribute('data-close')) {
                    togleMenu();   
                }
            });
            
            
        }
    }

    if (window.mapaPosada) {
        insertMap(window.mapaPosada);
    }
    

    //lazyload images
    loadLazyImages();

    //animaciones

}


//inicia la app
window.addEventListener('DOMContentLoaded', init);

