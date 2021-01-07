<form id="booking_form" class="formulario-reservas" method="post">

    <div class="wrapper-formulario">
        <div class="columna animate fade-up">
            <legend>
                Información General
            </legend>

            <div class="input-wrapper">
                <label for="name">Nombre y Apellido</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="input-wrapper">    
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="col-inputs col-inputs-2">
                <div class="input-wrapper">
                    <label for="name">País</label>
                    <select name="pais" id="pais">
                        <?php
                        
                        $paices = json_decode(file_get_contents('paises.json'));
                        $html = '';
                        foreach ($paices->countries as $pais) {
                            $html .= '<option value="'.$pais->id.'"';
                            if ($pais->name === 'Argentina') {
                                $html .= ' selected';
                            }
                            $html .= '>'.$pais->name.'</option>';
                            
                        }
                        echo $html;
                        ?>
                    </select>
                </div>

                <div class="input-wrapper">
                    <label for="tel">Telefono</label>
                    <input type="number" id="tel" name="tel">
                </div>
            </div>
        
        </div>
        
        <div class="columna animate fade-up" style="animation-delay:750ms">
            <legend>
                Información de Alojamiento
            </legend>

            <div class="col-inputs col-inputs-3">
                <div class="input-wrapper">
                    <label for="datein">Fecha de llegada</label>
                    <input type="date" id="datein" name="datein">
                </div>
                <div class="input-wrapper">
                    <label for="dateput">Fecha de partida</label>
                    <input type="date" id="dateout" name="dateout">
                </div>
            </div>
            
            <div class="input-wrapper">
                <label for="pasajeros">Cantidad de Huéspedes</label>
                <input type="number" id="pasajeros" name="pasajeros">
            </div>

            <div class="input-wrapper">
                <label for="msj">Comentarios</label>
                <textarea name="msj" id="msj" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="submit-wrapper">
            <button type="submit">Enviar</button>
        </div>

    </div>

    <div class="respuesta"></div>
</form>