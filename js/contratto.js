jQuery(document).ready(function ($) {
  // ATTIVAZIONE BOTTONI SOLO A CARICAMENTO COMPLETATO
  $(window).on("load", function () {
    // Seleziona tutti i bottoni e rimuovi l'attributo disabled
    $("button").prop("disabled", false);
  });

  // DATEPICKER
  $("input[data-calendario]").datepicker({
    changeMonth: true,
    changeYear: true,
    minDate: "-80Y",
    maxDate: "+10Y",
    dateFormat: "dd/mm/yy",
    yearRange: "-80:+10",
  });

  // VALIDAZIONE DEGLI INPUTS
  $("#btnContrattoNext").on("click", function (evt) {
    evt.preventDefault();

    const allTextInputs = $("input[type='text']");
    const allRequiredFields = $(".tc-required");
    const patternCheckFields = $("input[data-checkfcn]");
    const allMigrations = $(".tc-migration");
    const checkLineaFields = $(this).hasClass("jsCheckLineaFields");
    const checkGdprFields = $(this).hasClass("jsCheckGdprFields");
    const checkPagamentoFields = $(this).hasClass("jsCheckPagamentoFields");
    const checkElenchiFields = $(this).hasClass("jsCheckElenchiFields");
    let hasErrors = false;

    const errLabel = $("#errLabel");
    const loadingLabel = $("#loadingLabel");

    // elimino eventuali spazi dal contenuto dei text inputs, altrimenti risultano riempiti
    allTextInputs.each(function () {
      $(this).val($(this).val().trim());
    });

    // migrazione / nuova linea
    if (checkLineaFields) {
      const mig = $("#linea_migrazione");
      const att = $("#linea_nuova");
      const por = $("#linea_portability");

      // controllo che uno dei due campi migrazione/nuova linea sia stato impostato
      if (!mig.is(":checked") && !att.is(":checked")) {
        hasErrors = true;
        console.log(`errore migra/attiv`);
        mig.addClass("is-invalid");
        att.addClass("is-invalid");
      } else {
        mig.removeClass("is-invalid");
        att.removeClass("is-invalid");
      }

      if (!por.is(":checked")) {
        // se non è richiesta la num. portability, cancello il contenuto dei campi relativi, per essere sicuro di non salvarli
        $("#fields-number-portability input").each(function () {
          $(this).val("");
        });
        $("#linea_consenso_portability").prop("checked", false);
      }
    }

    // accettazione GDPR
    if (checkGdprFields) {
      const marketingOK = $("#consensoMarketingOK");
      const marketingKO = $("#consensoMarketingKO");
      const profilazioneOK = $("#consensoProfilazioneOK");
      const profilazioneKO = $("#consensoProfilazioneKO");

      if (!marketingOK.is(":checked") && !marketingKO.is(":checked")) {
        hasErrors = true;
        console.log(`errore marketing`);
        marketingKO.addClass("is-invalid");
        marketingOK.addClass("is-invalid");
      } else {
        marketingKO.removeClass("is-invalid");
        marketingOK.removeClass("is-invalid");
      }

      if (!profilazioneOK.is(":checked") && !profilazioneKO.is(":checked")) {
        hasErrors = true;
        console.log(`errore prof`);
        profilazioneKO.addClass("is-invalid");
        profilazioneOK.addClass("is-invalid");
      } else {
        profilazioneKO.removeClass("is-invalid");
        profilazioneOK.removeClass("is-invalid");
      }
    }

    // metodo di pagamento
    if (checkPagamentoFields) {
      const pagamentoCC = $("#pagamentoCC");
      const pagamentoSDD = $("#pagamentoSDD");

      if (!pagamentoCC.is(":checked") && !pagamentoSDD.is(":checked")) {
        hasErrors = true;
        console.log(`errore pagam`);
        pagamentoCC.addClass("is-invalid");
        pagamentoSDD.addClass("is-invalid");
      } else {
        pagamentoCC.removeClass("is-invalid");
        pagamentoSDD.removeClass("is-invalid");
      }
    }

    // metodo di pagamento
    if (checkElenchiFields) {
      const consensoElenchiOK = $("#consensoElenchiOK");
      const consensoElenchiKO = $("#consensoElenchiKO");

      if (!consensoElenchiOK.is(":checked") && !consensoElenchiKO.is(":checked")) {
        hasErrors = true;
        console.log(`errore elenchi`);
        consensoElenchiOK.addClass("is-invalid");
        consensoElenchiKO.addClass("is-invalid");
      } else {
        consensoElenchiOK.removeClass("is-invalid");
        consensoElenchiKO.removeClass("is-invalid");
      }
    }

    // validazione campi obbligatori
    allRequiredFields.each(function () {
      if ($(this).prop("type") == "checkbox") {
        if (!$(this).is(":checked")) {
          $(this).addClass("is-invalid");
          hasErrors = true;
          console.log(`errore check`);
        } else {
          $(this).removeClass("is-invalid");
        }
      } else {
        if ($(this).val() == "") {
          $(this).addClass("is-invalid");
          hasErrors = true;
          console.log(`errore campo`, $(this).prop("type"));
        } else {
          $(this).removeClass("is-invalid");
        }
      }
    });

    // controllo tutti i campi che hanno bisogno di un controllo formale sull'input,
    // siano essi obbligatori o meno (se non sono vuoti, li controllo)
    patternCheckFields.each(function () {
      if ($(this).val() != "") {
        doCheckFunction($(this));
      }
    });

    function doCheckFunction(field) {
      const fcn = field.data("checkfcn");
      let validField = true;
      switch (fcn) {
        case "cf_piva":
          validField = checkCfPiva(field.val());
          break;
        case "iban":
          validField = checkIBAN(field.val());
          break;
        default:
          break;
      }
      if (validField) {
        field.removeClass("is-invalid");
      } else {
        field.addClass("is-invalid");
        hasErrors = true;
        console.log(`error piva o iban`);
      }
    }

    function checkCfPiva(str) {
      // è una P.IVA valida ?
      if (/^([A-Za-z]{2})?[0-9]{11}$/i.test(str)) {
        return true;
      }

      // è un CF valido?
      if (/^[A-Za-z]{6}[0-9]{2}[A-Za-z][0-9]{2}[A-Za-z][0-9]{3}[A-Za-z]$/.test(str)) {
        return true;
      }

      return false;
    }

    function checkIBAN(str) {
      if (/^[A-Za-z]{2}[0-9]{2}[A-Za-z]{1}[0-9]{22}$/i.test(str)) return true;

      return false;
    }

    // validazione codici di migrazione
    /* IN SOSPESO FINO A CHIARIMENTI SUI CODICI SENZA COS
    allMigrations.each(function () {
      let field = $(this);
      if (field.val() != "") {
        $.ajax({
          url: "/wp-admin/admin-ajax.php", // Variabile globale di WordPress per l'URL dell'admin-ajax.php
          type: "POST",
          data: {
            action: "validate_migration_code",
            migcode: field.val(), // codice di migrazione inserito
          },
          success: function (response) {
            if (response.data.esito == "ok") {
              console.log("valido!");
              field.removeClass("is-invalid");
              field.closest("div").find(".form-message").addClass("hide");
            }

            if (response.data.esito == "ko") {
              field.addClass("is-invalid");
              hasErrors = true;
              field.closest("div").find(".form-message").removeClass("hide");
            }
          },
          error: function (xhr, status, error) {
            console.error("Errore Ajax:", status, error);
            console.log("Risposta XHR:", xhr.responseText);
          },
        });
      }
    });*/

    if (!hasErrors) {
      errLabel.addClass("hide");
      loadingLabel.removeClass("hide");
      $("#contratto_form").submit();
    } else {
      errLabel.addClass("active");
      setTimeout(() => {
        errLabel.removeClass("active");
      }, 2500);
      loadingLabel.addClass("hide");
    }
  });

  /*
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
        //        console.log("Risposta completa:", response);

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
      $(`#linea_${prefix}_data_nascita`).val(data[`${prefix}_data_nascita`]);
      $(`#linea_${prefix}_luogo_nascita`).val(data[`${prefix}_luogo_nascita`]);
      $(`#linea_${prefix}_provincia_nascita`).val(data[`${prefix}_provincia_nascita`]);
      $(`#linea_${prefix}_nazionalita`).val(data[`${prefix}_nazionalita`]);
      $(`#linea_${prefix}_tipo_documento`).val(data[`${prefix}_tipo_documento`]);
      $(`#linea_${prefix}_doc_numero`).val(data[`${prefix}_doc_numero`]);
      $(`#linea_${prefix}_doc_emittente`).val(data[`${prefix}_doc_emittente`]);
      $(`#linea_${prefix}_doc_rilascio`).val(data[`${prefix}_doc_rilascio`]);
      $(`#linea_${prefix}_doc_scadenza`).val(data[`${prefix}_doc_scadenza`]);
    }

    // campi HOME che vanno anche in OFFICE
    prefix = "cliente";
    $(`#linea_${prefix}_cognome`).val(data[`${prefix}_cognome`]);
    $(`#linea_${prefix}_nome`).val(data[`${prefix}_nome`]);
    $(`#linea_${prefix}_sesso`).val(data[`${prefix}_sesso`]);
    $(`#linea_${prefix}_indirizzo`).val(data[`${prefix}_indirizzo`]);
    $(`#linea_${prefix}_civico`).val(data[`${prefix}_civico`]);
    $(`#linea_${prefix}_citta`).val(data[`${prefix}_citta`]);
    $(`#linea_${prefix}_provincia`).val(data[`${prefix}_provincia`]);
    $(`#linea_${prefix}_cap`).val(data[`${prefix}_cap`]);
    $(`#linea_${prefix}_cod_fiscale`).val(data[`${prefix}_cod_fiscale`]);
  }
 */

  // Gestione Checkboxes stato linea
  $cbxLinea = $("[data-check-linea]").each(function () {
    $(this).on("change", function () {
      const cb = $(this);
      const por = $("#linea_portability");
      const att = $("#linea_nuova");
      const mig = $("#linea_migrazione");

      // MIGRAZIONE: se True, allora anche portability diventa true
      if (cb.attr("id") == "linea_migrazione") {
        const consMigrazione = $("#linea_consenso_migrazione");
        const rowMigrazione = $("#row-consenso-migrazione");
        if (cb.prop("checked") == true) {
          por.prop("checked", true).trigger("change");
          att.prop("checked", false);

          consMigrazione.addClass("tc-required");
          rowMigrazione.removeClass("hide");
        } else {
          consMigrazione.removeClass("tc-required");
          rowMigrazione.addClass("hide");
        }
      }

      // NUOVA ATTIVAZIONE: se True, allora Migrazione deve essere false
      if (cb.attr("id") == "linea_nuova" && cb.prop("checked") == true) {
        mig.prop("checked", false);
      }

      // PORTABILITY: attivo o disattivo alcuni campi collegati
      if (cb.attr("id") == "linea_portability") {
        const cod1 = $("#linea_codice_migrazione_1");
        const num1 = $("#linea_numero_1");
        const consPortability = $("#linea_consenso_portability");
        const fieldsPortability = $("#fields-number-portability");
        const rowPortability = $("#row-consenso-portability");

        if (cb.prop("checked") == true) {
          console.log(`SI portability`);
          fieldsPortability.removeClass("hide");
          rowPortability.removeClass("hide");
          // imposto come obbligatori alcuni campi tra quelli della num. portability
          cod1.addClass("tc-required");
          num1.addClass("tc-required");
          consPortability.addClass("tc-required");
        } else {
          console.log(`NO portability`);
          fieldsPortability.addClass("hide");
          rowPortability.addClass("hide");
          cod1.removeClass("tc-required");
          num1.removeClass("tc-required");
          consPortability.removeClass("tc-required");
          consPortability.removeClass("is-invalid");
        }
      }
    });
  });

  // CONTO CORRENTE SDD

  $("input:radio[data-payment]").change(function () {
    console.log("change");
    const fieldsSDD = $("#fields-conto-corrente");
    let fieldsToBeRequired = [
      "sdd_intestatario_cognome_nome",
      "sdd_intestatario_codfisc_piva",
      "sdd_sottoscrittore_cognome_nome",
      "sdd_sottoscrittore_codfisc",
      "sdd_iban",
    ];

    if (this.value == "sdd") {
      fieldsSDD.removeClass("hide");
      $.each(fieldsToBeRequired, function (idx, val) {
        $("#" + val).addClass("tc-required");
      });
    } else {
      fieldsSDD.addClass("hide");
      $.each(fieldsToBeRequired, function (idx, val) {
        $("#" + val).removeClass("tc-required");
      });
    }
  });
});
