<?php
function tcrs_option_page() {
    ?>
    <div class="wrap">
        <h1>Impostazioni della mia pagina</h1>
        <form action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_fields( 'tcrs_settings_options_group' ); ?>
            <?php do_settings_sections( 'tcrs_option_page' ); ?>

            <?php 
            // PLACE HOLDERS
            $contratto_placeholderId = TC_ADDONS_PLACEHOLDER_ID;
            $filePdf_placeholder = TC_ADDONS_ROOT_URL . "img/file-pdf.png";
            $fileMissing_placeholder = TC_ADDONS_ROOT_URL . "img/file-missing.png";

            // CURRENT VALUES
            $imgHeaderHomeId = get_option('contratto_header_residenziali_image', $contratto_placeholderId);
            $imgFooterHomeId = get_option('contratto_footer_residenziali_image', $contratto_placeholderId);
            $imgHeaderAziendaId = get_option('contratto_header_aziende_image', $contratto_placeholderId);
            $imgFooterAziendaId = get_option('contratto_footer_aziende_image', $contratto_placeholderId);

            $imgHeaderHome = wp_get_attachment_url( $imgHeaderHomeId );
            $imgFooterHome = wp_get_attachment_url( $imgFooterHomeId );
            $imgHeaderAzienda = wp_get_attachment_url( $imgHeaderAziendaId );
            $imgFooterAzienda = wp_get_attachment_url( $imgFooterAziendaId );


            $pdfContrattoHomeId = get_option('contratto_residenziali_pdf_file', '');
            $pdfContrattoAziendaId = get_option('contratto_aziende_pdf_file', '');

            $pdfContrattoHome = wp_get_attachment_url($pdfContrattoHomeId);
            $pdfContrattoAzienda = wp_get_attachment_url($pdfContrattoAziendaId);
            //$pdfContrattoAziendaFtth = get_option('contratto_aziendeftth_pdf_file', '');

            ?>
            
            <h3 style="background-color: #00567A; padding:12px; color:white;">Immagini di Header e Footer per i contratti da generare.</h3>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="contratto_header_residenziali_image">Testata HOME:</label></th>
                    <td>
                        <img src="<?php echo esc_url( $imgHeaderHome ) ?>" alt="Immagine di testata Contratto HOME" height="130" id="contratto_header_residenziali_preview" /><br />
                        <input type="hidden" name="contratto_header_residenziali_image" id="contratto_header_residenziali_image" value="<?php echo esc_attr( $imgHeaderHomeId ); ?>" />
                        <input type="button" class="button button-secondary" value="Carica Immagine" id="header_residenziali_image_btn" data-contratto-image="header_residenziali">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="contratto_footer_residenziali_image">Footer HOME:</label></th>
                    <td>
                        <img src="<?php echo esc_url( $imgFooterHome ) ?>" alt="Immagine di Footer Contratto HOME" height="130" id="contratto_footer_residenziali_preview" /><br />
                        <input type="hidden" name="contratto_footer_residenziali_image" id="contratto_footer_residenziali_image" value="<?php echo esc_attr( $imgFooterHomeId  ); ?>" />
                        <input type="button" class="button button-secondary" value="Carica Immagine" id="footer_residenziali_image_btn" data-contratto-image="footer_residenziali">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="contratto_header_aziende_image">Testata OFFICE:</label></th>
                    <td>
                        <img src="<?php echo esc_url( $imgHeaderAzienda ) ?>" alt="Immagine di Testata Contratto OFFICE" height="130" id="contratto_header_aziende_preview" /><br />
                        <input type="hidden" name="contratto_header_aziende_image" id="contratto_header_aziende_image" value="<?php echo esc_attr( $imgHeaderAziendaId); ?>" />
                        <input type="button" class="button button-secondary" value="Carica Immagine" id="header_aziende_image_btn" data-contratto-image="header_aziende">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="contratto_footer_aziende_image">Footer OFFICE:</label></th>
                    <td>
                        <img src="<?php echo esc_url( $imgFooterAzienda ) ?>" alt="Immagine di Footer Contratto OFFICE" height="130" id="contratto_footer_aziende_preview" /><br />
                        <input type="hidden" name="contratto_footer_aziende_image" id="contratto_footer_aziende_image" value="<?php echo esc_attr( $imgFooterAziendaId ); ?>" />
                        <input type="button" class="button button-secondary" value="Carica Immagine" id="footer_aziende_image_btn" data-contratto-image="footer_aziende">
                    </td>
                </tr>       
            </table>

            <h3 style="background-color: #00567A; padding:12px; color:white;">Files PDF contratti e schede prodotto "cartacei"</h3>
            <table class="form-table">
            
                <tr>
                    <th scope="row"><label for="contratto_residenzali_pdf_file">Contratto Smart HOME:</label></th>
                    <td>
                        <a href="<?php echo esc_attr($pdfContrattoHome); ?>" target="_blank" id="contratto_residenzali_pdf_preview" style="margin-bottom:16px;">
                            <img src="<?php echo ($pdfContrattoHome) ? $filePdf_placeholder : $fileMissing_placeholder; ?>" alt="file" width="42"/>
                        </a>
                        <input type="hidden" name="contratto_residenziali_pdf_file" id="contratto_residenziali_pdf_file" value="<?php echo esc_attr($pdfContrattoHomeId); ?>" class="regular-text"><br>
                        <input type="button" id="residenziali_pdf_file_btn" class="button" value="Seleziona pdf" data-contratto-file="residenziali_pdf">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="contratto_aziende_pdf_file">Contratto Smart OFFICE:</label></th>
                    <td>
                        <a href="<?php echo esc_attr($pdfContrattoAzienda); ?>" target="_blank" id="contratto_aziende_pdf_preview" style="margin-bottom:16px;">
                            <img src="<?php echo ($pdfContrattoAzienda) ? $filePdf_placeholder : $fileMissing_placeholder; ?>" alt="file"  width="42"/>
                        </a>
                        <input type="hidden" name="contratto_aziende_pdf_file" id="contratto_aziende_pdf_file" value="<?php echo esc_attr($pdfContrattoAziendaId); ?>" class="regular-text"><br>
                        <input type="button" id="aziende_pdf_file_btn" class="button" value="Seleziona pdf" data-contratto-file="aziende_pdf">
                    </td>
                </tr>
   
            </table>


            <h3 style="background-color: #00567A; padding:12px; color:white;">Testi e messaggi</h3>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="copertura_msg_areebianche">Testo alert Aree Bianche:</label></th>
                    <td>
                        <?php 
                            $content = get_option( 'copertura_msg_areebianche' );
                            wp_editor( $content, 'copertura_msg_areebianche' ); 
                        ?>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action( 'admin_menu', 'tcrs_option_page_setup' );

function tcrs_option_page_setup() {
    add_menu_page( 'Opzioni Copertura e Contrattp', 'Opzioni TCRS', 'manage_options', 'tcrs-option-page', 'tcrs_option_page' );
    register_setting( 'tcrs_settings_options_group', 'contratto_header_residenziali_image' );
    register_setting( 'tcrs_settings_options_group', 'contratto_footer_residenziali_image' );
    register_setting( 'tcrs_settings_options_group', 'contratto_header_aziende_image' );
    register_setting( 'tcrs_settings_options_group', 'contratto_footer_aziende_image' );

    register_setting( 'tcrs_settings_options_group', 'contratto_residenziali_pdf_file' );
    register_setting( 'tcrs_settings_options_group', 'contratto_aziende_pdf_file' );
    // register_setting( 'tcrs_settings_options_group', 'contratto_aziendeftth_pdf_file' );

    register_setting( 'tcrs_settings_options_group', 'copertura_msg_areebianche' );
}

// Funzione per caricare gli script necessari
function tcrs_admin_enqueue_media_scripts($hook) {        
    if ('toplevel_page_tcrs-option-page' !== $hook) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('custom-tcrs-media-script', plugin_dir_url(__FILE__) . 'js/media-script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'tcrs_admin_enqueue_media_scripts');