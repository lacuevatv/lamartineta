<?php require_once('functions.php'); ?>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo TITLE_PAGE; ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL; ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo BASE_URL; ?>site.webmanifest">
    <link rel="mask-icon" href="<?php echo BASE_URL; ?>safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script>
        window.baseURL = '<?php echo BASE_URL; ?>';
        window.recpatchaKey = '<?php echo RECAPTCHA_V3_KEY; ?>';
    </script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_V3_KEY; ?>"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
    
</head>
<body>
<div class="site-wrapper">
    <div class="inner-wrapper">
        <header class="main-header">
            <?php //include 'templates/nav.php'; ?>
        
            <div class="inner-header">
                <div class="image-header">
                    <?php
                    echo setHtmlImage(
                        array(
                            'class' => '',
                            'alt' => 'Logo La Martineta',
                            'src' => array(
                                IMAGESURL . 'header-posada.png', IMAGESURL . 'header-posada@2x.png', 
                            ),
                            'svg' => '',
                            'srcTablet' => array(
                                IMAGESURL . 'header-posada-tablet.png', IMAGESURL . 'header-posada-tablet@2x.png'
                            ),
                            'srcMobile' => array(
                                IMAGESURL . 'header-posada-mov.png', IMAGESURL . 'header-posada-mov@2x.png', 
                            )
                        ), true
                    ); 
                    ?>
                </div>
                <div class="text-header">
                    <h1>
                        <span class="sr-only"><?php echo TITLE_PAGE; ?></span>
                        <div class="brandname">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'Logo La Martineta',
                                    'src' => array(
                                        IMAGESURL . 'logo-header.png', IMAGESURL . 'logo-header@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(IMAGESURL . 'logo-header.png', IMAGESURL . 'logo-header@2x.png',),
                                    'srcMobile' => array(IMAGESURL . 'logo-header-mov.png', IMAGESURL . 'logo-header-mov@2x.png',)
                                )
                            ); ?>
                        </div>
                    </h1>
                    <a class="telefono" href="tel:<?php echo TELEPHONE_NUMBER; ?>" target="_blank" title="Llamar">
                        <?php echo TELEPHONE_NUMBER_SHOW; ?>
                    </a>
                    <a class="btn-reservar" href="#reservar" title="Reservar">
                        Reservar
                    </a>
                </div>
            </div>
        </header>  

        <main role="main">

            <section id="historia" class="section historia-section">
                <h2>
                    Historia
                </h2>
                <div class="historia-wrapper">
                    <div class="historia">
                        <p>
                            <strong>Capilla del Señor</strong>, hoy ciudad cabecera del partido de <strong>Exaltación de la Cruz</strong>, es uno de los más antiguos en tierras bonaerenses.<br>
                            <strong>285 años desde su fundación</strong> y basándonos en su actual fisionomía de pueblo donde conjuga la tranquilidad y el esparcimiento, <strong>es aquí donde decidimos instalar esta posada</strong>.<br>
                            Comenzamos recuperando la histórica casona del año 1860 cargada de historia y en donde funcionó una de las más antiguas casas de remate-feria del país <strong>“La Feria de Los hermanos Lanusse”</strong>.<br>
                            Es allí donde funciona la recepción, un gran living y un ambiente donde el huésped podrá disfrutar de un agradable desayuno campestre.
                        </p>
                        <p>
                            Paralelamente se construyeron 8 amplias habitaciones de 30 mts2 todas con vista al paisaje que ofrece el parque con añosa arboleda. El recorrido del mismo incluye un lago, un antiguo palomar, pileta de natación, huerta orgánica sembrada de tomillo, romero y albahaca que tiene su sitio privilegiado entre verduras y hortalizas, un área de cítricos pomelos, ciruelos, membrillos.<br>
                            <strong>Dos sensaciones invaden al visitante, hay mucho pasado allí y también mucho presente.</strong>
                        </p>
                    </div>
                </div>
                
            </section>
            
            <section id="habitacion" class="section habitacion-section">
                <h2>
                    Alojamiento - Habitaciones
                </h2>

                <div class="habitaciones-header">
                    <div class="check">
                        <p class="in">
                            Horario de Check in <strong>14:00hs</strong><em>(flexible)</em>
                        </p>
                        <p class="out">
                            Horario de Check out <strong>11:00hs</strong>
                        </p>
                    </div>
                </div>

                <div class="habitaciones-data">
                    <p>
                        Las habitaciones son de aprox. 30 mts2 especialmente decoradas y ambientadas.
                    </p>
                    <p>
                        Todas poseen:
                    </p>

                    <ul class="habitaciones-servicios">
                        <span>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Ventanales',
                                            'src' => array(
                                                IMAGESURL . 'ventanales.png', IMAGESURL . 'ventanales@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Amplios ventanales con vista al parque.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon camas',
                                            'src' => array(
                                                IMAGESURL . 'camas.png', IMAGESURL . 'camas@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Cama tamaño King o dos camas twin.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon algodon',
                                            'src' => array(
                                                IMAGESURL . 'algodon.png', IMAGESURL . 'algodon@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Sábanas de algodón.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon TV',
                                            'src' => array(
                                                IMAGESURL . 'tv.png', IMAGESURL . 'tv@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Plasma LCD 32” con programación satelital.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Aire',
                                            'src' => array(
                                                IMAGESURL . 'aire.png', IMAGESURL . 'aire@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Aire acondicionado.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Calefaccion',
                                            'src' => array(
                                                IMAGESURL . 'calefaccion.png', IMAGESURL . 'calefaccion@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Calefacción central por radiadores programables.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'icon Cafe',
                                            'src' => array(
                                                IMAGESURL . 'cafe.png', IMAGESURL . 'cafe@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Jarra térmica con café y té de cortesía.</span>
                            </li>
                        </span>
                        <span>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Wifi',
                                            'src' => array(
                                                IMAGESURL . 'wifi.png', IMAGESURL . 'wifi@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Wifi sin cargo.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Telefono',
                                            'src' => array(
                                                IMAGESURL . 'telefono.png', IMAGESURL . 'telefono@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Teléfono.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Baños',
                                            'src' => array(
                                                IMAGESURL . 'banera.png', IMAGESURL . 'banera@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Baños completos con bañera.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Amenities',
                                            'src' => array(
                                                IMAGESURL . 'amenities.png', IMAGESURL . 'amenities@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Set de amenities exclusivos.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon Secador',
                                            'src' => array(
                                                IMAGESURL . 'secador.png', IMAGESURL . 'secador@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Secador de cabello.</span>
                            </li>
                            <li>
                                <div class="icon lazy-load-image">
                                    <?php echo setHtmlImage(
                                        array(
                                            'class' => '',
                                            'alt' => 'Icon toallero',
                                            'src' => array(
                                                IMAGESURL . 'toallero.png', IMAGESURL . 'toallero@2x.png', 
                                            ),
                                            'svg' => '',
                                            'srcTablet' => '',
                                            'srcMobile' => ''
                                        ), true
                                    ); ?>
                                </div>
                                <span>Toallero térmico.</span>
                            </li>
                        </span>
                    </ul>
                </div>


            </section>

            <section id="servicios" class="section servicios-section">
                <h2>
                    Servicios
                </h2>
                <p>
                    La posada cuenta con los siguientes servicios:
                </p>

                <ul>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto desayunador',
                                    'src' => array(
                                        IMAGESURL . 'desayunador.png', IMAGESURL . 'desayunador@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'desayunador-tablet.png', IMAGESURL . 'desayunador-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'desayunador-mov.png', IMAGESURL . 'desayunador-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Wifi libre e ilimitado en todos los sectores.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto masajes',
                                    'src' => array(
                                        IMAGESURL . 'masajes.png', IMAGESURL . 'masajes@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'masajes-tablet.png', IMAGESURL . 'masajes-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'masajes-mov.png', IMAGESURL . 'masajes-mov@2x.png',                                         
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Servicio de masajes con reserva previa.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto huerta',
                                    'src' => array(
                                        IMAGESURL . 'huerta.png', IMAGESURL . 'huerta@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'huerta-tablet.png', IMAGESURL . 'huerta-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'huerta-mov.png', IMAGESURL . 'huerta-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Huerta orgánica.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto restaurante',
                                    'src' => array(
                                        IMAGESURL . 'servicios_restaurante.png', IMAGESURL . 'servicios_restaurante@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'servicios_restaurante-tablet.png', IMAGESURL . 'servicios_restaurante-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'servicios_restaurante-mov.png', IMAGESURL . 'servicios_restaurante-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Restaurant: Almuerzo y cena. Nuestros platos son caseros, con productos de nuestra huerta.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto seguridad',
                                    'src' => array(
                                        IMAGESURL . 'seguridad.png', IMAGESURL . 'seguridad@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'seguridad-tablet.png', IMAGESURL . 'seguridad-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'seguridad-mov.png', IMAGESURL . 'seguridad-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Seguridad nocturna.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto parque',
                                    'src' => array(
                                        IMAGESURL . 'actividades1.png', IMAGESURL . 'actividades1@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'actividades1-tablet.png', IMAGESURL . 'actividades1-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'actividades1-mov.png', IMAGESURL . 'actividades1-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Gimnasio y ejercicios con la vista al parque.
                        </h4>
                    </li>
                    <li>
                        <div class="imagen lazy-load-image">
                            <?php echo setHtmlImage(
                                array(
                                    'class' => '',
                                    'alt' => 'foto parque',
                                    'src' => array(
                                        IMAGESURL . 'pileta.png', IMAGESURL . 'pileta@2x.png', 
                                    ),
                                    'svg' => '',
                                    'srcTablet' => array(
                                        IMAGESURL . 'pileta-tablet.png', IMAGESURL . 'pileta-tablet@2x.png', 
                                    ),
                                    'srcMobile' => array(
                                        IMAGESURL . 'pileta-mov.png', IMAGESURL . 'pileta-mov@2x.png', 
                                    )
                                ), true
                            ); ?>
                        </div>
                        <h4>
                            Piscina, reposeras y sombrillas.
                        </h4>
                    </li>
                </ul>
            </section>

            <section id="eventos" class="section eventos-section">
                <h2>
                    Eventos especiales
                </h2>

                <ul class="eventos-list">
                    <li class="evento">
                        <h4>
                            Sociales
                        </h4>
                        <ul class="inner-list">
                            <li>
                                • Casamientos, Cumpleaños y Agasajos.
                            </li>
                        </ul>
                    </li>

                    <li class="evento">
                        <h4>
                            Corporativos
                        </h4>
                        <ul class="inner-list">
                            <li>
                                • Exhibiciones y Lanzamientos de Productos.
                            </li>
                            <li>
                                • Reuniones de trabajo y Congresos.
                            </li>
                            <li>
                                • Capacitación.
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            
            <section id="reservar" class="section form-section">
                <h2>
                    Reservas
                </h2>

                <?php include 'templates/formulario.php'; ?>
            </section>

            <section id="map" class="full-section mapa-section"></section>
        </main>

        <?php include 'templates/footer.php'; ?>

    </div>
</div>
<script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    
</body>
</html>