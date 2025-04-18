const minusSvg = `<svg width="20px" height="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
<g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-152.000000, -1035.000000)" fill="#000000">
<path d="M174,1050 L162,1050 C161.448,1050 161,1050.45 161,1051 C161,1051.55 161.448,1052 162,1052 L174,1052 C174.552,1052 175,1051.55 175,1051 C175,1050.45 174.552,1050 174,1050 L174,1050 Z M182,1063 C182,1064.1 181.104,1065 180,1065 L156,1065 C154.896,1065 154,1064.1 154,1063 L154,1039 C154,1037.9 154.896,1037 156,1037 L180,1037 C181.104,1037 182,1037.9 182,1039 L182,1063 L182,1063 Z M180,1035 L156,1035 C153.791,1035 152,1036.79 152,1039 L152,1063 C152,1065.21 153.791,1067 156,1067 L180,1067 C182.209,1067 184,1065.21 184,1063 L184,1039 C184,1036.79 182.209,1035 180,1035 L180,1035 Z" id="minus-square" sketch:type="MSShapeGroup">
</path></g></g></svg>`;

const offerte = document.querySelectorAll(".offer-single");
const opzioni = document.querySelectorAll("[data-prodotti]");
const optionsContainer = document.querySelector(`#offer-options`);

const cartContainer = document.querySelector(`#result-cart`);

const cartNome = document.querySelector(`#cart-nome-offerta`);
const cartFeatures = document.querySelector(`#cart-caratteristiche-offerta`);
const cartCanone = document.querySelector(`#cart-canone`);
const cartAttivazione = document.querySelector(`#cart-attivazione`);
const cartGestione = document.querySelector(`#cart-gestione`);
const cartNote = document.querySelector(`#cart-note`);

// cart form fields
const cntNome = document.querySelector(`#cnt-nomeofferta`);
//const cntFeatures = document.querySelector(`#cart-caratteristiche-offerta`);
const cntCanone = document.querySelector(`#cnt-canone`);
const cntAttivazione = document.querySelector(`#cnt-attivazione`);
const cntGestione = document.querySelector(`#cnt-gestione`);
const cntCosto = document.querySelector(`#cnt-costo`);

const optionalCostsContainer = document.querySelector(`#costi-opzioni`);
const totaleContainer = document.querySelector(`#cart-totale > span.costo`);

const btnOptionsAdd = document.querySelectorAll(`.js-btn-cart-add`);

let selectedOffer = null;
let addedOptions = [];
let offerFritz = 0;

const selezionaOfferta = (evt) => {
  selectedOffer = evt.target.closest(".offer-single");
  selectedOffer.classList.add("active");

  resetOptionContent();
  updateCartTotal();
};

const deselezionaOfferta = (tgt) => {
  if (tgt) {
    tgt.classList.remove("active");
  }
};

const updateOfferOptions = () => {
  const offerID = selectedOffer.dataset.offer;
  const offerHasFritz = +selectedOffer.dataset.hasFritz;
  opzioni.forEach((opz) => {
    const prodCollegati = opz.dataset.prodotti.split(/;/);
    const optFritz = +opz.dataset.needFritz;
    const optButton = opz.querySelector("button");

    if (!prodCollegati.includes(offerID)) opz.classList.add("hide");
    else opz.classList.remove("hide");

    // mostro/nascondo il messaggio relativo alla necessità di un apparato Fritz! per certe opzioni
    const msgsFritzOnly = document.querySelectorAll(`[data-fritzonly]`);
    if (optFritz && !offerHasFritz) {
      msgsFritzOnly.forEach((el) => el.classList.remove("hide"));
    } else {
      msgsFritzOnly.forEach((el) => el.classList.add("hide"));
    }

    // disabilito il bottone delle opzioni che necessitano di un modem Fritz!Box se non è già compreso nell'offerta
    if (+optButton.dataset.needFritz === 1 && offerFritz === 0) {
      optButton.setAttribute("disabled", "disabled");
    } else {
      optButton.removeAttribute("disabled");
    }
  });

  optionsContainer.classList.remove("hide");
};

updateOfferData = () => {
  const offerID = selectedOffer.dataset.offer;
  const offerName = selectedOffer.dataset.name;
  const offerPrice = selectedOffer.dataset.price;
  const offerNote = selectedOffer.dataset.note.replace("|", "<br>");
  const offerFeatures = selectedOffer.dataset.features;
  const offerMaxSpeed = +selectedOffer.dataset.maxspeed;
  let offerAttivazione = selectedOffer.dataset.attivazione;
  let offerGestione = selectedOffer.dataset.gestione;
  const copVelocita = document.querySelector(`#cop-velocita`); // la velocità della linea dedotta dal verifica copertura

  const queryString = window.location.search;
  const urlParameters = new URLSearchParams(queryString);
  const [downSpeed, upSpeed] = urlParameters.get("sp").split("/");

  //console.log(`Speed: ${upSpeed}, ${downSpeed}`);

  if (offerMaxSpeed < +downSpeed) {
    copVelocita.value = offerMaxSpeed;
  } else {
    copVelocita.value = downSpeed;
  }

  offerFritz = +selectedOffer.dataset.hasFritz;

  const features = offerFeatures.split(/;/);
  const formattedFeaturesList = features
    .map((feat) => {
      return `<li class="feature-line">
        <i class="fas fa-check"></i>
        <span>${feat}</span>
        </li>`;
    })
    .join("");

  cartNome.textContent = offerName;
  cartCanone.textContent = getAmount(offerPrice).toFixed(2) + " €";

  let strAttivazione = "";

  if (offerAttivazione !== "0") {
    strAttivazione = `<span style='text-decoration:line-through'>${getAmount(offerAttivazione).toFixed(
      2
    )} €</span><br>già incluso nell'offerta`;
  }
  cartAttivazione.innerHTML = strAttivazione;

  cartGestione.innerText = offerGestione == 0 ? "GRATUITO" : getAmount(offerGestione).toFixed(2) + " €";

  cartNote.innerHTML = offerNote;
  cartFeatures.innerHTML = formattedFeaturesList;

  cntNome.value = offerName;
  cntCanone.value = offerPrice;
  cntAttivazione.value = 0; // offerAttivazione;
  cntGestione.value = offerGestione;
  cntCosto.value = offerPrice;

  document.querySelectorAll(".js_offer_selected_only").forEach((item) => item.classList.remove("hide"));
};

offerte.forEach((offerta) => {
  offerta.addEventListener("click", (evt) => {
    deselezionaOfferta(selectedOffer);
    selezionaOfferta(evt);
    updateOfferData();
    updateOfferOptions();
  });
});

/** GESTIONE AGGIUNTA e RIMOZIONE OPZIONI */
if (btnOptionsAdd) {
  btnOptionsAdd.forEach((btn) => {
    btn.addEventListener("click", (evt) => handleOptionClicked(evt));
  });
}

// event delegation
if (cartContainer) {
  cartContainer.addEventListener("click", (evt) => {
    if (evt.target.closest("button").classList.contains("js-btn-cart-del")) {
      handleOptionClicked(evt);
    }
  });
}

const getAmount = (content) => {
  const parts = content.trim().split(" ");
  return parseFloat(parts[0].replace(",", "."));
};

const handleOptionClicked = (evt) => {
  evt.preventDefault();

  const btn = evt.target.closest("button");
  const btnData = btn.dataset;
  const optCost = btnData.cost;
  const optId = btnData.id;
  const optName = btnData.name;
  const optAction = btnData.action;
  const optMulti = btnData.multi == "1";
  const optExcl = btnData.excl == "1";
  const optQMax = btnData.qmax || null;
  const optIsFritz = btnData.isFritz == "1";
  const optNeedFritz = btnData.needFritz == "1";
  const allFritzBtns = document.querySelectorAll(`.offer-option button[data-need-fritz='1']`);
  const allExclusives = document.querySelectorAll(`[data-excl='1']`);

  if (optAction == "add") {
    let objInCart = null;

    if (optMulti) {
      // inserisco nuovo o aggiorno quantità
      objInCart = addedOptions.find((option) => option.id === optId);

      if (objInCart) {
        objInCart.qty += 1;
        if (objInCart.qty == optQMax) {
          // disabilita il bottone per l'aggiunta e mostra un alert
          btn.classList.add("hide");
          alert("Hai raggiunto il valore massimo per questa opzione");
        }
      }
    }

    if (!objInCart || !optMulti)
      addedOptions.push({
        id: optId,
        name: optName,
        cost: optCost,
        qty: 1,
        excl: +optExcl,
        isFritz: +optIsFritz,
        needFritz: +optNeedFritz,
      });

    if (!optMulti) btn.classList.add("hide");

    if (optExcl) {
      // disabilito le altre opzioni esclusive
      allExclusives.forEach((item) => {
        if (item.id != optId) item.setAttribute("disabled", "disabled");
      });
    }

    // sto aggiugendo un'opzione che include un apparato Fritz!Box, quindi abilito le opzioni che necessitano di Fritz!
    if (optIsFritz && allFritzBtns != null) {
      console.log("Bottone di fritz", optIsFritz);
      allFritzBtns.forEach((item) => {
        console.log("analizzando ", item);
        item.removeAttribute("disabled");
      });
    }
  } else {
    let filteredOptions = addedOptions.filter((opt) => opt.id != optId);
    addedOptions = [...filteredOptions];
    // riattivo il bottone corrispondente tra le opzioni
    document.querySelector(`#btn-opt-${optId}`).classList.remove("hide");

    if (optExcl) {
      // riabilito le altre opzioni esclusive
      allExclusives.forEach((item) => {
        item.removeAttribute("disabled");
      });
    }

    // se rimuovo un'opzione che contiene un Fritz!Box devo eliminare anche tutte le opzioni che necessitano di Fritz!
    if (optIsFritz) {
      // rimuovo le opzioni Fritz dal carrello
      let fritzToRemove = document.querySelectorAll(`.js-btn-cart-del[data-need-fritz="1"]`);
      fritzToRemove.forEach((item) => {
        filteredOptions = addedOptions.filter((opt) => opt.id != item.dataset.id);
        addedOptions = [...filteredOptions];
      });

      // disabilito i relativi pulsanti
      allFritzBtns.forEach((item) => {
        item.setAttribute("disabled", "disabled");
      });
    }
  }

  renderOptionsContent();
  updateCartTotal();
};

const updateCartTotal = () => {
  const initial = parseFloat(selectedOffer.dataset.price.replace(",", "."));
  const total = addedOptions.reduce((acc, cur) => acc + parseFloat(cur.cost) * cur.qty, initial);

  totaleContainer.innerHTML = total.toFixed(2) + " &euro;";
  cntCosto.value = total.toFixed(2);
};

const renderOptionsContent = () => {
  const renderedOutput = addedOptions
    .map((option, idx) => {
      return `<p class="riga-costo row-opt" id="row-opt-${option.id}">
                <span><button type="button" role="button" class="js-btn-cart-del btn-option-small" 
                    data-id="${option.id}" 
                    data-action="del"
                    data-is-fritz="${option.isFritz}"
                    data-need-fritz="${option.needFritz}"
                    data-excl="${option.excl}">
                    <i class="far fa-minus-square"></i>
                    </button>                    
                    <span>(${option.qty}x) ${option.name} </span></span>
      <span class="costo">
      ${(option.cost * option.qty).toFixed(2)} &euro;</span>
      <input type="hidden" name="cnt-options[${idx}][name]" value="${option.name}" />
      <input type="hidden" name="cnt-options[${idx}][cost]" value="${option.cost}" />
      <input type="hidden" name="cnt-options[${idx}][qty]" value="${option.qty}" />
      </p>`;
    })
    .join("");

  optionalCostsContainer.innerHTML = renderedOutput;
};

resetOptionContent = () => {
  addedOptions = [];
  optionalCostsContainer.innerHTML = "nessuna opzione selezionata";
};
