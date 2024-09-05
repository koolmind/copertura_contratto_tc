jQuery(document).ready(function ($) {
  // recupero l'indirizzo della sede
  $("#fill-from-sede").on("click", function () {
    var transientID = $("input#cuid").val();
    var sourceSection = $(this).data("sourcesection");

    console.log(transientID, sourceSection);

    $.ajax({
      url: "/wp-admin/admin-ajax.php", // Variabile globale di WordPress per l'URL dell'admin-ajax.php
      type: "POST",
      data: {
        action: "get_transient_data",
        nonce: contratto_utils.nonce, // Nonce per la sicurezza, definito lato server
        id_transient: transientID, // id del contratto = id del transient
        section: sourceSection, // sezione dei dati da recuperare
      },
      success: function (response) {
        console.log("Risposta completa:", response);
      },
      error: function (xhr, status, error) {
        console.error("Errore Ajax:", status, error);
        console.log("Risposta XHR:", xhr.responseText);
      },
    });
  });
});
