jQuery(document).ready(function ($) {
  // VALIDAZIONE DEGLI INPUTS
  $("#btnContrattoNext").on("click", function (evt) {
    evt.preventDefault();
    var allRequiredFields = $(".tc-required");
    var checkLineaFields = $(this).hasClass("jsCheckLineaFields");
    var hasErrors = false;

    var errLabel = $("#errLabel");
    var loadingLabel = $("#loadingLabel");

    if (checkLineaFields) {
      var mig = $("#linea_migrazione");
      var att = $("#linea_nuova");

      if (!mig.is(":checked") && !att.is(":checked")) {
        hasErrors = true;
        mig.addClass("is-invalid");
        att.addClass("is-invalid");
      } else {
        mig.removeClass("is-invalid");
        att.removeClass("is-invalid");
      }
      // linea_nuova
      // linea_portability
    }

    allRequiredFields.each(function (idx) {
      if ($(this).val() == "") {
        $(this).addClass("is-invalid");
        hasErrors = true;
      } else {
        $(this).removeClass("is-invalid");
      }
    });

    if (!hasErrors) {
      errLabel.addClass("hide");
      loadingLabel.removeClass("hide");
      $("#contratto_form").submit();
    } else {
      errLabel.removeClass("hide");
      loadingLabel.addClass("hide");
    }
  });

  // recupero i dati dal transient
  $("#fill-from-stored-data").on("click", function (evt) {
    evt.preventDefault();
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
            fillAttivazione(response.data.transient_data, tipoCli);
            break;
          case "servizi":
            fillServizi(response.data.transient_data);
            break;
          case "migrazione":
            fillIntestatario(response.data.transient_data, tipoCli);
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

  function fillAttivazione(data, cli) {
    const prefix = cli == "aziende" ? "azienda" : "cliente";

    $("#attivazione_indirizzo").val(data[`${prefix}_indirizzo`]);
    $("#attivazione_civico").val(data[`${prefix}_civico`]);
    $("#attivazione_citta").val(data[`${prefix}_citta`]);
    $("#attivazione_provincia").val(data[`${prefix}_provincia`]);
    $("#attivazione_cap").val(data[`${prefix}_cap`]);
  }

  function fillServizi(data) {
    const prefix = "attivazione";

    $("#servizi_indirizzo").val(data[`${prefix}_indirizzo`]);
    $("#servizi_civico").val(data[`${prefix}_civico`]);
    $("#servizi_citta").val(data[`${prefix}_citta`]);
    $("#servizi_provincia").val(data[`${prefix}_provincia`]);
    $("#servizi_cap").val(data[`${prefix}_cap`]);
  }

  function fillIntestatario(data, cli) {
    let prefix = "";
    if (cli == "aziende") {
      prefix = "azienda";
      $("#linea_rag_sociale").val(data[`rag_sociale`]);
      $(`#linea_${prefix}_indirizzo`).val(data[`${prefix}_indirizzo`]);
      $(`#linea_${prefix}_civico`).val(data[`${prefix}_civico`]);
      $(`#linea_${prefix}_citta`).val(data[`${prefix}_citta`]);
      $(`#linea_${prefix}_provincia`).val(data[`${prefix}_provincia`]);
      $(`#linea_${prefix}_cap`).val(data[`${prefix}_cap`]);
      $(`#linea_${prefix}_piva_cf`).val(data[`${prefix}_piva_cf`]);

      prefix = "cliente";
      $(`#linea_${prefix}_ruolo`).val(data[`${prefix}_ruolo`]);
      $(`#linea_${prefix}_sesso`).val(data[`${prefix}_sesso`]);
      $(`#linea_${prefix}_data_nascita`).val(data[`${prefix}_data_nascita`]);
      $(`#linea_${prefix}_luogo_nascita`).val(data[`${prefix}_luogo_nascita`]);
      $(`#linea_${prefix}_provincia_nascita`).val(
        data[`${prefix}_provincia_nascita`]
      );
      $(`#linea_${prefix}_nazionalita`).val(data[`${prefix}_nazionalita`]);
      $(`#linea_${prefix}_tipo_documento`).val(
        data[`${prefix}_tipo_documento`]
      );
      $(`#linea_${prefix}_doc_numero`).val(data[`${prefix}_doc_numero`]);
      $(`#linea_${prefix}_doc_emittente`).val(data[`${prefix}_doc_emittente`]);
      $(`#linea_${prefix}_doc_rilascio`).val(data[`${prefix}_doc_rilascio`]);
      $(`#linea_${prefix}_doc_scadenza`).val(data[`${prefix}_doc_scadenza`]);
    }

    // campi HOME che vanno anche in OFFICE
    prefix = "cliente";
    $(`#linea_${prefix}_cognome`).val(data[`${prefix}_cognome`]);
    $(`#linea_${prefix}_nome`).val(data[`${prefix}_nome`]);
    $(`#linea_${prefix}_indirizzo`).val(data[`${prefix}_indirizzo`]);
    $(`#linea_${prefix}_civico`).val(data[`${prefix}_civico`]);
    $(`#linea_${prefix}_citta`).val(data[`${prefix}_citta`]);
    $(`#linea_${prefix}_provincia`).val(data[`${prefix}_provincia`]);
    $(`#linea_${prefix}_cap`).val(data[`${prefix}_cap`]);
    $(`#linea_${prefix}_cod_fiscale`).val(data[`${prefix}_cod_fiscale`]);
  }

  $cbxLinea = $("[data-check-linea]").each(function () {
    $(this).on("change", function () {
      var cb = $(this);

      // se migrazione=true, allora portability diventa true
      if (cb.attr("id") == "linea_migrazione" && cb.prop("checked") == true) {
        $("#linea_portability").prop("checked", true).trigger("change");
      }

      if (cb.attr("id") == "linea_portability") {
        if (cb.prop("checked") == true) {
          $("#fields-number-portability").removeClass("hide");
        } else {
          $("#fields-number-portability").addClass("hide");
        }
      }
    });
  });
});
