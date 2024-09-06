(function ($) {
  /**
   * Variabili di lavoro
   * ----------------------------------------------------------
   */

  let urlParams = {
    copertura: "ko",
    tipoCliente: null,
    tecnologia: null,
    esclusivita: 0,
    effSpeed: null,
    speed: null,
    indirizzo: null,
    alert: 0,
  };

  const frmVerificaCop = $("#frm-verifica-cop");
  const coperturaForm = $("#copertura-form");
  const datiCopertura = $("#dati-copertura-intro");

  const tipoCliRadios = $("[name='tipoCli']");
  const selProvincia = $("#selProvincia");
  const selComune = $("#selComune");
  const selCivico = $("#selCivico");
  const txtIndirizzo = $("#indirizzo");
  const esitoCopertura = $("#esito_copertura");
  const esitoCoperturaContent = $("#esito_copertura__content");
  const mappaApparato = $("#mappa_apparato");
  const preloader = $("#preloader");
  const btnNewVerifica = $("#btnNewVerifica");
  const theMap = $("#map");
  const btnBadMap = $("#btnBadMap");
  const btnGoodMap = $("#btnGoodMap");

  let tipoCli = undefined;
  let sProvincia = undefined;
  let sComune = undefined;
  let sIndirizzo = undefined;
  let sParticella = undefined;
  let sCivico = undefined;
  let sDatiCop = "";
  let btnContratto = "";
  let bonusGradient = "";
  let contratto = "";

  let esito = undefined;
  let map = undefined;
  let indirizziTrovati = 0;

  let outProd = "";
  let outVoceFax = "";

  /**
   * HELPERS
   * -----------------------------------------------------------
   */

  function writeToLog() {
    return;
    var params = new URLSearchParams();
    params.append("comune", sComune);
    params.append("provincia", sProvincia);
    axios
      .post(`${copertura_params.TCRS_WS_ROOT}logToDB.php`, params)
      .then(function (response) {
        //console.log(response);
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  function abilita(item) {
    item.removeAttr("disabled");
  }

  function disabilita(item) {
    item.attr("disabled", "disabled");
  }

  function pulisci(item, itemType) {
    if (itemType == "text") {
      item.val("");
    }
    if (itemType == "select") {
      item.find("option").remove().end();
      item.append($("<option>", { value: "", text: "-- seleziona--" }));
    }
  }

  function resetAll(e) {
    e.preventDefault();
    tipoCli = "aziende";
    sProvincia = undefined;
    sComune = undefined;
    sIndirizzo = undefined;
    sParticella = undefined;
    sCivico = undefined;

    pulisci(selProvincia, "select");
    pulisci(selComune, "select");
    disabilita(selComune);
    pulisci(selCivico, "select");
    disabilita(selCivico);
    pulisci(txtIndirizzo, "text");
    disabilita(txtIndirizzo);

    esitoCoperturaContent.html("");
    esitoCopertura.addClass("nascondi");
    mappaApparato.addClass("nascondi");
    theMap.html("");
    console.log("reset e vedo form");
    frmVerificaCop.slideDown();

    loadProvince();
  }

  function updateTipoCliente(e) {
    tipoCli = e.target.value;
    outProd = "";
    outVoceFax = "";
  }

  function validazione() {
    if (
      tipoCli == undefined ||
      sProvincia == undefined ||
      sComune == undefined ||
      sIndirizzo == undefined ||
      sCivico == undefined
    ) {
      Swal.fire({
        title: "Impossibile procedere",
        text: "Alcune informazioni sono mancanti. Controlla di aver correttamente impostato la tipologia di contratto.",
        icon: "error",
        confirmButtonText: "OK",
      });
      return false;
    }
    return true;
  }

  /**
   * -----------------------------------------------------
   * FUNZIONI PER FORM COPERTURA
   * -----------------------------------------------------
   */

  function loadProvince() {
    let params = new URLSearchParams();
    params.append("metodo", "listaprovince");
    axios
      .post(`${copertura_params.TCRS_WS_ROOT}wsbridge.php`, params)
      .then(function (response) {
        if (response.status != 200 || response.data.Esito != "OK") {
          Swal.fire({
            title: "Servizio non disponibile",
            html: "Ti preghiamo di riprovare tra qualche minuto.<br>Se il problema persiste, ti preghiamo di contattarci a <strong>info@terrecablate.it</strong>",
            icon: "info",
            confirmButtonText: "OK",
          });
        }

        const province = response.data.dati;

        // rimuovo Siena, perché deve andare come prima voce
        let provinceTemp = province.filter((el) => el.provincia != "SIENA");

        // ordinamento asc
        provinceTemp.sort((a, b) => {
          let fa = a.provincia.toLowerCase(),
            fb = b.provincia.toLowerCase();

          if (fa < fb) {
            return -1;
          }
          if (fa > fb) {
            return 1;
          }
          return 0;
        });

        // devo far comparire SIENA come prima provincia
        let provinceOut = [{ provincia: "SIENA" }, ...provinceTemp];

        selProvincia.append(
          `<option value=''>- seleziona provincia -</option>`
        );

        selProvincia.append(
          provinceOut
            .map(
              (prov) =>
                `<option value='${prov.provincia}'>${prov.provincia}</option>`
            )
            .join("")
        );
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  function loadComuni() {
    sProvincia = selProvincia.val();

    preloader.removeClass("nascondi");

    var params = new URLSearchParams();
    params.append("metodo", "listacomuni");
    params.append("provincia", sProvincia);
    axios
      .post(`${copertura_params.TCRS_WS_ROOT}wsbridge.php`, params)
      .then(function (response) {
        pulisci(selComune, "select");
        var comuni = response.data.dati;

        // ordinamento asc
        comuni.sort((a, b) => {
          let fa = a.comune.toLowerCase(),
            fb = b.comune.toLowerCase();

          if (fa < fb) {
            return -1;
          }
          if (fa > fb) {
            return 1;
          }
          return 0;
        });

        selComune.append(
          comuni.map(
            (com) => `<option value="${com.comune}">${com.comune}</option>`
          )
        );
        preloader.addClass("nascondi");
        abilita(selComune);
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  function suggestIndirizzi() {
    sComune = selComune.val();
    pulisci(txtIndirizzo, "text");
    pulisci(selCivico, "select");
    abilita(txtIndirizzo);

    var options = {
      url: function (phrase) {
        return `${
          copertura_params.TCRS_WS_ROOT
        }wsautocomplete.php?provincia=${encodeURI(
          sProvincia
        )}&comune=${encodeURI(sComune)}&indirizzolike=${encodeURI(phrase)}`;
      },
      getValue: function (element) {
        return element.strada_cliente;
      },

      template: {
        type: "custom",
        method: function (value, item) {
          return item.part_top_cliente + " " + value;
        },
      },
      list: {
        maxNumberOfElements: 50,
        match: {
          enabled: true,
        },
        onShowListEvent: function () {
          preloader.addClass("nascondi");
          let risultatiContainer = document.querySelector(
            "#eac-container-indirizzo > ul"
          );
          indirizziTrovati = risultatiContainer.querySelectorAll("li").length;
        },
        onSelectItemEvent: function () {},
        onClickEvent: function () {
          sParticella = txtIndirizzo.getSelectedItemData().part_top_cliente;
          sIndirizzo = txtIndirizzo.getSelectedItemData().strada_cliente;
          jQuery("#particella").val(sParticella);
          loadCivici();
        },
      },
      requestDelay: 400,
    };

    txtIndirizzo.easyAutocomplete(options);
  }

  function loadCivici() {
    var params = new URLSearchParams();
    params.append("metodo", "cercacivici");
    params.append("provincia", sProvincia);
    params.append("comune", sComune);
    params.append("indirizzo", sIndirizzo);
    params.append("particella", sParticella);

    axios
      .post(`${copertura_params.TCRS_WS_ROOT}wsbridge.php`, params)
      .then(function (response) {
        pulisci(selCivico, "select");
        var civici = response.data;

        selCivico.append(
          civici.map(
            (num) =>
              `<option value='${num.civico_cliente}'>${num.civico_cliente}</option>`
          )
        );
        abilita(selCivico);
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  function updateCivico() {
    sCivico = selCivico.val();
  }

  /**
   * -----------------------------------------------------------------
   *  EVENTI
   * -----------------------------------------------------------------
   */

  tipoCliRadios.on("change", updateTipoCliente);
  selProvincia.on("change", loadComuni);
  selComune.on("change", suggestIndirizzi);
  selCivico.on("change", updateCivico);
  txtIndirizzo.on("focus", function () {
    preloader.removeClass("nascondi");
  });

  frmVerificaCop.on("submit", function (e) {
    e.preventDefault();
    if (validazione()) {
      trova_copertura();
    }
  });

  btnNewVerifica.on("click", resetAll);
  btnBadMap.on("click", resetAll);
  btnGoodMap.on("click", (e) => {
    e.preventDefault();
    renderEsito();
  });

  // INIT
  function init() {
    var params = new URLSearchParams(window.location.search);
    tipoCli = params.get("tipoCli") ?? "aziende";
    loadProvince();
  }

  init();

  /**
   * ---------------------------------------------------------------------
   *  FUNZIONI PER RISULTATI COPERTURA
   * ---------------------------------------------------------------------
   */

  function getBollinoMsg(bollino) {
    var msg = "";
    switch (bollino) {
      case "bollinoF.png":
        msg = "Vera fibra ottica";
        break;
      case "bollinoFR.png":
        msg = "Fibra misto rame";
        break;
      case "bollinoR.png":
        msg = "Connessione rame";
        break;

      default:
        break;
    }
    return msg;
  }

  function listFeatures(data) {
    var featureArray = data.split(";");
    return featureArray
      .map((item) => {
        return `<li>${item.trim()}</li>`;
      })
      .join("");
  }

  function showPrice(canone, voucher, alternativaFtth = false) {
    if (voucher) {
      var gradient = alternativaFtth ? "bonus-ftth" : bonusGradient;
      var ivaMsg =
        voucher.prezzo != 0
          ? `+ iva pari a ${voucher.iva} €/mese`
          : `paghi solo l'iva pari a ${voucher.iva} €/mese`;
      return `
        <div class="reduced_price_wrapper">
          <div class="voucher_name ${gradient}">${voucher.tipoVoucher}</div>
          <div class="sbarrato">${canone}</div>
        </div>
        <div class="reale">
          ${voucher.prezzo} € <span class="price_info">/ mese per ${voucher.durata}</span>
        </div>
        <div class="price_info">${ivaMsg}</div>`;
    } else {
      return `
        <div class="reale">
          ${canone} 
          ${
            tipoCli != "residenziali"
              ? `<span class="price_info"> + iva /mese per sempre</span>`
              : `<span class="price_info"> € /mese per sempre</span>`
          }
        </div>`;
    }
  }

  function getConnessioneParams(tipoCliente, tipoConn, speedConn) {
    let bmgVal = 0,
      downspeed = 0,
      upspeed = 0,
      bollino = "",
      isTcrs = false;

    [downspeed, upspeed] = speedConn.split("/");

    if (upspeed.slice(-1) === "E") {
      isTcrs = true;
      upspeed = upspeed.slice(0, -1);
    }

    if (tipoCliente == "residenziali") {
      bmgVal = null;
    }

    if (tipoCliente == "aziende") {
      bmgVal = tipoConn == "TCRS_GPON" || tipoConn == "OF_FTTH" ? 30 : 10;
    }

    bollino = +downspeed >= 1000 ? "F" : "FR";

    return { up: upspeed, down: downspeed, bmg: bmgVal, bollino: bollino };
  }

  function analizza_dati(dati, tipocliente) {
    const consigliata = dati.TIPOLOGIA_ACCESSO_CONSIGLIATA[tipocliente];
    let puntoGeo = null;

    const tipologieNonOfferte = [
      "Bitstream",
      "Bitstream Ethernet",
      "ULL",
      "Rame su AI",
    ];

    if (tipologieNonOfferte.contains(consigliata.tipo)) {
      return {
        tipoCli: tipocliente,
        prodotto: null,
        connessione: false,
        ftth: false,
        mostraAvviso: false,
        effSpeed: null,
        mappa: null,
      };
    }

    // controllo se esiste una posizione GPS per l'apparato. se c'è è nella sezione relativa all'operatore (TCRS, OF,...)
    if (consigliata.tipo === "OF_FTTH") {
      puntoGeo = dati.OF.punto;
    }

    if (consigliata.tipo === "TCRS_GPON") {
      puntoGeo = dati.TCRS.punto;
    }

    //var esito_voce_fax = dati.TIM.ull == "SI" || dati.TIM.wlr == "SI";

    const showAlert =
      dati.OF &&
      dati.OF.copertura === "FTTH" &&
      dati.OF.area === "BIANCA" &&
      consigliata.tipo === "OF_FTTH"
        ? true
        : false;

    const riferimento_prodotto = consigliata.tipo + "-" + consigliata.maxspeed;

    // zona non coperta
    if (riferimento_prodotto == "-" || consigliata.tipo == "OF_FWA")
      return { connessione: false, ftth: false };

    // zona coperta in esclusiva da TC
    var isFtth = riferimento_prodotto == "TCRS_GPON-1000/300E";

    // zona coperta con fibra 1000 mega da TC non esclusiva. Si propone in alternativa il listino FTTH
    // var multiListino =
    //   riferimento_prodotto == "TCRS_GPON-1000/300" && tipocliente == "aziende";

    // la mappa viene visualizzata solo se esistono le coordinate e l'indirizzo cercato ha più occorrenze (quando è certo si va a diritto)
    return {
      tipoCli: tipocliente,
      prodotto: riferimento_prodotto,
      connessione: getConnessioneParams(
        tipocliente,
        consigliata.tipo,
        consigliata.maxspeed
      ),
      ftth: isFtth,
      mostraAvviso: showAlert,
      effSpeed: consigliata.effspeed,
      mappa: puntoGeo && indirizziTrovati > 1 ? puntoGeo : null,
    };
  }

  function trova_copertura() {
    var params = new URLSearchParams();
    params.append("metodo", "sintetico");
    params.append("provincia", sProvincia);
    params.append("comune", sComune);
    params.append("indirizzo", sIndirizzo);
    params.append("particella", sParticella);
    params.append("civico", sCivico);
    axios
      .post(`${copertura_params.TCRS_WS_ROOT}wsbridge.php`, params)
      .then(function (response) {
        esito = analizza_dati(response.data.dati, tipoCli);

        console.log("Ho un esito");
        console.log(esito);

        // output della mappa (se disponinibile)
        if (esito.mappa) {
          renderMap(esito.mappa);
          frmVerificaCop.slideUp();
          mappaApparato.removeClass("nascondi");
        } else {
          renderEsito();
          //writeToLog();
        }
      })
      .catch(function (error) {
        console.error(error);
      });
  }

  function renderEsito() {
    let out = "";
    let tpl = undefined;

    urlParams = {
      ...urlParams,
      tipoCliente: tipoCli,
      indirizzo: `${sParticella} ${sIndirizzo} ${sCivico}, ${sComune} (${sProvincia})`,
    };

    if (esito.connessione) {
      urlParams = {
        ...urlParams,
        copertura: "ok",
      };

      let [tec, vel] = esito.prodotto.split(/-/i);

      if (vel.slice(-1) == "E") urlParams = { ...urlParams, esclusivita: 1 };
      vel = vel.slice(0, -1);

      urlParams = { ...urlParams, tecnologia: tec, speed: vel };

      if (esito.effSpeed)
        urlParams = { ...urlParams, effSpeed: esito.effSpeed };

      if (esito.mostraAvviso) urlParams = { ...urlParams, alert: 1 };
    } else {
      urlParams = {
        ...urlParams,
        copertura: "ko",
      };
    }

    // compongo l'url per la pagina del risultato
    //let finalUrl = "http://tcdev.terrecablate.it/esito-copertura/?";
    let finalUrl = `${copertura_params.TCRS_SITE_URL}esito-copertura/?`;
    finalUrl += `cli=${urlParams.tipoCliente}&t=${urlParams.tecnologia}&e=${urlParams.esclusivita}&ind=${urlParams.indirizzo}&sp=${urlParams.speed}&cop=${urlParams.copertura}`;

    window.location.href = encodeURI(finalUrl);
    return;
  }

  function renderMap(geoocoords) {
    let mapHtml = `
    <iframe
    width="600"
    height="450"
    style="border: 0"
    loading="lazy"
    allowfullscreen
    src="https://www.google.com/maps?q=${geoocoords.replace(
      " ",
      ""
    )}&ll=${geoocoords.replace(" ", "")}&z=18&output=embed"
    >
    </iframe>
    `;

    theMap.html(mapHtml);
  }
})(jQuery);
