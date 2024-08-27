const offerte = document.querySelectorAll(".offer-single");
const opzioni = document.querySelectorAll("[data-prodotti]");
const optionsContainer = document.querySelector(`#offer-options`);

const cartContainer = document.querySelector(`#result-cart`);
const cartNome = document.querySelector(`#cart-nome-offerta`);
const cartFeatures = document.querySelector(`#cart-caratteristiche-offerta`);
const cartCanone = document.querySelector(`#cart-canone`);
const cartAttivazione = document.querySelector(`#cart-attivazione`);
const cartNote = document.querySelector(`#cart-note`);

const optionalCostsContainer = document.querySelector(`#costi-opzioni`);
const totaleContainer = document.querySelector(`#cart-totale > span.costo`);

const btnOptionsAdd = document.querySelectorAll(`.js-btn-cart-add`);

let selectedOffer = null;
let addedOptions = [];

const selezionaOfferta = (evt) => {
  selectedOffer = evt.target.closest(".offer-single");
  selectedOffer.classList.add("active");
  updateCartTotal();
};

const deselezionaOfferta = (tgt) => {
  if (tgt) {
    tgt.classList.remove("active");
  }
};

const updateOfferOptions = () => {
  const offerID = selectedOffer.dataset.offer;
  opzioni.forEach((opz) => {
    const prodCollegati = opz.dataset.prodotti.split(/;/);

    if (!prodCollegati.includes(offerID)) opz.classList.add("hide");
    else opz.classList.remove("hide");
  });

  optionsContainer.classList.remove("hide");
};

updateOfferData = () => {
  const offerID = selectedOffer.dataset.offer;
  const offerName = selectedOffer.dataset.name;
  const offerPrice = selectedOffer.dataset.price;
  const offerNote = selectedOffer.dataset.note;

  let offerAttivazione = selectedOffer.dataset.attivazione;
  if (offerAttivazione == 0) offerAttivazione = "GRATUITA";

  cartNome.textContent = offerName;
  cartCanone.textContent = offerPrice;
  cartAttivazione.textContent = `${offerAttivazione} €`;
  cartNote.textContent = offerNote;
};

offerte.forEach((offerta) => {
  offerta.addEventListener("click", (evt) => {
    deselezionaOfferta(selectedOffer);
    selezionaOfferta(evt);
    updateOfferOptions();
    updateOfferData();
  });
});

/** GESTIONE AGGIUNTA RIMOZIONE OPZIONI */
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

  if (optAction == "add") {
    let objInCart = null;

    if (optMulti) {
      console.log("multi:", optId);
      // inserisco nuovo o aggiorno quantità
      objInCart = addedOptions.find((option) => option.id === optId);

      if (objInCart) {
        console.log("trovato", objInCart);
        objInCart.qty += 1;
      }
    }

    if (!objInCart || !optMulti)
      addedOptions.push({ id: optId, name: optName, cost: optCost, qty: 1 });

    if (!optMulti) btn.classList.add("hide");
  } else {
    filteredOptions = addedOptions.filter((opt) => opt.id != optId);
    addedOptions = [...filteredOptions];

    // riattivo il bottone corrispondente tra le opzioni
    document.querySelector(`#btn-opt-${optId}`).classList.remove("hide");
  }

  renderOptionsContent();
  updateCartTotal();
};

const updateCartTotal = () => {
  console.log(`update total`);
  const initial = parseFloat(selectedOffer.dataset.price.replace(",", "."));
  const total = addedOptions.reduce(
    (acc, cur) => acc + parseFloat(cur.cost) * cur.qty,
    initial
  );

  totaleContainer.innerHTML = total.toFixed(2) + "&euro;";
};

const renderOptionsContent = () => {
  //addedOptions.push({ id: optId, name: optName, cost: optCost, qty: 1 });
  console.log(`rendering opt`);
  const renderedOutput = addedOptions
    .map((option) => {
      return `<p class="flex-space-between riga-costo" id="row-opt-${
        option.id
      }">
                <button role="button" class="js-btn-cart-del" 
                    data-id="${option.id}" 
                    data-action="del">
                    <img src="${
                      esito_params.TC_ADDONS_ROOT_URL
                    }/img/plus-square.svg"  alt="" width="24" heigth="24" /></button>
                    <span>(${option.qty}x) ${
        option.name
      } </span><span class="costo">
      ${(option.cost * option.qty).toFixed(2)} &euro;</span></p>`;
    })
    .join("");

  optionalCostsContainer.innerHTML = renderedOutput;
};
