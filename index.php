<?php
 require_once('config.php');
?>
<html lang="es">
<head>
    <title><?php echo TITLE_PAGE; ?></title>
    
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_V3_KEY; ?>"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    <style>

        html, body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            font-size: 16px;
            line-height: 20px;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
        .brandname {
            width: 100%;
            display: block;
            margin: 0 auto;
            max-width: 760px;
        }

        form {
            width: 100%;
            max-width: 768px;
            margin: 1rem auto 2rem;
        }

        textarea, input, label {
            display: block;
            margin: 1rem auto;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        button {
            background-color: transparent;
            border: 1px solid #333;
            padding: 10px 20px;
            display: block;
            max-width: 480px;
            margin: 2rem auto;
        }

    </style>
</head>
<body>
    <h1>
        <span class="sr-only"><?php echo TITLE_PAGE; ?></span>
        <img class="brandname" src="assets/images/logo.png" alt="Logo La Martineta">
    </h1>



    <h2>
        Contactanos
    </h2>

    <form id="booking_form" method="post">

        <div>    
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="tel">Telefono</label>
            <input type="number" id="tel" name="tel">
        </div>
        <div>
            <label for="datein">Fecha de entrada</label>
            <input type="date" id="datein" name="datein">
        </div>
        <div>
            <label for="dateput">Fecha de salida</label>
            <input type="date" id="dateout" name="dateout">
        </div>
        <div>
            <label for="pasajeros">Cantidad de pasajeros</label>
            <input type="number" id="pasajeros" name="pasajeros">
        </div>
        <div>
            <label for="msj">Comentarios</label>
            <textarea name="msj" id="msj" cols="30" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Enviar</button>
        </div>

        <div class="respuesta"></div>
    </form>
 
    <script>
        var formulario = document.querySelector('#booking_form');

        if (formulario) {
            formulario.addEventListener('submit', function(event){
                event.preventDefault();
                // var email = formulario.querySelector('email').val();
                // var name = formulario.querySelector('name').val();
        
                grecaptcha.ready(function() {
                    grecaptcha.execute('<?php echo RECAPTCHA_V3_KEY; ?>', {action: 'bookingform'}).then(function(token) {
                        
                        //formulario.querySelector('token').val(token);
                        //formulario.querySelector('action').val(action);
                        var url = '<?php echo BASE_URL; ?>ajax/process-form.php';
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
                           document.querySelector('.respuesta').innerText = respuesta.mensaje;
                           formulario.reset();
                        })
                        .catch(function(error) {
                            console.log('Hubo un problema con la petición Fetch:' + error.message);
                        });
                        
                    });
                });
            });
        }
    </script>
</body>
</html>