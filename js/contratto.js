jQuery(document).ready(function ($) {
  $("#btnContrattoNext").on("click", function (evt) {
    evt.preventDefault();
    var allRequiredFields = $(".tc-required");

    allRequiredFields.each(function (idx) {
      var errLabel = $(this).closest(".tc-input").find(".form-message");
      if ($(this).val() == "") {
        $(this).addClass("is-invalid");
        //errLabel.removeClass("hide");
      } else {
        $(this).removeClass("is-invalid");
        //errLabel.addClass("hide");
      }
    });
    console.log("validando...");
  });

  // recupero i dati dal transient
  $("#fill-from-stored-data").on("click", function () {
    var transientID = $("input#cuid").val();
    var sourceSection = $(this).data("sourcesection");
    var currentSection = $("input#section").val();
    var tipoCli = $("input#tipocli").val();

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

        switch (currentSection) {
          case "attivazione":
            var prefix = tipoCli == "aziende" ? "azienda" : "cliente";
            fillAttivazione(response.data.transient_data, prefix);
            break;
          case "servizi":
            fillServizi(response.data.transient_data, "attivazione");
            break;

          default:
            break;
        }
      },
      error: function (xhr, status, error) {
        console.error("Errore Ajax:", status, error);
        console.log("Risposta XHR:", xhr.responseText);
      },
    });
  });

  function fillAttivazione(data, prefix) {
    $("#attivazione_indirizzo").val(data[`${prefix}_indirizzo`]);
    $("#attivazione_civico").val(data[`${prefix}_civico`]);
    $("#attivazione_citta").val(data[`${prefix}_citta`]);
    $("#attivazione_provincia").val(data[`${prefix}_provincia`]);
    $("#attivazione_cap").val(data[`${prefix}_cap`]);
  }

  function fillServizi(data, prefix) {
    $("#servizi_indirizzo").val(data[`${prefix}_indirizzo`]);
    $("#servizi_civico").val(data[`${prefix}_civico`]);
    $("#servizi_citta").val(data[`${prefix}_citta`]);
    $("#servizi_provincia").val(data[`${prefix}_provincia`]);
    $("#servizi_cap").val(data[`${prefix}_cap`]);
  }
});
