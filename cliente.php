<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		
		
		<title>Panaderia Don Luis</title>
		<meta name="Proyecto" content="Mi inspiracion" />
		<meta name="JUAN CARLOS MARTINEZ SANCHEZ" content="PROYECTO DE PANADERIA DON LUIS" />
		<link rel="shortcut icon" href="img/icon.ico">
		<link rel="stylesheet" type="text/css" href="css/grid.css" />
		
		<link rel="stylesheet" type="text/css" href="css/style5.css" />
		
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo2.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
    <style type="text/css">
    #apDiv1 {
	position:absolute;
	width:201px;
	height:144px;
	z-index:1501;
	left: 35px;
	top: 4px;
}
    #apDiv2 {
	position:absolute;
	width:349px;
	height:230px;
	z-index:1502;
	left: 40px;
}
    #apDiv3 {
	position:absolute;
	width:64px;
	height:62px;
	z-index:1502;
	left: 4px;
	top: 98px;
}
    #apDiv4 {
	position:absolute;
	width:86px;
	height:87px;
	z-index:1502;
	left: -3px;
	top: 202px;
}
    #apDiv5 {
	position:absolute;
	width:87px;
	height:86px;
	z-index:1;
	left: -2px;
	top: 137px;
}
    </style>
	</head>

<body class="fondo-1">
		<div id="apDiv1"><img src="img/191.png" width="195" height="142"></div>
	  <div id="contenedor" class="contenedor intro-effect-push">
			
			<header class="header">
			<img src="images/191.png" />
				<div class="slider">
					<ul class="slides">
						<li>
				<div class="bg-img"><img src="img/17.jpg" alt="Fondo de Imagen"/></div>
				</li>
				
				</ul>
				</div>
				<div class="bar">
				<div class="title">
					<nav class="codrops-demos">
						<a class="current-demo" href="inicio.html">Inicio</a>
						<a href="nosotros.html">Nosotros</a>
						
						<a href="promociones.html">Promociones</a>
						
						<a href="ubicanos.html">Ubicanos</a>
						<a href="cliente.html">Cliente</a>
					</nav>
					<h1>CLIENTE</h1>
				</div>
				</div>
			</header>

			<button class="flecha" data-info="Haga clic para ver el contenido"><span>Trigger</span></button>

			<div class="title">
				<nav class="codrops-demos">
						<a class="current-demo" href="inicio.html">Inicio</a>
						<a href="nosotros.html">Nosotros</a>
						
						<a href="promociones.html">Promociones</a>
						
						<a href="ubicanos.html">Ubicanos</a>
						<a href="cliente.html">Cliente</a>
					</nav>


				<h1>PANADERIA DON LUIS</h1>
				<p class="subline">"Donde cada cliente es un gran amigo"</p>
				<p> <strong></strong> &#8212; <strong></strong>  <strong></strong></p>
			</div>


			<div class="bg_cont1">
	      <div class="bg_cont">
        <section id="content">
            <div class="main">
                <div class="inside">
                    <div class="container_16">
                        <div class="tail">
                            <div class="container">
                              <div class="grid_5 alpha">
                            	<h2>Informacion de Contacto</h2>
                               
                                <div class="indent5">
                                    <strong class="txt5">Panaderia Don Luis</strong><br>
                                 
                                    
                                    <p class="block-contact"><span></span>Telefono: 22 28 59 43 <br>  
                                    <br>
                                               
                                    <a>Correo electronico: donluis@yahoo.com</a></p>
                                </div>
                            </div>
                            <div class="grid_11 omega">
                            	<div class="suffix_1">
                                    <h2>COMENTARIO</h2>
                                    <form action="" method="get"> 
                                    <form action="" id="form"><fieldset>
                                       <div class="rowElem">
                                         <label for="textfield"></label>
                                         <input type="text" name="textfield" id="textfield" placeholder="Nombre:" >
                                      </div>
                                       <div class="rowElem">
                                         <label for="textfield2"></label>
                                         <input type="text" name="textfield2" id="textfield2" placeholder="E-mail">
                                      </div>
                                 
                                       <div class="rowElem2">
                                         <p>
                                           <textarea name="Comentario" cols="" rows=""placeholder="Comentario:"></textarea >
                                         </p>
                                         <p>&nbsp; </p>
                                       </div>
                                        <div class="container">
                                           <div class="fright">
                                               <a href="#" class="link-1" onClick="document.getElementById('form').reset()">Cancelar</a>
                                               <div class="indent-2"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Enviar</a>
                                  </form> 
                                               </div>
                                           </div>                                                
                                        </div>
                                    </fieldset></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>






                                   




		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946		
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;  
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE 
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed, 
					noscroll, 
					isAnimating,
					container = document.getElementById( 'contenedor' ),
					trigger = container.querySelector( 'button.flecha' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}
				
				function scrollPage() {
					scrollVal = scrollY();
					
					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}
					
					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;
					
					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 1200 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;
				
				disable_scroll();
				
				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}
				
				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();
		</script>

		
	</body>
</html>