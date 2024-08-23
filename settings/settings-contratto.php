<?php
// Aggiungi il menu delle impostazioni
// add_options_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = ”, int $position = null ): string|false
function contratto_tcrs_settings() {
    add_options_page(
        'Opzioni Contratto e Copertura',
        'Opzioni TCRS',
        'manage_options',
        'contratto-tcrs-settings',
        'contratto_tcrs_settings_cb'
    );
}
add_action('admin_menu', 'contratto_tcrs_settings');


function contratto_tcrs_settings_cb() {
    // Controlla i permessi
    if (!current_user_can('manage_options')) {
        return;
    }

    // Salva le impostazioni
    if (isset($_POST['contratto_trcs_settings_submit'])) {
        $homeHeader = $_POST['contratto_header_home_image'];
        $homeFooter = $_POST['contratto_footer_home_image'];
        
        $aziendaHeader = $_POST['contratto_header_azienda_image'];
        $aziendaFooter = $_POST['contratto_footer_azienda_image'];

        $homePdf = $_POST['contratto_home_pdf_file'];
        $aziendaPdf = $_POST['contratto_azienda_pdf_file'];
        $aziendaFtthPdf = $_POST['contratto_aziendaftth_pdf_file'];

        $msgAreeBianche = esc_html($_POST['copertura_msg_areebianche']);

        update_option('contratto_header_home_image', $homeHeader);
        update_option('contratto_footer_home_image', $homeFooter);

        update_option('contratto_header_azienda_image', $aziendaHeader);
        update_option('contratto_footer_azienda_image', $aziendaFooter);

        update_option('contratto_home_pdf_file', $homePdf);
        update_option('contratto_azienda_pdf_file', $aziendaPdf);
        update_option('contratto_aziendaftth_pdf_file', $aziendaFtthPdf);

        update_option('copertura_msg_areebianche', $msgAreeBianche);

        echo '<div class="updated"><p>Impostazioni salvate.</p></div>';
    }

    $contratto_placeholder = TC_ADDONS_ROOT_URL . "img/placeholder.png";
    $filePdf_placeholder = TC_ADDONS_ROOT_URL . "img/file-pdf.png";
    $fileMissing_placeholder = TC_ADDONS_ROOT_URL . "img/file-missing.png";

    // Recupera le impostazioni correnti
    $imgHeaderHome = get_option('contratto_header_home_image', $contratto_placeholder);
    $imgFooterHome = get_option('contratto_footer_home_image', $contratto_placeholder);
    
    $imgHeaderAzienda = get_option('contratto_header_azienda_image', $contratto_placeholder);
    $imgFooterAzienda = get_option('contratto_footer_azienda_image', $contratto_placeholder);

    $pdfContrattoHome = get_option('contratto_home_pdf_file', '');
    $pdfContrattoAzienda = get_option('contratto_azienda_pdf_file', '');
    $pdfContrattoAziendaFtth = get_option('contratto_aziendaftth_pdf_file', '');

    $alertAreeBianche = get_option('copertura_msg_areebianche', '');
    
    // Mostra il form delle impostazioni
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <form action="" method="post">

            <h3>Impostare Header e Footer per i contratti che saranno generati in pdf.</h3>
            <table class="form-table" style="border:1px solid #777">
                <tr>
                    <th scope="col" style="text-align:center; border-bottom:2px solid #444;"><b>HEADER</b><br>Dim. 2480 x 303 px</th>
                    <th scope="col" style="text-align:center; border-bottom:2px solid #444;"><b>FOOTER</b><br>Dim. 2480 x 189 px</th>
                </tr>

                <tr>
                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_header_home_image">Testata Contratto HOME</label><br>
                        <img src="<?php echo esc_attr($imgHeaderHome); ?>" alt="Immagine di testata Contratto HOME" width="70%" id="contratto_header_home_preview" /><br />
                        <input type="hidden" name="contratto_header_home_image" id="contratto_header_home_image" value="<?php echo esc_attr($imgHeaderHome); ?>" class="regular-text"><br>
                        <input type="button" id="header_home_image_btn" class="button" value="Seleziona immagine" data-contratto-image="header_home">

                    </td>
                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_footer_home_image">Footer Contratto HOME</label><br>
                        <img src="<?php echo esc_attr($imgFooterHome); ?>" alt="Immagine footer Contratto HOME" width="70%" id="contratto_footer_home_preview"/><br />
                        <input type="hidden" name="contratto_footer_home_image" id="contratto_footer_home_image" value="<?php echo esc_attr($imgFooterHome); ?>" class="regular-text"><br>
                        <input type="button" id="footer_home_image_btn" class="button" value="Seleziona immagine" data-contratto-image="footer_home"></td>
                </tr>

                <tr>
                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_header_azienda_image">Testata Contratto AZIENDA</label><br>                    
                        <img src="<?php echo esc_attr($imgHeaderAzienda); ?>" alt="Immagine di testata Contratto AZIENDA" width="70%" id="contratto_header_azienda_preview" /><br />
                        <input type="hidden" name="contratto_header_azienda_image" id="contratto_header_azienda_image" value="<?php echo esc_attr($imgHeaderAzienda); ?>" class="regular-text"><br>
                        <input type="button" id="header_azienda_image_btn" class="button" value="Seleziona immagine" data-contratto-image="header_azienda">
                    </td>
                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_footer_azienda_image">Footer Contratto AZIENDA</label><br>                    
                        <img src="<?php echo esc_attr($imgFooterAzienda); ?>" alt="Immagine footer Contratto AZIENDA" width="70%" id="contratto_footer_azienda_preview"/><br />
                        <input type="hidden" name="contratto_footer_azienda_image" id="contratto_footer_azienda_image" value="<?php echo esc_attr($imgFooterAzienda); ?>" class="regular-text"><br>
                        <input type="button" id="footer_azienda_image_btn" class="button" value="Seleziona immagine" data-contratto-image="footer_azienda">
                    </td>
                </tr>
            </table>

            <h3>Impostare i files pdf.</h3>
            <table class="form-table" style="border:1px solid #777">
                <tr>
                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_home_pdf_file">Contratto HOME</label><br>
                        <a href="<?php echo esc_attr($pdfContrattoHome); ?>" target="_blank" id="contratto_home_pdf_preview" style="margin-bottom:16px;">
                            <img src="<?php echo ($pdfContrattoHome) ? $filePdf_placeholder : $fileMissing_placeholder; ?>" alt="file" width="42"/>
                        </a>
                        <input type="hidden" name="contratto_home_pdf_file" id="contratto_home_pdf_file" value="<?php echo esc_attr($pdfContrattoHome); ?>" class="regular-text"><br>
                        <input type="button" id="home_pdf_file_btn" class="button" value="Seleziona pdf" data-contratto-file="home_pdf">
                    </td>

                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_azienda_pdf_file">Contratto AZIENDA</label><br>
                        <a href="<?php echo esc_attr($pdfContrattoAzienda); ?>" target="_blank" id="contratto_azienda_pdf_preview" style="margin-bottom:16px;">
                            <img src="<?php echo ($pdfContrattoAzienda) ? $filePdf_placeholder : $fileMissing_placeholder; ?>" alt="file"  width="42"/>
                        </a>
                        <input type="hidden" name="contratto_azienda_pdf_file" id="contratto_azienda_pdf_file" value="<?php echo esc_attr($pdfContrattoHome); ?>" class="regular-text"><br>
                        <input type="button" id="azienda_pdf_file_btn" class="button" value="Seleziona pdf" data-contratto-file="azienda_pdf">
                    </td>

                    <td style="text-align:center;border-bottom:1px solid;vertical-align:baseline;">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="contratto_aziendaftth_pdf_file">Contratto AZIENDA FTTH</label><br>
                        <a href="<?php echo esc_attr($pdfContrattoAziendaFtth); ?>" target="_blank" id="contratto_aziendaftth_pdf_preview" style="margin-bottom:16px;">
                            <img src="<?php echo ($pdfContrattoAziendaFtth) ? $filePdf_placeholder : $fileMissing_placeholder; ?>" alt="file" width="42" />
                        </a>
                        <input type="hidden" name="contratto_aziendaftth_pdf_file" id="contratto_aziendaftth_pdf_file" value="<?php echo esc_attr($pdfContrattoAziendaFtth); ?>" class="regular-text"><br>
                        <input type="button" id="aziendaftth_pdf_file_btn" class="button" value="Seleziona pdf" data-contratto-file="aziendaftth_pdf">
                    </td>                    
                </tr>                
            </table>

            <h3>Messaggi</h3>
            <table class="form-table" style="border:1px solid #777">
                <tr>
                    <td style="">
                        <label style="font-weigt:bold; display:block; margin-bottom:16px; padding:4px 8px; color:#fff; background: #00567A;" for="copertura_msg_areebianche">Messaggio Aree Bianche</label><br>
                        <textarea rows="4" cols="160" id="copertura_msg_areebianche" name="copertura_msg_areebianche"><?php echo $alertAreeBianche; ?></textarea>
                    </td>
                </tr>
            </table>

            
                      

            <?php submit_button('Salva impostazioni', 'primary', 'contratto_trcs_settings_submit'); ?>
        </form>


        
    </div>
    <?php
}


// Registra le impostazioni
function contratto_tcrs_register_settings() {
    register_setting('contratto_tcrs_plugin_settings', 'contratto_header_image_home');
    register_setting('contratto_tcrs_plugin_settings', 'contratto_footer_image_home');
}
add_action('admin_init', 'contratto_tcrs_register_settings');


// Funzione per caricare gli script necessari
function contratto_tcrs_enqueue_media_scripts($hook) {
    
    if ('settings_page_contratto-tcrs-settings' !== $hook) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('mio-plugin-media-script', plugin_dir_url(__FILE__) . 'js/media-script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'contratto_tcrs_enqueue_media_scripts');