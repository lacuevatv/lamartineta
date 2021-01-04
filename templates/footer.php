<footer class="main-footer">
    <a class="wa-btn" href="whatsapp://send?text=¡Hola! Quisiera hacer una consulta.&phone=<?php echo WHATSAPP_NUMBER; ?>&abid=<?php echo WHATSAPP_NUMBER; ?>" target="_blank" title="Whatsapp">
        WHATSAPP
    </a>

    <div class="inner-footer">
    
        <div class="image-footer">
            <?php
            echo setHtmlImage(
                array(
                    'class' => '',
                    'alt' => 'Logo La Martineta',
                    'src' => array(
                        IMAGESURL . 'logo-footer.png', IMAGESURL . 'logo-footer@2x.png', 
                    ),
                    'svg' => '',
                    'srcTablet' => '',
                    'srcMobile' => ''
                )
            ); 
            ?>
        </div>

        <div class="contacto">
            <h3>
                Contacto
            </h3>
            
            <a class="telicon" href="tel:<?php echo TELEPHONE_NUMBER; ?>" target="_blank" title="Teléfono">
                <?php echo TELEPHONE_NUMBER_SHOW; ?>
            </a>
            <a class="waicon" href="whatsapp://send?text=¡Hola! Quisiera hacer una consulta.&phone=<?php echo WHATSAPP_NUMBER; ?>&abid=<?php echo WHATSAPP_NUMBER; ?>" target="_blank" title="Whatsapp">
                <?php echo WHATSAPP_NUMBER_SHOW; ?>
            </a>
        </div>

        <div class="redes-sociales">
            <a class="red facebook" href="href:<?php echo FACEBOOK_POSADA; ?>" target="_blank" title="Facebook">
                <span class="sr-only">Facebook</span>   
            </a>
            <a class="red instagram" href="href:<?php echo INSTAGRAM_POSADA; ?>" target="_blank" title="Instagram">
                <span class="sr-only">Instagram</span>   
            </a>
        </div>
    </div>
</footer>